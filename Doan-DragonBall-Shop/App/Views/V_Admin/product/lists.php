<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá tiền</th>
                        <th>Hình ảnh</th>
                        <th>Trạng thái</th>
                        <th style="width: 60px"></th>
                    </tr>

                    <?php while($row = $data['products']->fetch_assoc()) {?>

                    <tr id="remove_<?=$row['id']?>">
                        <td><?=$row['id']?></td>
                        <td><?=$row['name']?></td>
                        <td><?=$row['nameMenu']?></td>
                        <td><?=number_format($row['price'])?></td>
                        <td><a href="/<?=$row['image']?>" target="_blank"><img src="/<?=$row['image']?>" style="width: 50px; heigh: 50px; object-fit: cover;"></a></td>
                        <td><?=Helper::status($row['active'])?></td>
                        <td>
                            <a href="/them-san-pham/<?=$row['id']?>"><i class="fas fa-edit"></i></a>

                            <a href="#" onclick="deleteData(<?=$row['id']?>, '/xoa-san-pham')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
              </tbody>
            </table>

            <?=$data['htmlPage']?>
            </div>
        </div>
    </div>
</section>