<?php
$connect=mysqli_connect("localhost","root","","php_test");


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
<body>
  
<style>
.total{
  background-color:#cc99ff;
 color: while;
 padding: 1rem;
 font-size: 1.5rem;
 border-radius: 0.3rem;
}
a{
  text-decoration: none;
  background-color: #990099;
  margin: 1rem;
  padding: 1rem;
  border-radius: 0.3rem;
  color: white;
}
a:hover{
  text-decoration: none;
  background-color:#cc00cc;
  margin: 1rem;
  padding: 1rem;
  border-radius: 0.3rem;
  color: white;
}
h3{
  margin: 1rem;
  font-size: 1.5rem;
  padding-left: 1rem;
  margin-top: 4rem;
}
div
{
  
  background-color:#e6e6ff;
  padding: 1rem;
  border-radius: 0.3rem;
  margin: 1rem;
  font-size: 1.1rem;
}
</style>




  
 <?php
$query="select amount from wallet";
$result=mysqli_query($connect,$query);
if(mysqli_num_rows($result)!=0)
{
  while($row=mysqli_fetch_assoc($result))
  {
  
    ?>
<div class="total">
    
 <p>total money in your wallet :<?php echo $row['amount'];?>
<?php
  }
}

 ?>


</p>
</div>
<a href="addToWallet.php"> Add to your wallet </a>
<h3>Notifications</h3>

<?php
$result=mysqli_query($connect,"select * from add_wallet");
if(mysqli_num_rows($result)!=0)
while($row=mysqli_fetch_assoc($result))
{

  
  ?>
  <div>
<div>
  <p> You have Added 
     <?php echo $row['amount']?> to your wallet in <?php echo $row['date']?>
  </p>
 
</div>
</div>
<?php
}
else 
echo" NO notifications is found " ;

$result1=mysqli_query($connect,"select * from check_wallet");
  {
    while($rows=mysqli_fetch_assoc($result1))
    {
      ?>
<div>
  <p> You have checked 
     <?php echo $rows['amount']?> to your wallet in <?php echo $rows['date']?>
  </p>
 
</div>
     <?php

    }
  }
?>



</body>
</html>