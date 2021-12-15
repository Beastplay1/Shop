<?php 
include('header.php');
?>
<form action="register.php" method="post">
	<input type="text" name="login" placeholder="Name">
	<input type="password" name="password" placeholder="Password">
	<input type="password" name="confirm" placeholder="Password">
	<input type="email" name="email" placeholder="Email">
	<button>Send</button>
</form>
<?php 


if (isset($_SESSION['errors'])) 
   foreach ($_SESSION['errors'] as  $value) 
      echo $value.'<br>';
  


?>