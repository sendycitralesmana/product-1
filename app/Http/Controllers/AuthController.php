<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('backoffice/auth/login');
    }

    public function loginProcess(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],
        [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'password.required' => 'Password harus diisi'
        ]);

        $user = User::where('email', $request->email)->first();

        // check email not found
        if(!$user) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Email tidak terdaftar');
            return redirect('/login');
        }

        // check password not match
        if(!Hash::check($request->password, $user->password)) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Password tidak sesuai');
            return redirect('/login');
        }

        if ($user->remember_token == null) {
            $user->remember_token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new RegisterMail($user));
            Session::flash('status', 'success');
            Session::flash('message', 'Silahkan cek email anda untuk verifikasi email');
            return redirect('/login');
        }

        // check verify email
        if(!$user->email_verified_at) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Email belum terverifikasi, silahkan cek email anda');
            return redirect('/login');
        }

        // login success
        $request->session()->regenerate();
        Auth::login($user);
        return redirect()->intended('/backoffice/dashboard');

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
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password|min:8'
        ],
        [
            'name.required' => 'Name harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Email harus valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password_confirmation.required' => 'Konfirmasi password harus diisi',
            'password_confirmation.same' => 'Konfirmasi password harus sama',
            'password_confirmation.min' => 'Konfirmasi password minimal 8 karakter'
        ]);

        // Create a new user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(40);
        $user->role_id = 2;
        $user->save();

        Mail::to($request->email)->send(new RegisterMail($user));

        Session::flash('register', 'success');
        Session::flash('message', 'Daftar akun berhasil, silahkan verifikasi email anda terlebih dahulu');
        return redirect('/login');
        
    }

    public function verifyEmail($token) {
        $user = User::where('remember_token', $token)->first();
        if($user) {
            $user->email_verified_at = now();
            $user->save();

            Session::flash('register', 'success');
            Session::flash('message', 'Email verifikasi berhasil, silahkan login');
            return redirect('/login');
        } else {
            // return redirect('/login');
            abort(404);
        }
    }

    public function forgotPassword() {
        return view('backoffice.auth.forgotPassword');
    }

    public function forgotPasswordProcess(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ],
        [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid'
        ]);

        $user = User::where('email', $request->email)->first();

        // check email not found
        if(!$user) {
            Session::flash('email', 'failed');
            Session::flash('message', 'Email tidak terdaftar');
            return redirect('/forgot-password');
        }

        $user->remember_token = Str::random(40);
        $user->save();

        Mail::to($user->email)->send(new ForgotPasswordMail($user));
        Session::flash('status', 'success');
        Session::flash('message', 'Silahkan cek email anda untuk reset password');
        return redirect('/forgot-password');
    }

    public function resetPassword($token) {
        $user = User::where('remember_token', $token)->first();
        if($user) {
            return view('backoffice.auth.resetPassword', [
                'token' => $token,
                'user' => $user
            ]);
        } else {
            abort(404);
        }
    }

    public function resetPasswordProcess(Request $request, $token) {
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password|min:8'
        ],[
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password_confirmation.required' => 'Konfirmasi password harus diisi',
            'password_confirmation.same' => 'Konfirmasi password harus sama',
            'password_confirmation.min' => 'Konfirmasi password minimal 8 karakter'
        ]);

        $user = User::where('remember_token', $token)->first();
        $user->password = Hash::make($request->password);
        if ($user->email_verified_at == null) {
            $user->email_verified_at = now();
        }
        $user->remember_token = $token;
        $user->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Password anda telah direset, silahkan login');
        return redirect('/login');
    }
}
