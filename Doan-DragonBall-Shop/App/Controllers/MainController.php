<?php
class MainController extends Controller {

    public $productModel;

    public function index() {

        $limit = 6;
        $offset = ((isset($_GET['page']) && intval( $_GET['page']) > 0) ? intval( $_GET['page']) : 1);
        $offsetNew = ($offset - 1) * $limit;

        #phân trang Menu
        $numRows = loadMenu::numRows();
        $numPage = ceil($numRows / $limit);
        $data['htmlPageMenu'] = Helper::getPage($numPage, '/');
                     
        $data['title'] = 'SHOP MÔ HÌNH FIGURE CHÍNH HÃNG DRAGON BALL';
        $data['template'] = 'Home';

        $data['menu'] = loadMenu::getAll($limit, $offsetNew);
        $data['product'] = loadProduct::getAll();
        
        return $this->app_Views('main', $data);
    }
}