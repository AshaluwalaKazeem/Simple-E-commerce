<?php
    // Currently we only have one user
    $user_id = 1;
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'kayode1k1';
    $dbname = 'datagate';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

    if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
    }
    $sql = 'SELECT * from users_cart where user_id='. $user_id;
    $result = mysqli_query($conn, $sql);



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Datagate 1</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <h1>INVOICE 3-2-1</h1>
      <div id="company" class="clearfix">
        <div>Company: Datagate</div>
        <div>Morogbo Junction,<br /> Badagry, <br/> Lagos</div>
        <div>08034202200</div>
        <div><a href="mailto:datagate@gmail.com">datagate@gmail.com</a></div>
        <div><span>DATE </span> <script>document.write(new Date().getDay());document.write(" - "); document.write(new Date().getMonth());document.write(" - "); document.write(new Date().getFullYear());</script></div>
      </div>
    </header>
    <main>
      <table>
        <thead>Housa, Portugese , Latin
          <tr>
            <th class="service">Product Name</th>
            <th class="desc">DESCRIPTION</th>
            <th style="align-content: end;">PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
        <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td class="service"><?php echo $row["product_name"] ?></td>
                      <td class="desc"><?php echo $row["product_description_short"] ?></td>
                      <td class="unit">$<?php echo $row["product_price_current"] ?>.00</td>
                      <td class="qty"><?php echo $row["product_quantity"] ?></td>
                      <td class="total">$<?php echo $row["product_price_current"] * $row["product_quantity"]?></td>
                    </tr>
              <?php   }
            }
        ?>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>