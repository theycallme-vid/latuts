<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE CATEGORY</title>
</head>
<body>
    <form action="{{ route('kategori.store') }}" method="POST">
    @csrf
        <table>
            <tr>
                <td>Nama Kategori</td>
                <td><input type="text" name='nama' value="{{ old('nama') }}"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name='deskripsi' value="{{ old('deskripsi') }}"></td>
            </tr>
            <tr>
                <td colspan="2"><button type='submit'>[SIMPAN]</button></td>
            </tr>
        </table>
    </form>
</body>
</html>