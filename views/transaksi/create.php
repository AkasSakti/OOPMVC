<!-- views/transaksi/form.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($data) ? 'Edit' : 'Tambah'; ?> Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2><?php echo isset($data) ? 'Edit' : 'Tambah'; ?> Transaksi</h2>
        <form action="index.php?c=Transaksi&a=<?php echo isset($data) ? 'edit&id=' . $data['id'] : 'create'; ?>" method="POST">
            <div class="mb-3">
                <label for="barang_id" class="form-label">Barang</label>
                <select name="barang_id" class="form-select" required>
                    <option value="">Pilih Barang</option>
                    <?php foreach ($data_barang as $barang): ?>
                        <option value="<?php echo $barang['id']; ?>" <?php echo (isset($data) && $data['barang_id'] == $barang['id']) ? 'selected' : ''; ?>>
                            <?php echo $barang['nama_barang']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" value="<?php echo isset($data) ? $data['jumlah'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" name="total_harga" class="form-control" value="<?php echo isset($data) ? $data['total_harga'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" class="form-control" value="<?php echo isset($data) ? $data['tanggal_transaksi'] : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo isset($data) ? 'Update' : 'Simpan'; ?></button>
            <a href="index.php?c=Transaksi&a=index" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>