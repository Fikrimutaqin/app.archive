<?php
class Document extends Controller
{

    public function __construct()
    {

        if (isset($_SESSION['email']) == 0) {
            header('Location: ' . BASEURL . '/');
        }
    }

    public function listType()
    {
        if ($_SESSION['role_id'] == 3) {
            header('Location:' . BASEURL . '/dashboard');
            Flasher::setFlash('Error', 'Maaf Kamu Tidak Bisa Mengakses Halaman (List Jenis Dokumen)', 'bg-danger');
            exit;
        }
        $data = [
            'title' => 'List Jenis Dokumen',
            'view' => $this->model('Document_model')->getAllDataJenis(),
            'jenis' => $this->model('Document_model')->getAllDataJenis(),
            'storage' => $this->showSize(),
        ];
        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('document/list', $data);
        $this->view('templates/__newTemplate/footer');
    }

    public function list()
    {
        $data = [
            'title' => 'List Dokumen Public',
            'view' => $this->model('Document_model')->getAllDataPublic(),
            'jenis' => $this->model('Document_model')->getAllDataJenis(),
            'storage' => $this->showSize(),
        ];
        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('document/index', $data);
        $this->view('templates/__newTemplate/footer');
    }


    public function viewDok($no_dok)
    {
        $data = [
            'title' => 'View Dokumen',
            'view' => $this->model('Document_model')->getDataSingel($no_dok),
            'jenis' => $this->model('Document_model')->getAllDataJenis(),
            'storage' => $this->showSize(),
        ];

        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('document/view', $data);
        $this->view('templates/__newTemplate/footer');
    }

    public function viewDokMe($no_dok)
    {
        $data = [
            'title' => 'View Dokumen',
            'view' => $this->model('Document_model')->getDataSingel($no_dok),
            'jenis' => $this->model('Document_model')->getAllDataJenis(),
            'storage' => $this->showSize(),
        ];

        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('document/viewMe', $data);
        $this->view('templates/__newTemplate/footer');
    }


    public function viewallMe()
    {
        $data = [
            'title' => 'All Dokumen ' . $_SESSION['first_name'],
            'view' => $this->model('Document_model')->dokumenByAuthorAll($_SESSION['email']),
            'storage' => $this->showSize(),
        ];

        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('document/allFileMe', $data);
        $this->view('templates/__newTemplate/footer');
    }


    public function type()
    {
        $data = [
            'name' => $_POST['jenis'],
            'description' => $_POST['desc'],
            'status' => 1,
            'date_created' => date("Y-m-d H:i:s"),
            'author' => $_SESSION['first_name']
        ];

        $query = $this->model('Document_model')->addDataTypeDocument($data);
        if ($query) {
            header('Location:' . BASEURL . '/document/listType');
            Flasher::setFlash('Success', 'Successfully add Jenis Dokumen', 'bg-success');
            exit;
        } else {
            header('Location:' . BASEURL . '/document/listType');
            Flasher::setFlash('Error', 'Failed add Jenis Dokumen', 'bg-danger');
            exit;
        }
    }

    public function editType($id)
    {
        if ($_SESSION['role_id'] == 3) {
            header('Location:' . BASEURL . '/dashboard');
            Flasher::setFlash('Error', 'Maaf Kamu Tidak Bisa Mengakses Halaman (Edit Jenis Dokumen)', 'bg-danger');
            exit;
        }
        $data = [
            'title' => 'Edit Data Jenis Dokumen',
            'edits' => $this->model('Document_model')->getDataSingelType($id),
            'storage' => $this->showSize(),
        ];
        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('document/edit', $data);
        $this->view('templates/__newTemplate/footer');
    }


