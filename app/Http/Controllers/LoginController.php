<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminModel;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', ['title' => 'Login']);
    }

    public function __construct()
        {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:admin')->except('logout');
            $this->middleware('guest:user')->except('logout');
        }

    public function proses_login(Request $request)
    {
        $request -> validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $kredensil = $request->only('email','password');
        
        if (Auth::guard('admin')->attempt($kredensil)){
            return redirect()->intended('administrator');
        }

        elseif (Auth::guard('user')->attempt($kredensil)) {
            return redirect()->intended('/');
        }
        return redirect('login')->withErrors(['msg' => 'Email atau password yang dimasukkan salah!']);
    }

    public function logout(Request $request)
    {
        $request -> session() -> flush();
        Auth::logout();
        return redirect('/');
    }

}
