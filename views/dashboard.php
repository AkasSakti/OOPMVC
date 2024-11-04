<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Data Pemakai</h2>
            <a href="index.php?c=Auth&a=logout" class="btn btn-danger">Logout</a>
        </div>
<!-- Tambahkan Link ke Index Barang -->
        <div class="mb-3">
            <a href="index.php?c=Barang&a=index" class="btn btn-primary">Lihat Data Barang</a>
        </div>
 <!-- Tambahkan Link ke Index Transaksi -->
 <div class="mb-3">
            <a href="index.php?c=Transaksi&a=index" class="btn btn-success">Lihat Data Transaksi</a>
        </div>
        <!-- Informasi Total Data -->
        <div class="alert alert-info">
            Total Data: <?php echo $totalData; ?> data
            <?php if(!empty($search)): ?>
                | Hasil pencarian "<?php echo htmlspecialchars($search); ?>": <?php echo count($data); ?> data
            <?php endif; ?>
        </div>

        <!-- Form Pencarian -->
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="index.php" method="GET" class="d-flex">
                    <input type="hidden" name="c" value="Auth">
                    <input type="hidden" name="a" value="dashboard">
                    <input type="text" name="search" class="form-control me-2" 
                           placeholder="Cari berdasarkan nama..." 
                           value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
                        <a href="index.php?c=Auth&a=dashboard" class="btn btn-secondary ms-2">Reset</a>
                    <?php endif; ?>
                </form>
            </div>
            <div class="col-md-6 text-end">
                Menampilkan <?php echo count($data); ?> dari <?php echo $totalData; ?> data
                (Halaman <?php echo $page; ?> dari <?php echo $totalPages; ?>)
            </div>
        </div>
        
        <?php if(isset($data) && !empty($data)): ?>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = ($page - 1) * $perPage + 1;
                    foreach($data as $user): 
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $user['nim']; ?></td>
                        <td><?php echo $user['nama']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <a href="index.php?c=Auth&a=edit&id=<?php echo $user['id_user']; ?>" 
                               class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?c=Auth&a=delete&id=<?php echo $user['id_user']; ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                               <a href="index.php?c=Auth&a=downloadPDF&id=<?php echo $user['id_user']; ?>" 
       class="btn btn-info btn-sm">
       <i class="fas fa-file-pdf"></i> PDF
    </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <?php if($totalPages > 1): ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- Tombol Previous -->
                    <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" 
                           href="index.php?c=Auth&a=dashboard&page=<?php echo ($page-1); ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                            Previous
                        </a>
                    </li>
                    
                    <?php for($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                            <a class="page-link" 
                               href="index.php?c=Auth&a=dashboard&page=<?php echo $i; ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <!-- Tombol Next -->
                    <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
                        <a class="page-link" 
                           href="index.php?c=Auth&a=dashboard&page=<?php echo ($page+1); ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                            Next
                        </a>
                    </li>
                </ul>
            </nav>
            <?php endif; ?>

        <?php else: ?>
            <div class="alert alert-warning text-center">
                <?php echo !empty($search) ? 'Tidak ada hasil pencarian untuk "'.htmlspecialchars($search).'"' : 'Tidak ada data'; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>