    public function editDok($no_dok)
    {
        if ($_SESSION['role_id'] == 3) {
            header('Location:' . BASEURL . '/dashboard');
            Flasher::setFlash('Error', 'Maaf Kamu Tidak Bisa Mengakses Halaman (Edit Jenis Dokumen)', 'bg-danger');
            exit;
        }
        $data = [
            'title' => 'Edit Data Dokumen',
            'edits' => $this->model('Document_model')->getDataSingel($no_dok),
            'jenis' => $this->model('Document_model')->getAllDataJenis(),
            'storage' => $this->showSize(),
        ];
        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('document/editDok', $data);
        $this->view('templates/__newTemplate/footer');
    }


    public function editDokMe($no_dok)
    {
        $data = [
            'title' => 'Edit Data Dokumen',
            'edits' => $this->model('Document_model')->getDataSingel($no_dok),
            'jenis' => $this->model('Document_model')->getAllDataJenis(),
            'storage' => $this->showSize(),
        ];
        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('document/editDokMe', $data);
        $this->view('templates/__newTemplate/footer');
    }

    public function editDokAllMe($no_dok)
    {
        $data = [
            'title' => 'Edit Data Dokumen',
            'edits' => $this->model('Document_model')->getDataSingel($no_dok),
            'jenis' => $this->model('Document_model')->getAllDataJenis(),
            'storage' => $this->showSize(),
        ];
        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('document/editDokAllMe', $data);
        $this->view('templates/__newTemplate/footer');
    }

    public function updateType()
    {
        if ($this->model('Document_model')->updateDataDocumentType($_POST) > 0) {
            header('Location:' . BASEURL . '/document/listType');
            Flasher::setFlash('Success', 'Edit Data Jenis Dokumen', 'bg-success');
            exit;
        } else {
            header('Location:' . BASEURL . '/document/listType');
            Flasher::setFlash('Error', 'Edit Data Jenis Dokumen', 'bg-danger');
            exit;
        }
    }

