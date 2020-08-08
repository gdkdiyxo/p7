

 <?php 


  session_start();
  session_unset();
  session_destroy();
  ob_start();

  header('Location: http://localhost/bazar/v_login.php'); 
  ob_end_flush(); 

  include 'http://localhost/bazar/v_login.php';

  exit();


 ?>