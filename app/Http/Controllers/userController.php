<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('index');
    }

    public function pengaduan(){
        $category = Category::all();
        return view('Pengaduan', compact('category'));
    }

    public function login(){
        return view('login_register.login');
    }

    public function register(){
        return view('login_register.register');
    }

    /*public function reg_penduduk(request $request){
        $validated = $request->validate([
            'nama' => "required|min:5|max:100",
            'email' => "required|min:5|max:100",
            'nik' => "required|min:10",
            'no_hp' => "required|min:10",
            'password' => "required|min:5"
        ]);

        $new_penduduk = new Penduduk;
        $new_penduduk->nama = $request->nama;
        $new_penduduk->email = $request->email;
        $new_penduduk->nik = $request->nik;
        $new_penduduk->no_hp = $request->no_hp;
        $new_penduduk->password = $request->password;
        $new_penduduk->id = $request->id;

        $new_penduduk->save();

        return redirect('/login')->with('status', 'Berhasil diregistrasi silahkan login!');
    }*/

    public function login_logic(request $request){
        $request->validate(([
            'nik' => 'required',
            'password' => 'required',
        ]));

        $data = [
            'nik' => $request->nik,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('mainpage');
        }
        
        return redirect()->route('login_user')->with('failed', 'Email atau password salah');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('mainpage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
}