    public function update()
    {

        $no_dok = $_POST['no_dok'];
        $jenis_dok = $_POST['jenis'];
        $tahun = date("Y");
        $tahun_baru = $tahun + 1;
        $lokasi =  'data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru;
        $nama_dok = $_POST['nama'];
        $deskripsi_dok = $_POST['deskripsi'];
        $old_file = $_POST['file_old'];
        $old_type_file = $_POST['type_old'];
        $old_size_file = $_POST['ukuran_old'];
        $file = $_FILES["file"]["name"];
        $size = $_FILES["file"]["size"];
        $type = $_FILES["file"]["type"];
        $akses = $_POST['akses'];

        $allowed_file_extension = array(
            "png",
            "jpg",
            "jpeg",
            "pdf",
            "docx",
            "doc",
            "txt",
            "ppt",
            "pptx",
            "xlsx",
            "xls",
            "csv",
        );

        // Get image file extension
        $fileinfo = $_FILES["file"]["tmp_name"];
        $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        if ($file) {
            if (!in_array($file_extension, $allowed_file_extension)) {
                header('Location:' . BASEURL . '/document/editDok/' . $no_dok);
                Flasher::setFlash('Error', 'Upload invalid. Only PNG and JPEG, JPG, PDF, DOCX, DOC, TXT, PPT, XLSX, XLS, CSV are allowed.', 'bg-danger');
                exit;
            } else {
                $data = [
                    'jenis_dok' => $jenis_dok,
                    'lokasi' => 'data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru,
                    'nama' => $nama_dok,
                    'deskripsi' => $deskripsi_dok,
                    'file' => $file,
                    'type_file' => $type,
                    'ukuran_file' => $this->convert_filesize($size),
                    'akses' => $akses,
                    'no_dok' => $no_dok,
                ];
                $sql = $this->model('Document_model')->updateDataDocument($data);
                if ($sql) {
                    $lokasi = './data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru;
                    $target = $lokasi . '/' . basename($_FILES["file"]["name"]);
                    unlink($lokasi . '/' . $old_file);
                    if (!file_exists($lokasi)) {
                        mkdir($lokasi, 0777, true);
                    }
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target);
                    header('Location:' . BASEURL . '/document/list');
                    Flasher::setFlash('Success', 'Edit Dokumen SuccessFully', 'bg-success');
                    exit;
                } else {
                    header('Location:' . BASEURL . '/document/list');
                    Flasher::setFlash('Error', 'Failed Edit Dokumen', 'bg-danger');
                    exit;
                }
            }
        } else {
            $data = [
                'jenis_dok' => $jenis_dok,
                'lokasi' => 'data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru,
                'nama' => $nama_dok,
                'deskripsi' => $deskripsi_dok,
                'file' => $old_file,
                'type_file' => $old_type_file,
                'ukuran_file' => $old_size_file,
                'akses' => $akses,
                'no_dok' => $no_dok,
            ];
            $sql = $this->model('Document_model')->updateDataDocument($data);
            if ($sql) {
                header('Location:' . BASEURL . '/document/list');
                Flasher::setFlash('Success', 'Edit Dokumen SuccessFully', 'bg-success');
                exit;
            } else {
                header('Location:' . BASEURL . '/document/list');
                Flasher::setFlash('Error', 'Failed Edit Dokumen', 'bg-danger');
                exit;
            }
        }
    }


    public function updateMe()
    {

        $no_dok = $_POST['no_dok'];
        $jenis_dok = $_POST['jenis'];
        $tahun = date("Y");
        $tahun_baru = $tahun + 1;
        $lokasi =  'data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru;
        $nama_dok = $_POST['nama'];
        $deskripsi_dok = $_POST['deskripsi'];
        $old_file = $_POST['file_old'];
        $old_type_file = $_POST['type_old'];
        $old_size_file = $_POST['ukuran_old'];
        $file = $_FILES["file"]["name"];
        $size = $_FILES["file"]["size"];
        $type = $_FILES["file"]["type"];
        $akses = $_POST['akses'];

        $allowed_file_extension = array(
            "png",
            "jpg",
            "jpeg",
            "pdf",
            "docx",
            "doc",
            "txt",
            "ppt",
            "pptx",
            "xlsx",
            "xls",
            "csv",
        );

        // Get image file extension
        $fileinfo = $_FILES["file"]["tmp_name"];
        $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        if ($file) {
            if (!in_array($file_extension, $allowed_file_extension)) {
                header('Location:' . BASEURL . '/document/editDokMe/' . $no_dok);
                Flasher::setFlash('Error', 'Upload invalid. Only PNG and JPEG, JPG, PDF, DOCX, DOC, TXT, PPT, XLSX, XLS, CSV are allowed.', 'bg-danger');
                exit;
            } else {
                $data = [
                    'jenis_dok' => $jenis_dok,
                    'lokasi' => 'data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru,
                    'nama' => $nama_dok,
                    'deskripsi' => $deskripsi_dok,
                    'file' => $file,
                    'type_file' => $type,
                    'ukuran_file' => $this->convert_filesize($size),
                    'akses' => $akses,
                    'no_dok' => $no_dok,
                ];
                $sql = $this->model('Document_model')->updateDataDocument($data);
                if ($sql) {
                    $lokasi = './data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru;
                    $target = $lokasi . '/' . basename($_FILES["file"]["name"]);
                    unlink($lokasi . '/' . $old_file);
                    if (!file_exists($lokasi)) {
                        mkdir($lokasi, 0777, true);
                    }
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target);
                    header('Location:' . BASEURL . '/dashboard');
                    Flasher::setFlash('Success', 'Edit Dokumen SuccessFully', 'bg-success');
                    exit;
                } else {
                    header('Location:' . BASEURL . '/dashboard');
                    Flasher::setFlash('Error', 'Failed Edit Dokumen', 'bg-danger');
                    exit;
                }
            }
        } else {
            $data = [
                'jenis_dok' => $jenis_dok,
                'lokasi' => 'data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru,
                'nama' => $nama_dok,
                'deskripsi' => $deskripsi_dok,
                'file' => $old_file,
                'type_file' => $old_type_file,
                'ukuran_file' => $old_size_file,
                'akses' => $akses,
                'no_dok' => $no_dok,
            ];
            $sql = $this->model('Document_model')->updateDataDocument($data);
            if ($sql) {
                header('Location:' . BASEURL . '/dashboard');
                Flasher::setFlash('Success', 'Edit Dokumen SuccessFully', 'bg-success');
                exit;
            } else {
                header('Location:' . BASEURL . '/dashboard');
                Flasher::setFlash('Error', 'Failed Edit Dokumen', 'bg-danger');
                exit;
            }
        }
    }

    public function updateAllMe()
    {

        $no_dok = $_POST['no_dok'];
        $jenis_dok = $_POST['jenis'];
        $tahun = date("Y");
        $tahun_baru = $tahun + 1;
        $lokasi =  'data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru;
        $nama_dok = $_POST['nama'];
        $deskripsi_dok = $_POST['deskripsi'];
        $old_file = $_POST['file_old'];
        $old_type_file = $_POST['type_old'];
        $old_size_file = $_POST['ukuran_old'];
        $file = $_FILES["file"]["name"];
        $size = $_FILES["file"]["size"];
        $type = $_FILES["file"]["type"];
        $akses = $_POST['akses'];

        $allowed_file_extension = array(
            "png",
            "jpg",
            "jpeg",
            "pdf",
            "docx",
            "doc",
            "txt",
            "ppt",
            "pptx",
            "xlsx",
            "xls",
            "csv",
        );

        // Get image file extension
        $fileinfo = $_FILES["file"]["tmp_name"];
        $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        if ($file) {
            if (!in_array($file_extension, $allowed_file_extension)) {
                header('Location:' . BASEURL . '/document/editDokAllMe/' . $no_dok);
                Flasher::setFlash('Error', 'Upload invalid. Only PNG and JPEG, JPG, PDF, DOCX, DOC, TXT, PPT, XLSX, XLS, CSV are allowed.', 'bg-danger');
                exit;
            } else {
                $data = [
                    'jenis_dok' => $jenis_dok,
                    'lokasi' => 'data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru,
                    'nama' => $nama_dok,
                    'deskripsi' => $deskripsi_dok,
                    'file' => $file,
                    'type_file' => $type,
                    'ukuran_file' => $this->convert_filesize($size),
                    'akses' => $akses,
                    'no_dok' => $no_dok,
                ];
                $sql = $this->model('Document_model')->updateDataDocument($data);
                if ($sql) {
                    $lokasi = './data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru;
                    $target = $lokasi . '/' . basename($_FILES["file"]["name"]);
                    unlink($lokasi . '/' . $old_file);
                    if (!file_exists($lokasi)) {
                        mkdir($lokasi, 0777, true);
                    }
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target);
                    header('Location:' . BASEURL . '/document/viewallMe');
                    Flasher::setFlash('Success', 'Edit Dokumen SuccessFully', 'bg-success');
                    exit;
                } else {
                    header('Location:' . BASEURL . '/document/viewallMe');
                    Flasher::setFlash('Error', 'Failed Edit Dokumen', 'bg-danger');
                    exit;
                }
            }
        } else {
            $data = [
                'jenis_dok' => $jenis_dok,
                'lokasi' => 'data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru,
                'nama' => $nama_dok,
                'deskripsi' => $deskripsi_dok,
                'file' => $old_file,
                'type_file' => $old_type_file,
                'ukuran_file' => $old_size_file,
                'akses' => $akses,
                'no_dok' => $no_dok,
            ];
            $sql = $this->model('Document_model')->updateDataDocument($data);
            if ($sql) {
                header('Location:' . BASEURL . '/document/viewallMe');
                Flasher::setFlash('Success', 'Edit Dokumen SuccessFully', 'bg-success');
                exit;
            } else {
                header('Location:' . BASEURL . '/document/viewallMe');
                Flasher::setFlash('Error', 'Failed Edit Dokumen', 'bg-danger');
                exit;
            }
        }
    }

    public function deleteType($id)
    {
        if ($this->model('Document_model')->deleteDataDocumentType($id) > 0) {
            header('Location:' . BASEURL . '/document/listType');
            Flasher::setFlash('Success', 'Delete Data', 'bg-success');
            exit;
        } else {
            header('Location:' . BASEURL . '/document/listType');
            Flasher::setFlash('Error', 'Failed Delete Data', 'bg-danger');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Document_model')->deleteDataDocument($id) > 0) {
            header('Location:' . BASEURL . '/document/list');
            Flasher::setFlash('Success', 'Delete Dokumen', 'bg-success');
            exit;
        } else {
            header('Location:' . BASEURL . '/document/list');
            Flasher::setFlash('Error', 'Failed Delete Dokumen', 'bg-danger');
            exit;
        }
    }


    public function deleteMe($id)
    {
        if ($this->model('Document_model')->deleteDataDocument($id) > 0) {
            header('Location:' . BASEURL . '/dashboard');
            Flasher::setFlash('Success', 'Delete Dokumen', 'bg-success');
            exit;
        } else {
            header('Location:' . BASEURL . '/dashboard');
            Flasher::setFlash('Error', 'Failed Delete Dokumen', 'bg-danger');
            exit;
        }
    }

    public function deleteAllMe($id)
    {
        if ($this->model('Document_model')->deleteDataDocument($id) > 0) {
            header('Location:' . BASEURL . '/document/viewallMe');
            Flasher::setFlash('Success', 'Delete Dokumen', 'bg-success');
            exit;
        } else {
            header('Location:' . BASEURL . '/document/viewallMe');
            Flasher::setFlash('Error', 'Failed Delete Dokumen', 'bg-danger');
            exit;
        }
    }

    public function create()
    {

        $jenis_dok = $_POST['jenis'];
        $nama_dok = $_POST['nama'];
        $desc_dok = $_POST['desc'];
        $file = $_FILES["file"]["name"];
        $size = $_FILES["file"]["size"];
        $type = $_FILES["file"]["type"];
        $tahun = date("Y");
        $akses = $_POST['akses'];
        $tahun_baru = $tahun + 1;

        $allowed_file_extension = array(
            "png",
            "jpg",
            "jpeg",
            "pdf",
            "docx",
            "doc",
            "txt",
            "ppt",
            "pptx",
            "xlsx",
            "xls",
            "csv",
        );

        // Get image file extension
        $fileinfo = $_FILES["file"]["tmp_name"];
        $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        if (!in_array($file_extension, $allowed_file_extension)) {
            header('Location:' . BASEURL . '/document/list');
            Flasher::setFlash('Error', 'Upload invalid. Only PNG and JPEG, JPG, PDF, DOCX, DOC, TXT, PPT, XLSX, XLS, CSV are allowed.', 'bg-danger');
            exit;
        } else {
            $data = [
                'jenis_dok' => $jenis_dok,
                'lokasi' => 'data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru,
                'nama' => $nama_dok,
                'deskripsi' => $desc_dok,
                'file' => $file,
                'type_file' => $type,
                'ukuran_file' => $size,
                'tahun_ajaran' => $tahun . '/' . $tahun_baru,
                'tanggal_upload' => date("Y-m-d H:i:s"),
                'akses' => $akses,
                'author' =>  $_SESSION['email'],
            ];
            $sql = $this->model('Document_model')->insertFile($data);
            if ($sql) {
                $lokasi = './data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru;
                $target = $lokasi . '/' . basename($_FILES["file"]["name"]);
                if (!file_exists($lokasi)) {
                    mkdir($lokasi, 0777, true);
                }
                move_uploaded_file($_FILES["file"]["tmp_name"], $target);
                header('Location:' . BASEURL . '/document/list');
                Flasher::setFlash('Success', 'Upload Dokumen SuccessFully', 'bg-success');
                exit;
            } else {
                header('Location:' . BASEURL . '/document/list');
                Flasher::setFlash('Error', 'Failed Upload Dokumen', 'bg-danger');
                exit;
            }
        }
    }

    public function createMe()
    {

        $jenis_dok = $_POST['jenis'];
        $nama_dok = $_POST['nama'];
        $desc_dok = $_POST['desc'];
        $file = $_FILES["file"]["name"];
        $size = $_FILES["file"]["size"];
        $type = $_FILES["file"]["type"];
        $tahun = date("Y");
        $akses = $_POST['akses'];
        $tahun_baru = $tahun + 1;

        $allowed_file_extension = array(
            "png",
            "jpg",
            "jpeg",
            "pdf",
            "docx",
            "doc",
            "txt",
            "ppt",
            "pptx",
            "xlsx",
            "xls",
            "csv",
        );

        // Get image file extension
        $fileinfo = $_FILES["file"]["tmp_name"];
        $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        if (!in_array($file_extension, $allowed_file_extension)) {
            header('Location:' . BASEURL . '/dashboard');
            Flasher::setFlash('Error', 'Upload invalid. Only PNG and JPEG, JPG, PDF, DOCX, DOC, TXT, PPT, XLSX, XLS, CSV are allowed.', 'bg-danger');
            exit;
        } else {
            $data = [
                'jenis_dok' => $jenis_dok,
                'lokasi' => 'data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru,
                'nama' => $nama_dok,
                'deskripsi' => $desc_dok,
                'file' => $file,
                'type_file' => $type,
                'ukuran_file' => $size,
                'tahun_ajaran' => $tahun . '/' . $tahun_baru,
                'tanggal_upload' => date("Y-m-d"),
                'akses' => $akses,
                'author' =>  $_SESSION['email'],
            ];
            $sql = $this->model('Document_model')->insertFile($data);
            if ($sql) {
                $lokasi = './data/' . $jenis_dok . '/' . $tahun . '-' . $tahun_baru;
                $target = $lokasi . '/' . basename($_FILES["file"]["name"]);
                if (!file_exists($lokasi)) {
                    mkdir($lokasi, 0777, true);
                }
                move_uploaded_file($_FILES["file"]["tmp_name"], $target);
                header('Location:' . BASEURL . '/dashboard');
                Flasher::setFlash('Success', 'Upload Dokumen SuccessFully', 'bg-success');
                exit;
            } else {
                header('Location:' . BASEURL . '/dashboard');
                Flasher::setFlash('Error', 'Failed Upload Dokumen', 'bg-danger');
                exit;
            }
        }
    }

    public function convert_filesize($bytes, $decimals = 2)
    {
        $size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

    public function download($no_dok)
    {

        $getDataDok = $this->model('Document_model')->getDataSingel($no_dok);
        $target = $getDataDok['lokasi'] . '/' . $getDataDok['file'];
        $lokasi = './' . $target;

        if (file_exists($lokasi)) {
            $data = [
                'no_dok' => $no_dok,
                'username' => $_SESSION['email'],
                'total' => 1,
                'download_time' => date("Y-m-d H:i:s"),
            ];

            $sql = $this->model('Document_model')->history($data);

            if ($sql) {

                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($lokasi));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: private');
                header('Pragma: private');
                header('Content-Length: ' . filesize($lokasi));
                ob_clean();
                flush();
                readfile($lokasi);

                exit;
            } else {
                header('Location:' . BASEURL . '/document/list');
                Flasher::setFlash('Error', 'Dokumen Not Found', 'bg-danger');
                exit;
            }
        } else {
            header('Location:' . BASEURL . '/document/list');
            Flasher::setFlash('Error', 'Dokumen Not Found', 'bg-danger');
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
}
