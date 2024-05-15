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

    public function updateData(Request $request, $id) {
        $request->validate([
            'name' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->place_birth = $request->place_birth;
        $user->date_birth = $request->date_birth;
        $user->address = $request->address;
        $user->no_hp = $request->no_hp;
        if ($request->file('avatar')) {
            if ($user->avatar) {
                Storage::disk('s3')->delete($user->avatar);
            }
            $file = $request->file('avatar');
            $path = Storage::disk('s3')->put('', $file);
            $user->avatar = $path;
        }
        $user->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Update profile success');
        // return redirect('/backoffice/dashboard');
        return redirect()->back();
    }

    public function updatePassword(Request $request, $id) {

        $request->validate([
            'password_sekarang' => 'required',
            'password_baru' => 'required|min:8|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
            'konfirmasi_password' => 'required|min:8|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/|same:password_baru',
        ], [
            'password_sekarang.required' => 'Password sekarang harus diisi',
            'password_baru.required' => 'Password baru harus diisi',
            'password_baru.min' => 'Password baru minimal 8 karakter',
            'password_baru.regex' => 'Password baru harus terdiri dari huruf kecil, huruf besar, dan angka',
            'konfirmasi_password.required' => 'Konfirmasi password harus diisi',
            'konfirmasi_password.regex' => 'Password harus terdiri dari huruf kecil, huruf besar, dan angka',
            'konfirmasi_password.min' => 'Password minimal 8 karakter',
            'konfirmasi_password.same' => 'Password baru dan konfirmasi password tidak sama',
        ]);
        
        $user = User::find($id);
        // check if password sekarang != $user->password
        if (!Hash::check($request->password_sekarang, $user->password)) {
            return redirect()->back()->with('error', 'Password sekarang tidak sesuai');
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
