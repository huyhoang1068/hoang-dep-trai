<?php

class Menu extends Controller {

    public $menuModel;

    public function __construct() {

        $this->menuModel = $this->app_Models('M_Admin/MenuModel');
    }

    public function index() {
        
    }

    public function add() {
        
        $data['title'] = 'THÊM DANH MỤC MỚI';
        $data['template'] = 'V_Admin/menu/add';

        return $this->app_Views('V_Admin/main', $data);
    }

    public function store() {

        if (isset($_POST['add'])) {

            $name = ((isset($_POST['name']) && $_POST['name'] != '') ? Helper::makeSafe($_POST['name']) : '');
            
            if ($name == '') {
                $_SESSION['error'] = 'Vui lòng điền tên danh mục.';
                return Helper::redirect('admin/menu/add'); #chuyển tới App/Controller/Admin/Menu/function add();
            }
            // $sort = intval($_POST['sort']);
            // $active = intval($_POST['active']);
            $result = $this->menuModel->insert($_POST, $name);
           
            if ($result) {
                $_SESSION['success'] = 'Thêm danh mục thành công.';
                return Helper::redirect('admin/menu/add');
            }
            $_SESSION['error'] = 'Có lỗi, vui lòng thử lại';
            return Helper::redirect('admin/menu/add');
        }
    }

    public function lists() {

        $data['title'] = 'DANH SÁCH DANH MỤC';
        $data['template'] = 'V_Admin/menu/lists';

        #Kiểm tra trang đang đứng hiện tại. mặc định là trang 1
        $limit = 3; #số dòng tối đa hiển thị trên 1 trang

        $offset = ((isset($_GET['page']) && intval($_GET['page']) > 0) ? intval($_GET['page']) : 1);

        $offsetNew = ($offset - 1) * $limit; 

        #Tính tổng số Record trong data
        $numRecord = $this->menuModel->num();

        #Tính số trang
        $numPage = ceil($numRecord / $limit);
        $data['htmlPage'] = Helper::getPage($numPage, '/admin/menu/lists');

        $data['menus'] = $this->menuModel->get($limit, $offsetNew);

        return $this->app_Views('V_Admin/main', $data);
    }

    #Hàm khi click vào icon edit
    public function edit($id = 0) {

        $menu = $this->menuModel->show($id);

        if (!is_null($menu)) {
            $data['title'] = 'CHỈNH SỬA DANH MỤC: ' . $menu['name'];
            $data['menu'] = $menu;
            $data['template'] = 'V_Admin/menu/edit';

            return $this->app_Views('V_Admin/main', $data);
        }

        $_SESSION['error'] = 'ID không tồn tại.';
        return Helper::redirect('admin/menu/lists');
    }

    #Hàm kiểm tra sau khi submit update
    public function update($id = 0) {

        $menu = $this->menuModel->show($id);

        if (!is_null($menu)) {

            $name = ((isset($_POST['name']) && $_POST['name'] != '') ? Helper::makeSafe($_POST['name']) : '');
            
            if ($name == '') {
                $_SESSION['error'] = 'Vui lòng điền tên danh mục.';
                return Helper::redirect('admin/menu/edit/' . $id); #chuyển tới App/Controller/Admin/Menu/function edit(id);
            }
            
            $result = $this->menuModel->update($name, $_POST, $id);
            
            if ($result) {
                $_SESSION['success'] = 'Cập nhật thành công.';
                return Helper::redirect('admin/menu/lists');
            }
        }

        $_SESSION['error'] = 'Có lỗi, xin thử lại.';
        return Helper::redirect('admin/menu/lists');
    }

    public function delete () {

        $id = isset($_POST['id']) ? intval($_POST['id']) : 0 ;

        $menu = $this->menuModel->show($id);

        if (!is_null($menu)) {

            $this->menuModel->delete($id);

            return Helper::response(['error' => false]);
        } else {
            
            return Helper::response(['error' => true]);
        }

    }
}