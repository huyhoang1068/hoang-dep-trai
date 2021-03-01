<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <form class="form-horizontal" action="/admin/menu/store" method="post">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Tên Danh Mục</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" id="" placeholder="Tên danh mục">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Sắp Xếp</label>
                            <div class="col-sm-6">
                                <input type="number" name="sort" class="form-control" id="" value="1">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="active" value="1" checked=""> Kích Hoạt
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="active" value="0"> Không Kích Hoạt
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