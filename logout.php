<?php 
  session_start();
  session_destroy();
  
  setcookie('user','',time()-3600*24*365,'/');
  setcookie('user_id','',time()-3600*24*365,'/');

  header('location:index.php');
