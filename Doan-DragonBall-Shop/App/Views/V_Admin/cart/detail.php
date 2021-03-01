<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <ul>
                    <li><strong>Tên Khách Hàng: </strong><?=$data['customer']['name']?></li>
                    <li><strong>SĐT: </strong><?=$data['customer']['phone']?></li>
                    <li><strong>Địa Chỉ: </strong><?=$data['customer']['address']?></li>
                    <li><strong>Ngày Đặt Hàng: </strong><?=date('d-m-Y H:i:s', $data['customer']['timeCreated'])?></li>
                    <li><strong>Tên Khách Hàng: </strong><?=$data['customer']['name']?></li>
                </ul>

                <hr>
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <th style="width: 10px">STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>

                        <?php 
                            $stt = 1;
                            $total = 0;
                            while($row = $data['cart']->fetch_assoc()) {
                                $money = $row['price'] * $row['number'];
                                $total += $money;
                        ?>

                        <tr id="remove_<?=$row['id']?>">
                            <td><?=$stt++?></td>
                            <td><?=$row['name']?></td>
                            <td><a href="/<?=$row['imgProduct']?>" target="_blank"><img src="/<?=$row['imgProduct']?>" style="width: 50px; heigh: 50px; object-fit: cover;"></a></td>
                            <td><?=number_format($row['price'])?></td>
                            <td><?=$row['number']?></td>
                            <td><?=number_format($money)?></td>
                        </tr>
                        <?php } ?>

                        <tr>
                            <th colspan="5">TỔNG TIỀN</th>
                            <td style="color: red" ><?=number_format($total)?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>