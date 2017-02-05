<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

    public function signup()
    {
        return view('users.signup');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput($request->all());
        }

        if (Auth::attempt($request->only(['username', 'password']), $request->has('remember'))) {
            return redirect()->intended('/');
        }

        $validator->errors()->add('account', "Could not authenticate. Check your credentials.");

        return redirect()->route('login')->withInput($request->all())->withErrors($validator);
    }
}
