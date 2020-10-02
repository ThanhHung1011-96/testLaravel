<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    public function storeLogin(Request $request)
    {
        // dd($request->all());
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->back()->with(['error' => 'Email or password worng *'])->withInput();
        }
    }
    public function showRegister()
    {
        return view('auth.register');
    }
    public function storeRegister(RegisterRequest $request)
    {
        dd($request->all());
    }
}