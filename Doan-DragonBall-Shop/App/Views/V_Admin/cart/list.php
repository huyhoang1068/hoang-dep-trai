<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Trạng thái</th>
                        <th style="width: 60px"></th>
                    </tr>

                    <?php while($row = $data['cart']->fetch_assoc()) {?>

                    <tr id="remove_<?=$row['id']?>">
                        <td><?=$row['id']?></td>
                        <td><?=$row['name']?></td>
                        <td><a href="tel:<?=$row['phone']?>"><?=$row['phone']?></a></td>
                        <td><?=date('d-m-Y H:i:s', $row['timeCreated'])?></td>
                        <td><?=($row['view'] == 1) ? '<span class="badge bg-danger">Đơn hàng mới</span>' : 'Đã xem'?></td>
                        <td>
                            <a href="/admin/cart/view/<?=$row['id']?>"><i class="fas fa-eye"></i></a>
                            <a href="#" onclick="deleteData(<?=$row['id']?>, '/admin/cart/delete')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
              </tbody>
            </table>
            </div>
        </div>
    </div>
</section>