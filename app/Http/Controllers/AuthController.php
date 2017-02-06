<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;

class AuthController extends Controller
{
    /**
     * Show the login page
     * @return view
     */
    public function login()
    {
        $title = 'Login';
        return view('users.login', compact('title'));
    }

    /**
     * Show the signup page
     * @return view
     */
    public function signup()
    {
        $title = 'Signup';
        return view('users.signup', compact('title'));
    }

    /**
     * Authenticate the user
     * @param  Request $request
     * @return redirect
     */
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.login')->withErrors($validator)->withInput($request->all());
        }

        if (Auth::attempt($request->only(['username', 'password']), $request->has('remember'))) {
            return redirect()->intended('/');
        }

        $validator->errors()->add('account', "Could not authenticate. Check your credentials.");

        return redirect()->route('users.login')->withInput($request->all())->withErrors($validator);
    }

    /**
     * Register a new user
     * @param  Request $request
     * @return redirect
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|alpha_dash|max:255',
            'email'    => 'required|email',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.login')->withErrors($validator)->withInput($request->all());
        }

        // TODO
    }

    /**
     * Disconnect the current user
     * @return redirect
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
