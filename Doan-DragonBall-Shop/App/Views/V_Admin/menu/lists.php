<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Tên danh mục</th>
                        <th>Sắp xếp</th>
                        <th>Trạng thái</th>
                        <th style="width: 60px"></th>
                    </tr>

                    <?php while($row = $data['menus']->fetch_assoc()) {?>

                    <tr id="remove_<?=$row['id']?>">
                        <td><?=$row['id']?></td>
                        <td><?=$row['name']?></td>
                        <td><?=$row['sort']?></td>
                        <td><?=Helper::status($row['active'])?></td>
                        <td>
                            <a href="/chinh-sua-danh-muc/<?=$row['id']?>"><i class="fas fa-edit"></i></a>

                            <a href="#" onclick="deleteData(<?=$row['id']?>, '/xoa-danh-muc')"><i class="fas fa-trash"></i></a>
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