<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'cobaan');

// Koneksi database
class Database {
    protected $db;
    
    public function __construct() {
        try {
            $this->db = new PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME,
                DB_USER,
                DB_PASS
            );
        } catch(PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }
}