<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['role'])->get();
        return view('user.index', [
            'users' => $users
        ]);
    }

    public function add()
    {
        return view('user.add');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
        ]);

        $newName = "";
        if($request->file('avatar')) {
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('avatar')->storeAs('image', $newName);
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
        return redirect('/user');
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Edit data sukses');
        return redirect('/user');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Delete data sukses');
        return redirect('/user');
    }

    public function updateProfile(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            // 'email' => 'required|string|email|max:255|unique:users,email,'.auth()->user()->id,
        ]);

        // update data in table biller_pulsa
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        // $user->email = $request->email;
        // dd($user);
        $user->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Update profile success');
        return redirect('/user');
    }
}
