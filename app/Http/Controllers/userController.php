<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        return view('index');
    }

    public function pengaduan()
    {
        $category = Category::all();
        return view('Pengaduan', compact('category'));
    }

    public function login()
    {
        return view('login_register.login');
    }

    public function register()
    {
        return view('login_register.register');
    }

    public function reg_penduduk(request $request)
    {
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
    }

    // public function login_logic(request $request)
    // {
    //     $request->validate(([
    //         'nik' => 'required',
    //         'password' => 'required',
    //     ]));

    //     $data = [
    //         'nik' => $request->nik,
    //         'password' => $request->password
    //     ];

    //     if (Auth::guard('penduduk')->attempt($data)) {
    //         $request->session()->regenerate();
    //         // dd($request);
    //         return redirect()->route('pengaduan');
    //     }
    //     //  elseif (Auth::guard('web')->attempt($data)) {
    //     //     $request->session()->regenerate();
    //     //     return redirect()->route('mainpage');
    //     // } 
    //     else {
    //         return redirect()->route('login_user')->with('failed', 'Email atau password salah');
    //     }
    // }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('mainpage');
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