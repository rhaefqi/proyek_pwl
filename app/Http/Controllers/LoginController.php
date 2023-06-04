<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function index(){
        return view('login_admin');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('admin');
        }

        return back()->with('loginError', 'Login Gagal');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function konMail(){
        return view('konfirmasi-email');
    }

    public function konMailLogic(Request $request){
        $request->validate([
            'email' => 'required'
        ]);
        $hasil = User::where('email', $request->email)->get();
        if(isset($hasil[0]->email)){
            return redirect('/reset-password?email=' . $request->email);
        }else{
            return back()->with('gagal', 'Konfirmasi Email Gagal');
        }
    }

    public function resetPass(){
        $email = request('email');
        return view('reset-password', compact('email'));
    }

    public function resetPassLogic(Request $request){
        $request->validate([
            'password' => 'required|same:konfirmasi_password|min:5',
            'konfirmasi_password' => 'required|same:password|min:5',
        ]);
        $password = bcrypt($request->password);
        User::where('email', $request->email)
            ->update(['password' => $password]);

        return redirect('/login')->with('success', 'Password berhasil dirubah');
    }

    public function tampilanAdmin(Request $request){
        $penduduk = User::select('nama', 'nik', 'email', 'no_hp', 'id')->get();
        return view('pejabat.data', compact('penduduk'));
    }
}