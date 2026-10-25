<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>

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
        h1 { color: #2563eb; }
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
            background: #2563eb;
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
    <h1>Tambahkan Buku</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <label>Kode Buku</label>
        <input type="text" name="kode_buku"
               value="{{ old('kode_buku') }}" required>
        <br><br>

        <label>Judul</label>
        <input type="text" name="judul"
               value="{{ old('judul') }}" required>
        <br><br>

        <label>Kategori</label>
        <input type="text" name="kategori"
               value="{{ old('kategori') }}" required>
        <br><br>

        <label>Penulis</label>
        <input type="text" name="penulis"
               value="{{ old('penulis') }}" required>
        <br><br>

        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit"
               value="{{ old('tahun_terbit') }}" required>
        <br><br>

        <label>Jumlah</label>
        <input type="number" name="jumlah" min="0"
               value="{{ old('jumlah') }}" required>
        <br><br>

        <label>Keterangan</label>
        <textarea name="keterangan">{{ old('keterangan') }}</textarea>
        <br><br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('buku.index') }}">Kembali</a>
</body>
</html>
