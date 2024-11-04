<?php
require_once __DIR__ . '/../config.php'; // Pastikan jalur ini benar

class Transaksi extends Database {
    private $table_name = "transaksi"; // Definisikan nama tabel
    public $id;
    public $barang_id;
    public $jumlah;
    public $total_harga;
    public $tanggal_transaksi;

    public function __construct() {
        parent::__construct(); // Memanggil konstruktor dari kelas Database
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (barang_id, jumlah, total_harga, tanggal_transaksi) 
                  VALUES (:barang_id, :jumlah, :total_harga, :tanggal_transaksi)";
        $stmt = $this->db->prepare($query);
        
        $params = [
            ':barang_id' => $data['barang_id'],
            ':jumlah' => $data['jumlah'],
            ':total_harga' => $data['total_harga'],
            ':tanggal_transaksi' => $data['tanggal_transaksi']
        ];
        
        return $stmt->execute($params);
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $query = "UPDATE " . $this->table_name . " SET barang_id=:barang_id, jumlah=:jumlah, total_harga=:total_harga, tanggal_transaksi=:tanggal_transaksi WHERE id=:id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":barang_id", $data['barang_id']);
        $stmt->bindParam(":jumlah", $data['jumlah']);
        $stmt->bindParam(":total_harga", $data['total_harga']);
        $stmt->bindParam(":tanggal_transaksi", $data['tanggal_transaksi']);
        $stmt->bindParam(":id", $data['id']);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>