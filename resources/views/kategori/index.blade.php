<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR CATEGORY</title>
</head>
    <h1>DAFTAR KATEGORI</h1>
    <p><a href="{{ route('kategori.create') }}">[+ Tambah Kategori]</a></p>

    <table border=1>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nama</td>
                <td>Deskripsi</td>
                <td colspan=2>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <!-- $kategoris ngambil dari controller -->
            @foreach($kategoris as $index) 
            <tr>
                <td>{{$index->id}}</td>
                <td>{{$index->nama}}</td>
                <td>{{$index->deskripsi}}</td>
                <td><a href="{{ route('kategori.edit', $index->id) }}">[UPDATE]</a></td>
                <td>
                    <form action="{{ route('kategori.destroy', $index->id )}}" method="POST" onsubmit="return confirm('Apakah anda yakin untuk menghapus?')">
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