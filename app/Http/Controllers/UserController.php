<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'password' => 'required',
            'avatar' => 'image'
        ]);

        $newName = null;
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

        Session::flash('status', 'success');
        Session::flash('message', 'Add user success');
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
        $user = User::find($id);
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
            $newName = now()->timestamp . '-' . $fileName;
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
        return redirect('/backoffice/user');
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
        return redirect('/backoffice/user');
    }
}
