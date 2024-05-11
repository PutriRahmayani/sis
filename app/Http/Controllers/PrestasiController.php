<?php

namespace App\Http\Controllers;


use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $items = Prestasi::orderBy('tanggal', 'DESC')->get();
        return view('pages.prestasi.index', [
            'items' => $items
        ]);
    }

    public function kelola()
    {
        $items = Prestasi::where('user_id', Auth::user()->id)->get();
        return view('pages.prestasi.index', [
            'items' => $items
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'prestasi' => ['required', 'string', 'max:255'],
            'penyelenggara' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:255'],
            'bukti' => ['mimes:png,jpg,jpeg,pdf', 'max:5124', 'required'],
        ]);

        $value = $request->file('bukti');
        $extension = $value->extension();
        $fileNames = 'file' . uniqid('image_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/file-images', $value, $fileNames);

        Prestasi::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'prestasi' => $request->prestasi,
            'penyelenggara' => $request->penyelenggara,
            'tingkat' => $request->tingkat,
            'bukti' => $fileNames
        ]);

        return redirect()->route('prestasi.index')->with('success', 'Berhasil Menambah Prestasi');
    }


    public function store2(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'prestasi' => ['required', 'string', 'max:255'],
            'penyelenggara' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:255'],
            'bukti' => ['mimes:pdf', 'max:5124', 'required'],
        ]);

        $value = $request->file('bukti');
        $extension = $value->extension();
        $fileNames = 'file' . uniqid('pdf_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/file-pdf', $value, $fileNames);

        Prestasi::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'prestasi' => $request->prestasi,
            'penyelenggara' => $request->penyelenggara,
            'tingkat' => $request->tingkat,
            'bukti' => $fileNames
        ]);

        return redirect()->route('prestasi.kelola')->with('success', 'Berhasil Menambah Prestasi');
    }

    public function show(Request $request, $id)
    {
        $item = Prestasi::findOrFail($id);

        if ($request->bukti) {
            $value = $request->file('bukti');
            $extension = $value->extension();
            $fileNames = 'file' . uniqid('pdf_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/file-pdf', $value, $fileNames);
        } else {
            $fileNames = $item->bukti;
        }

        return view('pages.prestasi.show', [
            'item' => $item
        ]);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'prestasi' => ['required', 'string', 'max:255'],
            'penyelenggara' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:255'],
            'bukti' => ['mimes:pdf', 'max:5124'],
        ]);

        $item = Prestasi::findOrFail($id);

        if ($request->bukti) {
            $value = $request->file('bukti');
            $extension = $value->extension();
            $fileNames = 'file' . uniqid('pdf_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/file-pdf', $value, $fileNames);
        } else {
            $fileNames = $item->bukti;
        }

        $item->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'prestasi' => $request->prestasi,
            'penyelenggara' => $request->penyelenggara,
            'tingkat' => $request->tingkat,
            'bukti' => $fileNames
        ]);

        return redirect()->route('prestasi.index')->with('success', 'Berhasil Mengubah Prestasi');
    }

    public function update2(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'prestasi' => ['required', 'string', 'max:255'],
            'penyelenggara' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:255'],
            'bukti' => ['mimes:pdf', 'max:5124'],
        ]);

        $item = Prestasi::findOrFail($id);

        if ($request->bukti) {
            $value = $request->file('bukti');
            $extension = $value->extension();
            $fileNames = 'file' . uniqid('pdf_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/file-pdf', $value, $fileNames);
        } else {
            $fileNames = $item->bukti;
        }

        $item->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'prestasi' => $request->prestasi,
            'penyelenggara' => $request->penyelenggara,
            'tingkat' => $request->tingkat,
            'bukti' => $fileNames
        ]);

        return redirect()->route('prestasi.kelola')->with('success', 'Berhasil Mengubah Prestasi');
    }

    public function destroy($id)
    {
        $item = Prestasi::findOrFail($id);

        $item->delete();

        return redirect()->route('prestasi.index')->with('success', 'Berhasil Menghapus Prestasi');
    }

    public function destroy2($id)
    {
        $item = Prestasi::findOrFail($id);

        $item->delete();
        return redirect()->route('prestasi.kelola')->with('success', 'Berhasil Menghapus Prestasi');
    }

    public function cetak($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetak = Prestasi::whereBetween('tanggal', [$tglawal, $tglakhir])->latest()->get();

        return view('pages.prestasi.cetak', compact('cetak'));
    }

    public function laporan()
    {
        $items = Prestasi::orderBy('tanggal', 'DESC')->get();

        return view('pages.laporan.index', [
            'items' => $items
        ]);
    }
}
