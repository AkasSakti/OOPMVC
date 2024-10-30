<?php
require_once 'models/PDF_Generator.php';
class AuthController {
    private $model;
    
    public function __construct() {
        session_start();
        $this->model = new Pemakai();
    }
    
    public function index() {
        require_once 'views/register.php';
    }
    
    public function loginPage() {
        require_once 'views/login.php';
    }
    
    public function register() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nim' => $_POST['nim'],
                'nama' => $_POST['nama'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];
            
            if($this->model->register($data)) {
                header('Location: index.php?c=Auth&a=loginPage');
            } else {
                echo "Registrasi gagal!";
            }
        }
    }
    
    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nim = $_POST['nim'];
            $password = $_POST['password'];
            
            $user = $this->model->login($nim, $password);
            if($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php?c=Auth&a=dashboard');
            } else {
                echo "Login gagal! NIM atau Password salah.";
            }
        }
    }
    
    public function dashboard() {
        if(!isset($_SESSION['user'])) {
            header('Location: index.php?c=Auth&a=loginPage');
            return;
        }
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 5; // jumlah data per halaman
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        
        $data = $this->model->getAllUsers($page, $perPage, $search);
        $totalData = $this->model->getTotalUsers($search);
        $totalPages = ceil($totalData / $perPage);
        
        require_once 'views/dashboard.php';
    }

    public function downloadPDF() {
        if(!isset($_SESSION['user'])) {
            header('Location: index.php?c=Auth&a=loginPage');
            return;
        }

        if(!isset($_GET['id'])) {
            header('Location: index.php?c=Auth&a=dashboard');
            return;
        }

        $id = $_GET['id'];
        $userData = $this->model->getUserDetail($id);

        if(!$userData) {
            header('Location: index.php?c=Auth&a=dashboard');
            return;
        }

        $pdf = new PDF_Generator();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->UserInfo($userData);
        
        $filename = "user_detail_" . $userData['nim'] . ".pdf";
        $pdf->Output('D', $filename);
    }
    
    public function logout() {
        session_destroy();
        header('Location: index.php?c=Auth&a=loginPage');
    }

    // Tambahkan method-method berikut di dalam class AuthController

public function edit() {
    if(!isset($_SESSION['user'])) {
        header('Location: index.php?c=Auth&a=loginPage');
        return;
    }
    
    $id = $_GET['id'];
    $user = $this->model->getUserById($id);
    require_once 'views/edit.php';
}

public function update() {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
            'id_user' => $_POST['id_user'],
            'nim' => $_POST['nim'],
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        
        if($this->model->update($data)) {
            header('Location: index.php?c=Auth&a=dashboard');
        } else {
            echo "Update gagal!";
        }
    }
}

public function delete() {
    if(!isset($_SESSION['user'])) {
        header('Location: index.php?c=Auth&a=loginPage');
        return;
    }
    
    $id = $_GET['id'];
    if($this->model->delete($id)) {
        header('Location: index.php?c=Auth&a=dashboard');
    } else {
        echo "Hapus data gagal!";
    }
}
}