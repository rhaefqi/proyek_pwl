<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller {
    /**
     * Display a listing of the resource.
     */
    // public function postingan()
    // {
    //     $penduduk = penduduk::select('nama', 'nik', 'email', 'no_hp', 'id')->get();
    //     return view('admin.admin', compact('penduduk'));
    // }
    public function tampilanAdmin(){
        // $penduduk = User::select('nama', 'nik', 'email', 'no_hp', 'id')->get();
        return "hadeh";
        // return view('admin.data', compact('penduduk'));
    }

    public function login(){
        return view('login_admin');
    }
    public function login_logic(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/test2');
        }

        return redirect()->route('login.admin')->with('failed', 'Email atau password salah');
        // $t = Auth::attempt($data);
        // dd($t);
        // if(Auth::attempt($data)){
        //     return redirect()->route('mainpage');
        // }else{
        //     return redirect()->route('login.admin')->with('failed', 'Email atau password salah');
        // }

        // if (Auth::guard('admin')->attempt($data)) {
        //     $request->session()->regenerate();
        //     // dd($request);
        //     return redirect()->route('admin');

        // } elseif (Auth::guard('web')->attempt($data)) {
        //     $request->session()->regenerate();
        //     return redirect()->route('mainpage');
        // } else {
        //     return redirect()->route('login.admin')->with('failed', 'Email atau password salah');
        // }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('mainpage');
    }

    public function index(){
        return "hadeh";
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

    public function luthfi(){
        return 'bismillah';
    }
}