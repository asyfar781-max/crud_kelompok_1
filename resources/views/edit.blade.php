<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eff6ff;
            padding: 30px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #0002;
        }
        h1 { color: #7aa5fa; }
        label { display: block; margin-top: 12px; }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
        }
        button {
            background: #628ff9;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 18px;
        }
        .kembali {
            display: inline-block;
            background: #64748b;
            color: white;
            padding: 11px 18px;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 18px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit</h1>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Kode Buku</label>
        <input type="text" name="kode_buku" value="{{ old('kode_buku', $buku->kode_buku) }}" required>

        <label>Judul</label>
        <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}" required>

        <label>Kategori</label>
        <input type="text" name="kategori" value="{{ old('kategori', $buku->kategori) }}" required>

        <label>Penulis</label>
        <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}" required>

        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>

        <label>Jumlah</label>
        <input type="number" name="jumlah" min="0" value="{{ old('jumlah', $buku->jumlah) }}" required>

        <label>Keterangan</label>
        <textarea name="keterangan">{{ old('keterangan', $buku->keterangan) }}</textarea>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <a href="{{ route('buku.index') }}" class="kembali">Kembali</a>
</div>
</body>
</html>
