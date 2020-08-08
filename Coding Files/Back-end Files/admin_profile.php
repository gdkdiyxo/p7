
 <?php
  
  session_start();

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

 <title>ADMIN</title>
 
  <!-- Profile Block and Others -->

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

   <!-- Real Time Show -->

 
  <script type="text/javascript"> 

  function display_c()
 {
   var refresh=1000; // Refresh rate in milli seconds
   mytime=setTimeout('display_ct()',refresh)
 }

  function display_ct() 
 {
   var x = new Date()
  document.getElementById('ct').innerHTML = x;
  display_c();
 }

</script>



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
       <h4 class="w3-center bold text-shadow: 2px 2px #FF0000" style="color:red" ;>ADMIN PROFILE </h4> 
       <hr></hr>
      
     

       <?php 
    
    $conn = mysqli_connect("localhost","root","","bazar"); 

      $sql = "SELECT * FROM admin WHERE username='$use'"; 

        if($result = mysqli_query($conn,$sql))
     {

                while ($row = $result->fetch_assoc()) 
              {     
                    $admin_id =$row["admin_id"]; 
                   
                    $username = $row["username"];  
                    $phone = $row["phone"]; 
                    $email = $row["email"];   
                  
                  


              }
     
      
        }
   
?>

   <hr>
   
       <p><i class="fa fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>

     

<?php
    
    echo '<tr> 
            <td>'.$username.'</td>     
                                            
         </tr>';
?>

 </p>


 <!------------------ Email ------------------>

<p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i> <?php
    
    echo '<tr> 
            <td>'.$email.'</td>     
                                            
         </tr>';
?>  </p>

<p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php
    
    echo '<tr> 
            <td>'.$phone.'</td>     
                                            
         </tr>';
?>  </p>


      </div>
    </div>
    <br>
    
    <!------------------ Accordion ---------------->

    <div class="w3-card w3-round">

      <div class="w3-white">

       
        <div id="Demo1" class="w3-hide w3-container">


       <hr>

       <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Address : 
       
      
       
       
       </p>

      
       <p><i class="fa fa fa-registered fa-fw w3-margin-right w3-large w3-text-teal"></i>Registration Date : 

     

   
    </p>

        </div>
    
  
   
   <button onclick="window.location.href='profile_edit.php';" class="w3-button w3-block w3-theme w3-left-align w3-hover-white">
   <i class="fa fa-edit fa-fw w3-margin-right"></i>Edit Profile</button>
        <div id="Demo2" class="w3-hide w3-container">
        <div class="w3-row-padding">
  
       
         
       </div>
        </div>


          <!--------------------- Password Change Part with Popup Start using PHP  ---------------------------->



  
      </div>      
    </div>
    <br>
    
  
    <br>
    
   
  
  <!-------------- End Left Column ------------->


  </div>



<?php

    ini_set( "display_errors", 0);

?>


<!------------------------  Middle Column  -------------------------->


          
<div class="w3-col m7">
  
    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding w3-cyan w3-opacity-min">
            <h3 style="color:white" ;><b>Admin Panel</b></h3>

            <br /> 
             <br />

               <h5 style="color:white" ;><b>Client Info :</b></h5>

             <button onclick="window.location.href='admin_view_client_profile.php';" class="w3-button  w3-medium w3-theme w3-left-align w3-hover-red" style="width:30%" > 
               <i class="fa fa-info fa-fw w3-margin-right"></i>Client Profile</button> 

               <button onclick="window.location.href='admin_client_products.php';" class="w3-button w3-theme w3-left-align w3-hover-red" style="width:30%"> 
               <i class="fa fa-info fa-fw w3-margin-right"></i>Client Product Table</button>

              
               <br /> 
             <br />

               <h5 style="color:white" ;><b>Vendor Info :</b></h5>

             <button onclick="window.location.href='admin_view_vendor_profile.php';" class="w3-button w3-theme w3-left-align w3-hover-red" style="width:30%"> 
               <i class="fa fa-info fa-fw w3-margin-right"></i>Vendor Profile</button>

               <button onclick="window.location.href='admin_vendor_products.php';" class="w3-button w3-theme w3-left-align w3-hover-red" style="width:30%"> 
               <i class="fa fa-info fa-fw w3-margin-right"></i>Vendor Product Table</button>

               <button onclick="window.location.href='chat_with_vendor.php';" class="w3-button w3-theme w3-left-align w3-hover-red" style="width:30%"> 
               <i class="fa fa-info fa-fw w3-margin-right"></i>Chat</button>
     
            <br></br>


            <h5 style="color:white" ;><b>Contact Us :</b></h5>

             <button onclick="window.location.href='chat_contact_us_admin.php';" class="w3-button w3-theme w3-left-align w3-hover-red" style="width:30%"> 
               <i class="fa fa-info fa-fw w3-margin-right"></i>Visitors</button>
             
               <button onclick="window.location.href='subscriber_admin.php';" class="w3-button w3-theme w3-left-align w3-hover-red" style="width:30%"> 
               <i class="fa fa-info fa-fw w3-margin-right"></i>Subscribers</button>

           </form>
       </form>



          </div>
        </div>
      </div>


    </div>



  <!------------------------  End Middle Column  ----------------->

  </div>


  <!--------------------------  Right Column  ------------------->


 
  

  <div class="w3-col m2">

  
    <div class="w3-card w3-round w3-white w3-center" style="width:220px">
      <div class="w3-container">

       <hr>
        <p><strong>Today</strong></p>
       
        <body onload=display_ct();>
            <span id='ct' ></span>
         </body>


         <hr>
      </div>



    </div>

    <br>

                          
    </div>


    <br>

  <!-------------------  End Right Column  -------------->

  </div>
  
  <!--------------------  End Grid  -------------->

</div>

  <!--------------- End Page Container --------------->

</div>
<br>


<div>
<hr>
</div>








    




    <!--------------   Footer Starts ------------------>

   <?php include 'footer_bazar.php'?>


   <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap.js"></script>

  <script src="js/modernizr.custom.js"></script>
  <script src="js/toucheffects.js"></script>
  <script src="js/google-code-prettify/prettify.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/camera/camera.js"></script>
  <script src="js/camera/setting.js"></script>

  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/portfolio/jquery.quicksand.js"></script>
  <script src="js/portfolio/setting.js"></script>

  <script src="js/jquery.flexslider.js"></script>
  <script src="js/animate.js"></script>
  <script src="js/inview.js"></script>
  
  
  <script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}


</script>

  <!-- Template Custom JavaScript File -->
  
  <script src="js/custom.js"></script>
  
    

      </body>