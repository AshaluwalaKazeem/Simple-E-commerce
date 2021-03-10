<?php
// Currently we only have one user
echo "string";
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'kayode1k1';
    $dbname = 'datagate';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

    if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
    }



    mysqli_query($conn, "DELETE FROM `users_cart` WHERE 1");


    mysqli_query($conn, "DELETE FROM `product_list` WHERE 1");
    header("location: ./delete-product.php");
    