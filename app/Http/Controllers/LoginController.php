<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::user()){
            return response()->redirectTo('/admin');
        }
        return view('login');
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->all();
        unset($credentials['_token']);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }
        return response()->redirectTo('/login')->withErrors([
            'email' => 'Неправильный Email или пароль',
        ])->onlyInput('email');
    }


    public function logout()
    {
        Auth::logout();
        return response()->redirectTo('/');
    }

}
