<?php 

class Product extends Controller {

    public $productModel;

    public function __construct() {

        $this->productModel = $this->app_Models('ProductModel');
    }

    public function get() {

        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

        $product = $this->productModel->show($id);

        if (!is_null($product)) {

            header('Content-type: application/json');
            echo json_encode($product);

        } else {

            return Helper::redirect('/');
        }

        // $product = $this->productModel->show($id);
        
        // if (!is_null($product)) {

        //     $data['title'] = $product['name'];
        //     $data['data'] = $product;

        //     return $this->app_Views('main', $data);
        // }
        
    }
}