<?php

namespace App\Http\R;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\users\UpdateProfileRequest;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        session()->flash('success', 'User made admin successfully');

        return redirect(route('users.index'));
    }
    public function edit()
    {
        return view('users.edit', ['user' => auth()->user()]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'about' => $request->about,
        ]);
        session()->flash('success', 'User updated successfully');

        return redirect()->back();
    }
}
