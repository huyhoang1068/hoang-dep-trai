<?php 

Class Cart extends Controller {

    public $cartModel;

    public function __construct() {

        $this->cartModel = $this->app_Models('M_Admin/CartModel');
    }

    public function index() {

        $data['title'] = 'DANH SÁCH GIỎ HÀNG';
        $data['cart'] = $this->cartModel->get();
        $data['template'] = 'V_Admin/cart/list';

        return $this->app_Views('V_Admin/main', $data);
    }

    public function view($id) {

        $customer = $this->cartModel->testId($id);

        if (is_null($customer)) {

            $_SESSION['error'] = 'ID khách hàng không tồn tại';
            return Helper:: redirect('admin/cart');
        }
        
        $cart = $this->cartModel->show($id);
        $data['title'] = 'CHI TIẾT ĐƠN HÀNG - ' . $customer['name'];
        $data['customer'] = $customer;
        $data['cart'] = $cart;
        $data['template'] = 'V_Admin/cart/detail';

        return $this->app_Views('V_Admin/main', $data);
    }

    public function delete () {

        $id = isset($_POST['id']) ? intval($_POST['id']) : 0 ;

        $cart = $this->cartModel->testId($id);

        if (!is_null($cart)) {

            $this->cartModel->delete($id);
            return Helper::response(['error' => false]);
            
        } else {
            
            return Helper::response(['error' => true]);
        }

    }
}