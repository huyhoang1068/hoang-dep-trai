<?php

class MainController extends Controller {
    public function index() {
        
        if (isset($_SESSION['username']) && $_SESSION['username'] != '') {

            header('Location: ' . BASE_URL . '/admin/home');

        } else {

            header('Location: ' . BASE_URL . '/admin/user/login');
        }
    }
}

?>