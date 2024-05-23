<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Siswa::all();

        return view('pages.siswa.index', [
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
        return view('pages.siswa.profile', compact('user'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama' => 'required|string',
            'nisn' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|email|unique:siswa,email',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
        ]);
        $user = Auth::user();
        // dd($user);
        // Simpan data siswa ke dalam database dengan menggunakan user_id dari user yang sedang login
        $siswa = new Siswa();
        $siswa->user_id = $user->id;
        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->gender = $request->gender;
        $siswa->email = $request->email;
        $siswa->no_hp = $request->no_hp;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        return redirect()->route('dashboard')->with('success', 'Profile berhasil ditambahkan.');
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

        return view('pages.siswa.edit', [
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
            'nisn' => 'required|string|max:15',
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
        $user->nisn = $request->nisn;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('siswa.index')->with('success', 'Siswa Berhasil Diperbarui');
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

        return redirect()->route('siswa.index')->with('success', 'Siswa Berhasil Dihapus');
    }
}
