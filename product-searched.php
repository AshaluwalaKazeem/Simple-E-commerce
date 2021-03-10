<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'kayode1k1';
$dbname = 'datagate';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}
$product_searched = "";
if ($_GET) {
    $product_searched = $_GET['product-info'];

    $query = $_GET['product-info'];
    // gets value sent over search form

    $min_length = 1;
    // you can set minimum length of the query if you want

    if (strlen($query) >= $min_length) { // if query length is more or equal minimum length then

        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;

        $query = mysqli_real_escape_string($conn, $query);
        // makes sure nobody uses SQL injection
        $sql = "SELECT * FROM product_list
			WHERE (`name` LIKE '%" . $query . "%') OR (`keyword` LIKE '%" . $query . "%')";
        $raw_results = mysqli_query($conn, $sql);
        // * means that it selects all fields,
        // product_list is the name of our table
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

    } else { // if query length is less than minimum
        echo "Minimum length is " . $min_length;
    }
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="datagate HomePage">
    <meta name="keywords" content="datagate, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>datagate | HomePage</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

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
    <?php require('header.php') ?>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Search / <? echo $product_searched ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Section End -->
    <div class="container">
        <div class="col-lg-4 col-md-8 col-sm-8" style="padding-top: 1em !important;">
            <div class="footer__newslatter">
                <form action="product-searched.php" method="GET">
                    <input name="product-info" type="text" placeholder="Search Product" value="<? echo $product_searched ?>" required>
                    <button type="submit" class="site-btn">Search</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Product Search List Begin -->
    <section class="product spad" style="padding-top: 0 !important; margin-top: 0 !important;">
        <div class="container">
            <div class="row no-padding-margin">
                <div class="col-lg-8 col-md-8 col-sm-12 no-padding-margin">
                    <div class="section-title ">
                        <h4>Product related to <? echo $product_searched ?></h4>
                    </div>
                </div>
            </div>
            <div class="row property__gallery">
                <?php
                if (mysqli_num_rows($raw_results) > 0) {
                    while ($row = mysqli_fetch_assoc($raw_results)) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $row["image1"] ?>">
                                    <?php if ($row["stock_value"] == 'new') { ?>
                                        <div class="label new"><?php echo $row["stock_value"] ?></div>
                                    <?php }
                                    if ($row["stock_value"] == 'Out of stock') { ?>
                                        <div class="label stockout"><?php echo $row["stock_value"] ?></div>
                                    <?php }
                                    if ($row["stock_value"] == 'Sale') { ?>
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
                } else {
                    echo "<h4>Product Not Found</h4>";
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Product Search List End -->
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