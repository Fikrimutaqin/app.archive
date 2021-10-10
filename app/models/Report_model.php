<?php
class Report_model
{
    private $tabel = 'dokumen';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSearch($data)
    {
        try {
            $query = "SELECT * FROM $this->tabel WHERE tanggal_upload BETWEEN :tanggal_awal AND :tanggal_akhir";
            $this->db->query($query);
            $this->db->bind('tanggal_awal', $data['tanggal_awal']);
            $this->db->bind('tanggal_akhir', $data['tanggal_akhir']);

            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
