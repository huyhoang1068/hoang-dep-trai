<?php

class Login extends Controller {

    public $userModel;
    public  $data = [];

    public function __construct() {
        
        $this->userModel = $this->app_Models('M_Admin/UserModel');
    }

    public function index() {
        
        if (isset($_POST['login'])) {

            $username = ((isset($_POST['username']) && $_POST['username'] != '') ? Helper::makeSafe($_POST['username']) : '');
            $password = ((isset($_POST['password']) && $_POST['password'] != '') ? md5(Helper::makeSafe($_POST['password'])) : '');
            
            if ($username != '' && $password != '') {

                $user = $this->userModel->login($username, $password);

                if ($user) {
                    if ($user['active'] == 1) {
                        
                        $_SESSION['username'] = $username;

                        header('Location: ' . BASE_URL . '/admin/home');
                    } else {
                        $this->data['errors'][] = 'Your account be locked!';
                    }
                } else {
                    $this->data['errors'][] = 'Username or Password Incorred!';
                }
            } else {
                $this->data['errors'][] = 'Please enter Username and Password!';
            }

        }
        return $this->app_Views('V_Admin/login', $this->data);
    }
}

?>