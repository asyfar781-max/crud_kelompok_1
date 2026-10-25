<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku Perpustakaan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eff6ff;
            padding: 30px;
            margin: 0;
            color: #1e293b;
        }

        h1 {
            text-align: center;
            color: #1d4ed8;
            margin-bottom: 30px;
        }

        .edit-link {
            display: inline-block;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .edit-link:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        p.success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px #0002;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        thead {
            background: #2563eb;
            color: white;
        }

        th {
            padding: 14px 10px;
            text-align: center;
            white-space: nowrap;
        }

        td {
            padding: 12px 10px;
            border-bottom: 1px solid #e2e8f0;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background: #eff6ff;
        }

        tbody tr:hover {
            background: #dbeafe;
        }

        td a {
            display: inline-block;
            background: #16a34a;
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            margin: 3px;
            transition: 0.3s;
        }

        td a:hover {
            background: #15803d;
        }

        button {
            background: #dc2626;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            margin: 3px;
            transition: 0.3s;
        }

        button:hover {
            background: #991b1b;
        }

        form {
            display: inline-block;
        }

        .pagination-info {
            margin-top: 20px;
            color: #475569;
            font-size: 14px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination nav > div:first-child {
            display: none;
        }

        .pagination nav > div:last-child {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 5px;
        }

        .pagination a,
        .pagination span[aria-current="page"] span,
        .pagination span[aria-disabled="true"] span {
            display: inline-block;
            padding: 9px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            border: 1px solid #bfdbfe;
        }

        .pagination a {
            background: white;
            color: #2563eb;
        }

        .pagination a:hover {
            background: #dbeafe;
        }

        .pagination span[aria-current="page"] span {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .pagination span[aria-disabled="true"] span {
            background: #e2e8f0;
            color: #94a3b8;
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            h1 {
                font-size: 24px;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 8px 6px;
            }

            td a, button {
                padding: 6px 8px;
                font-size: 11px;
            }
        }
    </style>
</head>

<body>

    <h1>Manajemen Buku Perpustakaan Indonesia</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <a href="{{ route('buku.create') }}" class="edit-link">
        Tambahkan Buku
    </a>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($bukus as $buku)
                    <tr>
                        <td>{{ $bukus->firstItem() + $loop->index }}</td>
                        <td>{{ $buku->kode_buku }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->kategori }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ $buku->tahun_terbit }}</td>
                        <td>{{ $buku->jumlah }}</td>
                        <td>{{ $buku->keterangan }}</td>

                        <td>
                            <a href="{{ route('buku.edit', $buku->id) }}">
                                Edit
                            </a>

                            <form
                                action="{{ route('buku.destroy', $buku->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Belum ada data buku.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-info">
        Menampilkan
        {{ $bukus->firstItem() ?? 0 }}
        sampai
        {{ $bukus->lastItem() ?? 0 }}
        dari
        {{ $bukus->total() }}
        data buku.
    </div>

    <div class="pagination">
        {{ $bukus->links() }}
    </div>

</body>
</html>
