<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $items = User::findOrFail(Auth::user()->id);

        return view('pages.admin.profile', [
            'items' => $items
        ]);
    }

    public function update(Request $request)
    {
        $item = User::findOrFail(Auth::user()->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'mimes:png,jpg|max:1024'
        ]);

        if ($request->email != $item->email) {
            $request->validate([
                'email' => 'required|email|unique:users'
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()]
            ]);
        }

        if ($request->avatar) {
            $value = $request->file('avatar');
            $extension = $value->extension();
            $fileNames = 'avatar_' . uniqid('img_', microtime()) . '.' . $extension;
            $value->move(public_path('images/avatar'), $fileNames);
        } else {
            $fileNames = $item->avatar;
        }

        $item->name = $request->name;
        $item->email = $request->email;
        $item->avatar = $fileNames;

        if ($request->password) {
            $item->password = Hash::make($request->password);
        }
        $item->save();

        return redirect()->route('profile.edit')->with('success', 'Berhasil Mengupdate Profile');
    }

    public function edit_user()
    {
        $item = User::findOrFail(Auth::user()->id);

        return view('pages.profileuser', [
            'item' => $item
        ]);
    }

    public function update_user(Request $request)
    {
        $item = User::findOrFail(Auth::user()->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'mimes:png,jpg|max:1024'
        ]);

        if ($request->email != $item->email) {
            $request->validate([
                'email' => 'required|email|unique:users'
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()]
            ]);
        }

        if ($request->avatar) {
            $value = $request->file('avatar');
            $extension = $value->extension();
            $fileNames = 'avatar-' . uniqid('img_', microtime()) . '.' . $extension;
            $value->move(public_path('images/avatar'), $fileNames);
        } else {
            $fileNames = $item->avatar;
        }

        $item->name = $request->name;
        $item->email = $request->email;
        $item->avatar = $fileNames;

        if ($request->password) {
            $item->password = Hash::make($request->password);
        }
        $item->save();

        return redirect()->route('dashboard');
    }
}
