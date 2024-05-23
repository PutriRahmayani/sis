<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function index()
    {
        $items = User::all();

        return view('pages.akun.index', [
            'items' => $items
        ]);
    }
    public function create()
    {
        return view('pages.akun.create');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|in:siswa,guru,admin',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create and save the new User record
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect to the index page with a success message
        return redirect()->route('akun.index')->with('success', 'User successfully created.');
    }
    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('pages.akun.edit', [
            'item' => $item
        ]);
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|in:siswa,guru,admin',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Find the existing User record
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Redirect to the index page with a success message
        return redirect()->route('akun.index')->with('success', 'User successfully updated.');
    }
    public function destroy($id)
    {
        $item = User::findOrFail($id);

        $item->delete();

        return redirect()->route('akun.index')->with('success', 'User Berhasil Dihapus');
    }
}
