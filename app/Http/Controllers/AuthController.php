<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
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

    // public function loginProcess(Request $request) {
        
    //     $credentials = $request->validate([
    //         'email' => ['required'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
            

    //         $request->session()->regenerate();
    //         return redirect('/backoffice/dashboard');
    //     }

    //     Session::flash('status', 'failed');
    //     Session::flash('message', 'Login invalid');
    //     return redirect('/login');
    // }

    public function loginProcess(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        // check email not found
        if(!$user) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Email not found');
            return redirect('/login');
        }

        // check password not match
        if(!Hash::check($request->password, $user->password)) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Password not match');
            return redirect('/login');
        }

        // check verify email
        // if(!$user->email_verified_at) {
        //     Session::flash('status', 'failed');
        //     Session::flash('message', 'Please verify your email');
        //     return redirect('/login');
        // }

        // login success
        $request->session()->regenerate();
        Auth::login($user);
        return redirect('/backoffice/dashboard');

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

    // public function registerProcess(Request $request) {
    //     $validated = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|unique:users|email',
    //         'password' => 'required',
    //         'avatar' => 'image'
    //     ]);

    //     $newName = " ";
    //     if($request->file('avatar')) {
    //         $extension = $request->file('avatar')->getClientOriginalExtension();
    //         $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
    //         $request->file('avatar')->storeAs('image/user', $newName);
    //     }

    //     $user = new User;
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->avatar = $newName;
    //     $user->role_id = 2;
    //     // dd($user);
    //     $user->save();

    //     Session::flash('register', 'success');
    //     Session::flash('message', 'Register user success');
    //     return redirect('/login');
    // }

    public function registerProcess(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password|min:8'
        ]);

        // Create a new user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 2;
        $user->save();

        // event(new Registered($user));

        // Auth::login($user);

        // Send the verification email
        
        // Mail::to($user->email)->send(new VerifyEmail($user));

        Session::flash('register', 'success');
        Session::flash('message', 'Register user success');
        return redirect('/login');
        
    }

    public function forgotPassword() {
        return view('backoffice.auth.forgot-password');
    }

    
}
