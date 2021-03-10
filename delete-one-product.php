<?php
// Currently we only have one user
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'kayode1k1';
    $dbname = 'datagate';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

    if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
    }

    if($_POST){

        $cart_to_delete = $_POST['product_id'];
        $sqlDeleteCart = 'DELETE FROM `users_cart` WHERE id ='. $cart_to_delete;
        mysqli_query($conn, $sqlDeleteCart);

        $product_id_to_delete = $_POST['product_id'];
        $sqlDelete = 'DELETE FROM `product_list` WHERE id ='. $product_id_to_delete;
        mysqli_query($conn, $sqlDelete);
        header("location: ./delete-product.php");
    }