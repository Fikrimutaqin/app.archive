<?php
class User_model
{
    private $tabel = 'users';
    private $tabel_role = 'user_role';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData()
    {
        try {
            $this->db->query("SELECT * FROM $this->tabel");
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllUserRole()
    {
        try {
            $this->db->query("SELECT * FROM $this->tabel_role");
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataSingel($email)
    {
        try {
            $query = "SELECT * FROM $this->tabel WHERE email= :email";
            $this->db->query($query);
            $this->db->bind('email', $email);

            return $this->db->single();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataSingelById($users_id)
    {
        try {
            $query = "SELECT * FROM $this->tabel WHERE users_id= :users_id";
            $this->db->query($query);
            $this->db->bind('users_id', $users_id);

            return $this->db->single();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateData($data)
    {
        try {
            $query =
                "UPDATE $this->tabel 
                        SET 
                        first_name = :first_name, 
                        last_name = :last_name,
                        thumbnail = :thumbnail
                        WHERE users_id = :users_id 
                ";

            $this->db->query($query);
            $this->db->bind('first_name', $data['first_name']);
            $this->db->bind('last_name', $data['last_name']);
            $this->db->bind('thumbnail', $data['thumbnail']);
            $this->db->bind('users_id', $data['users_id']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function updateDataUsers($data)
    {
        try {
            $query =
                "UPDATE $this->tabel 
                        SET 
                        first_name = :first_name, 
                        last_name = :last_name,
                        thumbnail = :thumbnail,
                        role_id = :role_id,
                        is_active = :is_active
                        WHERE users_id = :users_id 
                ";

            $this->db->query($query);
            $this->db->bind('first_name', $data['first_name']);
            $this->db->bind('last_name', $data['last_name']);
            $this->db->bind('thumbnail', $data['thumbnail']);
            $this->db->bind('role_id', $data['role_id']);
            $this->db->bind('is_active', $data['is_active']);
            $this->db->bind('users_id', $data['users_id']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function createUser($data)
    {
        try {
            $query =
                "INSERT INTO $this->tabel 
                        VALUES 
                        ('', :first_name, :last_name, :email, :password, :thumbnail, :role_id, :is_active, :create_date, '')";

            $this->db->query($query);
            $this->db->bind('first_name', $data['first_name']);
            $this->db->bind('last_name', $data['last_name']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('password', $data['password']);
            $this->db->bind('thumbnail', $data['thumbnail']);
            $this->db->bind('role_id', $data['role_id']);
            $this->db->bind('is_active', $data['is_active']);
            $this->db->bind('create_date', $data['create_date']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteDataUsers($users_id)
    {
        try {
            $query = "DELETE FROM $this->tabel WHERE users_id = :users_id";
            $this->db->query($query);
            $this->db->bind('users_id', $users_id);

            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
