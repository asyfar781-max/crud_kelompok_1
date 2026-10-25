<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        Kode:
        <input type="text" name="kode_buku"
               value="{{ $buku->kode_buku }}" required><br><br>

        Judul:
        <input type="text" name="judul"
               value="{{ $buku->judul }}" required><br><br>

        Kategori:
        <input type="text" name="kategori"
               value="{{ $buku->kategori }}" required><br><br>

        Penulis:
        <input type="text" name="penulis"
               value="{{ $buku->penulis }}" required><br><br>

        Tahun Terbit:
        <input type="number" name="tahun_terbit"
               value="{{ $buku->tahun_terbit }}" required><br><br>

        Jumlah:
        <input type="number" name="jumlah"
               value="{{ $buku->jumlah }}" min="0" required><br><br>

        Keterangan:
        <textarea name="keterangan">{{ $buku->keterangan }}</textarea><br><br>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('buku.index') }}">Kembali</a>
</body>
</html>
