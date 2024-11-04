<!-- views/transaksi/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Transaksi</h2>
        <a href="index.php?c=Transaksi&a=create" class="btn btn-primary mb-3">Tambah Transaksi</a>
        <a href="index.php?c=Auth&a=dashboard" class="btn btn-secondary">Kembali ke Dashboard</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Barang ID</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal Transaksi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $trans): ?>
                <tr>
                    <td><?php echo $trans['id']; ?></td>
                    <td><?php echo $trans['barang_id']; ?></td>
                    <td><?php echo $trans['jumlah']; ?></td>
                    <td><?php echo $trans['total_harga']; ?></td>
                    <td><?php echo $trans['tanggal_transaksi']; ?></td>
                    <td>
                        <a href="index.php?c=Transaksi&a=edit&id=<?php echo $trans['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?c=Transaksi&a=delete&id=<?php echo $trans['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>