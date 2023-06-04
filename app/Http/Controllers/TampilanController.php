<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Keranjang;
use App\Models\Pembelian;
use App\Models\Pembelian_produk;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TampilanController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function myProduct():View {
        return view('index', [
            'products' => Product::latest()->paginate(12)->withQueryString()
        ]);
    }

    public function detailProduct(Product $product){
        return view('detail', compact('product'));
    }

    public function keranjang(Request $request){
        if(!auth()->user()){
            return redirect('/login')->with('loginError', 'Silahkan login terlebih dahulu');
        }
        if(auth()->user()->level == 1){
            return redirect('/admin');
        }
        if($request->jumlah == ""){
            return redirect('/detail/'.$request->id_produk.'')->with('status', 'Silahkan isi jumlah yang ingin dibeli');
        }
        $cek = Keranjang::where('id_produk', $request->id_produk)->get()->count();
        if($cek == 1){
            return back()->with('status', 'Produk sudah ada di keranjang');
        }

        $validatedData = $request->validate([
            'id_produk' => 'required',
            'image' => 'required',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'jumlah' => 'required',
        ]);

        Keranjang::create($validatedData);
        return back()->with('success', 'Produk berhasil dimasukkan ke keranjang');
    }

    public function showKeranjang(){
        $isiKeranjang = Keranjang::all();
        // dd($isiKeranjang->all());
        if($isiKeranjang->count() == 0){
            return redirect('/')->with('danger','Keranjang kosong, silahkan belanja dulu');
        }
        session()->put('isiKeranjang', $isiKeranjang);
        return view('keranjang', compact('isiKeranjang'));
    }

    public function deleteProduct($id){
        $keranjang = Keranjang::where('id_produk', $id);
        $keranjang->delete();
        $isiKeranjang = Keranjang::all();
        // dd($isiKeranjang->all());
        if($isiKeranjang->count() == 0){
            return redirect('/')->with('success','Isi keranjang sudah kosong');
        }
        return redirect('/keranjang')->with('success','Produk berhasil dihapus dari keranjang');
    }

    public function deleteAllProduct(){
        Keranjang::truncate();
        return redirect('/')->with('success','Isi keranjang sudah kosong');
    }

    public function konfirBayar(Request $request){
        $user = User::find(auth()->user()->id);
        $total = $request->total;
        return view('konfirmasi-pembayaran', compact('user', 'total'));
    }

    public function konfirBayarLogic(Request $request){
        $request->validate([
            'di_bayar' => 'required|same:total',
            'total' => 'required|same:di_bayar',
            'tujuan' => 'required|in:DANA,OVO,go-pay',
        ]);

        $idPembelian = substr(uniqid(), 5, 5);
        $tanggalPembelian = date('Y-m-d');

        Pembelian::create([
            'id_pembelian' => $idPembelian,
            'user_id' => auth()->user()->id,
            'nama_pembeli' => $request->namaPembeli,
            'tanggal_pembelian' => $tanggalPembelian,
            'total_pembelian' => $request->total,
            'e_money' => $request->tujuan,
            'e_money_number' => $request->noHpPembayaran,
            'status_pembayaran' => 'PAID',
            'status_pembelian' => 'PENDING'
        ]);

        $isiKeranjang = session()->get('isiKeranjang');
        foreach($isiKeranjang as $data) {
            DB::table('pembelian_produks')->insert([
                'id' => NULL,
                'pembelian_id' => $idPembelian,
                'image' => $data['image'],
                'product_id' => $data['id_produk'],
                'nama' => $data['nama_produk'],
                'jumlah' => $data['jumlah'],
                'harga' => $data['harga_produk']
            ]);
        }

        session()->forget('isiKeranjang');
        Keranjang::truncate();
        session()->put('idPembelian', $idPembelian);
        return redirect('/bukti-pembelian')->with('success', "Konfirmasi pembayaran diterima, silahkan print bukti pembelian");
    }

    public function buktiPembelian(){
        $idPembelian = session()->get('idPembelian');
        $data1 = Pembelian::where('id_pembelian', $idPembelian)->get();
        $data2 = Pembelian_produk::where('pembelian_id', $idPembelian)->get();
        $data1 = $data1[0];
        return view('bukti-pembelian', compact('data1', 'data2'));
    }

    public function selesaiBuktiPembelian(){
        session()->forget('idPembelian');
        return redirect('/')->with('success', 'Terima kasih telah belanja di GoMarket');
    }

    public function pencarian(){
        $keyword = request('search');
        $products = Product::latest();
    
        if ($keyword) {
            $products->where(function ($query) use ($keyword) {
                $query->where('nama_produk', 'like', '%' . $keyword . '%')
                      ->orWhere('kategori_produk', 'like', '%' . $keyword . '%');
            });
        }
    
        return view('search', [
            'products' => $products->paginate(12)->withQueryString(),
            'keyword' => $keyword
        ]);
    }

    public function cari(){
        
    }
}