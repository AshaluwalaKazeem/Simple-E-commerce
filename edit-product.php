<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'kayode1k1';
    $dbname = 'datagate';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
    $img1;
    $img2;
    $img3;
    $img4;

    if(! $conn ) {
       die('Could not connect: ' . mysqli_error());
    }

    // GEt all Category Content
    $sqlGetAllCategory = 'SELECT * from product_category';
    $resultGetAllCategory = mysqli_query($conn, $sqlGetAllCategory);

    if($_GET){
        $product_id_link = $_GET['id'];
        $sqlEditProd = 'SELECT * from product_list WHERE id='.$product_id_link;
        $resultEditProd = mysqli_query($conn, $sqlEditProd);
    }
    if ($_POST) {
        /*$category_name = $_POST['category_name-input'];
        $sql = "INSERT INTO product_category (category_name) VALUES ('$category_name')";

        if ($conn->query($sql) === TRUE) {
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }*/

        $target_dir_one = "img/product/";
        $target_file_one = $target_dir_one . basename($_FILES["product_image1"]["name"]);
        $uploadImageOne = 1;
        $imageFileType_one = strtolower(pathinfo($target_file_one,PATHINFO_EXTENSION));


        $target_dir_two = "img/product/";
        $target_file_two = $target_dir_two . basename($_FILES["product_image2"]["name"]);
        $uploadImagetwo = 1;
        $imageFileType_two = strtolower(pathinfo($target_file_two,PATHINFO_EXTENSION));


        $target_dir_three = "img/product/";
        $target_file_three = $target_dir_three . basename($_FILES["product_image3"]["name"]);
        $uploadImagethree = 1;
        $imageFileType_three = strtolower(pathinfo($target_file_three,PATHINFO_EXTENSION));


        $target_dir_four = "img/product/";
        $target_file_four = $target_dir_four . basename($_FILES["product_image4"]["name"]);
        $uploadImagefour = 1;
        $imageFileType_four = strtolower(pathinfo($target_file_four,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {

          $product_image1 = $_FILES['product_image1']['name'];
          if($product_image1 != null) {
            $check = getimagesize($_FILES["product_image1"]["tmp_name"]);
            if($check !== false) {
              //echo "File is an image - " . $check["mime"] . ".";
              // Check if file already exists
              if (file_exists($target_file_one)) {
                //echo "Sorry, file already exists.";
                $uploadImageOne = 0;
              }
              // Check file size
              if ($_FILES["product_image1"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadImageOne = 0;
              }
              // Allow certain file formats
              if($imageFileType_one != "jpg" && $imageFileType_one != "png" && $imageFileType_one != "jpeg"
              && $imageFileType_one != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadImageOne = 0;
              }
                  $uploadImageOne = 1;
              } else {
                  echo "File is not an image.";
                  $uploadImageOne = 0;
              }
              // Check if $uploadImageOne is set to 0 by an error
              if ($uploadImageOne == 0) {
                echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
              } else {
                if (move_uploaded_file($_FILES["product_image1"]["tmp_name"], $target_file_one)) {
                  //echo "The file ". basename( $_FILES["product_image1"]["name"]). " has been uploaded.";
                } else {
                  echo "Sorry, there was an error uploading your file.";
                }
              }
          }


          $product_image2 = $_FILES['product_image2']['name'];
          if($product_image2 != null) {
              // Check if image file is a actual image or fake image
              $check2 = getimagesize($_FILES["product_image2"]["tmp_name"]);
            if($check2 !== false) {    
              //echo "File is an image - " . $check2["mime"] . ".";
              // Check if file already exists
              if (file_exists($target_file_two)) {
                //echo "Sorry, file 2 already exists.";
                $uploadImagetwo = 0;
              }
              // Check file size
              if ($_FILES["product_image2"]["size"] > 500000) {
                echo "Sorry, your file 2 is too large.";
                $uploadImageTwo = 0;
              }
              // Allow certain file formats
              if($imageFileType_two != "jpg" && $imageFileType_two != "png" && $imageFileType_two != "jpeg"
              && $imageFileType_two != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed 2.";
                $uploadImagetwo = 0;
              }
                  $uploadImagetwo = 1;
              } else {
                  echo "File 2 is not an image.";
                  $uploadImagetwo = 0;
              }
            // Check if $uploadImagetwo is set to 0 by an error
              if ($uploadImagetwo == 0) {
                echo "Sorry, your file 2 was not uploaded.";
              // if everything is ok, try to upload file
              } else {
                if (move_uploaded_file($_FILES["product_image2"]["tmp_name"], $target_file_two)) {
                  //echo "The file 2". basename( $_FILES["product_image2"]["name"]). " has been uploaded.";
                } else {
                  echo "Sorry, there was an error uploading your file 2.";
                }
              }
          }

          $product_image3 = $_FILES['product_image3']['name'];
          if($product_image3 != null) {
              // Check if image file is a actual image or fake image
              $check3 = getimagesize($_FILES["product_image3"]["tmp_name"]);
              if($check3 !== false) {    
                //echo "File is an image - " . $check3["mime"] . ".";
                // Check if file already exists
                if (file_exists($target_file_three)) {
                  //echo "Sorry, file 3 already exists.";
                  $uploadImagethree = 0;
                }
                // Check file size
                if ($_FILES["product_image3"]["size"] > 500000) {
                  echo "Sorry, your file 3 is too large.";
                  $uploadImagethree = 0;
                }
                // Allow certain file formats
                if($imageFileType_three != "jpg" && $imageFileType_three != "png" && $imageFileType_three != "jpeg"
                && $imageFileType_three != "gif" ) {
                  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed 3.";
                  $uploadImagethree = 0;
                }
                    $uploadImagethree = 1;
                } else {
                    echo "File 3 is not an image.";
                    $uploadImagethree = 0;
                }
              // Check if $uploadImagethree is set to 0 by an error
                if ($uploadImagethree == 0) {
                  echo "Sorry, your file 3 was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                  if (move_uploaded_file($_FILES["product_image3"]["tmp_name"], $target_file_three)) {
                    //echo "The file 3". basename( $_FILES["product_image3"]["name"]). " has been uploaded.";
                  } else {
                    echo "Sorry, there was an error uploading your file 3.";
                  }
                }
          }

          if (mysqli_num_rows($resultEditProd) > 0) {
            while($row = mysqli_fetch_assoc($resultEditProd)) { 
              $img1 = $row['image1'];
              $img2 = $row['image2'];
              $img3 = $row['image3'];
              $img4 = $row['image4'];
              $price_previous = $row['price_current'];
            }
          }

          $product_image4 = $_FILES['product_image4']['name'];
          if($product_image4 != null) { 
          
            // Check if image file is a actual image or fake image
            $check4 = getimagesize($_FILES["product_image4"]["tmp_name"]);
            if($check4 !== false) {    
              //echo "File is an image - " . $check4["mime"] . ".";
              // Check if file already exists
              if (file_exists($target_file_four)) {
                //echo "Sorry, file 4 already exists.";
                $uploadImagefour = 0;
              }
              // Check file size
              if ($_FILES["product_image4"]["size"] > 500000) {
                echo "Sorry, your file 4 is too large.";
                $uploadImagefour = 0;
              }
              // Allow certain file formats
              if($imageFileType_four != "jpg" && $imageFileType_four != "png" && $imageFileType_four != "jpeg"
              && $imageFileType_four != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed 4.";
                $uploadImagefour = 0;
              }
                  $uploadImagefour = 1;
              } else {
                  echo "File 4 is not an image.";
                  $uploadImagefour = 0;
              }
            // Check if $uploadImagefour is set to 0 by an error
              if ($uploadImagefour == 0) {
                echo "Sorry, your file 4 was not uploaded.";
              // if everything is ok, try to upload file
              } else {
                if (move_uploaded_file($_FILES["product_image4"]["tmp_name"], $target_file_four)) {
                  //echo "The file 4". basename( $_FILES["product_image4"]["name"]). " has been uploaded.";
                } else {
                  echo "Sorry, there was an error uploading your file 4.";
                }
              }
          }


          






          

            if($uploadImageOne != 0 && $uploadImagetwo != 0 && $uploadImagethree != 0 && $uploadImagefour != 0){
                $product_category = $_POST['product_category'];
                $product_name = $_POST['product_name'];
                $product_brand = $_POST['product_brand'];
                $product_price_current = $_POST['product_price_current'];
                $product_price_previous = $price_previous;
                $product_promotion = $_POST['product_promotion'];
                $product_description_short = $_POST['product_description_short'];
                $product_description_long = $_POST['product_description_long'];
                $product_specification = $_POST['product_specification'];
                $product_stock_value = "new";
                if($product_image1 == null) {
                  $product_image1 = $img1;
                }else{
                  $product_image1 = $_FILES['product_image1']['name'];
                }
                if($product_image2 == null) {
                  $product_image2 = $img2;
                }else{
                  $product_image2 = $_FILES['product_image2']['name'];
                }
                if($product_image3 == null) {
                  $product_image3 = $img3;
                }else{
                  $product_image3 = $_FILES['product_image3']['name'];
                }
                if($product_image4 == null) {
                  $product_image4 = $img4;
                }else{
                  $product_image4 = $_FILES['product_image4']['name'];
                }
                $sqlInsertProductList = "UPDATE product_list SET category='$product_category', name='$product_name', brand='$product_brand', price_current='$product_price_current', price_previous='$product_price_previous', promotion='$product_promotion', description_short='$product_description_short', description_long='$product_description_long', specification='$product_specification', stock_value='$product_stock_value', image1='$product_image1', image2='$product_image2', image3='$product_image3', image4='$product_image4' WHERE id=".$product_id_link;

                if ($conn->query($sqlInsertProductList) === TRUE) {
                    header("location: ./admin.php");
                } else {
                  echo "Error: " . $sqlInsertProductList . "<br>" . $conn->error;
                }
            }else {
                echo "error occured";
            }
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
    <title>Datagate | Create Product</title>

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
                        <span>Edit Product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Admin Section Begin -->
    <section class="shop spad">
        <div class="container">
            <form action="" class="checkout__form" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Edit Product</h5>
                        <div class="row">
                            <?php
                                if (mysqli_num_rows($resultEditProd) > 0) {
                                    while($row = mysqli_fetch_assoc($resultEditProd)) { 
                                    
                                      ?>
                                       <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="checkout__form__input">
                                                <p>Product Name <span>*</span></p>
                                                <input type="text" name="product_name" value="<?php echo $row["name"] ?>" required minlength="2" placeholder="Enter Product Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="checkout__form__input">
                                                <p>Product Brand <span>*</span></p>
                                                <input type="text" name="product_brand" value="<?php echo $row["brand"] ?>"  required minlength="2" placeholder="Enter Product Brand">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="checkout__form__input">
                                                <p>Product Price <span>*</span></p>
                                                <input type="number" name="product_price_current" value="<?php echo $row["price_current"] ?>"  required minlength="2" placeholder="Enter Product Price">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6" style="display: none;">
                                            <div class="checkout__form__input">
                                                <p>Product Price <span>*</span></p>
                                                <input type="number" name="product_price_previous" value="<?php echo $row["price_previous"] ?>"  required minlength="2" placeholder="Enter Product Price">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="checkout__form__input">
                                                <p>Promotion <span>*</span></p>
                                                <input type="text" name="product_promotion"  value="<?php echo $row["promotion"] ?>" required minlength="2" placeholder="Enter Product Promotion">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="checkout__form__input">
                                                <p>Short Description <span>*</span></p>
                                                <input type="text" name="product_description_short" value="<?php echo $row["description_short"] ?>" required minlength="2" placeholder="Enter Short Description">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="checkout__form__input">
                                                <p>Long Description <span>*</span></p>
                                                <input type="text" name="product_description_long"  value="<?php echo $row["description_long"] ?>" required minlength="2" placeholder="Enter Long Description">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="checkout__form__input">
                                                <p>Product Specification <span>*</span></p>
                                                <input type="text" name="product_specification" value="<?php echo $row["specification"] ?>" required minlength="2" placeholder="Enter Product Specification">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="checkout__form__input">
                                                <p>Product Category <span>*</span></p>
                                                <select name="product_category" required class="margin-top-1">
                                                    <option disabled>Select Product Category</option>
                                                    <?php
                                                        if (mysqli_num_rows($resultGetAllCategory) > 0) {
                                                            while($rowGetAllCategory = mysqli_fetch_assoc($resultGetAllCategory)) { 
                                                                if ($row["category"] == $rowGetAllCategory["id"]) {
                                                                   ?>
                                                                       <option selected value="<?php echo $rowGetAllCategory["id"] ?>"><?php echo $rowGetAllCategory["category_name"] ?></option>
                                                                  <?php 
                                                                }else{
                                                                    ?>
                                                                       <option value="<?php echo $rowGetAllCategory["id"] ?>"><?php echo $rowGetAllCategory["category_name"] ?></option>
                                                                  <?php   }
                                                                }
                                                                
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div >
                                                <p>Select Product Image one</p>
                                                <input type="file" name="product_image1" id="product_image1">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div >
                                                <p>Select Product Image Two</p>
                                                <input type="file" name="product_image2" id="product_image2">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="margin-top-1">
                                                <p>Select Product Image Three</p>
                                                <input type="file" name="product_image3" id="product_image3">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div  class="margin-top-1">
                                                <p>Select Product Image Four</p>
                                                <input type="file" name="product_image4" id="product_image4">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="checkout__form__input padding-left-and-right-3">
                                                    <button type="submit" name="submit" style="background: transparent; border: 0 !important; width: 100%;"><a class="button-link-default margin-top-1 col-12 text-center ">Submit</a></button>
                                                </div>
                                            </div>
                                        </div>
                                  <?php   }
                                }
                            ?>
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