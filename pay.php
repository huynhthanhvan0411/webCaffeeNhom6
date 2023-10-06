<?php
        require_once('layouts/header.php');

        $sql = "select Product.*, Category.name as category_name from Product 
        left join Category on
        Product.category_id = Category.id where category.deleted = 0 and Product.deleted = 0
        order by Product.updated_at desc";
	    $lastestItems = executeResult($sql);
?>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/pay.css">
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
            width: 100%;
        }
        .btn-pay:hover{
            background: white;
        }
        
    </style>

     <div class="payInfor mt-5">
        <div class="row">
            <div class="col-6 ">
                <div class="payLeft section">
                    <h2>HANNA COFFE</h2>
                    <div class="step--header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Thông tin giao hàng</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#payBill">Phương thức thanh toán</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Data</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="step--Infor">
                        <h5>Thông tin giao hàng</h5>
                        <p>Bạn đã có tài khoản?
                            <a href="#" target="_blank" rel="noopener noreferrer">Đăng nhập</a>
                        </p>
                     
                        <form method="POST"  onsubmit="return completeCheckout();">
                            <div class="">
                                <input type="text" id="fullname" name="fullname" placeholder="FULL NAME">
                                <input type="email" id="email" name="email" placeholder="EMAIL">
                                <input type="tel" id="phone" name="phone" placeholder="PHONE NUMBER" >
                                <div class="stepInfor--address" style="width:50%; padding: 0 5px;">
                                    <div>
                                        <select class="form-select " id="city" aria-label=".form-select-sm">
                                                <option value="" selected>Chọn tỉnh thành</option>           
                                                </select>
                                    </div>
                                    <div>
                                        <select class="form-select " id="district" aria-label=".form-select-sm">
                                                <option value="" selected>Chọn quận huyện</option>
                                                </select>
                                    </div>
                                    <div>
                                        <select class="form-select " id="ward" aria-label=".form-select-sm">
                                                <option value="" selected>Chọn phường xã</option>
                                                </select>
                                    </div>
                                </div>
                                <input type="text" id="address" name="address" placeholder="Địa chỉ cụ thể">
                                <textarea rows="4" type="text" class="form-info" id="note" name="note" style="width:100%" placeholder="NOTE" ></textarea>
                            </div>
                            <a href="payComplete.php">
                                <button class="btn-pay">
                                <i class="ti-check" style="padding-right: 5px"></i>PAY
                                </button>
                            </a>
                        </form>
                    </div>
  
                </div>
            </div>
          
            <div class="col-6 pr-5">
                <table class="table table-striped">
                <tr>
               
                <th>STT</th>
                <th>PHOTO</th>
                <th>PRODUCT</th>
                <th >PRICE</th>
                <th >QUANTITY</th>
                <th>TOTAL</th>
                        <!-- <th></th> -->
             </tr>
            <?php
                    if(!isset($_SESSION['cart'])) {
                            $_SESSION['cart'] = [];
                    }
                    $index = 0;
                    foreach($_SESSION['cart'] as $item) {
                            echo '<tr style="text-align: center;">
                                    <td>'.(++$index).'</td>
                                    <td><img src="'.$item['thumbnail'].'" style="height: 80px" alt=""></td>
                                    <td>'.$item['title'].'</td>
                                    <td>'.number_format($item['discount']).' VND</td>
                                    <td class ="edit" >
                                        <button class="btn-edit" 
                                        onclick="addMoreCart('.$item['id'].', -1)" >-</button>

                                        <input type="number" value="'.$item['num'].'"  class="form-control"
                                        style=" display: inline-block;width: 25%; margin: 0px;" 
                                        onchange="fixCartNum('.$item['id'].')"  id="num_'.$item['id'].'">
                                        
                                        <button class="btn-edit" 
                                        onclick="addMoreCart('.$item['id'].', 1)" >+</button>  
                                    </td>
                                    <td>'.number_format($item['discount'] * $item['num']).' VND</td>
                                </tr>';
                    }
                ?>          
        </table>
            </div>
            
    </div>

    <!-- js check null info -->
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
                        window.open('payComplete.php', '_self');
                    })

                    return false;
                }
            </script>

      <!-- AJAX SELECT ADDRESS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Id);
            }
            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Id === this.value);

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name, k.Id);
                    }
                }
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Id);
                    }
                }
            };
        }
    </script>

<?php
        require_once('layouts/footer.php');
?>
