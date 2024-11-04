<!-- views/barang/edit.php -->
<!DOCTYPE html>
<html>
<head><title>Edit Barang</title></head>
<body>
    <h1>Edit Barang</h1>
    <form method="POST">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>" required><br>
        <label>Stok</label>
        <input type="number" name="stok" value="<?= $data['stok'] ?>" required><br>
        <label>Harga</label>
        <input type="number" name="harga" value="<?= $data['harga'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
