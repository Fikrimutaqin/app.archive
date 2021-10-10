<?php
class Report extends Controller
{

    public function __construct()
    {

        if (isset($_SESSION['email']) == 0) {
            header('Location: ' . BASEURL . '/');
        }
    }

    public function index()
    {
        if ($_SESSION['role_id'] == 3) {
            header('Location:' . BASEURL . '/dashboard');
            Flasher::setFlash('Error', 'Maaf Kamu Tidak Bisa Mengakses Halaman (List Jenis Dokumen)', 'bg-danger');
            exit;
        }

        $data = [
            'title' => 'Laporan Dokumen',
            'view' => $this->model('Document_model')->getAllData(),
            'jenis' => $this->model('Document_model')->getAllDataJenis(),
            'users' => $this->model('User_model')->getAllData(),
            'storage' => $this->showSize(),

        ];
        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('report/index', $data);
        $this->view('templates/__newTemplate/footer');
    }

    public function search()
    {

        if ($_SESSION['role_id'] == 3) {
            header('Location:' . BASEURL . '/dashboard');
            Flasher::setFlash('Error', 'Maaf Kamu Tidak Bisa Mengakses Halaman (List Jenis Dokumen)', 'bg-danger');
            exit;
        }

        $d_start = $_POST['d_start'];
        $d_end = $_POST['d_end'];

        $data = [
            'tanggal_awal' => $d_start,
            'tanggal_akhir' => $d_end,
        ];

        $sql = $this->model('Report_model')->getSearch($data);

        if ($sql) {

            $data = [
                'title' => 'Result Laporan Dokumen',
                'view' => $this->model('Report_model')->getSearch($data),
                'jenis' => $this->model('Document_model')->getAllDataJenis(),
                'users' => $this->model('User_model')->getAllData(),
                'storage' => $this->showSize(),
            ];

            $this->view('templates/__newTemplate/header', $data);
            $this->view('templates/__sideBar/index', $data);
            $this->view('templates/__navBar/index');
            $this->view('report/index', $data);
            $this->view('templates/__newTemplate/footer');
        } else {
            header('Location:' . BASEURL . '/report/index');
            Flasher::setFlash('Error', 'Maaf Data Yang Kamu Cari Tidak Ada', 'bg-danger');
            exit;
        }
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

    public function convert_filesize($bytes, $decimals = 2)
    {
        $size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }
}
