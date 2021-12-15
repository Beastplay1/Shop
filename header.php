<!DOCTYPE html>
<html>
<head>
<style>
nav{
  background-color: #7423FF;
}

nav ul{
  padding: 10px;
  display: flex;
  justify-content: right;
  list-style: none;
}

nav ul li{
  padding: 10px 20px;
}

nav ul li a{
  text-decoration: none;
  font-size: 18px;
  color: #fff;
  font-family: Audiowide;
}

nav ul li:hover{
  background-color: #280C59;
  transition: 0.9s;
}
</style>
</head>
<body>
<nav>
   <ul>
    <li><a href="index.php">Home</a></li>
    <?php
       session_start();
       if(isset($_COOKIE['user'])){
      $_SESSION['user']=$_COOKIE['user'];
      $_SESSION['user_id'] = $_COOKIE['user_id'];
}



       if(isset($_SESSION['user'])){
       ?>
       <li><a href="cart.php">Cart</a></li>

       <li><a href="logout.php">Logout</a></li>
       <li><a href=""><?=$_SESSION['user']?></a></li>
     <?php
       }
       else{
?>
<li><a href="login_form.php">login</a></li>
     <li><a href="registr_form.php">Register</a></li>
     <?php
     }
    ?> 
     
   </ul>
</nav>

