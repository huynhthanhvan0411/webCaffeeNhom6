    <?php
       require_once('layouts/header.php');

        if(!empty($_POST)) {
            //set time vn
            date_default_timezone_set("Asia/Ho_Chi_Minh");   
            
            $firstname = getPost('firstname');
            $lastname = getPost('lastname');
            $email = getPost('email');
            $phone = getPost('phone');
            $subject_name = getPost('subject_name');
            $note = getPost('note');
            $created_at = $updated_at= date('Y-m-d H:i:s');

            $sql = "insert into feedback(firstname, lastname, email, phone, subject_name, note, created_at, updated_at, status)
            values('$firstname', '$lastname', '$email', '$phone', '$subject_name', '$note', '$created_at', '$updated_at', 0)";
            execute($sql);
        }
        
    ?>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/pay.css">

    <!-- Product  -->
    <div id="payInfor mt-5 ">
            <div class="container-fluid">
                <h2 class="title-product">KIỂM TRA ĐƠN HÀNG</h2> 
                <form method="post">       
                    <div class="row">
                       
                    
                        <div class="col-6">
                            <div class="info__map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2036281491623!2d105.79606831490254!3d20.984473094664672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc6c44959d5%3A0xd7edcdb815622dd1!2zNTQgUC4gVHJp4buBdSBLaMO6YywgVGhhbmggWHXDom4gTmFtLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1668931393106!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>

                        <div class="col-6 ">
                            <div class="payLeft " style="padding-left: 0;">
                                <div class="step--Infor"> 
                                    <form method="POST">
                                        <div class="">
                                            <input required="true" type="text" id="firstname" name="firstname" placeholder="FIRST NAME">

                                            <input required="true" type="text" id="lastname" name="lastname" placeholder="LAST NAME">

                                            <input required="true" type="email" id="email" name="email" placeholder="EMAIL" >

                                            <input required="true" type="tel" id="phone" name="phone" placeholder="PHONE">

                                            <input required="true" type="text" id="subject_name" name="subject_name" placeholder="CHỦ ĐỀ">
                                            <textarea required ="true" type="text"  id="note" name="note" cols="30" rows="10" placeholder="NỘI DUNG" style="width:100%;"></textarea>

                                            <a href="checkout.php">
                                                <button class="btn-pay">
                                                <i class="ti-check" style="padding-right: 5px"></i>SEND FEEDBACK
                                                </button>
                                            </a>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                    </div>
                </form> 

            </div>
    </div>
    </div>
        
    <?php
        require_once('layouts/footer.php');
    ?>
    