<div class="container">
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <form class="text-center" action="/cap-nhat-gio-hang.html" method="post">
                <h2 class="section-heading text-uppercase"><?=$data_controller['title']?></h2>
                <h3 class="section-subheading text-muted">DANH SÁCH GIỎ HÀNG ĐÃ CHỌN</h3>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Mô Hình</th>
                            <th>Đơn Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sum = 0; ?>
                        <?php foreach($data_controller['product'] as $key => $product) { ?>

                        <?php   
                                $money = (($product['sale'] != 0) ? $product['sale'] : $product['price']);
                                $number = $_SESSION['cart'][$product['id']];
                                if ($number == 0) {
                                    unset($_SESSION['cart'][$product['id']]);
                                    return Helper::redirect('gio-hang.html');
                                }
                                $total = $money * $number;            
                        ?>
                            <tr>
                                <td><strong><?=$key + 1 ?></strong></td>
                                <td><a target="_blank" data-toggle="modal" href="#productDetails" onclick="getData(<?=$product['id']?>, '/chi-tiet-san-pham/')"><?=$product['name']?></a></td>
                                <td><?=number_format($money)?></td>
                                <td><input type="number" name="cart[<?=$product['id']?>]" value="<?=$number?>"></td>
                                <td><?=number_format($total)?></td>
                                <td><a href="/xoa-san-pham.html?id=<?=$product['id']?>"><i class="fas fa-trash"></i></a></td>
                                <?php $sum += $total;?>
                            </tr>
                        <?php } ?>

                            <tr>
                                <td colspan="4"><b>Tổng Tiền</b></td>
                                <td style="color: red"><?=number_format($sum)?></td>
                            </tr>
                    </tbody>
                </table>
                <div class="cart-option">
                    <a href="/">Tiếp tục mua hàng</a>
                    <a href="#formCart" onclick="cart()">Đặt hàng</a>
                    <input type="submit" value="Cập nhật đơn hàng" name="update">
                    <a href="/huy-don-hang.html">Hủy đơn hàng</a>
                </div>
            </form>
        </div>
    </section>

    <?php include __DIR__ . '/../V_Admin/error.php';?>
    <div class="container text-uppercase d-none" id="formCart">
        <form action="/dat-hang.html" method="post">
            <div class="form-group">
                <label for=""><b>Tên Khách Hàng *</b></label>
                <input type="text" class="form-control" name="name" placeholder="Nhập Tên Đầy Đủ">
            </div>
            <div class="form-group">
                <label for=""><b>Số Điện Thoại *</b></label>
                <input type="number" class="form-control" name="phone" placeholder="Nhập Số Điện Thoại">
            </div>
            <div class="form-group">
                <label for=""><b>Địa Chỉ</b></label>
                <input type="text" class="form-control" name="address" placeholder="Nhập Địa Chỉ">
            </div>
            
            <input type="submit" class="btn btn-primary" name="add" value="Đặt Hàng">
        </form>
    </div>
</div>
