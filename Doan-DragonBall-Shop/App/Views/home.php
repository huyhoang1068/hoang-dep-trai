<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">DÒNG MÔ HÌNH</h2>
            <h3 class="section-subheading text-muted">Bạn chọn dòng mô hình để tìm kiếm sản phẩm nhé.</h3>
        </div>
        <div class="row text-center">
            <?php while($row = $data_controller['menu']->fetch_assoc()) {?>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img class="fa-stack-2x text-primary" src="/template/public/images/bandai.svg" alt="">
                        <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i> -->
                    </span>
                    <a href="/danh-muc/<?=$row['id']?>/<?=Helper::to_slug($row['name'])?>.html"><h4 class="my-3"><?=$row['name']?></h4></a>
                    <p class="text-muted"></p>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="page-menu">
        <?= $data_controller['htmlPageMenu']?>
    </div>
</section>
<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">MÔ HÌNH</h2>
            <h3 class="section-subheading text-muted">Mô hình Dragon Ball nổi bật.</h3>
        </div>
        <div class="row">
            <?php while($row = $data_controller['product']->fetch_assoc()) {?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#productDetails" onclick="getData(<?=$row['id']?>, '/chi-tiet-san-pham/')">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/<?=$row['image']?>" alt="" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?=$row['name']?></div>
                            <div class="portfolio-caption-subheading text-muted"><?=$row['menu_name']?></div>
                            <div class="portfolio-caption-price"><?=number_format($row['price'])?><sup>đ</sup></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

    
