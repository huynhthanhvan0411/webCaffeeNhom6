<?php
        require_once('layouts/header.php');
        $category_id = getGet('id');

        if($category_id == null || $category_id == '') {
            $sql = "select Product.*, Category.name as category_name 
            from Product left join Category on
            Product.category_id = Category.id
            order by Product.updated_at desc limit 0,12 ";
        }else {
            $sql = "select Product.*, Category.name as category_name 
            from Product left join Category on
            Product.category_id = Category.id where Product.category_id = $category_id
            order by Product.updated_at desc limit 0,12 ";
        }
	    $lastestItems = executeResult($sql);
       
?>

    <style type="text/css">
        a{
            color:white;
            text-decoration:none;
        }
        a:hover{
            text-decoration:none;   
        }
      h2{
        margin:100px 0 50px 0;
        text-transform: uppercase;
        font-weight: bold;
        color: chocolate;
        text-align: center;
      }
      .btn--cart{
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
      }
      .btn--cart:hover{
        color: white;
        
      }
      .table td {
        vertical-align: unset;
        border-top: none;
      }
      
      .table th{
        text-transform: uppercase;
        font-weight: bold;
        color: #333;
        font-size: 1.125rem;;
        background-color: #6c7ae0;
     
        
      }
      .table tr:nth-child(even){
        background-color: #f8f6ff;
      }
      .table tr{
        background-color: white;
      }
      .form-control{
        background-color: white;
      }
      /* .form-control input:nth-child(even){
        background-color: #f8f6ff;
      } */
      
    </style>

    <div class="container-fluid">
        <div class="contentCart">
            <div class="titlecart">
                <h2>cart</h2>
        
            </div>
            <div class="cart__list">
                <table class="table ">
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
                                    echo '<tr >
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
            <button  class="btn--cart">
                <a href="checkout.php">Tiếp tục đến phương thức thanh toán</a>
            </button>
        </div>
    </div>
    

        <!-- js them gio hang -->
        <script type="text/javascript">
            function addMoreCart(id, delta) {
                num = parseInt($('#num_' + id).val())
                num += delta;
                $('#num_' + id).val(num)

                updateCart(id, num)
            }

            function fixCartNum(id) {
                $('#num_' + id).val(Math.abs($('#num_' + id).val()))

                updateCart(id, $('#num_' + id).val())
            }

            function updateCart(productId, num){
                $.post('api/ajax_request.php', {
                    'action': 'update_cart',
                    'id': productId,
                    'num': num
                }, function(data) {
                    location.reload()
                })
            }
        </script>
    <?php
        require_once('layouts/footer.php');
    ?>
    