<?php

class Cart extends Controller {

    public $cartModel;

    public function __construct () {

        $this->cartModel = $this->app_Models('CartModel');
    }

    public function index() {

        $data['title'] = 'Giỏ Hàng';

        $id = ((isset($_GET['id']) && $_GET['id'] > 0) ? intval($_GET['id']) : 0);
        if ($id > 0) {

            if (isset($_SESSION['cart'][$id])) {

                $_SESSION['cart'][$id] ++ ;

            }else {

                $_SESSION['cart'][$id] = 1;
            }

            return Helper::redirect('gio-hang.html');
        }

        if (empty($_SESSION['cart'])) {

            $data['template'] = 'cart/info';
            return $this->app_Views('main', $data);
        }

        #Lấy ra danh sách id sản phẩm người dùng chọn
        $idString = '';
        foreach($_SESSION['cart'] as $key => $value) {
            
            $idString .= $key . ',';
        }

        $idString = substr($idString, 0, -1); #Cắt chuỗi loại bỏ dấu , cuối cùng.
        $cart = $this->cartModel->getIn($idString);

        
        $data['product'] = $cart;
        $data['template'] = 'cart/list';

        return $this->app_Views('main', $data);
    }

    public function update() {
        
        if (isset($_POST['update'])) {

            $cart = (isset($_POST['cart']) ? $_POST['cart'] : null);

            if (!is_null($cart)) {

                foreach ($cart as $key => $value) {
                    
                    $_SESSION['cart'][$key] = $value;
                }
            }
        }

        return Helper::redirect('gio-hang.html');
    }

    public function remove() {

        $id = ((isset($_GET['id']) && $_GET['id'] > 0) ? intval($_GET['id']) : 0);

        if ($id > 0) {

            unset($_SESSION['cart'][$id]);
        }

        return Helper::redirect('gio-hang.html');
    }

    public function book() {

        if (isset($_POST['add'])) {

            $name = (isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '');
            $phone = (isset($_POST['phone']) ? Helper::makeSafe($_POST['phone']) : '');

            if ($name == '' || $phone == '') {

                $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin';
                return Helper::redirect('gio-hang.html');
            }

            $address = (isset($_POST['address']) ? Helper::makeSafe($_POST['address']) : '');

            $customer_id = $this->cartModel->add($name, $phone, $address); 

            if ($customer_id == 0) {

                $_SESSION['error'] = 'Có lỗi trong quá trình đăng kí, vui lòng liên hệ Fanpage';
                return Helper::redirect('gio-hang.html');
            }

            #Lấy ra danh sách id sản phẩm người dùng chọn và chèn vào data
            $idString = '';
            foreach($_SESSION['cart'] as $key => $value) {
                
                $idString .= $key . ',';
            }

            $idString = substr($idString, 0, -1); #Cắt chuỗi loại bỏ dấu , cuối cùng.
            $cart = $this->cartModel->getIn($idString);

            $valueString = '';
            foreach($cart as $key => $product) {

                $price = (($product['sale'] != 0) ? $product['sale'] : $product['price']);
                $number = $_SESSION['cart'][$product['id']];
                $valueString .= '("' . $product['name'] . '", "' . $product['id'] . '", "' . $price . '", "' . $number . '", "' . $customer_id . '"),';
            }

            $insertCart = $this->cartModel->insertValue($valueString);
        
            if ($insertCart) {

                #Xóa toàn bộ đơn hàng trong SESSiON
                session_destroy();

                #Gửi gmail 
                #cách 1: dễ bị spam
                #mail("someone@example.com","My subject",$msg);

                #cách 2: link code: https://freetuts.net/huong-dan-gui-mail-trong-php-voi-phpmailer-710.html
                $nFrom = "ToyHunter";    //mail duoc gui tu dau, thuong de ten cong ty ban
                $mFrom = 'toyhunterdbshop@gmail.com';  //dia chi email cua ban 
                $mPass = 'brhvbxlhdsqixbve';       //mat khau email cua ban
                $nTo = 'Hoàng'; //Ten nguoi nhan
                $mTo = 'nguyenhuyhoang1068@gmail.com';   //dia chi nhan mail
                $mail             = new PHPMailer();
                $body             = 'Hi Hoàng! ToyHunter xin chân thành cảm ơn bạn đã đặt hàng sản phẩm của cửa hàng. 
                                    Rất mong được phục vụ bạn một cách ân cần và chu đáo nhất. chi tiết đơn hàng...';   // Noi dung email
                $title = 'CHI TIẾT ĐƠN HÀNG MÔ HÌNH DRAGON BALL - TOYHUNTER SHOP';   //Tieu de gui mail
                $mail->IsSMTP();             
                $mail->CharSet  = "utf-8";
                $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
                $mail->SMTPAuth   = true;    // enable SMTP authentication
                $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
                $mail->Host       = "smtp.gmail.com";    // sever gui mail.
                $mail->Port       = 465;         // cong gui mail de nguyen

                // xong phan cau hinh bat dau phan gui mail
                $mail->Username   = $mFrom;  // khai bao dia chi email
                $mail->Password   = $mPass;              // khai bao mat khau
                $mail->SetFrom($mFrom, $nFrom);
                $mail->AddReplyTo('toyhunterdbshop@gmail.com', 'ToyHunter'); //khi nguoi dung phan hoi se duoc gui den email nay
                $mail->Subject    = $title;// tieu de email 
                $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
                $mail->AddAddress($mTo, $nTo);

                // thuc thi lenh gui mail 
                $mail->Send();
                return Helper::redirect();
            }
        }
    }
}