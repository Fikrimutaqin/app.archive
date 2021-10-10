<?php

class Login extends Controller
{

    public function __construct()
    {
    }
    public function index()
    {
        if (isset($_SESSION['email']) == 1) {
            header('Location: ' . BASEURL . '/dashboard');
        }
        $data = [
            'title' => 'Form Login'
        ];
        $this->view('templates/__newTemplate/header', $data);
        $this->view('login/form-login/index');
        $this->view('templates/__newTemplate/footer');
    }

    public function postLogin()
    {
        $data = [
            'log_email' => $_POST['email'],
            'log_password' => $_POST['password'],
        ];

        $sql = $this->model('Login_model')->checkLogin($data);
        if ($sql) {
            if ($sql["role_id"] == 1) {
                $_SESSION['role_id'] = $sql["role_id"];
                $_SESSION['first_name'] = $sql["first_name"];
                $_SESSION['email'] = $data['log_email'];
                header('Location:' . BASEURL . '/Dashboard');
                Flasher::setFlash('Success', 'You have successfully logged in as super admin', 'bg-success');
                exit;
            } else if ($sql["role_id"] == 2) {
                $_SESSION['role_id'] = $sql["role_id"];
                $_SESSION['first_name'] = $sql["first_name"];
                $_SESSION['email'] = $data['log_email'];
                header('Location:' . BASEURL . '/Dashboard');
                Flasher::setFlash('Success', 'You have successfully logged in as admin', 'bg-success');
                exit;
            } else if ($sql["role_id"] >= 3) {
                $_SESSION['role_id'] = $sql["role_id"];
                $_SESSION['first_name'] = $sql["first_name"];
                $_SESSION['email'] = $data['log_email'];
                header('Location:' . BASEURL . '/Dashboard');
                Flasher::setFlash('Success', 'You have successfully logged in as users', 'bg-success');
                exit;
            } else {
                echo "error";
            }
        } else {
            echo "error";
            header('location:' . BASEURL . '/');
            exit;
        }
    }

    public function _logout()
    {
        session_start();
        session_destroy();

        header('Location: ' . BASEURL . '/');
    }

    public function forgot()
    {

        $email = $_POST['email'];
        $data = $this->model('Login_model')->checkForgotPassword($email);

        if ($data) {
            $data1 = [
                'title' => 'Forgot Password',
                'view' => $this->model('Login_model')->getDataSingelType($email),
            ];
            $this->view('templates/__newTemplate/header', $data1);
            $this->view('login/form-login/forgot', $data1);
            $this->view('templates/__newTemplate/footer');
        } else {
            header('Location:' . BASEURL . '/');
            Flasher::setFlash('Error', 'Email tidak terdaftar', 'bg-danger');
            exit;
        }
    }

    public function changePassword()
    {
        $data = [
            'users_id' => $_POST['users_id'],
            'password' => md5($_POST['newpass']),
        ];

        $sql = $this->model('Login_model')->updatPassword($data);
        if ($sql) {
            header('Location:' . BASEURL . '/');
            Flasher::setFlash('Success', 'Update Password SuccessFully', 'bg-success');
            exit;
        } else {
            header('Location:' . BASEURL . '/');
            Flasher::setFlash('Error', 'Failed Update Password', 'bg-danger');
            exit;
        }
    }
}
