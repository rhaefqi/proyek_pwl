<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Hash;

class pendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function store_data(Request $request){
        // dd($request);

        $validate = $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'password' => 'required'
        ]);
        // dd();

        $new_post = new Penduduk;
        $new_post -> nama       = $request->name;
        $new_post -> nik        = $request->nik;
        $new_post -> email      = $request->email;
        $new_post -> no_hp       = $request->nohp;
        $new_post -> password       = Hash::make($request->password);
        
        $new_post->save();

        return redirect()->route('admin')->with('status', 'Data penduduk berhasil ditambahkan');
    }

    public function edit_data($id){
        // dd($id);

        // $id;
        
        $penduduk = Penduduk::find($id);

        return view('admin.edit', compact('penduduk'));
        
    }

    public function update_data(Request $request, $id){
        $validate = $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'nohp' => 'required'
        ]);
        // dd();

        $penduduk = Penduduk::find($id);
        $penduduk -> nama       = $request->name;
        $penduduk -> nik        = $request->nik;
        $penduduk -> email      = $request->email;
        $penduduk -> no_hp       = $request->nohp;
        $penduduk -> password       = Hash::make($request->password);
        
        $penduduk->save();

        return redirect()->route('admin')->with('edit_status', 'Data penduduk berhasil edit');
    }

    public function delete_penduduk($id){
        $penduduk = Penduduk::find($id);
        $penduduk->delete();

        return redirect()->route('admin')->with('hapus_status', 'Data penduduk berhasil dihapus');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
