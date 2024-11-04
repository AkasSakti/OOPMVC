<!-- views/transaksi/edit.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Transaksi</h2>
        <form action="index.php?c=Transaksi&a=edit&id=<?php echo $data['id']; ?>" method="POST">
            <div class="mb-3">
                <label for="barang_id" class="form-label">Barang</label>
                <select name="barang_id" class="form-select" required>
                    <option value="">Pilih Barang</option>
                    <?php foreach ($data_barang as $barang): ?>
                        <option value="<?php echo $barang['id']; ?>" <?php echo ($barang['id'] == $data['barang_id']) ? 'selected' : ''; ?>>
                            <?php echo $barang['nama_barang']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" name="total_harga" class="form-control" value="<?php echo $data['total_harga']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" class="form-control" value="<?php echo $data['tanggal_transaksi']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php?c=Transaksi&a=index" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>