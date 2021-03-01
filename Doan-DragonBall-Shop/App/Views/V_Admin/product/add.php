<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <form class="form-horizontal" action="/admin/product/store" method="post" enctype="multipart/form-data">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Tên Sản Phẩm *</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="name" class="form-control" id="" placeholder="Tên sản phẩm">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Danh mục Sản Phẩm *</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="menu_id" id="">
                                            <?php while ($row = $data['menus']->fetch_assoc()) { ?>
                                            <option value="<?=$row['id']?>"><?=$row['name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Giá gốc *</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="price" class="form-control" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Giảm giá</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="sale" class="form-control" value="0">
                                    </div>
                                </div>   
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Mô tả Sản Phẩm</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                            </div>  
                        </div>              

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Chi tiết Sản Phẩm *</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="content"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>       

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Ảnh Sản Phẩm *</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Sắp xếp</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="sort" class="form-control" id="" value="1">
                                    </div>
                                </div>

                                <div class="col-md-6"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="active" value="1" checked=""> Kích hoạt
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="active" value="0"> Không Kích hoạt
                                </label>
                            </div>
                        </div>

                    </div>
     
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <input type="submit" name="add" class="btn btn-info pull-right" value="Thêm Danh Mục">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>