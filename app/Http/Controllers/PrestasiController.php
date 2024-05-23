<?php

namespace App\Http\Controllers;


use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;

class PrestasiController extends Controller
{
    public function index()
    {
        // $items = Prestasi::orderBy('tanggal', 'DESC')->get();
        // return view('pages.prestasi.index', [
        //     'items' => $items
        // ]);

        $items = Prestasi::all();
        $lombaList = Prestasi::select('lomba')->distinct()->pluck('lomba');

        return view('pages.prestasi.index', compact('items', 'lombaList'));
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
        // $request->validate([
        //     'nama' => ['required', 'string', 'max:255'],
        //     'lomba' => ['required', 'string', 'max:255'],
        //     'tanggal' => ['required', 'date'],
        //     // 'prestasi' => ['required', 'string', 'max:255'],
        //     'penyelenggara' => ['required', 'string', 'max:255'],
        //     'tingkat' => ['required', 'string', 'max:255'],
        //     'bukti' => ['mimes:png,jpg,jpeg,pdf', 'max:5124', 'required'],
        //     'keterangan' => ['required', 'string', 'max:255']
        // ]);

        $value = $request->file('bukti');
        $extension = $value->extension();
        $fileNames = 'file' . uniqid('image_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/file-images', $value, $fileNames);

        Prestasi::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'lomba' => $request->lomba,
            'tanggal' => $request->tanggal,
            // 'prestasi' => $request->prestasi,
            'penyelenggara' => $request->penyelenggara,
            'tingkat' => $request->tingkat,
            'bukti' => $fileNames,
            'keterangan' => $request->keterangan
        ]);
        // dd($request);
        return redirect()->route('prestasi.index')->with('success', 'Berhasil Menambah Prestasi');
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
            'lomba' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            // 'prestasi' => ['required', 'string', 'max:255'],
            'penyelenggara' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:255'],
            'bukti' => ['mimes:png,jpg,jpeg,pdf', 'max:5124', 'required'],
            'keterangan' => ['required', 'string', 'max:255']
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
            'lomba' => $request->lomba,
            'tanggal' => $request->tanggal,
            // 'prestasi' => $request->prestasi,
            'penyelenggara' => $request->penyelenggara,
            'tingkat' => $request->tingkat,
            'bukti' => $fileNames,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('prestasi.index')->with('success', 'Berhasil Mengubah Prestasi');
    }

    public function destroy($id)
    {
        $item = Prestasi::findOrFail($id);

        $item->delete();

        return redirect()->route('prestasi.index')->with('success', 'Berhasil Menghapus Prestasi');
    }

    // public function cetak(Request $request)
    // {

    //     // $cetak = Prestasi::all();

    //     // return view('pages.prestasi.cetak', compact('cetak'));
    //     $lomba = $request->input('lomba');
    //     // $prestasi = Prestasi::where('lomba', $lomba)->get();

    //     // // Logika untuk mencetak atau menampilkan data prestasi berdasarkan lomba yang dipilih
    //     // // Misalnya, mengarahkan ke view khusus untuk cetak
    //     // return view('pages.prestasi.cetak', compact('prestasi'));
    // }
    public function cetak(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $cetak = Prestasi::whereBetween('tanggal', [$startDate, $endDate])
            ->get();

        return view('pages.prestasi.cetak', compact('cetak', 'startDate', 'endDate'));
    }
}
