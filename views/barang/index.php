<!-- views/barang/index.php -->
<!DOCTYPE html>
<html>
<head><title>Daftar Barang</title></head>
<body>
    <h1>Daftar Barang</h1>
    <a href="index.php?c=Auth&a=dashboard" class="btn btn-secondary">Kembali ke Dashboard</a>
    <a href="?c=Barang&a=create">Tambah Barang</a>
    <table border="1">
        <tr>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data as $item): ?>
        <tr>
            <td><?= $item['nama_barang'] ?></td>
            <td><?= $item['stok'] ?></td>
            <td><?= $item['harga'] ?></td>
            <td>
                <a href="?c=Barang&a=edit&id=<?= $item['id'] ?>">Edit</a>
                <a href="?c=Barang&a=delete&id=<?= $item['id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
