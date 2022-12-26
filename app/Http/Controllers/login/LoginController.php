<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    public function authenticate(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::check()) { }
// dd(Auth::guard('user')->check(), Auth::guard('admin')->check());
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => 1])) {
            return redirect()->route('admin.dashboard.index');
        } else if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => 2])) {
            return redirect()->route('user.dashboard.index');
        } else {
            // Session::flash('loginError', 'Login Failed!');
            return redirect()->route('login.index')->with(['gagal' => 'Login Failed!']);
        }
    }
    public function logout(){
        // dd('masuk');
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
        return redirect('/auth/login');
    }
}