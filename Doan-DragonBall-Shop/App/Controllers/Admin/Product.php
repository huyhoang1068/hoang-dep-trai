<?php

Class Product extends Controller {

    public $productModel;
    public $menuModel;

    public function __construct() {

        $this->productModel = $this->app_Models('M_Admin/ProductModel');
        $this->menuModel = $this->app_Models('M_Admin/MenuModel');
    }

    public function index() {
        
    }

    #Hàm kiểm tra Giá sale < price
    public function checkPrice($price = 0, $sale = 0) {

        if($sale > 0) {
            if ($sale >= $price) {
                $_SESSION['error'] = 'Mức giá phải lớn hơn mức sale.';
                return false;
            }
        }

        return true;
    }

    #Hàm kiểm tra File ảnh
    public function uploadFile($file) {

        #Kiểm tra đường dẫn file ảnh có tồn tại không
        #[''file]: name trong thẻ <input type="file" name="file" class="form-control">  (views/product/add.php)
        #['tmp_name']: tên bộ nhớ tạm trong $_FILE -> dùng var_dump($_FILE)
        $getImageSize = getimagesize($file['file']['tmp_name']); 

        if (!$getImageSize) {
            $_SESSION['error'] = 'Tệp đã chọn không tồn tại.';
            return false;
        }

        #Kiểm tra kích thước file 
        if ($file['file']['size'] > 5024000) {
            $_SESSION['error'] = 'Kích thước tệp quá lớn.';
            return false;
        }

        #Kiểm tra file ảnh có thuộc các định dạng trong $typeImage
        $typeImage = ['jpg', 'png', 'gif', 'jpeg'];
        $imageFileType = strtolower(pathinfo($file['file']['name'], PATHINFO_EXTENSION)); #strtolower: chuyển Hoa thành chữ thường

        if (!in_array($imageFileType, $typeImage)) {
            $_SESSION['error'] = 'Tệp đã chọn không đúng đinh dạng.';
            return false;
        }

        #Tạo đường dẫn ảnh, đặt tên ảnh . time()
        $path = 'uploads/' . time() . '-' . $file['file']['name'] ;

        #upload ảnh
        #Hàm move_uploaded_file () di chuyển tệp đã tải lên đến đích mới.
        if(move_uploaded_file($file['file']['tmp_name'], $path)) { #['tmp_name']: tên bộ nhớ tạm trong $_FILE -> dùng var_dump($_FILE)
            return $path;
        }

        $_SESSION['error'] = 'Không thể upload tệp, xin thử lại.';
            return false;
    }

    public function add() {

        $data['menus'] = $this->menuModel->getAll();
        $data['title'] = 'THÊM SẢN PHẨM MỚI';
        $data['template'] = 'V_Admin/product/add';

        return $this->app_Views('V_admin/main', $data);
    }

    public function store() {

        if (isset($_POST['add'])) {

            $data['name'] = ((isset($_POST['name']) && $_POST['name'] != '') ? Helper::makeSafe($_POST['name']) : '');
            $data['price'] = intval($_POST['price']);
            $data['sale'] = intval($_POST['sale']);
            $data['description'] = ((isset($_POST['description']) && $_POST['description'] != '') ? Helper::makeSafe($_POST['description']) : '');
            $data['content'] = ((isset($_POST['content']) && $_POST['content'] != '') ? Helper::makeSafe($_POST['content']) : '');
            $data['sort'] = intval($_POST['sort']);
            $data['active'] = intval($_POST['active']);
            $data['menu_id'] = intval($_POST['menu_id']);
            
            if ($data['name'] == '' || $data['price'] == 0 || $data['content'] == '' ) {
                $_SESSION['error'] = 'Vui lòng điền đầy đủ thông tin.';
                return Helper::redirect('admin/product/add');
            }

            #Kiểm tra giá sale phải nhỏ hơn giá gốc
            $checkPrice = $this->checkPrice($data['price'], $data['sale']);
            if (!$checkPrice) {
                return Helper::redirect('admin/product/add');
            }

            if ($_FILES['file']['name'] == '') {
                $_SESSION['error'] = 'Vui lòng chọn tệp.';
                return Helper::redirect('admin/product/add');
            }

            $data['image'] = $this->uploadFile($_FILES);
            if (!$data['image']) {
                return Helper::redirect('admin/product/add');
            }

            $this->productModel->insert($data);

            $_SESSION['success'] = 'Thêm sản phẩm thành công.';
            return Helper::redirect('admin/product/add');
        }

        return Helper::redirect('admin/product/add');
    }

    public function lists() {

        $data['title'] = 'DANH SÁCH SẢN PHẨM';
        $data['template'] = 'V_Admin/product/lists';

        #Kiểm tra trang đang đứng hiện tại. mặc định là trang 1
        $limit = 6; #số dòng tối đa hiển thị trên 1 trang

        $offset = ((isset($_GET['page']) && intval($_GET['page']) > 0) ? intval($_GET['page']) : 1);

        $offsetNew = ($offset - 1) * $limit; 

        #Tính tổng số Record trong data
        $numRecord = $this->menuModel->num();

        #Tính số trang
        $numPage = ceil($numRecord / $limit);
        $data['htmlPage'] = Helper::getPage($numPage, '/admin/product/lists');

        $data['products'] = $this->productModel->get($limit, $offsetNew);

        return $this->app_Views('V_Admin/main', $data);
    }

    public function edit($id = 0 ) {

        $product = $this->productModel->show($id);

        if (!is_null($product)) {
            
            $data['menus'] = $this->menuModel->getAll();
            $data['title'] = 'CẬP NHẬT SẢN PHẨM: ' . $product['name'];
            $data['template'] = 'V_Admin/product/edit';
            $data['product']  = $product;

            return $this->app_Views('V_Admin/main', $data);
        }

        $_SESSION['error'] = 'ID không tồn tại';
        return Helper::redirect('admin/product/lists');
    }

    public function update($id = 0) {

        if (isset($_POST['update'])) {

            $product = $this->productModel->show($id);
            
            if (!is_null($product)) {

                $data['name'] = ((isset($_POST['name']) && $_POST['name'] != '') ? Helper::makeSafe($_POST['name']) : '');
                $data['price'] = intval($_POST['price']);
                $data['sale'] = intval($_POST['sale']);
                $data['description'] = ((isset($_POST['description']) && $_POST['description'] != '') ? Helper::makeSafe($_POST['description']) : '');
                $data['content'] = ((isset($_POST['content']) && $_POST['content'] != '') ? Helper::makeSafe($_POST['content']) : '');
                $data['sort'] = intval($_POST['sort']);
                $data['active'] = intval($_POST['active']);
                $data['menu_id'] = intval($_POST['menu_id']);
                
                if ($data['name'] == '' || $data['price'] == 0 || $data['content'] == '' ) {
                    $_SESSION['error'] = 'Vui lòng điền đầy đủ thông tin.';
                    return Helper::redirect('admin/product/edit/' . $id);
                }

                #Kiểm tra giá sale phải nhỏ hơn giá gốc
                $checkPrice = $this->checkPrice($data['price'], $data['sale']);
                if (!$checkPrice) {
                    return Helper::redirect('admin/product/edit/' . $id);
                }
                
                if ($_FILES['file']['name'] != '') {
                    $image = $this->uploadFile($_FILES);
                    if (!$image) {
                        return Helper::redirect('admin/product/edit/' . $id);
                    }

                    $data['image'] = $image;
                }

                $result = $this->productModel->update($data, $id);

                if ($result) {

                    $_SESSION['success'] = 'Cập nhật thành công.';
                    return Helper::redirect('admin/product/lists');
                }

                $_SESSION['error'] = 'Vui lòng thử lại.';
                return Helper::redirect('admin/product/edit/' . $id);

            }

            $_SESSION['error'] = 'Có lỗi trong quá trình cập nhật.';
            return Helper::redirect('admin/product/lists');
        }

        $_SESSION['error'] = 'Lỗi cập nhật vui lòng thử lại sau';
        return Helper::redirect('admin/product/lists');
    }

    public function delete() {

        $id = ((isset($_POST['id']) && $_POST['id'] != 0) ? intval( $_POST['id']) : 0);

        $product = $this->productModel->show($id);

        if (!is_null($product)) {

            $this->productModel->delete($id);
            return Helper::response(['error' => false]);
        }

        return Helper::response(['error' => true]);
    }
}