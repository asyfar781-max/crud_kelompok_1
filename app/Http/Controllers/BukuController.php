<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Tahap 5: Read (Menampilkan data)
    public function index()
    {
        $bukus = Buku::latest()->paginate(10);

        return view('index', compact('bukus'));
    }

    // Tahap 6: Create (Form tambah data)
    public function create()
    {
        return view('create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_buku' => 'required|unique:bukus,kode_buku',
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'jumlah' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        Buku::create($data);

        return redirect()->route('buku.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    // Tahap 9: Show (Detail data)
    public function show(Buku $buku)
    {
        return view('show', compact('buku'));
    }

    // Tahap 7: Update (Form edit data)
    public function edit(Buku $buku)
    {
        return view('edit', compact('buku'));
    }

    // Menyimpan perubahan data
    public function update(Request $request, Buku $buku)
    {
        $data = $request->validate([
            'kode_buku' => 'required|unique:bukus,kode_buku,' . $buku->id,
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'jumlah' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $buku->update($data);

        return redirect()->route('buku.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    // Tahap 8: Delete (Menghapus data)
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
