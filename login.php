<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "php_test");
if(isset($_POST['submit']))
{
 
  $email=$_POST['email'];
  $password=$_POST['password'];
 
 $querey="select * from user where user_name='$email' && password= $password";
if(mysqli_query($connect,$querey));
   $_SESSION["user_name"]=$email;
   $_SESSION["password"]=$password;
   echo '<script>window.location="index.php"</script>';
}
else{
  echo '<script>alert(" Sorry !! username or password is wrong !" )</script>';
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
  body
  {
    background-image: url('assets/mac.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }
.signup
{
  margin: 5rem;
  display: flex;
  justify-content: center;
}
.signup input
{
  margin:0.5rem;
  padding:0.8rem;
  width: 400px;
  border-radius: 0.3rem;
  background-color:rgba(102, 153, 153,0.4);
  border: none;
}
.signup form
{
  background-color:rgba(20, 31, 31,0.7);
  margin: auto;
  border-radius: 0.4rem;
  padding:3rem ;
}

.submit:hover
{
  background-color: rgba(70, 109, 109,0.5)
}
.submit
{
  background-color: rgb(70, 109, 109)
}

em{
  color:#b1cdcd;
}
a
{
  text-decoration: none;
}
</style>

<body>
<div class="signup">
<form action="login.php" method="POST">

<input type="text" require placeholder="please enter your name" name="email"><br>
<input type="number" require placeholder="please enter your password" name="password"><br>
<input class="submit" type="submit" value="sign up" name="submit"><br>

 <em>you don't have acount </em>
 <a href="signup.php"> sign up </a>
</form>

</div>





</body>
</html>