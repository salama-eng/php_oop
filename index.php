<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "php_test");
if (isset($_POST["add_to_cart"])) {
  if (isset($_SESSION["shopping_cart"])) {
    $item_array_id = array_column($_SESSION["shopping_cart"], 'item_id');
    if (!in_array($_GET['id'], $item_array_id)) {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        "item_id"  => $_GET["id"],
        "item_name"  => $_POST["hidden_name"],
        "item_price"  => $_POST["hidden_price"],
        "item_quantity"  => $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    } else {
      echo '<script>alert("item already added" )</script>';
      echo '<script>window.location="index.php"</script>';
    }
  } else {
    $item_array = array(
      "item_id"  => $_GET["id"],
      "item_name"  => $_POST["hidden_name"],
      "item_price"  => $_POST["hidden_price"],
      "item_quantity"  => $_POST["quantity"]
    );

    $_SESSION["shopping_cart"][0] = $item_array;
  }
}

if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["shopping_cart"] as $key => $values) {
      if ($values["item_id"] == $_GET["id"]) {
        unset($_SESSION["shopping_cart"][$key]);
        echo '<script> alert("item removed</script>';
        echo '<script>window.location="index.php"</script>';
      }
    }
  }
  elseif ($_GET["action"] == "logout")
  {
    unset($_SESSION["user_name"]);
    unset($_SESSION["password"]);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" type="text/css" rel="stylesheet" media="all">
  <title>Document</title>
</head>
<style>
  .container {
    display: block;

  }

  .cart table {
    margin: 1rem;
    padding: 1rem;
    background-color: #c3d5d5;
  }

  .cart table tr th {
    margin: 0rem;
    padding: 1rem;
    background-color: #87abab;
  }

  .cart table tr td {
    margin: 0rem;
    padding: 1rem;

  }

  a {
    text-decoration: none;
    color: white;
  }

  body {
    background-color: #e1eaea;
  }

  .wallet {
    color: white;
    background-color: #344b4b;
    border: none;
    padding: 0.8rem;
    border-radius: 0.2rem;

  }

  .wallet:hover {
    color: white;
    background-color: #3f5a5a;
    border: none;
    padding: 0.8rem;

  }
</style>

<body>

  <a href="wallet.php"><button class="wallet">
      Wallet
  </a></button>

  <?php
 if(!isset($_SESSION['user_name']))
 {
   ?>

<a class="wallet" href="login.php">login</a>
   <?php
 
 }
 else{
  ?>

  <a class="wallet" href="index.php?action=logout">logout</a>
     <?php
 }
  ?>

  <h3>Shopping cart</h3>
  <div class="container">
    <div style=" display:flex">
      <?php
      $query = "select * from products";
      $result = mysqli_query($connect, $query);
      if (mysqli_num_rows($result) != 0) {
        while ($row = mysqli_fetch_assoc($result)) {

      ?>
          <div clas="con">
            <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
              <div class="con1" style="border: none; margin:0.7rem; box-shadow: 2px 2px rgba(148, 184, 184,0.6); ">
                <img src="assets/<?php echo $row['product_img']; ?>" alt="jee" width="180px" height="100px">
                <h4><?php echo $row['product_name']; ?></h4>
                <em>$<?php echo $row['price']; ?></em>
                <input type="number" name="quantity" value="1">
                <input type="hidden" name="hidden_name" value="<?php echo $row['product_name']; ?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>">
                <input class="wallet" type="submit" name="add_to_cart" value="Add to cart">
              </div>
            </form>
          </div>
      <?php

        }
      }
      ?>
    </div>
    <div class="cart">
     
          <?php
          if (!empty($_SESSION["shopping_cart"])) {
        ?>
 <h3>order datails cart</h3>
      <div>

        <table>
          <tr>
            <th>item name</th>
            <th>Quantity</th>
            <th>price</th>
            <th>total</th>
            <th>Action</th>
          </tr>
        <?php


            $total = 0;
            foreach ($_SESSION['shopping_cart'] as $keys => $values) {
          ?>
              <tr>
                <td><?php echo $values["item_name"]; ?></td>
                <td><?php echo $values["item_quantity"]; ?></td>
                <td><?php echo $values["item_price"]; ?></td>
                <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2) ?></td>
                <td><a href="index.php?action=delete&id=<?php echo $values['item_id']; ?>"> <span style="color:red">Remove</span></a></td>
              </tr>



            <?php
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }

            ?>

            <tr>
              <td>total</td>
              <td>$<?php echo number_format($total, 2); ?></td>   <td>
         <a href="checkout.php">  <button class="wallet"> check outcheckout</button> </a>
     </td>  
            </tr>
          
          <?php
          }
          ?>
         

 </table>
      </div>
    </div>



  </div>
</body>

</html>