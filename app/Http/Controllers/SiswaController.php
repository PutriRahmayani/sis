<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

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
        // Retrieve the currently authenticated user
        $user = Auth::user();

        // Find the Siswa record associated with the authenticated user
        $siswa = Siswa::where('user_id', $user->id)->first();

        // Pass the Siswa instance to the view
        return view('pages.siswa.profile', compact('siswa'));
    }

    public function store(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'nama' => 'required|string',
        //     'nisn' => 'required|string',
        //     'gender' => 'required|string',
        //     'email' => 'required|email|unique:siswa,email',
        //     'no_hp' => 'required|string',
        //     'alamat' => 'required|string',
        // ]);
        // dd($request);
        // $user = Auth::user();
        // // Simpan data siswa ke dalam database dengan menggunakan user_id dari user yang sedang login
        // $siswa = new Siswa();
        // $siswa->user_id = $user->id;
        // $siswa->nama = $request->nama;
        // $siswa->nisn = $request->nisn;
        // $siswa->gender = $request->gender;
        // $siswa->email = $request->email;
        // $siswa->no_hp = $request->no_hp;
        // $siswa->alamat = $request->alamat;
        // $siswa->save();

        // return redirect()->route('dashboard')->with('success', 'Profile berhasil ditambahkan.');


        // dd($request);
        // Lakukan validasi data yang diterima
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:255|unique:siswa,nisn',
            'gender' => 'required|in:laki-laki,perempuan',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        // Cek apakah validasi gagal
        // dd($request->all());
        $user = Auth::user();
        // dd($user->id);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil user yang sedang login

        // Buat data siswa baru dengan data yang sudah divalidasi
        $siswa = new Siswa();
        $siswa->user_id = $user->id; // Ambil user_id dari user yang sedang login
        $siswa->email = $user->email; // Ambil email dari user yang sedang login
        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->gender = $request->gender;
        $siswa->no_hp = $request->no_hp;
        $siswa->alamat = $request->alamat;

        // Simpan data siswa ke database
        $siswa->save();

        return redirect()->back()->with('success', 'Data siswa berhasil disimpan');
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'gender' => 'required|in:laki-laki,perempuan',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        
        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'gender' => $request->gender,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()->with('success', 'Siswa Berhasil Diperbarui');
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
