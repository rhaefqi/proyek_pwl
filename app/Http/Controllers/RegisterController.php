<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller {
    public function index(){
        return view('register');
    }

    public function store(Request $request){
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
            'image' => 'image|file|max:2048'
        ]);

        $validatedData['level'] = '0';

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('assets/img');
        }else{
            $validatedData['image'] = 'assets/img/no_photo.png';
        }
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan Login');
    }

    public function showProfil(User $user){
        return view('profil', compact('user'));
    }

    public function editProfil(Request $request, User $user){
        if(
            $request->nama == $user->nama &&
            $request->gender == $user->gender &&
            $request->alamat == $user->alamat &&
            $request->kota == $user->kota &&
            $request->provinsi == $user->provinsi &&
            $request->kode_pos == $user->kode_pos &&
            $request->no_hp == $user->no_hp &&
            $request->username == $user->username &&
            $request->email == $user->email &&
            !$request->file('image')
        ){
            return redirect('/profil/' . $user->username . '')->with('failed', 'Tidak ada perubahan');
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

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/profil/' . $request->username . '')->with('success', 'Profil berhasil diupdate');
    }

    public function deleteAkun(User $user){
        if($user->image != 'assets/img/no_photo.png'){
            Storage::delete($user->image);
        }
        $user->delete();
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function showResetPassword(){
        $email = request('email');
        $query = User::where('email', $email)->get();
        $username = $query[0]->username;
        return view('reset-password-profil', compact('email', 'username'));
    }

    public function ResetPassword(Request $request){
        $request->validate([
            'password' => 'required|same:konfirmasi_password|min:5',
            'konfirmasi_password' => 'required|same:password|min:5',
        ]);
        $password = bcrypt($request->password);
        User::where('email', $request->email)
            ->update(['password' => $password]);

        return redirect('/profil/' . $request->username . '')->with('success', 'Password berhasil diubah');
    }
}