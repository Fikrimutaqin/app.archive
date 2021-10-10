<?php
class Dashboard extends Controller
{

    public function __construct()
    {

        if (isset($_SESSION['email']) == 0) {
            header('Location: ' . BASEURL . '/');
        }
    }
    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'view' => $this->model('Document_model')->dokumenByAuthor($_SESSION['email']),
            'jenis' => $this->model('Document_model')->getAllDataJenis(),
            'storage' => $this->showSize(),
        ];

        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('dashboard/index', $data);
        $this->view('templates/__newTemplate/footer');
    }

    public function convert_filesize($bytes, $decimals = 2)
    {
        $size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

    public function showSize()
    {
        $data = [
            'author' => $_SESSION['email']
        ];

        $sql = $this->model('Document_model')->getSumSize($data);
        $data = $this->convert_filesize($sql[0]['total']);
        return $data;
    }
}
