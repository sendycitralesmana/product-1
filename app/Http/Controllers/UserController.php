<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['role'])->get();
        return view('backoffice.user.index', [
            'users' => $users
        ]);
    }

    public function add()
    {
        return view('backoffice.user.add');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
            'avatar' => 'image'
        ],[
            'name.required' => 'Name harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'email.unique' => 'Email sudah ada',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $newName = null;
        if($request->file('avatar')) {
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('avatar')->storeAs('image/user', str_replace(' ', '_', $newName));
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(40);
        $user->avatar = $newName;
        $user->role_id = 2;
        // dd($user);
        $user->save();

        Mail::to($user->email)->send(new RegisterMail($user));

        Session::flash('status', 'success');
        Session::flash('message', 'Tambah akun berhasil, silahkan verifikasi email terlebih dahulu');
        return redirect('/backoffice/user');
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('backoffice.user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            // 'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        $newName = null;
        if($request->file('avatar')) {
            if ($request->oldImage) {
                Storage::delete('image/user/' . $request->oldImage);
            }
            $fileName = $request->file('avatar')->getClientOriginalName();
            $newName = now()->timestamp . '-' .  str_replace(' ', '_', $fileName);
            $request->file('avatar')->storeAs('image/user/', $newName);
        }

        $user = User::find($id);
        $user->name = $request->name;
        if ($request->oldImage != null) {
            if ($request->file('avatar') == "") {
                $user->avatar = $request->oldImage;
            } else {
                $user->avatar = $newName;
            }
        } else {
            $user->avatar = $newName;
        }
        $user->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Edit data sukses');
        return redirect()->back(); 
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user->avatar) {
            Storage::delete('image/user/' . $user->avatar);
        }
        $user->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Delete data sukses');
        return redirect('/backoffice/user');
    }

    public function profile($id) {
        $user = User::find($id);
        return view('backoffice.profile.index', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Update profile success');
        return redirect('/backoffice/dashboard');
    }

    public function updatePassword(Request $request) {
        $validated = $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8',
            'konfirmasi_password_baru' => 'required|min:8|same:password_baru',
        ], [
            'password_lama.required' => 'Password lama harus diisi',
            'password_baru.required' => 'Password baru harus diisi',
            'konfirmasi_password_baru.required' => 'Konfirmasi password baru harus diisi',
            'konfirmasi_password_baru.same' => 'Konfirmasi password baru harus sama dengan password baru',
            'konfirmasi_password_baru.min' => 'Konfirmasi password baru harus minimal 8 karakter',
            'password_baru.min' => 'Password baru harus minimal 8 karakter',
        ]);
        $user = User::find(auth()->user()->id);

        // cek password lama
        if (!Hash::check($request->password_lama, $user->password)) {
            Session::flash('password_lama', 'error');
            Session::flash('message', 'Password lama tidak sesuai');
            return redirect()->back();
        }

        // cek konfirmasi password
        // if ($request->password_baru != $request->konfirmasi_password_baru) {
        //     Session::flash('password', 'error');
        //     Session::flash('message', 'Konfirmasi password baru tidak sesuai');
        //     return redirect()->back();
        // }

        $user->password = Hash::make($request->password_baru);
        $user->save();

        Session::flash('password', 'success');
        Session::flash('message', 'Ganti password berhasil');
        return redirect()->back();
    }
}
