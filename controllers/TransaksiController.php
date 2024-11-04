<?php
require_once 'models/Transaksi.php';
require_once 'models/Barang.php'; // Untuk mendapatkan data barang

class TransaksiController {
    public function index() {
        $transaksi = new Transaksi();
        $data = $transaksi->getAll();
        include 'views/transaksi/form.php'; // Tampilkan daftar transaksi
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $transaksi = new Transaksi();
            $data = [
                'barang_id' => $_POST['barang_id'],
                'jumlah' => $_POST['jumlah'],
                'total_harga' => $_POST['total_harga'],
                'tanggal_transaksi' => $_POST['tanggal_transaksi']
            ];
            if ($transaksi->create($data)) {
                header("Location: index.php?c=Transaksi&a=index");
                exit;
            } else {
                echo "Gagal menambahkan transaksi.";
            }
        }

        // Ambil data barang untuk dropdown
        $barang = new Barang();
        $data_barang = $barang->getAll();
        include 'views/transaksi/create.php'; // Tampilkan form untuk menambah transaksi
    }

    public function edit($id) {
        $transaksi = new Transaksi();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'barang_id' => $_POST['barang_id'],
                'jumlah' => $_POST['jumlah'],
                'total_harga' => $_POST['total_harga'],
                'tanggal_transaksi' => $_POST['tanggal_transaksi']
            ];
            if ($transaksi->update($data)) {
                header("Location: index.php?c=Transaksi&a=index");
                exit;
            }
        } else {
            $data = $transaksi->getById($id);
            if (!$data) {
                echo "Transaksi tidak ditemukan.";
                return;
            }
        }

        // Ambil data barang untuk dropdown
        $barang = new Barang();
        $data_barang = $barang->getAll();
        include 'views/transaksi/edit.php'; // Tampilkan form edit transaksi
    }

    public function delete($id) {
        $transaksi = new Transaksi();
        if ($transaksi->delete($id)) {
            header("Location: index.php?c=Transaksi&a=index");
            exit;
        }
    }
}
?>