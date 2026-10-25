<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::latest()->paginate(10);
        return view('index', compact('bukus'));
    }

    public function create()
    {
        return view('create');
    }

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

    public function show(Buku $buku)
    {
        return view('show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        return view('edit', compact('buku'));
    }

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

    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
