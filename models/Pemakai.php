<?php
class Pemakai extends Database {
    
    public function register($data) {
        $query = "INSERT INTO pemakai (nim, nama, email, password) 
                  VALUES (:nim, :nama, :email, :password)";
                  
        $stmt = $this->db->prepare($query);
        
        return $stmt->execute([
            ':nim' => $data['nim'],
            ':nama' => $data['nama'],
            ':email' => $data['email'],
            ':password' => $data['password']
        ]);
    }

    public function login($nim, $password) {
        $query = "SELECT * FROM pemakai WHERE nim = :nim";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':nim' => $nim]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    
    public function getAllUsers($page = 1, $perPage = 5, $search = '') {
        $offset = ($page - 1) * $perPage;
        
        $query = "SELECT id_user, nim, nama, email FROM pemakai";
        if(!empty($search)) {
            $query .= " WHERE nama LIKE :search";
        }
        $query .= " LIMIT :offset, :perPage";
        
        $stmt = $this->db->prepare($query);
        
        if(!empty($search)) {
            $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        }
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserDetail($id) {
        $query = "SELECT * FROM pemakai WHERE id_user = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTotalUsers($search = '') {
        $query = "SELECT COUNT(*) as total FROM pemakai";
        if(!empty($search)) {
            $query .= " WHERE nama LIKE :search";
        }
        
        $stmt = $this->db->prepare($query);
        if(!empty($search)) {
            $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        }
        
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getUserById($id) {
        $query = "SELECT * FROM pemakai WHERE id_user = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update($data) {
        if(empty($data['password'])) {
            $query = "UPDATE pemakai SET 
                      nim = :nim,
                      nama = :nama,
                      email = :email
                      WHERE id_user = :id_user";
            
            $stmt = $this->db->prepare($query);
            return $stmt->execute([
                ':nim' => $data['nim'],
                ':nama' => $data['nama'],
                ':email' => $data['email'],
                ':id_user' => $data['id_user']
            ]);
        } else {
            $query = "UPDATE pemakai SET 
                      nim = :nim,
                      nama = :nama,
                      email = :email,
                      password = :password
                      WHERE id_user = :id_user";
            
            $stmt = $this->db->prepare($query);
            return $stmt->execute([
                ':nim' => $data['nim'],
                ':nama' => $data['nama'],
                ':email' => $data['email'],
                ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
                ':id_user' => $data['id_user']
            ]);
        }
    }
    
    public function delete($id) {
        $query = "DELETE FROM pemakai WHERE id_user = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}