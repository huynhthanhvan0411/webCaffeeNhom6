<?php
	session_start();
    $baseUrl = '../';
	require_once('utils/utility.php');
	require_once('db/dbhelper.php');

	$sql = "select * from Category";
	$menuItems = executeResult($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hanna Coffe</title>


    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,700;1,300&family=Oswald:wght@300&display=swap" rel="stylesheet">

    <!-- FONT AWS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- BS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- VENOBOX CSS -->
    <link rel="stylesheet" href="./css/venobox.min.css">

    <!-- OWL CAROUSELL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/layouts.css">

    <!-- IMG FAVICON -->
    <link rel="icon" type="image/x-icon" href="assets/image/imgIcon.png">
    </head>

<body>
    <!-- HEADER -->
    <header class="header container-fluid " id="header">
        <nav class="navbar navbar-expand-xl " id="nav">
            <a class="navbar-brand " href="#">HANNA COFFE</a>
            <button style="color: white;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavCoffe" aria-controls="navbarNavCoffe" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                <i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavCoffe">
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a class="nav-link " href="index.php">Trang chủ </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="allProduct.php" >Sản phẩm</a>
                    </li>
        
        
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giới thiệu</a>
                    </li>
                    <li class="nav-item"> -->
                        <a class="nav-link" href="contact.php">Liên hệ</a>
                    </li>
                </ul>
            </div>
            <div class="header--action pr-2">
                <!-- <div class="header--action__search dropdown">
                    <a href="#" class="nav-link no-border" data-toggle="dropdown">
                        <i class="header__IconSearch fa fa-search"></i>
                    </a>
                    <div class="dropdown-menu header--action__dropdown ">
                        <div class="dropdown-menu-detail dropdown-item">
                            <div class="header__dropdow--content">
                                <p class="ttbold">Tìm kiếm</p>
                                <div class="site__search">
                                    <div class="box__search">
                                        <div class="box__search--inner">
                                            <input type="text" placeholder="Tìm kiếm sản phẩm">
                                        </div>
                                        <button class="btnSearch">
                                                    <i class="header__IconSearch fa fa-search"></i>
                                                </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header--action__account dropdown ">
                    <a href="#" class="nav-link no-border" data-toggle="dropdown">
                        <i class="header__IconUser fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu header--action__dropdown ">
                        <div class="dropdown-menu-detail dropdown-item">
                            <div class="header__dropdow--content">
                                <div class="header--account">
                                    <p>Đăng nhập tài khoản</p>
                                    <p>Nhập email và mật khẩu của bạn</p>
                                </div>
                                <div class="header--accountAction" >
                                <form method="get">
                                    <input type="text" placeholder="Email">
                                        <br>
                                        <input type="text" placeholder="Mật khẩu">
                                        </form>
                                        <button class="btnAccount" >Đăng nhập</button>
                                        <p>Khách hàng mới?
                                            <a href="#" data-toggle="modal" data-target="#modalAccount">Tạo tài khoản</a></p>
                                        <p>Quên mật khẩu <a href="#">Khôi phục mật khẩu</a></p>
                                    </form>
                                
                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->
                <div class="header--action__cart dropdown " style="color: white;">
                    
                    <?php
                        if(!isset($_SESSION['cart'])) {
                            $_SESSION['cart'] = [];
                        }
                        $count = 0;
                        foreach($_SESSION['cart'] as $item) {
                            $count += $item['num'];
                        }
                    ?>
                   <span class="cart-icon">      
                            <span class="cart-count">
                                <?=$count?>
                            </span>  
                            <a href="cart.php">
                                <i class=" fa fa-shopping-cart"></i>
                            </a>
                    </span>


                </div>
        
        </nav>
</header>
<!-- HEADER FIXED -->
<header id="headerFixed">
<nav class="navbar navbar-expand-xl " id="nav">
            <a class="navbar-brand " href="#">HANNA COFFE</a>
            <button style="color: white;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavCoffe" aria-controls="navbarNavCoffe" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                <i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavCoffe">
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a class="nav-link " href="index.php">Trang chủ </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="allProduct.php" >Sản phẩm</a>
                    </li>
                        <a class="nav-link" href="contact.php">Liên hệ</a>
                    </li>
                </ul>
            </div>
            <div class="header--action pr-2">
                <div class="header--action__cart dropdown " style="color: white;">
                    
                    <?php
                        if(!isset($_SESSION['cart'])) {
                            $_SESSION['cart'] = [];
                        }
                        $count = 0;
                        foreach($_SESSION['cart'] as $item) {
                            $count += $item['num'];
                        }
                    ?>
                   <span class="cart-icon">      
                            <span class="cart-count">
                                <?=$count?>
                            </span>  
                            <a href="cart.php">
                                <i class=" fa fa-shopping-cart"></i>
                            </a>
                    </span>


                </div>
        
        </nav>
        
    </header>

    <!-- CAROUSELL -->
    <section class="carouselCoffe mb-2 ">
        <div id="carouselCoffe" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselCoffe" data-slide-to="0" class="active"></li>
                <li data-target="#carouselCoffe" data-slide-to="1"></li>
                <li data-target="#carouselCoffe" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                     <!-- <img class="d-block w-100" src="./images/imgTrangChu/carousel2.jpg" alt="First slide ">  -->
                    <div class="movieCarousel__overlay"></div>
                    <div class="container carousel-caption d-none d-md-block ">
                        <div class="col-12 col-lg-6 p-0">
                            <h4 class="animate__animated animate__fadeInDown">CÀ PHÊ</h4>
                            <p class="animate__animated animate__fadeInUp">Những hạt cà phê đến từ vùng cao nguyên Việt Nam, Hanna hân hạnh giới thiệu dòng sản phẩm cà phê đậm đà, tinh tế</p>
                        </div>

                    </div>
                </div>
                <div class="carousel-item ">
                    <!-- <img class="d-block w-100 " src="./images/imgTrangChu/carousel4.jpg " alt="Second slide "> -->
                    <div class="movieCarousel__overlay"></div>
                    <div class="container carousel-caption d-none d-md-block ">

                        <div class="col-12 col-lg-9 p-0">
                            <h4 class="animate__animated animate__fadeInDown">KHÔNG GIAN SANG TRỌNG</h4>
                            <p class="animate__animated animate__fadeInUp">Không chỉ là để ngồi nói chuyện, đây còn là nơi lưu giữ nhiều kí ức thanh xuân</p>
                        </div>

                    </div>
                </div>
                <div class="carousel-item ">
                    <!-- <img class="d-block w-100 " src="./images/imgTrangChu/carousel5.jpg " alt="Third slide "> -->
                    <div class="movieCarousel__overlay"></div>
                    <div class="container carousel-caption d-none d-md-block ">
                        <div class="col-12 col-lg-8 p-0">
                            <h4 class="animate__animated animate__fadeInDown">HANNA LUÔN BÊN BẠN</h4>
                            <p class="animate__animated animate__fadeInUp">Hãy dành những giây phút yêu thương nhất cho người thân mình</p>
                        </div>

                    </div>
                </div>
            </div>
           

        </div>
    </section>
   
         <!-- btn add cart -->
    <style>
        .menu-list {
            position: absolute;
            background: #222;
            list-style: none;
            opacity: 0.5;
            min-width: 180px;
            top: 45px;
                left: 400px;
                padding-left: 10px;
                margin: 10px 0;
                color: white;
            
        }
       
        #nav>li:hover,
        .menu-list>li:hover {
            background: #ddd;
        }
        
        .menu-list {
            display: none;
        }
        
        #nav>li:hover .menu-list {
            display: block;
        }
        .nav_item--product:hover .menu-list{
            display: block;
        }

      
        /* cart */
        .cart-icon{
        position: fixed;
        top: 35%;
        right: 15px;
        cursor: pointer;
        }
        .cart-icon:hover{
            opacity: 0.8;
        }
        .cart-count{
            padding: 4px 6px;
            background-color: red;
            color: #fff;
            border-radius: 50%;
            font-size: 12px;
            position: fixed;
            margin-left: -12px;
            margin-top: -15px;
        }
        .cart-icon a{
            text-decoration: none; 
        }
       
       
    </style>


    <!-- Dùng chung -->
    <!-- CSS dùng cho mục ADD TO CART -->
    <style type="text/css">
        .menu-list{
            position: absolute;
            background: #222;
            list-style: none;
            opacity: 0.9;
            min-width: 180px;
            top: 100%;
            left: 0px;
        }
        #nav > li:hover,
        .menu-list > li:hover{
            background: #ddd;
        }
        .menu-list{
            display: none;
        }
        #nav > li:hover .menu-list{
            display: block;
        }
        .btnAddcart {
            background-color: white;
            color: #333333;
            font-weight: bold;
            padding: 10px 8px;
            border: 1px solid #d4d6d8;
            border-radius: 10px;
            display: block;
            margin: auto;
            transition: all 0.5s;
        }

        .spacingPro button:hover {
            background: #333333;
            color: #fff;
        }
    </style>

   
   
         <!-- JQUERY JS   -->
     <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
        <!-- JQUERY JS   -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- BS JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>

    <!-- VENOBOX JS     -->
    <!-- <script src="./JS/venobox.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     $('.venobox').venobox();
        // });
    </script> -->

    <!-- OWL JS
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                1200: {
                    items: 3,
                    nav: true,
                    loop: false
                }
            }
        })
    </script> -->

    <!-- MAIN JS -->
    <script>
        window.onscroll = function() {
            //Code tạo hiệu ứng xuất hiện thanh màu đen khi scroll
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                // translate(-50%,0)
                document.getElementById("headerFixed").style.transform = "translate(-50%,0)";
            } else {
                document.getElementById("headerFixed").style.transform = "translate(-50%,-100%)";
            }
        }
    </script>
     <!-- JS dùng chung: thêm vào giỏ hàng  -->
     <script type="text/javascript">
	function addCart(productId, num) { 
		$.post('api/ajax_request.php',{
			'action': 'cart',
			'id': productId,
			'num': num,    
		}, function(data) {
			location.reload()
		})
	}
</script>
</body>

</html>