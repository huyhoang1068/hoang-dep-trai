<?php

class App {

    protected $controller = 'MainController';
    protected $action = 'index'; #function
    protected $params = [];
    protected $queryArray;
    
    public function __construct() {

        $this->queryArray = $this->queryHanle(); #gán $queryArray = function queryHanle();
        
        #controller
        $pathController = $this->controller($this->queryArray); 
        if (file_exists("./App/Controllers/" . $pathController . ".php")) { #kiểm trs có tồn tại file không   
            $this->controller = $pathController;
    
        }

        #update
        $this->controller = $this->controllerDefault($this->controller, $this->queryArray);

        require "./App/Controllers/" . $this->controller . ".php"; #không tồn tại sẻ về trang MainController.php
        // include "./App/Controllers/" . $this->controller . ".php";


        #-----------admin/user/get/ok--------------
        #-----------product/get/2/3--------------

        #Xử lý lấy tên Controller ----- admin/user
        $nameController = explode("/", $this->controller);
        $nameController = end($nameController); #lấy phần tử cuối cùng của mảng $nameController

        $this->controller = new $nameController; #$this->controller = class user

        #action
        #Kiểm tra mảng mới không null và có ít nhất phần tử
        if (!is_null($this->queryArray) && count($this->queryArray) > 0) { #queryArray = get/ok

            #Kiểm tra function có tồn tại hay không
            if (method_exists($this->controller, $this->queryArray[0])) { #(user, get)
                $this->action = $this->queryArray[0]; #action = get
            }

            unset($this->queryArray[0]); #queryArray = ok

        }

        #Thực thi toàn bộ nội dung trong Controller
        $this->params = $this->queryArray ? array_values($this->queryArray) : [];
        call_user_func_array([$this->controller, $this->action], $this->params); #controller = user, action = get, params = ok
        
    }

    #Nếu trong thư mục không tồn tại file controller
    #Gán Maincontroller => đường dẫn/Maincontroller
    public function controllerDefault($controller = '', $query = null) {

        if ($controller == 'MainController' && !is_null($query)) {

            $pathFull = '';
            foreach($query as $path) {
                
                $pathFull .= ucfirst($path) . '/';
            }

            return $pathFull . 'MainController' ;
        }

        return $controller;
    }

    public function queryHanle() {

        
        #Không dùng Route
        // if (isset($_GET['uri']) && $_GET['uri'] != '') {
            
        //     // $routeDecode = $this->route($_GET['uri']);

        //     return explode("/", filter_var(trim($_GET['uri'], "/"))); #explode(): chuyển chuỗi $_GET['uri'] thành mảng bỏ "/", trim($_GET['uri'], "/"): loại bỏ hai ký tự "/" ở đầu và đuôi chuỗi $_GET['uri'].
        // }

        // return null;

        #Dùng Route
        if (isset($_GET['uri']) && $_GET['uri'] != '') {
            
            $arrayUri = explode("/", filter_var(trim($_GET['uri'], "/"))); #explode(): chuyển chuỗi $_GET['uri'] thành mảng bỏ "/", trim($_GET['uri'], "/"): loại bỏ hai ký tự "/" ở đầu và đuôi chuỗi $_GET['uri'].
            
            foreach($arrayUri as $key => $value) { #Duyệt mảng arrayUri
                
                if (isset($GLOBALS['route'][$value])) { #Kiểm tra từng phân tử trong arrayUri trùng với $route trong Route.php 

                    $arrayUri[$key] = $GLOBALS['route'][$value];
                }
            }

            $queryString = implode("/", $arrayUri);
            
            return explode("/", $queryString);
        }

        return null;
    }

    public function controller( $array = [], $path =  null) { #gán $queryArray = $array

        if (is_null($array)) {

            return false;
        }

        $path = $path ? $path : './App/Controllers'; #$patch = ./App/Controllers

        foreach ($array as $key => $value) { #$queryArray as $key => $value

            $pathController = $path . '/' . ucfirst($value ); #ucfirst(): Viết hoa ký tự đầu -----> $pathController = ./App/Controllers/Values

            #Kiểm tra không phải Thư mục
            if (!is_dir($pathController)) {
 
                #Xóa một phần tử trong mảng
                unset($array[$key]);

                $this->queryArray = array_values($array);

                return str_replace("./App/Controllers/", "", $pathController); 

            }

            #Nếu là thư mục
            unset($array[$key]);

            #Đệ quy
            return $this->controller($array, $pathController);
        }
    }


}