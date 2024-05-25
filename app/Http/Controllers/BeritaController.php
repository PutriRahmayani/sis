<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Berita::all();

        return view('pages.berita.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
            'thumbnail' => ['nullable', 'mimes:png,jpg,jpeg,pdf', 'max:5124']
        ]);

        $fileNames = null;
        if ($request->hasFile('thumbnail')) {
            $value = $request->file('thumbnail');
            $extension = $value->extension();
            $fileNames = 'file_' . uniqid('images_', microtime()) . '.' . $extension;
            $value->move(public_path('images'), $fileNames);
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'thumbnail' => $fileNames
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Ditambahkan');
    }


    public function show(Request $request, $id)
    {
        $item = Berita::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            $value = $request->file('thumbnail');
            $extension = $value->extension();
            $fileNames = 'file_' . uniqid('images_', microtime()) . '.' . $extension;
            $value->move(public_path('images'), $fileNames);
        }

        return view('pages.berita.show', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // $request->validate([
        //     'judul' => ['required', 'string', 'max:255'],
        //     'isi' => ['required', 'string'],
        //     'thumbnail' => ['nullable', 'mimes:png,jpg,jpeg,pdf', 'max:5124']
        // ]);
        // dd($request);
        $item = Berita::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            $value = $request->file('thumbnail');
            $extension = $value->extension();
            $fileNames = 'file' . uniqid('images_', microtime()) . '.' . $extension;
            $value->move(public_path('images'), $fileNames);
        } else {
            $fileNames = $item->thumbnail;
        }


        $item->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'thumbnail' => $fileNames

        ]);

        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Berita::findOrFail($id);

        $item->delete();

        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Dihapus');
    }
}
