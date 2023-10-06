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
    <title>Product</title>
    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,700;1,300&family=Oswald:wght@300&display=swap" rel="stylesheet">

    <!-- FONT AWS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- BS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/layoutII.css">
     <!-- IMG FAVICON -->
     <link rel="icon" type="image/x-icon" href="assets/image/imgIcon.png">
</head>

<body>

        <!-- CSS MENU LIST -->
     <style>
            #header {
                position: fixed;
                top: 0;
                left: -50px;
                z-index: 2;
                width: 100%;
                background-color: #101010;
                margin-top: 0px;
                padding-top: 0px;
            }
      
                .menu-list {
                position: absolute;
                background: #222;
                list-style: none;
                opacity: 0.9;
                min-width: 180px;
                top: 57px;
                    left: 380px;
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
        top: 3%;
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
        /* css cho so luong */
        .edit{
        display:flex;
        align-items:center;
      }
      .btn-edit{
            background-color: white;
            border: 2px solid salmon;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            text-align: center;
            cursor: pointer;
        }
        .form-control{
            width: 150px;
            border: none;
            text-align:center;
        }
      
     </style>

    <!-- HEADER -->
    <header class="header container-fluid mx-5 " id="header">
        <nav class="navbar navbar-expand-xl ">
            <a class="navbar-brand " href="index.php">HANNA COFFE</a>
            <button style="color: white;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavCoffe" aria-controls="navbarNavCoffe" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                <i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavCoffe">
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a class="nav-link " href="index.php">Trang chủ </a>
                    </li>
                     <li class="nav-item nav_item--product">
                        <a class="nav-link"  href="allProduct.php" >Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Liên hệ</a>
                    </li>
                </ul>
            </div>
                <div class="header--action pr-2">
                    <div class="header--action__cart dropdown " style="color: red;">  

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

  

    


<!-- JS dùng chung: thêm vào giỏ hàng  -->
<script type="text/javascript">
	function addCart(productId, num) {
		$.post('api/ajax_request.php', {
			'action': 'cart',
			'id': productId,
			'num': num,
		},function(data) {
			location.reload()
		})
	}
</script>
    <!-- JQUERY JS   -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- BS JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>


</body>

</html>