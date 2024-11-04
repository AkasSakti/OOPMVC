<?php

require_once __DIR__ . '/../config.php'; // Pastikan jalur ini benar

class Barang extends Database {
    private $table_name = "barang"; // Definisikan nama tabel
    public $id; // Definisikan ID barang
    public $nama_barang;
    public $stok;
    public $harga;

    public function __construct() {
        parent::__construct(); // Memanggil konstruktor dari kelas Database
    }

    public function create($data) {
        try {
            $query = "INSERT INTO " . $this->table_name . " (nama_barang, harga, stok) 
                      VALUES (:nama_barang, :harga, :stok)";
                      
            $stmt = $this->db->prepare($query); // Pastikan menggunakan $this->db
            
            $params = [
                ':nama_barang' => $data['nama_barang'],
                ':harga' => $data['harga'],
                ':stok' => $data['stok']
            ];
            
            return $stmt->execute($params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name; // Gunakan $this->table_name
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metode untuk mendapatkan barang berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id"; // Gunakan $this->table_name
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Mengembalikan data barang
    }

    // Update Barang
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama_barang=:nama_barang, stok=:stok, harga=:harga WHERE id=:id";
        $stmt = $this->db->prepare($query); // Pastikan menggunakan $this->db

        $stmt->bindParam(":nama_barang", $this->nama_barang);
        $stmt->bindParam(":stok", $this->stok);
        $stmt->bindParam(":harga", $this->harga);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // Delete Barang
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }
}

?>
