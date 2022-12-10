<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login', [
            'title'=>'Login',
            'active'=>'login'
        ]);
    }
    public function authenticate(Request $request){
       $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5'
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Invalid Credentials!');
    }
    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/auth/login');
    }
}
