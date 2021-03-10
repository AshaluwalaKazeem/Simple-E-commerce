<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'kayode1k1';
    $dbname = 'datagate';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

    if(! $conn ) {
       die('Could not connect: ' . mysqli_error());
    }

    if($_GET) {
        $sqlGet = 'SELECT id, name, brand, price_current, price_previous, promotion, description_short, description_long, stock_value, image1, image2, image3, image4 FROM product_list WHERE category='. $_GET['id'];
    }else{
        $sqlGet = 'SELECT id, name, brand, price_current, price_previous, promotion, description_short, description_long, stock_value, image1, image2, image3, image4 FROM product_list';
    }

    // GEt all Category Content
    $sqlGetAllMainCategory = 'SELECT * from product_main_category';
    $resultGetAllMainCategory = mysqli_query($conn, $sqlGetAllMainCategory);

    $sqlGetAllCategory = 'SELECT * from product_category';
    $resultGetAllCategory = mysqli_query($conn, $sqlGetAllCategory);

    $result = mysqli_query($conn, $sqlGet);

    $sub_category_list_item;
    $sub_category_list = array();
    if (mysqli_num_rows($resultGetAllCategory) > 0) {
        while($rowGetAllCategory = mysqli_fetch_assoc($resultGetAllCategory)) { 
            $sub_category_list_item = array('id' => $rowGetAllCategory["id"], 'category_name' => $rowGetAllCategory["category_name"], 'main_category_id' => $rowGetAllCategory["main_category_id"],);
            $sub_category_list[$sub_category_list_item['id']] = $sub_category_list_item;
        }  
    }

    $main_category_list_item;
    $main_category_list = array();
    if (mysqli_num_rows($resultGetAllMainCategory) > 0) {
        while($rowGetAllMainCategory = mysqli_fetch_assoc($resultGetAllMainCategory)) { 
            $main_category_list_item = array('id' => $rowGetAllMainCategory["id"], 'main_category' => $rowGetAllMainCategory["main_category"]);
            $main_category_list[$main_category_list_item['id']] = $main_category_list_item;
        }  
    }

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Datagate Shop">
    <meta name="keywords" content="Datagate, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datagate | Shop</title>

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
            <a href="./index.php"><img src="img/logo.png" alt=""></a>
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
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <?php
                                        foreach ($main_category_list as $key => $row_value_main) {
                                            ?>
                                                <div class="card">
                                                        <div class="card-heading active">
                                                            <a data-toggle="collapse" data-target="<?php echo "#collapse".$row_value_main["id"] ?>"><?php echo $row_value_main["main_category"] ?></a>
                                                        </div>
                                                        <div id="<?php echo "collapse".$row_value_main["id"] ?>" class="collapse show" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <ul>
                                                                    <?php
                                                                        foreach ($sub_category_list as $key => $row_value) {
                                                                            if($row_value["main_category_id"] === $row_value_main["id"]){
                                                                                ?>
                                                                                    <li><a href="./shop.php?id=<?php echo $row_value['id'] ?>"><?php echo $row_value['category_name'] ?></a></li>
                                                                                <?php 
                                                                            }
                                                                        }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php 
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <?php
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) { ?>
                                   <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                                        <div class="product__item">
                                            <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $row["image1"] ?>">
                                                <?php if($row["stock_value"] == 'new'){ ?>
                                                    <div class="label new"><?php echo $row["stock_value"] ?></div>
                                                    <?php }
                                                if($row["stock_value"] == 'Out of stock'){ ?>
                                                    <div class="label stockout"><?php echo $row["stock_value"] ?></div>
                                                    <?php }
                                                if($row["stock_value"] == 'Sale'){ ?>
                                                    <div class="label sale"><?php echo $row["stock_value"] ?></div>
                                                    <?php } ?>
                                                <ul class="product__hover">
                                                    <li><a href="img/product/<?php echo $row["image1"] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                                    <li><a href="./product-details.php?id=<?php echo $row["id"] ?>"><span class="icon_info_alt"></span></a></li>
                                                    <li><a href="./shop-cart.php"><span class="icon_cart_alt"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__item__text">
                                                <h6><a href="#"><?php echo $row["name"] ?></a></h6>
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product__price">$ <?php echo $row["price_current"] ?><span>$ <?php echo $row["price_previous"] ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                              <?php   }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
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