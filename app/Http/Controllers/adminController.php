<?php

namespace App\Http\Controllers;

use App\Models\Pembelian_produk;
use App\Models\Pembelian;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller {
    public function index(){
        return view('admin.index');
    }

    public function myUsers(){
        return view('admin.users.index', [
            'users' => User::paginate(10)->withQueryString()
        ]);
    }

    public function showCreateUser(){
        return view('admin.users.create');
    }

    public function createUser(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|max:40',
            'gender' => 'required|in:Pria,Wanita',
            'alamat' => 'required',
            'kota' => 'required|max:40',
            'provinsi' => 'required|max:40',
            'kode_pos' => 'required|max:20',
            'no_hp' => 'required|max:20',
            'username' => ['required', 'min:3', 'max:30', 'unique:users'],
            'password' => 'required|min:5|max:255|same:konfirmasi_password',
            'konfirmasi_password' => 'required|same:password',
            'email' => 'required|email|unique:users|max:50',
            'image' => 'image|file|max:2048',
            'level' => 'required|in:1,0'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('assets/img');
        }else{
            $validatedData['image'] = 'assets/img/no_photo.png';
        }
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/admin/users')->with('success', 'User baru berhasil dibuat');
    }

    public function showEditUser(User $user){
        return view('admin.users.edit', compact('user'));
    }

    public function editUser(Request $request, User $user){
        if(
            $request->nama == $user->nama &&
            $request->gender == $user->gender &&
            $request->alamat == $user->alamat &&
            $request->kota == $user->kota &&
            $request->provinsi == $user->provinsi &&
            $request->kode_pos == $user->kode_pos &&
            $request->no_hp == $user->no_hp &&
            $request->level == $user->level &&
            $request->username == $user->username &&
            $request->email == $user->email &&
            !$request->file('image')
        ){
            return redirect('/admin/users/' . $user->id . '/edit')->with('failed', 'Tidak ada perubahan');
        }
        $rules = [
            'nama' => 'required|max:40',
            'gender' => 'required|in:Pria,Wanita',
            'alamat' => 'required',
            'kota' => 'required|max:40',
            'provinsi' => 'required|max:40',
            'kode_pos' => 'required|max:20',
            'no_hp' => 'required|max:20',
            'image' => 'image|file|max:2048',
            'level' => 'required|in:1,0'
        ];

        if($request->username != $user->username){
            $rules['username'] = 'required|min:3|max:30|unique:users';
        }if($request->email != $user->email){
            $rules['email'] = 'required|email|unique:users|max:50';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage != 'assets/img/no_photo.png'){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('assets/img');
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect('/admin/users')->with('success', 'User berhasil diupdate');
    }

    public function deleteUser(User $user){
        if($user->image != 'assets/img/no_photo.png'){
            Storage::delete($user->image);
        }
        $user->delete();
        return redirect('/admin/users')->with('success', "User Berhasil Dihapus!");
    }

    public function products(){
        return view('admin.products.index', [
            'products' => Product::latest()->paginate(10)->withQueryString()
        ]);
    }

    public function showAddProduct(){
        return view('admin.products.add');
    }

    public function addProduct(Request $request){
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'kategori_produk' => 'required',
            'merek_produk' => 'required',
            'deskripsi_produk' => 'required',
            'image' => 'image|file|max:2048|required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('assets/img');
        }
        
        Product::create($validatedData);
        return redirect('/admin/products')->with('success', 'Produk baru berhasil ditambahkan');
    }

    public function showEditProduct(Product $product){
        return view('admin.products.edit', compact('product'));
    }

    public function editProduct(Request $request, Product $product){
        if(
            $request->nama_produk == $product->nama_produk &&
            $request->harga_produk == $product->harga_produk &&
            $request->kategori_produk == $product->kategori_produk &&
            $request->merek_produk == $product->merek_produk &&
            $request->deskripsi_produk == $product->deskripsi_produk &&
            !$request->file('image')
        ){
            return redirect('/admin/products/' . $product->id . '/edit')->with('failed', 'Produk gagal diupdate');
        }
        $rules = [
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'kategori_produk' => 'required',
            'merek_produk' => 'required',
            'deskripsi_produk' => 'required',
            'image' => 'image|file|max:2048|'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('assets/img');
        }

        Product::where('id', $product->id)->update($validatedData);

        return redirect('/admin/products')->with('success', 'Product berhasil diupdate');
    }

    public function deleteProduct(Product $product){
        $product->delete();
        return redirect('/admin/products')->with('success', "Product Berhasil Dihapus!");
    }

    public function pesanan(){
        return view('admin.pesanan.index', [
            'pembelian' => Pembelian::all()
        ]);
    }

    public function showEditStatusPengiriman(Pembelian $pembelian){
        return view('admin.pesanan.edit-status-pengiriman', compact('pembelian'));
    }

    public function editStatusPengiriman(Request $request){
        $request->validate([
            'pengiriman' => 'required|in:PENDING,SENT'
        ]);

        Pembelian::where('id_pembelian', $request->id)->update([
            'status_pembelian' => $request->pengiriman
        ]);

        return redirect('/admin/pesanan')->with('success', 'Status pengiriman berhasil dirubah');
    }

    public function fakturPemesanan(Request $request){
        $idPembelian = $request->id;
        $data1 = Pembelian::where('id_pembelian', $idPembelian)->get();
        $data2 = Pembelian_produk::where('pembelian_id', $idPembelian)->get();
        $data1 = $data1[0];
        return view('admin.pesanan.faktur-pemesanan', compact('data1', 'data2', 'idPembelian'));
    }
}