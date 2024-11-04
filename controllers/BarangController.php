<?php
require_once 'models/Barang.php';

class BarangController {
    public function index() {
        $barang = new Barang();
        $data = $barang->getAll();
        include 'views/barang/index.php';
    }

    public function getAll() {
        $query = "SELECT * FROM barang";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metode untuk mendapatkan barang berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM barang WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Mengembalikan data barang
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $barang = new Barang();
            $data = [
                'nama_barang' => $_POST['nama_barang'],
                'stok' => $_POST['stok'],
                'harga' => $_POST['harga']
            ];
            if ($barang->create($data)) { // Mengirimkan $data ke metode create
                header("Location: index.php?c=Barang&a=index");
                exit;
            } else {
                echo "Gagal menambahkan barang.";
            }
        }
        include 'views/barang/create.php'; // Tampilkan form untuk menambah barang
    }

    public function edit($id) {
        $barang = new Barang();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $barang->id = $id; // Set ID barang yang akan diedit
            $barang->nama_barang = $_POST['nama_barang'];
            $barang->stok = $_POST['stok'];
            $barang->harga = $_POST['harga'];
            if ($barang->update()) {
                header("Location: index.php?c=Barang&a=index"); // Redirect ke index barang setelah update
                exit;
            }
        } else {
            // Mengambil data barang berdasarkan ID
            $data = $barang->getById($id); // Pastikan ini memanggil metode yang benar
            if (!$data) {
                echo "Barang tidak ditemukan.";
                return;
            }
        }
        include 'views/barang/edit.php'; // Tampilkan form edit
    }
    
    public function delete($id) {
        $barang = new Barang();
        $barang->id = $id;
        if ($barang->delete()) {
            header("Location: index.php?c=Barang&a=index");
            exit;
        }
    }
}
?>