<?php
class Users extends Controller
{

    public function __construct()
    {

        if (isset($_SESSION['email']) == 0) {
            header('Location: ' . BASEURL . '/');
        }
    }


    public function editProfile($email)
    {

        $sql = $this->model('User_model')->getDataSingel($email);

        if ($sql) {
            $data = [
                'title' => 'Edit Profile',
                'view' => $sql,
                'jenis' => $this->model('Document_model')->getAllDataJenis(),
                'storage' => $this->showSize(),
            ];
            $this->view('templates/__newTemplate/header', $data);
            $this->view('templates/__sideBar/index', $data);
            $this->view('templates/__navBar/index');
            $this->view('users/edit', $data);
            $this->view('templates/__newTemplate/footer');
        }
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

    public function update()
    {
        $file = $_FILES["thumbnail"]["name"];

        $allowed_file_extension = array(
            "png",
            "jpg",
            "jpeg",
        );

        // Get image file extension
        $fileinfo = $_FILES["thumbnail"]["tmp_name"];
        $file_extension = pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION);

        if ($file) {

            if (!in_array($file_extension, $allowed_file_extension)) {
                header('Location:' . BASEURL . '/users/editProfile/' . $_GET['email']);
                Flasher::setFlash('Error', 'Upload invalid. Only PNG and JPEG, JPG, PDF, DOCX, DOC, TXT, PPT, XLSX, XLS, CSV are allowed.', 'bg-danger');
                exit;
            } else {
                $data = [
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'thumbnail' => $file,
                    'users_id' => $_POST['users_id'],
                ];

                $sql = $this->model('User_model')->updateData($data);

                if ($sql) {

                    $target = './assets/images/user/' .  basename($_FILES["thumbnail"]["name"]);
                    $target_old = './assets/images/user/' . $_POST['old_thumbnail'];
                    if ($_POST['old_thumbnail'] != "default.jpg") {
                        unlink($target_old);
                    }
                    move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target);
                    header('Location:' . BASEURL . '/dashboard');
                    Flasher::setFlash('Success', 'Edit Profile SuccessFully', 'bg-success');
                    exit;
                } else {
                    header('Location:' . BASEURL . '/dashboard');
                    Flasher::setFlash('Error', 'Failed Edit Profile', 'bg-danger');
                    exit;
                }
            }
        } else {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'thumbnail' => $_POST['old_thumbnail'],
                'users_id' => $_POST['users_id'],
            ];

