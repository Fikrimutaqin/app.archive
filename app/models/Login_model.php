<?php
class Login_model
{
    private $tabel = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function checkForgotPassword($email)
    {
        try {
            $query = "SELECT * FROM $this->tabel WHERE email = :email";
            $this->db->query($query);
            $this->db->bind('email', $email);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataSingelType($email)
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

    public function checkLogin()
    {
        try {
            $log_email = $this->email = $_POST['email'];
            $log_password = $this->password = $_POST['password'];
            $md5pass = md5($log_password);

            $sql =
                "SELECT * FROM $this->tabel WHERE email = :email AND password = :password";

            $this->db->query($sql);
            $this->db->bind(':email', $log_email);
            $this->db->bind(':password', $md5pass);
            $this->db->execute();

            return $this->db->single();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updatPassword($data)
    {
        try {
            $query =
                "UPDATE $this->tabel 
                        SET 
                        password = :password
                        WHERE users_id  = :users_id 
                ";

            $this->db->query($query);
            $this->db->bind('password', $data['password']);
            $this->db->bind('users_id', $data['users_id']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function _updateLastLogin($users_id)
    {

        try {
            $query =
                "UPDATE $this->tabel 
                        SET 
                        log_activity = :log_activity
                        WHERE users_id = :users_id  
                ";

            $this->db->query($query);
            $this->db->bind('log_activity', date("Y-m-d H:i:s"));
            $this->db->bind('users_id', $users_id);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
