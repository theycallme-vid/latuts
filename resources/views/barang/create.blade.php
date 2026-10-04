<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE BARANG</title>
</head>
<body>
    <h1>TAMBAH BARANG</h1>
    <form action="{{ route('barang.store') }}" method="POST">
    @csrf
        <table>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama" value="{{ old('nama') }}"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" step="0.01" name="harga" value="{{ old('harga') }}"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="number" name="stok" value="{{ old('stok', 0) }}"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori_id">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">[SIMPAN]</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
