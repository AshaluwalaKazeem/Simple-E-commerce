<?php
    $product_id = 1;
    if($_GET){
        $product_id = $_GET['id'];
    }
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'kayode1k1';
    $dbname = 'datagate';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

    if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
    }
    $sql = 'SELECT * from product_list where id='. $product_id;
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql);
    $sql2 = 'SELECT * from product_list';
    $result3 = mysqli_query($conn, $sql2);

    if($_POST){


    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_brand = $_POST['product_brand'];
    $product_price_current = $_POST['product_price_current'];
    $product_price_previous = $_POST['product_price_previous'];
    $product_promotion = $_POST['product_promotion'];
    $product_description_short = $_POST['product_description_short'];
    $product_description_long = $_POST['product_description_long'];
    $product_specification = $_POST['product_specification'];
    $product_stock_value = $_POST['product_stock_value'];
    $product_image1 = $_POST['product_image1'];
    $product_image2 = $_POST['product_image2'];
    $product_image3 = $_POST['product_image3'];
    $product_image4 = $_POST['product_image4'];
    $product_quantity = $_POST['product_quantity'];

        $sqlInsert= "INSERT INTO users_cart (product_id, product_name, product_brand, product_price_current, product_price_previous, product_promotion, product_description_short, product_description_long, product_specification , product_stock_value, product_image1, product_image2, product_image3, product_image4, product_quantity)  VALUES (
    '$product_id',
    '$product_name',
    '$product_brand',
    '$product_price_current',
    '$product_price_previous',
    '$product_promotion',
    '$product_description_short',
    '$product_description_long',
    '$product_specification',
    '$product_stock_value',
    '$product_image1',
    '$product_image2',
    '$product_image3',
    '$product_image4',
    '$product_quantity') ";
        if (!mysqli_query($conn, $sqlInsert)) {
            echo "not inserted";
        }
        else{
            header("location: shop-cart.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Datagate Product Details">
    <meta name="keywords" content="Datagate, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datagate | Product Details</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <?php require('header.php') ?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="#">All </a>
                        <?php
                            if (mysqli_num_rows($result2) > 0) {
                                while($row2 = mysqli_fetch_assoc($result2)) { ?>
                                    <span><?php echo $row2["name"] ?></span>
                                <?php }
                            } else {
                              echo "0 results";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <?php
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) { ?>

                            <div class="col-lg-6">
                                <div class="product__details__pic">
                                    <div class="product__details__pic__left product__thumb nice-scroll">
                                        <a class="pt active" href="#product-1">
                                            <img src="img/product/<?php echo $row["image1"] ?>" alt="">
                                        </a>
                                        <a class="pt" href="#product-2">
                                            <img src="img/product/<?php echo $row["image2"] ?>" alt="">
                                        </a>
                                        <a class="pt" href="#product-3">
                                            <img src="img/product/<?php echo $row["image3"] ?>" alt="">
                                        </a>
                                        <a class="pt" href="#product-4">
                                            <img src="img/product/<?php echo $row["image4"] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="product__details__slider__content">
                                        <div class="product__details__pic__slider owl-carousel">
                                            <img data-hash="product-1" class="product__big__img" src="img/product/<?php echo $row["image1"] ?>" alt="">
                                            <img data-hash="product-2" class="product__big__img" src="img/product/<?php echo $row["image2"] ?>" alt="">
                                            <img data-hash="product-3" class="product__big__img" src="img/product/<?php echo $row["image3"] ?>" alt="">
                                            <img data-hash="product-4" class="product__big__img" src="img/product/<?php echo $row["image4"] ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product__details__text">
                                    <form action="" method="post">
                                        <input name="product_id" type="text" value="<?php echo $row["id"] ?>" hidden>
                                        <input name="product_name" type="text" value="<?php echo $row["name"] ?>" hidden>
                                        <input name="product_brand" type="text" value="<?php echo $row["brand"] ?>" hidden>
                                        <input name="product_price_current" type="text" value="<?php echo $row["price_current"] ?>" hidden>
                                        <input name="product_price_previous" type="text" value="<?php echo $row["price_previous"] ?>" hidden>
                                        <input name="product_promotion" type="text" value="<?php echo $row["promotion"] ?>" hidden>
                                        <input name="product_description_short" type="text" value="<?php echo $row["description_short"] ?>" hidden>
                                        <input name="product_description_long" type="text" value="<?php echo $row["description_long"] ?>" hidden>
                                        <input name="product_specification" type="text" value="<?php echo $row["specification"] ?>" hidden>
                                        <input name="product_stock_value" type="text" value="<?php echo $row["stock_value"] ?>" hidden>
                                        <input name="product_image1" type="text" value="<?php echo $row["image1"] ?>" hidden>
                                        <input name="product_image2" type="text" value="<?php echo $row["image2"] ?>" hidden>
                                        <input name="product_image3" type="text" value="<?php echo $row["image3"] ?>" hidden>
                                        <input name="product_image4" type="text" value="<?php echo $row["image4"] ?>" hidden>
                                        <h3><?php echo $row["name"] ?> <span>Brand: <?php echo $row["brand"] ?></span></h3>
                                        <div class="product__details__price">$ <?php echo $row["price_current"] ?> <span>$ <?php echo $row["price_previous"] ?></span></div>
                                        <p><?php echo $row["description_short"] ?>.</p>
                                        <div class="product__details__button">
                                            <div class="quantity">
                                                <span>Quantity:</span>
                                                <div class="pro-qty">
                                                    <input name="product_quantity" type="text" value="1">
                                                </div>
                                            </div>
                                            <button style="background: transparent; border: 0 !important;"><a class="cart-btn"><span class="icon_cart_alt"></span> Add to cart</a></button>
                                        </div>
                                    </form>
                                    <div class="product__details__widget">
                                        <ul>
                                            <li>
                                                <span>Available color:</span>
                                                <div class="color__checkbox">
                                                    <label for="red">
                                                        <input type="radio" name="color__radio" id="red" checked>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label for="black">
                                                        <input type="radio" name="color__radio" id="black">
                                                        <span class="checkmark black-bg"></span>
                                                    </label>
                                                    <label for="grey">
                                                        <input type="radio" name="color__radio" id="grey">
                                                        <span class="checkmark grey-bg"></span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <span>Promotions:</span>
                                                <?php echo $row["promotion"] ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="product__details__tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                            <h6>Description</h6>
                                            <p><?php echo $row["description_short"] ?></p>
                                            <p><?php echo $row["description_long"] ?></p>
                                        </div>
                                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                                            <h6>Specification</h6>
                                            <p><?php echo $row["specification"] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        <?php }
                    } else {
                      echo "0 results";
                    }
                ?>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                <?php
                    if (mysqli_num_rows($result3) > 0) {
                        while($row3 = mysqli_fetch_assoc($result3)) { ?>
                           <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $row3["image1"] ?>">
                                        <?php if($row3["stock_value"] == 'new'){ ?>
                                            <div class="label new"><?php echo $row3["stock_value"] ?></div>
                                            <?php }
                                        if($row3["stock_value"] == 'Out of stock'){ ?>
                                            <div class="label stockout"><?php echo $row3["stock_value"] ?></div>
                                            <?php }
                                        if($row3["stock_value"] == 'Sale'){ ?>
                                            <div class="label sale"><?php echo $row3["stock_value"] ?></div>
                                            <?php } ?>
                                        <ul class="product__hover">
                                            <li><a href="img/product/<?php echo $row3["image1"] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                            <li><a href="./product-details.php?id=<?php echo $row3["id"] ?>"><span class="icon_info_alt"></span></a></li>
                                            <li><a href="./shop-cart.php"><span class="icon_cart_alt"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#"><?php echo $row3["name"] ?></a></h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product__price">$ <?php echo $row3["price_current"] ?><span>$ <?php echo $row3["price_previous"] ?></span></div>
                                    </div>
                                </div>
                            </div>
                      <?php   }
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <?php require('footer.php') ?>

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>