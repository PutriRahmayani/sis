<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Guru::all();

        return view('pages.guru.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('pages.guru.profile', compact('user'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama' => 'required|string',
            'nipy' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|email|unique:guru,email',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
        ]);
        $user = Auth::user();
        // dd($user);
        // Simpan data guru ke dalam database dengan menggunakan user_id dari user yang sedang login
        $guru = new Guru();
        $guru->user_id = $user->id;
        $guru->nama = $request->nama;
        $guru->nipy = $request->nipy;
        $guru->gender = $request->gender;
        $guru->email = $request->email;
        $guru->no_hp = $request->no_hp;
        $guru->alamat = $request->alamat;
        $guru->save();

        return redirect()->route('dashboard')->with('succes', 'Profile berhasil ditambahkan.');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('pages.guru.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nipy' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'email' => 'required|string|max:255|email|unique:users',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()]
            ]);
        }

        $user = User::findOrFail($id);

        if ($request->email != $user->email) {
            $request->validate([
                'email' => 'required|string|max:255|email|unique:users',
            ]);
        }

        $user->name = $request->name;
        $user->nipy = $request->nipy;
        $user->gender = $request->gender;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('guru.index')->with('success', 'Guru Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);

        $item->delete();

        return redirect()->route('guru.index')->with('success', 'Guru Berhasil Dihapus');
    }
}