            $sql = $this->model('User_model')->updateData($data);
            if ($sql) {
                header('Location:' . BASEURL . '/dashboard');
                Flasher::setFlash('Success', 'Edit Profile SuccessFully', 'bg-success');
                exit;
            } else {
                header('Location:' . BASEURL . '/dashboard');
                Flasher::setFlash('Error', 'Failed Edit Profile', 'bg-danger');
                exit;
            }
        }
    }

    public function list()
    {
        if ($_SESSION['role_id'] >= 3) {
            header('Location:' . BASEURL . '/dashboard');
            Flasher::setFlash('Error', 'Maaf Kamu Tidak Bisa Mengakses Halaman (List Jenis Dokumen)', 'bg-danger');
            exit;
        }

        $data = [
            'title' => 'List Users',
            'view' => $this->model('User_model')->getAllData(),
            'jenis' => $this->model('Document_model')->getAllDataJenis(),
            'storage' => $this->showSize(),
            'role' => $this->model('User_model')->getAllUserRole(),
        ];
        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('users/list', $data);
        $this->view('templates/__newTemplate/footer');
    }

    public function create()
    {

        $data = [
            'first_name' => $_POST['firstname'],
            'last_name' => $_POST['lastname'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'thumbnail' => 'default.jpg',
            'role_id' => $_POST['role'],
            'is_active' => 1,
            'create_date' => date("Y-m-d H:i:s"),
        ];

        $sql = $this->model('User_model')->createUser($data);
        if ($sql) {
            header('Location:' . BASEURL . '/users/list');
            Flasher::setFlash('Success', 'Add Data Successfully', 'bg-success');
            exit;
        } else {
            header('Location:' . BASEURL . '/users/list');
            Flasher::setFlash('Error', 'Add Data Failed', 'bg-danger');
            exit;
        }
    }

    public function edit($users_id)
    {
        if ($_SESSION['role_id'] >= 3) {
            header('Location:' . BASEURL . '/dashboard');
            Flasher::setFlash('Error', 'Maaf Kamu Tidak Bisa Mengakses Halaman (List Jenis Dokumen)', 'bg-danger');
            exit;
        }

        $data = [
            'title' => 'Edit Users',
            'view' => $this->model('User_model')->getDataSingelById($users_id),
            'jenis' => $this->model('Document_model')->getAllDataJenis(),
            'storage' => $this->showSize(),
            'role' => $this->model('User_model')->getAllUserRole(),
        ];
        $this->view('templates/__newTemplate/header', $data);
        $this->view('templates/__sideBar/index', $data);
        $this->view('templates/__navBar/index');
        $this->view('users/editUsers', $data);
        $this->view('templates/__newTemplate/footer');
    }

    public function updateUsers()
    {
        $file = $_FILES["thumbnail"]["name"];

        $allowed_file_extension = array(
            "png",
            "jpg",
            "jpeg",
        );

        // Get image file extension
        $fileinfo = $_FILES["thumbnail"]["tmp_name"];
        $file_extension = pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION);

        if ($file) {

            if (!in_array($file_extension, $allowed_file_extension)) {
                header('Location:' . BASEURL . '/users/editProfile/' . $_GET['email']);
                Flasher::setFlash('Error', 'Upload invalid. Only PNG and JPEG, JPG, PDF, DOCX, DOC, TXT, PPT, XLSX, XLS, CSV are allowed.', 'bg-danger');
                exit;
            } else {
                $data = [
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'thumbnail' => $file,
                    'users_id' => $_POST['users_id'],
                    'role_id' => $_POST['role'],
                    'is_active' => $_POST['is_active']
                ];

                $sql = $this->model('User_model')->updateDataUsers($data);

                if ($sql) {

                    $target = './assets/images/user/' .  basename($_FILES["thumbnail"]["name"]);
                    $target_old = './assets/images/user/' . $_POST['old_thumbnail'];
                    if ($_POST['old_thumbnail'] != "default.jpg") {
                        unlink($target_old);
                    }
                    move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target);
                    header('Location:' . BASEURL . '/users/lis');
                    Flasher::setFlash('Success', 'Edit Data Users SuccessFully', 'bg-success');
                    exit;
                } else {
                    header('Location:' . BASEURL . '/users/list');
                    Flasher::setFlash('Error', 'Failed Edit Data Users', 'bg-danger');
                    exit;
                }
            }
        } else {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'thumbnail' => $_POST['old_thumbnail'],
                'users_id' => $_POST['users_id'],
                'role_id' => $_POST['role'],
                'is_active' => $_POST['is_active']
            ];

            $sql = $this->model('User_model')->updateDataUsers($data);
            if ($sql) {
                header('Location:' . BASEURL . '/users/list');
                Flasher::setFlash('Success', 'Edit Data Users SuccessFully', 'bg-success');
                exit;
            } else {
                header('Location:' . BASEURL . '/users/list');
                Flasher::setFlash('Error', 'Failed Edit Data Users', 'bg-danger');
                exit;
            }
        }
    }

    public function delete($users_id)
    {

        if ($this->model('User_model')->deleteDataUsers($users_id) > 0) {
            header('Location:' . BASEURL . '/users/list');
            Flasher::setFlash('Success', 'Delete Data Users', 'bg-success');
            exit;
        } else {
            header('Location:' . BASEURL . '/users/list');
            Flasher::setFlash('Error', 'Failed Delete Data Users', 'bg-danger');
            exit;
        }
    }
}
