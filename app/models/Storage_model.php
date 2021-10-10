<?php
class Storage_model
{
    private $tabel = 'storage';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllStorage()
    {
        try {
            $this->db->query("SELECT * FROM $this->tabel");
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function addDataStorage($data)
    {
        try {
            $query =
                "INSERT INTO $this->tabel 
                        VALUES 
                        ('', :cd_storage, :name, :total, :status, :date_created, :author )";

            $this->db->query($query);
            $this->db->bind('cd_storage', $data['cd_storage']);
            $this->db->bind('name', $data['name']);
            $this->db->bind('total', $data['total']);
            $this->db->bind('status', $data['status']);
            $this->db->bind('date_created', $data['date_created']);
            $this->db->bind('author', $data['author']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function checkCdStorage()
    {
        try {
            $this->db->query("SELECT MAX(cd_storage) as kode from $this->tabel");
            $result =  $this->db->single();
            return $result['kode'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataSingel($code_storage)
    {
        try {
            $query = "SELECT * FROM $this->tabel WHERE cd_storage= :cd_storage";
            $this->db->query($query);
            $this->db->bind('cd_storage', $code_storage);

            return $this->db->single();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateDataStorage($data)
    {
        try {
            $query =
                "UPDATE $this->tabel 
                        SET 
                        name = :name, 
                        status = :status
                        WHERE cd_storage = :cd_storage
                ";

            $this->db->query($query);
            $this->db->bind('name', $data['name']);
            $this->db->bind('status', $data['status']);
            $this->db->bind('cd_storage', $data['cd_storage']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteDataStorage($cd_storage)
    {
        try {
            $query = "DELETE FROM $this->tabel WHERE cd_storage = :cd_storage";
            $this->db->query($query);
            $this->db->bind('cd_storage', $cd_storage);

            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
