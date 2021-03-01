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
            <div class="portfolio-caption-price"><?=number_format($row['price'])?><sup>đ</sup></div>
        </div>
    </div>
</div>