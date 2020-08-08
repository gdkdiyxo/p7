
 <?php
  
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 

   $use = $_SESSION['user_name'];

   if($use == true)
  {
      
  }

   else
  {
      header("location:http://localhost/bazar/v_login.php");
  } 


?>


<!DOCTYPE html>
<html lang="en">

<head>

 <title>Chat Admin</title>
 
  
  <style>
.center {
  
 
  align-items: center;
  height: 200px;
 
}

#my_post 
  {
   font-family: "Trebuchet MS", Arial, Helvetica, sans-serif ;
   border-collapse: collapse ;
   width: 96%;

   margin-left:auto ;
   margin-right:auto;

 }

 #my_post  td, #my_post  th 
 {
   border: 2px solid #ddd ;
   padding: 10px;
   font-size : 16px;
   text-align: center;
}

#my_post  tr:nth-child(even){background-color: #f2f2f2;}

#my_post  tr:hover {background-color: #ddd;}

#my_post  th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  font-size : 18px;
  background: linear-gradient(to bottom, #009999 0%, #00cc99 100%);
  color: white;
}







</style>
  

</head>

<body>

<!----------------  Start Header  ---------------->

  <?php

   $menu = file_get_contents("menu_bazar.php") ;
   $base = basename($_SERVER['PHP_SELF']) ;

   $menu = preg_replace("|<li><a href=\"".$base."\">(.*)</a></li>|U", "<li id=\"current\">$1</li>", $menu) ;

   include 'menu_bazar.php' ;

  ?>

 
  
   <hr/>

   <h2 align="center"> Messages</h2>
   
   <?php 

include 'connection.php';

$use = $_SESSION['user_name'];


 $conn = mysqli_connect("localhost","root","","bazar");



  if(isset($_POST['submit'])) 
 {
    $sub = $_POST['sub']; 
    $msg = $_POST['msg'];
    
     $sql = "INSERT INTO chat (name,subject,msg) VALUES ('$use','$sub','$msg') LIMIT 1 "; 
     
     $r = $conn->query($sql);

     $conn->close();

     echo "<script>alert('Message Sent to Admin Sucessfully'); 
      window.location='v_profile.php'</script>";


 }
 
 
 
?>
  
  <form method="post" action="chat_with_admin.php" align="center">

        <input type="text" name="sub" placeholder="Write Your Subject"> <br />
        <textarea name="msg" placeholder="Write Your Message" style="height:50px"></textarea> <br />
   
        <input type="submit" name="submit" value="Submit">

  </form>



      
   <table id="my_post">
    
    <tr>

      <th>My Username</th>
      <th>My Text <hr style="height:2px;border-width:0;color:black;background-color:#ddd">Sent Time
      </th>
     
      <th>Admins Reply<hr style="height:2px;border-width:0;color:black;background-color:#ddd">Received Time
      </th>
  
    </tr> 




    <?php

       ini_set( "display_errors", 0);


       include 'connection.php';

       $use = $_SESSION['user_name'];

       $conn = mysqli_connect("localhost","root","","bazar");
    

        $query = "SELECT * FROM chat WHERE name='$use' ORDER BY id DESC  ";
   
        $r = $conn->query($query);
  
        while($row = $r->fetch_array()) :

         if(isset($_SESSION['user_name']))
        {
            echo "
                  <tr>
                   <td style='color: green'><b>".$row['name']."</b></td>
                  
                   <td><b style='color: blue'>".$row['subject']." </b>: ".$row['msg']." <hr style='height:2px;border-width:0;color:black;background-color:black'> 
                          ".$row['date']." 
                   </td>
 
                   <td><h6 style='color: red'>".$row['admin_reply']."</h6> <hr style='height:2px;border-width:0;color:black;background-color:black'>
                         <strong>".$row['admin_sent_time']."</strong>   
                   </td>
 
                 </tr> " ;
        
         }
 
         else "ERROR OCCURED" ;
 
  ?>

    
	
<?php endwhile; ?>

</table>


  <br />
<br />
<hr/>


   



  
      


     

   
             
    <!--------------   Footer Starts ------------------>

      <?php include 'footer_bazar.php'?>


   
  </body>