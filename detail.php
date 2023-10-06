<?php
        require_once('layouts/header.php');

        $productId = getGet('id');
        $sql = "select Product.*, Category.name as category_name from Product left join Category on
            Product.category_id = Category.id where Product.id = $productId";
        $product = executeResult($sql, true);

        $category_id = $product['category_id'];
        $sql = "select Product.*, Category.name as category_name from Product left join Category on
        Product.category_id = Category.id where Product.category_id = $category_id
        order by Product.updated_at desc limit 0,4   ";

	    $lastestItems = executeResult($sql);
    ?>
    <style>
        h2{
           margin-top:7rem;
           text-align: center;
           font-weight: bold;
           color:chocolate;
        }
        
        li{
            list-style: none;
            float: left;
        }
        .marginX{
            margin: 20px 0;
        }
        .titles{
            text-transform: uppercase; 
             margin-top: 20px;
             font-weight: bold;

        }
      
        .photo-detail img{
            width: 300px;
            height:350px;
        }
        .titles--detail{
            margin: 15px 0;
            text-transform: uppercase;
            font-weight: bold;
            color: #333;
        
        }
        .discount--detail{
            margin:15px 0;
            color: #e32124;
            font-size: 1.25rem;
            font-weight: bold;
        }
        .btnAddcart--detail{
            background-color: #096743;
            color: white;
            font-weight: bold; 
            padding: 10px 0px; 
            border: 1px solid #d4d6d8;
            border-radius: 10px;
            width:250px;
        }
    </style>
    <!-- content detail -->
   
    <h2>CHI TIẾT SẢN PHẨM</h2>
    <div class="container">
    <div class="row">
        <ul class="marginX" >
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="category.php?id=<?=$product['category_id']?>"> / <?=$product['category_name']?></a></li>
                            <li><a href=""> / <?=$product['title']?></a></li>
        </ul>

    </div>
    
        <div class="row ">
            <div class="col-4" style="padding-left: 80px;">
                <div class="photo photo-detail">
                    <img src="<?=$product['thumbnail']?>" alt="" class="info-img">
                </div>
            </div>
            <div class="col-8">
                <div class="intro info-detail">
                    <div class="titles marginX">
                        <h3 class="titles--detail" > <?=$product['title']?></h3>
                    </div>
                    <p class="discount--detail">
                        <?=number_format($product['discount'])?>VND
                    </p>
                    <p style=" text-decoration: line-through;">
                        <?=number_format($product['price'])?>VND
                    </p>
                    <div class="edit">                       
                        <button class="btn-edit" onclick="addMoreCart(-1)" >-</button>
                        <input type="number" name="num" class="form-control" step="1" value="1" 
                        onchange="fixCartNum()" >
                        <button class="btn-edit" onclick="addMoreCart(1)" >+</button>                                                   
                    </div>

                    <button class="btnAddcart--detail" onclick="addCart(<?=$product['id']?>, $('[name=num]').val())">
                        <i class="ti-shopping-cart"></i> ADD TO CART
                    </button>
                    <p style=" margin: 20px 0; font-size:1.15rem; font-weight:400;">
                    <?=$product['description']?>
                    </p>
                </div>  
            </div>
        </div>
    </div> 
    <hr>

    <!-- content related -->
    <div class="container-fluid">
        <!-- Product  -->
        <div id="product">
            <h2 class="title-product" style="font-size: 25px; color: #cfbb99;">related products</h2>
            <div class="productMenu__odersBlock">                 
                                <div class="row spacingPro">
                                        <?php
                                        foreach ($lastestItems as $item) {
                                            echo'<div class="col-3 col-items ">
                                                <a href="detail.php?id='.$item['id'].'" style=" text-decoration: none; color: black;">
                                                    <img src="'.$item['thumbnail'].'" alt="" class="product-img">                        
                                                    <h3 >'.$item['title'].'</h3>                     
                                                    <h4>'.number_format($item['discount']).'VND</h4>
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
        <hr>
    <!-- JS dùng thực hiện thêm số lượng sp -->
    <script type="text/javascript">

        function addMoreCart(delta) {
            num = parseInt($('[name=num]').val())
            num += delta;
            if(num < 1) num = 1;
            $('[name=num]').val(num)
        }

        function fixCartNum() {
            $('[name=num]').val(Math.abs($('[name=num]').val()))
        }

    </script>
    <?php
        require_once('layouts/footer.php');
    ?>
    
    