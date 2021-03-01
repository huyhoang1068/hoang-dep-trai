<?php 

class Menu extends Controller {

    public $menuModel, $productModel;

    public function __construct()
    {
        $this->menuModel = $this->app_Models('MenuModel');
        $this->productModel = $this->app_Models('ProductModel');
    }

    public function get ($id = 0) {

        $menu = $this->menuModel->show($id);
     
        if (!is_null($menu)) {

            #phân trang
            #Kiểm tra trang đang đứng hiện tại. mặc định là trang 1
            $limit = 6;
            $offset = ((isset($_GET['page']) && intval($_GET['page']) > 0) ? intval($_GET['page']) : 1);
            $offsetNew = ($offset - 1) * $limit;

            $numRecord = $this->productModel->num($id); #dung hàm numRows trong DB đếm số sản phẩm theo menu_id  
            $numPage = ceil($numRecord / $limit);  #số sản phẩm chia limit (làm tròn lên) ra số trang
            $data['htmlPage'] = Helper::getPage($numPage, '/danh-muc/' . $id . '/' . Helper::to_slug($menu['name']) . '.html');

            $data['title'] = $menu['name'];
            $data['data'] = $menu;
            
            $data['template'] = 'menu/list';

            $data['product'] = $this->productModel->getProduct($id, $limit, $offsetNew);

            return $this->app_Views('main', $data);

        }
        #Không cá data $menu chuyển về trang chủ
        return Helper::redirect('/');
    }
}