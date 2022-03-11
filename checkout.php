

<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "php_test");


if (isset($_GET["action"])) {
  if ($_GET["action"] == "check") {
  
    $query1="select amount from wallet";
    $wallet_amount=mysqli_query($connect,$query1)->fetch_object()->amount;
    $total=$_GET['total'];

   
    if($wallet_amount>=$total)
    {
      $wallet_amount=$wallet_amount-$total;
     
      mysqli_query($connect,"update wallet set amount =  $wallet_amount where user_id =1");
      echo '<script>alert(" payment successfully" )</script>';
      $wallet_amount=mysqli_query($connect,$query1)->fetch_object()->amount;  
      mysqli_query($connect,"insert into check_wallet values(null,$total,now(),1)");

     echo '<script>window.location="index.php"</script>';

      unset($_SESSION["shopping_cart"]);
    

    }
    else{
      echo '<script>alert(" Sorry !! you dont have enough money please add money to ur wallet" )</script>';
      '<script>window.location="wallet.php"</script>';
    }
   
   
    }
  }



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  



<h3 style="margin:2rem ;font-size:1.5rem">order datails cart</h3>
      <div class="cart">

        <table >
          <tr>
            <th>item name</th>
            <th>Quantity</th>
            <th>price</th>
            <th>total</th>
            <th>Action</th>
          </tr>
          <?php
          if (!empty($_SESSION["shopping_cart"])) {
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
              <td>$<?php echo $total; ?></td>   <td>

        
         <a href="checkout.php?action=check&total=<?php echo $total; ?>">  <button class="wallet" onclick="return confirm('Are you sure');"> check outcheckout</button> </a>
     </td>  
            </tr>   
          
          <?php
          }
          ?>
         

 </table>
      </div>
    </div>

</body>
</html>