
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
      header("location:http://localhost/bazar/admin_login.php");
  } 


?>


<!DOCTYPE html>
<html lang="en">

<head>

 <title>Subscribers Info</title>
 
  
  <style>
.center {
  
  align-items: center;
  height: 100px;
 
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
   padding: 8px;
   font-size : 14px;
   text-align: center;
}

#my_post  tr:nth-child(even){background-color: #f2f2f2;}

#my_post  tr:hover {background-color: #ddd;}

#my_post  th {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: center;
  font-size : 16px;
  background: linear-gradient(to bottom, #ff9999 0%, #ff66cc 100%);
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

   <h2 align="center"> Subscribers Information</h2>

   <form method="post" action="subscriber_admin.php" align="center">
        
      <input type="text" name="email_id" placeholder="Email ID" ><br />
       <input type="text" name="email_subject" placeholder="Subject" ><br />

        <textarea name="reply_mail" placeholder="Write Your Mail" style="height:50px"></textarea> <br />
          <input type="submit" name="submit" value="Submit">

  </form>

   
   <table id="my_post">
    
    <tr>
      
      <th>Subscriber's ID</th>
      <th>E-mail </th>
      <th>Time </th>

    </tr> 


    <?php

       ini_set( "display_errors", 0);


       include 'connection.php';

       $use = $_SESSION['user_name'];

    
       $conn = mysqli_connect("localhost","root","","bazar");
    
        $query = "SELECT * FROM subscribe ORDER BY sub_id ASC ";
   
        $r = $conn->query($query);
  
        while($row = $r->fetch_array()) :

         if(isset($_SESSION['user_name']))
        {
            echo "
                  <tr>
                   <td style='color: green'><b>".$row['sub_id']."</b></td>
                   <td style='color: blue'><b>".$row['subscribe_email']."</b></td>
                   <td style='color: red'><b>".$row['sub_time']."</b></td>

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