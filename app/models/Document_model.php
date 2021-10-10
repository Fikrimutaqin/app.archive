<?php
class Document_model
{
    private $jenis = 'jenis';
    private $dokumen = 'dokumen';
    private $history = 'history';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDataJenis()
    {
        try {
            $this->db->query("SELECT * FROM $this->jenis");
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllData()
    {
        try {
            $this->db->query("SELECT * FROM $this->dokumen");
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addDataTypeDocument($data)
    {
        try {
            $query =
                "INSERT INTO $this->jenis 
                        VALUES 
                        ('', :name, :description, :status, :date_created, :author )";

            $this->db->query($query);
            $this->db->bind('name', $data['name']);
            $this->db->bind('description', $data['description']);
            $this->db->bind('status', $data['status']);
            $this->db->bind('date_created', $data['date_created']);
            $this->db->bind('author', $data['author']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insertFile($data)
    {
        try {
            $query =
                "INSERT INTO $this->dokumen 
                        VALUES 
                        ('', :jenis_dok, :lokasi, :nama, :deskripsi, :file, :type_file, :ukuran_file, :tahun_ajaran, :tanggal_upload, :akses, :author)";

            $this->db->query($query);
            $this->db->bind('jenis_dok', $data['jenis_dok']);
            $this->db->bind('lokasi', $data['lokasi']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('deskripsi', $data['deskripsi']);
            $this->db->bind('file', $data['file']);
            $this->db->bind('type_file', $data['type_file']);
            $this->db->bind('ukuran_file', $data['ukuran_file']);
            $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
            $this->db->bind('tanggal_upload', $data['tanggal_upload']);
            $this->db->bind('akses', $data['akses']);
            $this->db->bind('author', $data['author']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataSingel($no_dok)
    {
        try {
            $query = "SELECT * FROM $this->dokumen WHERE no_dok= :no_dok";
            $this->db->query($query);
            $this->db->bind('no_dok', $no_dok);

            return $this->db->single();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataSingelType($id)
    {
        try {
            $query = "SELECT * FROM $this->jenis WHERE id= :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            return $this->db->single();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateDataDocumentType($data)
    {
        try {
            $query =
                "UPDATE $this->jenis 
                        SET 
                        name = :name, 
                        description = :description,
                        status = :status
                        WHERE id = :id
                ";

            $this->db->query($query);
            $this->db->bind('name', $data['name']);
            $this->db->bind('description', $data['description']);
            $this->db->bind('status', $data['status']);
            $this->db->bind('id', $data['id']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateDataDocument($data)
    {
        try {
            $query =
                "UPDATE $this->dokumen 
                        SET 
                        jenis_dok = :jenis_dok, 
                        lokasi = :lokasi,
                        nama = :nama,
                        deskripsi = :deskripsi,
                        file = :file,
                        type_file = :type_file,
                        ukuran_file = :ukuran_file,
                        akses = :akses
                        WHERE no_dok = :no_dok
                ";

            $this->db->query($query);
            $this->db->bind('jenis_dok', $data['jenis_dok']);
            $this->db->bind('lokasi', $data['lokasi']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('deskripsi', $data['deskripsi']);
            $this->db->bind('file', $data['file']);
            $this->db->bind('type_file', $data['type_file']);
            $this->db->bind('ukuran_file', $data['ukuran_file']);
            $this->db->bind('akses', $data['akses']);
            $this->db->bind('no_dok', $data['no_dok']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteDataDocumentType($id)
    {
        try {
            $query = "DELETE FROM $this->jenis WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteDataDocument($no_dok)
    {
        try {
            $query = "DELETE FROM $this->dokumen WHERE no_dok = :no_dok";
            $this->db->query($query);
            $this->db->bind('no_dok', $no_dok);

            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function dokumenByAuthor($author)
    {
        try {
            $query = "SELECT * FROM $this->dokumen WHERE author= :author ORDER BY no_dok DESC LIMIT 8";
            $this->db->query($query);
            $this->db->bind('author', $author);

            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function dokumenByAuthorAll($author)
    {
        try {
            $query = "SELECT * FROM $this->dokumen WHERE author= :author ORDER BY no_dok DESC";
            $this->db->query($query);
            $this->db->bind('author', $author);

            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllDataPublic()
    {
        try {
            $query = "SELECT * FROM $this->dokumen WHERE akses= 1 ORDER BY no_dok DESC";
            $this->db->query($query);

            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function history($data)
    {
        try {
            $query =
                "INSERT INTO $this->history 
                        VALUES 
                        ('', :no_dok, :username, :total, :download_time)";

            $this->db->query($query);
            $this->db->bind('no_dok', $data['no_dok']);
            $this->db->bind('username', $data['username']);
            $this->db->bind('total', $data['total']);
            $this->db->bind('download_time', $data['download_time']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getSumSize($data)
    {
        try {
            $query = "SELECT SUM(ukuran_file) as total FROM $this->dokumen WHERE author= :author";
            $this->db->query($query);

            $this->db->bind('author', $data['author']);

            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
