<?php

class Home extends Controller {
    
    public function index() {
        
        if (isset($_SESSION['username']) && $_SESSION['username'] != '') {

            return $this->app_Views('V_admin/main');

        } else {

            header('Location: ' . BASE_URL . '/admin/user/login');
        }
    }

    public function logout() {

        session_unset();
        header('Location: ' . BASE_URL . '/admin/user/login');
    }
}

?>