<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'kayode1k1';
    $dbname = 'datagate';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

    if(! $conn ) {
       die('Could not connect: ' . mysqli_error());
    }

    // GEt all Category Content
    $sqlGetAllMainCategory = 'SELECT * from product_main_category';
    $resultGetAllMainCategory = mysqli_query($conn, $sqlGetAllMainCategory);
    if ($_POST) {
        $category_name = $_POST['category_name_input'];
        $product_main_category_id = $_POST['product_main_category_id'];
        $sql = "INSERT INTO product_category (category_name, main_category_id) VALUES ('$category_name', '$product_main_category_id')";

        if ($conn->query($sql) === TRUE) {
            header("location: ./admin.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Datagate | Create New Sub Category</title>

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
                        <span>Create New Sub Product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Admin Section Begin -->
    <section class="shop spad">
        <div class="container">
            <form action="" class="checkout__form" method="post">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Category Sub Name</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                <p>Product Main Category <span>*</span></p>
                                <select name="product_main_category_id" required class="margin-top-1">
                                    <option disabled>Select Main Category For This Sub Category</option>
                                    <?php
                                    if (mysqli_num_rows($resultGetAllMainCategory) > 0) {
                                    while ($rowGetAllCategory = mysqli_fetch_assoc($resultGetAllMainCategory)) { ?>
                                        <option value="<?php echo $rowGetAllCategory["id"] ?>"><?php echo $rowGetAllCategory["main_category"] ?></option>
                                    <?php   }
                                    }
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Category Sub Name <span>*</span></p>
                                    <input type="text" name="category_name_input">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input padding-left-and-right-3">
                                        <button type="submit" style="background: transparent; border: 0 !important; width: 100%;"><a class="button-link-default margin-top-1 col-12 text-center ">Submit</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Admin Section End -->
    <?php require('footer.php') ?>

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