<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">DÒNG MÔ HÌNH</h2>
            <h3 class="section-subheading text-muted">Bạn đã chọn tìm kiếm theo dòng mô hình <?=$data_controller['title']?></h3>
        </div>
        <div class="row text-center">
                <div class="col-md-12">
                    <span class="fa-stack fa-4x">
                        <img class="fa-stack-2x text-primary" src="/template/public/images/bandai.svg" alt="">
                        <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i> -->
                    </span>
                    <a href="/danh-muc/<?=$data_controller['data']['id']?>/<?=Helper::to_slug($data_controller['title'])?>.html"><h4 class="my-3"><?=$data_controller['title']?></h4></a>
                    <p class="text-muted"></p>
                </div>
        </div>
    </div>
</section>
<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">MÔ HÌNH</h2>
            <h3 class="section-subheading text-muted">Mô hình Dragon Ball dòng <?=$data_controller['title']?>.</h3>
        </div>
        <div class="row">
            <?php while($row = $data_controller['product']->fetch_assoc()) {?>
                <?php          
                    include __DIR__ . '/../product/loop.php'; 
                    #   / - kết thúc __DIR__
                    #   ../ - nhảy ra 1 cấp. vd: view/menu nhảy ra 1 cấp là view       
                ?> 
            <?php } ?>
        </div>
    </div>
    <div class="page-menu">
        <?= $data_controller['htmlPage']?>
    </div>
</section>
