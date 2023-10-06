
<?php
        require_once('layouts/header.php');

        // sql thông tin ng mua
        $sql = "SELECT * FROM orders ORDER BY orders.id DESC";
	    $orderItem = executeResult($sql, true);

      //sql thông tin chi tiết đơn hàng đã mua

?>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/payShip.css">


    <div class="payShip">
        <div class="row">
            <div class="col-8">
                <div class="payLeft section">
                    <h2>HANNA COFFE</h2>
                    <div class="payShip--header">
                        <div class="icon--check">
                            <i class="fa fa-check"></i>
                        </div>
                        <h4>Đặt hàng thành công</h4>
                      
                        <p>Cảm ơn bạn đã mua hàng</p>
                    </div>
                    <div class="payShip--content">
                        <div class="payShip--box">
                            <h4>Thông tin đơn hàng</h4>                       
                            <div class="payShip--infor">
                                <?php 
                                echo ' 
                                <h6>Mã đơn hàng 
                                <span>
                                  '.$orderItem['id'].'
                                </span> </h6>
                                <p>Họ tên: <span> '.$orderItem['fullname'].'</span></p>
                                <p>Số điện thoại: <span> '.$orderItem['phone'].'</span></p>
                                <p>Địa chỉ: <span>'.$orderItem['address'].'</span></p> '
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="payShip--footer">
<!-- 
                        <p>Cần hỗ trợ?
                            <a href="http://" target="_blank" rel="noopener noreferrer">Liên hệ với chúng tôi</a>
                        </p>-->

                        <a href="./index.php" class="btnComeback" >Tiếp tục mua hàng</a>

                    </div>
                </div>

            </div>
          
        </div>

    </div>

    <?php
        require_once('layouts/footer.php');
?>
