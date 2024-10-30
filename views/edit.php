<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit User</h3>
                    </div>
                    <div class="card-body">
                        <!-- Tambahkan enctype untuk handling file upload -->
                        <form action="index.php?c=Auth&a=update" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
<!-- Tambahkan preview foto saat ini -->
<?php if(!empty($user['foto'])): ?>
<div class="mb-3 text-center">
    <img src="uploads/profile/<?= basename($user['foto']) ?>" alt="Foto Profil" class="img-thumbnail" style="max-width: 200px">
    <input type="hidden" name="foto_lama" value="<?= $user['foto'] ?>">
</div>
<?php endif; ?>

                            <!-- Tambahkan input untuk foto baru -->
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto Profil</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                            </div>

                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" value="<?= $user['nim'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru (Kosongkan jika tidak ingin mengubah)</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="index.php?c=Auth&a=dashboard" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>