<?php
include ('header.php');
?>

<form action="login.php" method="post">
	<input type="text" name="login" placeholder="name">
	<input type="text" name="password" placeholder="password">
	<button>Enter</button>
	<input type="checkbox" name="remember">Remember

</form>
<?php
 

  if(isset($_SESSION['error'])){
  	echo $_SESSION['error'];
  	unset($_SESSION['error']);
  }