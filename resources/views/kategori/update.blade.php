<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE CATEGORY</title>
</head>
<body>
    <h1>UPDATE KATEGORI</h1>
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama" value="{{ $kategori->nama }}"></td>
            </tr>
            <tr>
                <td>Deskripsi:</td>
                <td><input type="text" name="deskripsi" value="{{ $kategori->deskripsi }}"></td>
            </tr>
            <tr>
                <td colspan="2"><button type='submit'>[SIMPAN]</button></td>
            </tr>
        </table>
    </form>
</body>
</html>