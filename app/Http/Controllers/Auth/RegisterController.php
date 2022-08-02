<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    private $defaultLevel = 'user';

    public function index(){
        return view('Auth.register', [
            'title' => 'Register'
        ]);
    }


    public function store(StoreRegisterRequest $request){
        $us = new User;
        $us->name = $request->name;
        $us->username = $request->username;
        $us->email = $request->email;
        $us->level_user = $this->defaultLevel;
        $us->password = Hash::make($request->password);
        $us->save();

        $request->session()->flash('bisa', 'Penambahan Anggota Telah Berhasil');
        
        return redirect('/login');

        

        // return redirect('/login')->with('message', 'Selamat akun anda berhasil di tambah!');
    }
}
