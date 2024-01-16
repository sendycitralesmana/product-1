<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('backoffice/auth/login');
    }

    public function loginProcess(Request $request) {
        
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect('/backoffice/dashboard');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login invalid');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function register() {
        return view('backoffice.auth.register');
    }

    public function registerProcess(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'avatar' => 'image'
        ]);

        $newName = " ";
        if($request->file('avatar')) {
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('avatar')->storeAs('image/user', $newName);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->avatar = $newName;
        $user->role_id = 2;
        // dd($user);
        $user->save();

        Session::flash('register', 'success');
        Session::flash('message', 'Register user success');
        return redirect('/login');
    }
}
