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

 <title>Recent Demands</title>
 
  <!-- Profile Block and Others -->

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

   <!-- Real Time Show -->


</head>

<body>

<!----------------  Start Header  ---------------->

  <?php

   $menu = file_get_contents("menu_bazar.php") ;
   $base = basename($_SERVER['PHP_SELF']) ;

   $menu = preg_replace("|<li><a href=\"".$base."\">(.*)</a></li>|U", "<li id=\"current\">$1</li>", $menu) ;

   include 'menu_bazar.php' ;

  ?>

    <!---------------- Page Container ------------------>


 <div class="w3-container w3-content" style="max-width:1450px;margin-top:30px">    

<!-------------------- The Grid ------------------->

<div class="w3-row">

  <!--------- Left Column ------------>

  <div class="w3-col m3">

    <!------------ Profile ---------->
  
  
    <div class="w3-card w3-round w3-white">
      <div class="w3-container">
      <hr>

      
       <h4 class="w3-center bold text-shadow: 2px 2px #FF0000" style="color:black" ;> </h4> 

       <button onclick="window.location.href='v_logout.php';" class="w3-button w3-block w3-theme w3-left-align w3-hover-red"> 
       <i class="fa fa-info fa-fw w3-margin-right"></i>Log Out</button>
        <br />
      
      </div>
    </div>
    <br>
    
    <button onclick="window.location.href='v_profile.php';" class="w3-button w3-block w3-theme w3-left-align w3-hover-green"> 
     <i class="fa fa-user fa-fw w3-margin-right"></i>My Profile</button>
     <br />

    <!------------------ Accordion ---------------->

    <div class="w3-card w3-round">
      <div class="w3-white">
        <div id="Demo1" class="w3-hide w3-container">

        </div>
    
    
        </li>   

   <!------------------------- Account Delete -------------------------->

  
   <div id="Demo2" class="w3-hide w3-container">
    <div class="w3-row-padding">
    </div>
    </div>

      </div>      
    </div>
    <br>
    
  
    <br>
    
  <!-------------- End Left Column ------------->

  </div>


<?php

    ini_set( "display_errors", 0);

?>

<!---------------------------------    Middle Column Start   ----------------------------->

   
<div class="span8" >

<div class="row">
  <div class="span8">
    <h4 class="title">Recent Demands From<strong> Clients </strong></h4>

    <div class="row">
      
<!--------------------- PHP CODE -------------------->


<?php 

  include 'config.php';
  include 'connection.php';

  $use = $_SESSION['user_name'];
          
  $conn = mysqli_connect("localhost","root","","bazar"); 

  $sql = "SELECT * FROM client_demand_post AS cd INNER JOIN client_products_images AS ci
            ON cd.b_product_id = ci.product_id ORDER BY b_product_id DESC LIMIT 0,10";

          if ($result = mysqli_query($conn,$sql))
         {
              while ($row = mysqli_fetch_assoc($result)) 
            {
         
               //echo $use;

                   if(isset($_SESSION['user_name']))
                 {
                    echo "<div class='span4'>
                           <div class='item'>
                            <div class='flip-card'>
                             <div class='flip-card-inner' size='width:300px,height:200px'>
                              <div class='flip-card-front' >

                                <img src=".$row['filename']." alt='Paris' style='width:300px;height:180px'>

                              </div>

                             <div class='flip-card-back'>

                               <h5><b>".$row['category']."</b></h5>

                               <p>Product ID : ".$row['b_product_id']."</p>
                               <p>Product Name : ".$row['product_name']."</p>
                               <p>Price : ".$row['est_price']."</p>
                               <p>Quantity : ".$row['quantity']."</p>
                                                  
                               <p><button class='btn btn-success btn-sm'>
                                 <a href='demand_post_c_details.php?product_id=".$row['b_product_id']."&type=".$row['buyer']."' >".$row['type']."</a>
                                 </button></p>
                
                              </div>
                           </div>
                         </div>
                       </div>
                    </div> " ;

                 }


   }

}  

$conn->close();

?>


<!--------------------------    PHP  ------------------------------>


</div>
<hr><br>

<div id="pagination">
  <span class="all">Page 1 of 1</span>
  <span class="current">1</span>
 
  <a href="#" class="inactive">2</a>
  
</div>
</div>
</div>
</div>
</div>
</div>
</section>

  
  <!--------------------------------     End of Middle Column          ------------------------------->


  </div>

<div>
<hr>
</div>


    <!--------------   Footer Starts ------------------>

   <?php include 'footer_bazar.php'?>

      </body>




























