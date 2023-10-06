<?php
  session_start();
  require_once($baseUrl.'../utils/utility.php');
  require_once($baseUrl.'../db/dbhelper.php');

  $user = getUserToken();
  if($user == null) {
    header('Location: '.$baseUrl.'authen/login.php');
    die();
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <!-- IMG FAVICON -->
    <link rel="icon" type="image/x-icon" href="../layouts/imgIcon.png">
  <style>
          ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        a{
          text-decoration: none;
        }
        
        li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }
        
        li a.active {
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
        }
        
        .col--menu li a:hover:not(.active) {
            background-color: #555;
            color: white;
            text-decoration: unset;
        }
        
        .accordion-body {
            padding: 0px;
        }
        .nav--logout{
            text-align: right;
            color: #555;
        }
        .nav--logout:hover{
            color: #4CAF50;
        }
        h2{
            font-size: 1.5rem;
            color: #000;
            margin-bottom: 20px;
        }
  </style>
</head>
<body>
<div class="container-fluid ">
        <div class="row">
            <div class="col-2 col--menu">
                <h2>Chao <?=$user['fullname']?></h2>
                <ul>
                <li><a class="active" href="<?=$baseUrl?>">Dashbroad</a></li>
                    <li><a  href="<?=$baseUrl?>category">Danh mục sản phẩm</a></li>
                    <li><a href="<?=$baseUrl?>product">Quản lí sản phẩm</a></li>
                    <li><a href="<?=$baseUrl?>order">Quản lí đơn hàng</a></li>
                    <li><a href="<?=$baseUrl?>feedback">Quản lí phản hồi</a></li>
                    <li><a href="<?=$baseUrl?>user">Quản lí người dùng</a></li>
                </ul>

            </div>
            <!-- // hiển thị chức năng -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <!-- hien thi tung chuc nang cua trang quan tri START-->
                <ul class="navbar-nav ">
                    <li class="nav-item text-nowrap">
                    <a class=" nav--logout" href="<?=$baseUrl?>authen/logout.php">Đăng Xuất</a>
                    </li>
                </ul>