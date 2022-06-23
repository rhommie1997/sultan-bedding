<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackofficeController extends Controller
{
    //


    public function index(){
        return view ('backoffice.menu.index');
    }

    public function login(){
        return view('backoffice.login',[
            'title' => 'Back Office'
        ]);
    }

    public function auth(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/backoffice');

        }

        return back()->with('loginError','Login Failed, Username or Password Incorrect !!');

    }

    public function logout(){

        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/backoffice/login');
    }

}
