<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR BARANG</title>
</head>
<body>
    <h1>DAFTAR BARANG</h1>

    <p><a href="{{ route('barang.create') }}">[+ Tambah Barang]</a></p>

    <table border=1>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nama</td>
                <td>Harga</td>
                <td>Stok</td>
                <td>Kategori</td>
                <td colspan="2">Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $b) 
            <tr>
                <td>{{$b->id}}</td>
                <td>{{$b->nama}}</td>
                <td>{{$b->harga}}</td>
                <td>{{$b->stok}}</td>
                <td>{{$b->kategori->nama ?? '-'}}</td>
                <td><a href="{{ route('barang.edit', $b->id) }}">[UPDATE]</a></td>
                <td>
                    <form action="{{ route('barang.destroy', $b->id )}}" method="POST" onsubmit="return confirm('Apakah anda yakin untuk menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">[HAPUS]</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
