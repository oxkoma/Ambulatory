<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        if(Auth::check()) {

            if(Auth::user()->usertype == 'admin') {
                return redirect()->route('user.home-admin');
            }
                return redirect()->route('index');
        }
        $formFields = $request->only(['email', 'password']);

        if(Auth::attempt($formFields)) {
            if(Auth::user()->usertype == 'admin') {
                return redirect()->route('user.home-admin');
            }
            return redirect()->route('index');
        }

        return redirect()->route('user.login')->withErrors([
            'email' => 'Помилка входу'
        ]);
    }
}
