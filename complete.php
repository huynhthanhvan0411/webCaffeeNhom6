<?php
        require_once('layouts/header.php');
    ?>

    <style type="text/css">
        #product{
            margin: 60px 0px;
            text-align: center;
            padding: 50px 38px 0px;
        }
        .complete-form{
            text-align: center;
            font-weight: bold;
            color:chocolate;
            font-size:1.75rem;
        }
        .btn-pay{
            border-radius: 4px;
            font-weight: 500;
            padding: 1.4em 1.7em;
            border: none;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
            position: relative;
            background: #338dbc;
            color: white;
            text-decoration: none;
            text-transform: uppercase;
            margin:20px 0 0 0 ;
            width:16%;
        }
        .btn-pay:hover{
            color: white;
        }
    </style>

    <!-- Content -->
    <div id="content">
        <!-- Product  -->
        <div id="product">
            <h1 class="complete-form">ĐẶT HÀNG THÀNH CÔNG</h1>

            <!-- <a href="index.php"><button class="btn-success" style="width:22%; margin-bottom: 30px; background: black; color: #cfbb99">CONTINUE SHOPPING</button></a> -->
            <a href="index.php">
                <button class="btn-pay">
                <i class="ti-check" style="padding-right: 5px"></i>Tiếp tục mua hàng
                </button></a>
        </div>
        <hr>
        
    <?php
        require_once('layouts/footer.php');
    ?>
    