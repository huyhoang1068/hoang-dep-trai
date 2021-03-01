<?php

class Auth {

    public function __construct() {

        
        
        if (isset($_REQUEST['uri']) && $_REQUEST['uri'] != '') {

            #đang truy cập link đăng nhập
            if ((trim($_REQUEST['uri'], "/")) == $GLOBALS['config']['pathAdminLogin']) {

                if (isset($_SESSION['username'])) {
                    
                    header('Location: ' . BASE_URL . '/' . $GLOBALS['config']['pathAdmin']);
                }

            } else { #ngược lại không truy cập vào link đăng nhập

                $pathAdmin = $GLOBALS['config']['pathAdmin'];
                $pathFull = explode("/", filter_var(trim($_REQUEST['uri'], "/")));

                if($pathAdmin == $pathFull[0]) {

                    if (!isset($_SESSION['username'])) {

                        session_unset();
                        header('Location: ' . BASE_URL . '/' . $GLOBALS['config']['pathAdminLogin']);
                    }
                }
            }
        }

    }

}
