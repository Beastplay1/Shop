<form action="login.php" method='post'>
	<input id="login" name="login" type="text">
	<input id="password" name="password" type="text">
	<button>LOGIN</button>

</form>

<?php
    session_start();
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
?>