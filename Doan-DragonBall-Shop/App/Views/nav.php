<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" <?=(($data_controller['template'] == 'Home') ? 'href="#home"' : 'href="/"')?>><img src="/template/public/images/navbar-logo.svg" alt="" /></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" <?=(($data_controller['template'] == 'Home') ? 'href="#home"' : 'href="/"')?>>Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Dòng Mô Hình</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Mô Hình</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Về Chúng tôi</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Đội ngũ</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Liên Hệ</a></li>
            </ul>
        </div>        
        <div class="navbar-right">
            <ul class="navbar-nav text-uppercase">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/admin">Login</a></li>
            </ul>
        </div>
    </div>
</nav>