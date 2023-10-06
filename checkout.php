<?php
        require_once('layouts/header.php');

        $category_id = getGet('id');

        if($category_id == null || $category_id == '') {
            $sql = "select Product.*, Category.name as category_name from Product left join Category on
            Product.category_id = Category.id
            order by Product.updated_at desc limit 0,12 ";
        }else {
            $sql = "select Product.*, Category.name as category_name from Product left join Category on
            Product.category_id = Category.id where Product.category_id = $category_id
            order by Product.updated_at desc limit 0,12 ";
        }
	    $lastestItems = executeResult($sql);
    ?>
    <style>
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
    margin:20px 0 0 0 ;
    width:100%;
}
.btn-pay:hover{
    color: white;
}
    .title-product{
            margin-top:7rem;
            text-align: center;
            font-weight: bold;
            color:chocolate;
            font-size:1.75rem;
    }
    </style>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/pay.css">
    <!-- Content -->
   
        <!-- Product  -->
        <div id="payInfor mt-5 ">
            <div class="container-">
            <h2 class="title-product">KIỂM TRA ĐƠN HÀNG</h2> 
            <form method="post" onsubmit="return completeCheckout();">       
                <div class="row">
                <div class="col-6 ">
                    <div class="payLeft section">
                        <div class="step--Infor"> 
                            <form method="POST"  onsubmit="return completeCheckout();">
                                <div class="">
                                    <input required="true" type="text" id="fullname" name="fullname" placeholder="FULL NAME">
                                    <input required="true" type="email" id="email" name="email" placeholder="EMAIL">
                                    <input required="true" type="tel" id="phone" name="phone" placeholder="PHONE NUMBER" >
                                    <input type="text" id="address" name="address" placeholder="Địa chỉ cụ thể">
                                    <textarea rows="4" type="text" class="form-info" id="note" name="note" style="width:100%" placeholder="NOTE" ></textarea>
                                </div>
                                <a href="complete.php">
                                    <button class="btn-pay">
                                    <i class="ti-check" style="padding-right: 5px"></i>PAY
                                    </button>
                                </a>
                            </form>
                        </div>
    
                    </div>
                </div>
            
                <div class="col-6 pr-5">
                    <table class="table ">
                        <tr>
                    
                            <th>STT</th>
                            <th>PHOTO</th>
                            <th>PRODUCT</th>
                            <th >PRICE</th>
                            <th >QUANTITY</th>
                                    <!-- <th></th> -->
                        </tr>
                        <?php
                                    if(!isset($_SESSION['cart'])) {
                                        $_SESSION['cart'] = [];
                                    }
                                    $index = 0;
                                    foreach($_SESSION['cart'] as $item) {
                                        echo '<tr style="text-align: left;">
                                                <td>'.(++$index).'</td>
                                                <td>'.$item['title'].'</td>
                                                
                                                <td>'.number_format($item['discount']).' VND</td>
                                                <td>'.$item['num'].'</td>
                                                <td>'.number_format($item['discount'] * $item['num']).' VND</td>
                                            </tr>'
                                            ;
                                    }
                                    $totalMoney = 0;
                                    foreach($_SESSION['cart'] as $item) {
                                        $totalMoney += $item['discount'] * $item['num'];
                                    }
                                    echo'<tr> 
                                    <td colspan="4" style="color:black; font-weight:bold;">Tổng tiền:</td>
                                    <td style="color:black; font-weight:bold;"> '. number_format($totalMoney).' VND</td>
                                    </tr>'
                                ?>    
                                <!-- <tr>dfsdfs</tr>      -->
                    </table>
                </div>
                
            </form> 

        </div>
       
            
            <script type="text/javascript">
                function completeCheckout() {
                    $.post('api/ajax_request.php', {
                        'action': 'checkout',
                        'fullname': $('[name=fullname]').val(),
                        'email': $('[name=email]').val(),
                        'phone': $('[name=phone]').val(),
                        'address': $('[name=address]').val(),
                        'note': $('[name=note]').val(),
                    }, function() {
                        window.open('complete.php', '_self');
                    })

                    return false;
                }
            </script>
            <hr>
        
    <?php
        require_once('layouts/footer.php');
    ?>
    