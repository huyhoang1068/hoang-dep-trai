<?php

class Helper {

    public static function Debug($data) {

        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();

    }

    public static function getPage($page = 0, $param = '') {
       
        if ($param != '') {
            $param = $param . '?';
        }

        $pageNow = isset($_GET['page']) && $_GET['page'] != 0 ? intval($_GET['page']) : 1;

        $html = '<div aria-label="Page navigation example">
                    <ul class="pagination">';

        #Về đầu
        if ($pageNow > 1) {
            $html .= '<li class="page-item"><a class="page-link" href="' . $param . '"><i class="fa fa-fast-backward" aria-hidden="true"></i></a></li>';
        }

        #Lùi 1 trang
        if ($pageNow > 2) {
            $html .= '<li class="page-item"><a class="page-link" href="' . $param . 'page=' . ($pageNow - 1) . '"><i class="fa fa-step-backward" aria-hidden="true"></i> </a></li>';
        }

        #Duyệt trang
        $start = ($pageNow - 2) < 1 ? 1 : ($pageNow - 2); #kiểm tra nếu nhỏ hơn 1 thì gán 1
        $end = ($pageNow + 2 ) > $page ? $page : ($pageNow + 2 ); #kiểm tra nếu lớnhơn tổng số trang thì gán tổng số trang

        for($i = $start; $i <= $end; $i ++) {
            $html .= '<li class="page-item ' . (($pageNow == $i) ? 'active' : '' ). '">
                        <a class="page-link" href="' . $param . 'page=' . $i . '">' . $i . ' </a>
                    </li>';
        }

    
        #Tới 1 trang
        if ($pageNow < ($page - 1)) {
            $html .= '<li class="page-item"><a class="page-link" href="' . $param . 'page=' . ($pageNow + 1) . '"><i class="fa fa-step-forward" aria-hidden="true"></i></a></li>';
        }

        #Về cuối trang
        if ($pageNow < $page) {
            $html .= '<li class="page-item"><a class="page-link" href="' . $param . 'page=' . $page . '"><i class="fa fa-fast-forward" aria-hidden="true"></i></a></li>';
        }

        $html .= ' </ul></div>';

        return $html;
    }

    public static function loadFileViews($file = '', $data = []) {
        
        if (file_exists('./App/Views/' . $file . '.php')) {
            include './App/Views/' . $file . '.php';
        } else {
            include './App/Views/404.php';
        }
    }

    public static function makeSafe($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function redirect($url = '') {

        return header('Location: ' . BASE_URL . '/' . $url);
    }

    public static function removeAlert() {

        unset($_SESSION['error']);
        unset($_SESSION['success']);
    }

    public static function status($status = 1) {

        if ($status == 1) {

            return '<span class="badge bg-success">Kích hoạt</span>';
        }
        
        return '<span class="badge bg-danger">Chưa kích hoạt</span>';

    }

    public static function response($data = []) {

        header('Content-type: application/json');
        echo json_encode($data);
    }

    public static function to_slug($str) {

        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
}
  