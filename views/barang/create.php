<!-- views/barang/create.php -->
<!DOCTYPE html>
<html>
<head><title>Tambah Barang</title></head>
<body>
    <h1>Tambah Barang</h1>
    <form method="POST">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" required><br>
        <label>Stok</label>
        <input type="number" name="stok" required><br>
        <label>Harga</label>
        <input type="number" name="harga" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
