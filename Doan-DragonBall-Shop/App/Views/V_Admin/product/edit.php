<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <form class="form-horizontal" action="/cap-nhat-san-pham/<?=$data['product']['id']?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Tên Sản Phẩm</label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?=$data['product']['name']?>"name="name" class="form-control" id="" placeholder="Tên sản phẩm">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Danh mục Sản Phẩm </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="menu_id" id="">
                                            <?php while ($row = $data['menus']->fetch_assoc()) { ?>
                                            <option value="<?=$row['id']?>" <?=(($row['id'] == $data['product']['menu_id']) ? 'selected' : '')?>><?=$row['name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Giá gốc</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="price" value="<?=$data['product']['price']?>" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Giảm giá</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="sale" value="<?=$data['product']['sale']?>" class="form-control">
                                    </div>
                                </div>   
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Mô tả Sản Phẩm</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="description" value="<?=$data['product']['description']?>"><?=$data['product']['description']?></textarea>
                                    </div>
                                </div>
                            </div>  
                        </div>              

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Chi tiết Sản Phẩm</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="content" value="<?=$data['product']['content']?>"><?=$data['product']['content']?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>       

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Ảnh Sản Phẩm</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="file" class="form-control"> 
                                    </div>
                                </div>   

                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Sắp xếp</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="sort" class="form-control" id="" value="<?=$data['product']['sort']?>">
                                    </div>
                                </div>   

                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="active" value="1" <?=$data['product']['active'] == 1 ? 'checked' : ''?>> Kích hoạt
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="active" value="0" <?=$data['product']['active'] == 0 ? 'checked' : ''?>> Không Kích hoạt
                                        </label>
                                    </div>
                                </div>                       
                            </div>

                            <div class="col-md-6" padding="50px">
                                <a href="/<?=$data['product']['image']?>" target="_blank">
                                    <img src="/<?=$data['product']['image']?>" style="width: 300px; heigh: 300px; object-fit: cover;" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
     
                    <div class="box-footer">
                        <button action="/danh-sach-san-pham" type="reset" class="btn btn-default">Cancel</button>
                        <input type="submit" name="update" class="btn btn-info pull-right" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>