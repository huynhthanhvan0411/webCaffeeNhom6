    <?php
        require_once('layouts/headerIndex.php');
        // require_once('assets/css/index.css');

        $sql = "select Product.*, Category.name as category_name from Product left join Category on
        Product.category_id = Category.id where category.deleted = 0 and Product.deleted = 0
        order by Product.updated_at desc limit 0,8 ";
	    $lastestItems = executeResult($sql);
    ?>
        <!-- CSS -->
        <style>
              .col-items{
                margin: 10px 0;
              }

                .feedback__content  .owl-carousel .owl-item img {
                    width: 28%;
                    display: inline-block;
                 }
                 .owl-theme .owl-nav {
                    margin-top: 10px;
                    display: none;
                }
                .showcase video{
                        position: relative;
                        width: 100%;
                        line-height: 40%;
                        object-fit: cover;
                        padding: 60px 40px; 
                    }
                    .showcase__tittle h2{
                        text-align: center;
                        font-weight: bold;
                        color: #ec7532;
                        text-transform: uppercase;
                        margin-top:20px;
                        font-size: 1.5rem;
                    }
        </style>
        <!--  PHP CONTENT-->
   
    <!-- BEST SELLER -->
    <!-- <section class="bestSeller ">
        <div class="section">
            <div class="container ">
                <h2 class="title ">ĐỒ UỐNG BÁN CHẠY NHẤT</h2>
                <div class="bestSeller__content ">
                    <div class="row spacingPro">
                        <div class="col-3 ">
                            <div class="bestSeller__item">
                                <img src="assets/image/imgTrangChu/bestSeller1.jpg" alt="bestSeller1">                            
                                <h3>Cà phê kem trứng </h3>
                                <h4>35.000đ</h4>
                            </div>
                            <div class="product__button">
                              
                                <a href="#">Chọn mua</a>
                              
                            </div>

                        </div>
                        <div class="col-3 ">
                            <div class="bestSeller__item">
                                <img src="assets/image/imgTrangChu/bestSeller2.jpg" alt="bestSeller2">
                                <h3>Cà phê bạc xỉu</h3>
                                <h4>30.000đ</h4>
                            </div>
                            <div class="product__button">                           
                                <a href="#">Chọn mua</a>
                                
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="bestSeller__item">
                                <img src="assets/image/imgTrangChu/bestSeller3.jpg" alt="bestSeller3">
                                <h3>Trà đào cam sả</h3>
                                <h4>30.000đ</h4>
                            </div>
                            <div class="product__button">
                                
                                <a href="#">Chọn mua</a>
                              
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="bestSeller__item">
                                <img src="assets/image/imgTrangChu/bestSeller4.jpg" alt="bestSeller4">
                                <h3>Hồng trà kem </h3>
                                <h4>30.000đ</h4>
                            </div>
                            <div class="product__button">
                                <a href="#">
                                    <i class="fa fa-star"></i>
                                </a>
                                <a href="#">Chọn mua</a>
                                <a href="#">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section> -->
    <!-- FLAVOUR -->
    <!-- <section class="flavour  ">
        <div class="section">
            <div class="container ">
                <h2 class="title ">ĐỒ UỐNG YÊU THÍCH NHẤT</h2>
                <div class="flavour__content ">
                    <div class="row spacingPro">
                        <div class="col-3 ">
                            <div class="flavour__item">
                                <img src="assets/image/imgTrangChu/flavour1.jpg" alt="flavour1">
                                <h3>Cà phê đen </h3>
                                <h4>35.000đ</h4>
                            </div>
                            <div class="product__button">
                                <a href="#">
                                    <i class="fa fa-star"></i>
                                </a>
                                <a href="#">Chọn mua</a>
                                <a href="#">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>

                        </div>
                        <div class="col-3 ">
                            <div class="flavour__item">
                                <img src="assets/image/imgTrangChu/flavour2.jpg" alt="flavour2">
                                <h3>Cà phê cốt dừa</h3>
                                <h4>30.000đ</h4>
                            </div>
                            <div class="product__button">
                                <a href="#">
                                    <i class="fa fa-star"></i>
                                </a>
                                <a href="#">Chọn mua</a>
                                <a href="#">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="flavour__item">
                                <img src="assets/image/imgTrangChu/flavour3.jpg" alt="flavour3">
                                <h3>Trà sen vàng</h3>
                                <h4>30.000đ</h4>
                            </div>
                            <div class="product__button">
                                <a href="#">
                                    <i class="fa fa-star"></i>
                                </a>
                                <a href="#">Chọn mua</a>
                                <a href="#">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="flavour__item">
                                <img src="assets/image/imgTrangChu/flavour4.jpg" alt="flavour4">
                                <h3>Cà phê matchiato</h3>
                                <h4>30.000đ</h4>
                            </div>
                            <div class="product__button">
                                <a href="#">
                                    <i class="fa fa-star"></i>
                                </a>
                                <a href="#">Chọn mua</a>
                                <a href="#">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section> -->
    <!-- MUST TRY -->
    <!-- <section class="mustTry ">
        <div class="section">
            <div class="container ">
                <h2 class="title ">ĐỒ UỐNG PHẢI THỬ NHẤT</h2>
                <div class="mustTry__content ">
                    <div class="row spacingPro">
                        <div class="col-3 ">
                            <div class="mustTry__item">
                                <img src="assets/image/imgTrangChu/mustTry1.jpg" alt="mustTry1">
                                <h3>Cà phê espresso</h3>
                                <h4>35.000đ</h4>
                            </div>
                            <div class="product__button">
                                <a href="#">
                                    <i class="fa fa-star"></i>
                                </a>
                                <a href="#">Chọn mua</a>
                                <a href="#">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>

                        </div>
                        <div class="col-3 ">
                            <div class="mustTry__item">
                                <img src="assets/image/imgTrangChu/mustTry2.jpg" alt="mustTry2">
                                <h3>Cà phê espresso sữa</h3>
                                <h4>30.000đ</h4>
                            </div>
                            <div class="product__button">
                                <a href="#">
                                    <i class="fa fa-star"></i>
                                </a>
                                <a href="#">Chọn mua</a>
                                <a href="#">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="mustTry__item">
                                <img src="assets/image/imgTrangChu/mustTry3.jpg" alt="mustTry3">
                                <h3>Cà phê cappuchino</h3>
                                <h4>30.000đ</h4>
                            </div>
                            <div class="product__button">
                                <a href="#">
                                    <i class="fa fa-star"></i>
                                </a>
                                <a href="#">Chọn mua</a>
                                <a href="#">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="mustTry__item">
                                <img src="assets/image/imgTrangChu/mustTry4.jpg" alt="mustTry4">
                                <h3>Cà phê americano</h3>
                                <h4>30.000đ</h4>
                            </div>
                            <div class="product__button">
                                <a href="#">
                                    <i class="fa fa-star"></i>
                                </a>
                                <a href="#">Chọn mua</a>
                                <a href="#">
                                    <i class="fa fa-shopping-basket"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section> -->
    <!-- NEW DISH -->
    <section class="newDish  ">
        <div class="section">
            <div class="container ">
                <h2 class="title ">ĐỒ UỐNG MỚI</h2>
                <div class="newDish__content ">
                    <div class="row spacingPro">
                    <?php
                    foreach ($lastestItems as $item) {
                        echo'<div class="col-3 col-items ">
                            <a href="detail.php?id='.$item['id'].'" style=" text-decoration: none; color: black;">
                                <img src="'.$item['thumbnail'].'" alt="" class="product-img">                        
                                <h3 class="name-items">'.$item['title'].'</h3>                     
                                <h4 class="price-items">'.number_format($item['discount']).'VND</h4>
                            </a>
                                <p>
                                    
                                <button class="btnAddcart " 
                                onclick="addCart('.$item['id'].', 1)">
                                <i class="ti-shopping-cart" style="padding-right: 5px"></i>ADD TO CART
                                </button>
                                </p>
                        </div>';
                    }
                    ?>
                
                    
                    </div>
                </div>
            </div>
        </div>


    </section>
    <hr>
     <!-- Video -->
        <section class="showcase">
            <div class="showcase__tittle">
                <h2>HANNA CAPUCHINO - DÒNG CAFE TUYỆT VỜI CỦA MÙA ĐÔNG</h2>
            </div>
            <video src="./assets/image/videoindex.mp4" muted loop autoplay></video>
            <!-- <div class="text-showcase">
                <h3>We always bring you the best experience</h3>
            </div> -->
        </section>
    <hr>
    <!-- FEEDBACK -->
    <!-- <section class="feedback section">
        <div class="heading heading--white">
            <h2>FEEDBACK CUSTOMER</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, quam.</p>
        </div>
        <div class="container">
            <div class="feedback__content">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="feedback__top">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                        </div>
                        <div class="feedback__bottom">
                            <img src="assets/image/imgTrangChu/fb1.jpg" alt="fb1">
                            <div class="feedback__name">
                                <p>Mary Jane</p>
                                <p>Lorem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="feedback__top">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                        <div class="feedback__bottom">
                            <img src="assets/image/imgTrangChu/fb2.jpg" alt="fb2">
                            <div class="feedback__name">
                                <p>Peter </p>
                                <p>Lorem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="feedback__top">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                        </div>
                        <div class="feedback__bottom">
                            <img src="assets/image/imgTrangChu/fb3.jpg" alt="fb3">
                            <div class="feedback__name">
                                <p>Sevet </p>
                                <p>Lorem</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="feedback__top">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                        </div>
                        <div class="feedback__bottom">
                            <img src="assets/image/imgTrangChu/fb4.jpg" alt="fb4">
                            <div class="feedback__name">
                                <p>Wilson</p>
                                <p>Lorem.</p>
                            </div>
                        </div>
                    </div>
                    
                
                </div>
            </div>
        </div>

    </section> -->

    <!-- NEWS -->
    <section class="news ">
        <div class="section">
            <div class="container ">
                <h2 class="title ">tin tức</h2>
                <div class="news__content ">
                    <div class="row ">
                        <div class="col-4">
                            <div class="news__item">
                                <img src="assets/image/imgTrangChu/news1.jpg" alt="news1">
                                <div class="menu">
                                    <h2>
                                        <a href="#"> Sự khác biệt giữa cà phê đen và cappuchino</a>
                                    </h2>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. In eveniet nostrum alias magni ullam dolorem repellendus, consectetur amet! Dolores, ex.</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="news__item">
                                <img src="assets/image/imgTrangChu/news2.jpg" alt="news2">
                                <div class="menu">
                                    <h2>
                                        <a href="#"> Cà phê một thức uống không thể thiếu vào mỗi sáng</a>
                                    </h2>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda possimus eligendi ipsam dolorem repellat esse reprehenderit rem. Animi, dolores perspiciatis!</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="news__item">
                                <img src="assets/image/imgTrangChu/news3.jpg" alt="news3">
                                <div class="menu">
                                    <h2>
                                        <a href="#">
                                            Những loại cà phê thơm ngon đậm chất Đông Á
                                        </a>
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur consectetur atque fuga nostrum nulla ut ad similique iure quos praesentium.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
   
 
    <?php
        require_once('layouts/footer.php');
    ?>
    