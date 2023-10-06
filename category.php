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
   

  <!-- PRODUCTLIST -->
  <section class="productList  ">
        <div class="productList__section">
            <div class="container">
                <ul>
                    <li>
                        <a href="#">Trang chủ</a>
                    </li>
                    <li>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Danh mục</a>
                    </li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>
                        <a href="#">Tất cả sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- PRODUCTMENU-->
    <section class="productMenu  sliderBar-col">
        <div class="section">
            <div class="container-fluid">
                <div class="productMenu__heading">
                    <h2>Thực đơn quán</h2>
                </div>
                <div class="productMenu__content">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-2 col-xl-2 productMenu__nav">
                            <div class="productMenu--orders">
                                <ul>
                                <?php
                                        foreach($menuItems as $item) {
                                            
                                            echo'<li><a href="category.php?id='.$item['id'].'">'
                                            .$item['name'].'</a></li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12  col-lg-10 col-xl-10  productMenu__prod ">
                            <div class="productMenu__odersBlock">                 
                                <div class="row spacingPro">
                                        <?php
                                        foreach ($lastestItems as $item) {
                                            echo'<div class="col-3 col-items ">
                                                <a href="detail.php?id='.$item['id'].'" style=" text-decoration: none; color: black;">
                                                    <img src="'.$item['thumbnail'].'" alt="" class="product-img">                        
                                                    <h3 class="name-items">'.$item['title'].'</h3>                     
                                                    <h4 class="price-items">'.number_format($item['discount']).'VND</h4>
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
            </div>
        </div>


    </section>
    
    <?php
        require_once('layouts/footer.php');
    ?>
    