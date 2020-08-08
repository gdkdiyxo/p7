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
      header("location:http://localhost/bazar/c_login.php");
  } 


?>



<!DOCTYPE html>
<html lang="en">

<head>

 <title>SEARCH</title>
 
  
  <style>
.center {
  
 
  align-items: center;
  height: 200px;
 
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
   
  
       <?php  include 'c_signup_info_db.php' ?>

       <body>
           

           <form action="c_search.php" method="post" align ="center">
            <h5 align="center">Enter Your Desired Location or Product Type (Ex : Regular , Emergency or Super Speed)</h5>
             <input name="search" type="search" autofocus placeholder ="Enter location or type"><br/><input type="submit" name="button" color="green">

           </form>






<?php

$conn = mysqli_connect("localhost","root","","bazar"); 



  if(isset($_POST['button']))
{    //trigger button click

  $search=$_POST['search'];


  $query = "SELECT * FROM vendor_product_post where (de_place like '%{$search}%' ) OR ( type like '%{$search}%') ";
  //$row = mysqli_num_rows($query );

  $result = mysqli_query($conn,$query) ;

    
    if (mysqli_num_rows($result) > 0) 
  {

    echo "  <hr/>
    <br />
     
   <table align ='center' border='2px' style='width:98%' ; line-height:50px;'>
   <tr>
      <th colspan='100%'><h4 class='title' align='center'><strong>Search Result</strong></h4>
   </tr>
   
     <tr>

       <th>Product ID</th>
       <th>Product Name</th>
      
       <th>Category</th>
       <th>Price</th>
       <th>Quantity</th>
       <th>Type</th>
       <th>Place</th>
       <th>Status </th>
       <th>Post Time</th>
       <th>Details</th>
       <th>Contact Info</th>
      

     </tr> 
";

         while ($row = mysqli_fetch_array($result)) 
      {
         echo "
         
     
         
        <tr>
        <td align='center'>".$row['b_product_id']."</td>
        <td align='center'>".$row['product_name']."</td>

       
        <td align='center'>".$row['category']."</td>
        <td align='center'>".$row['est_price']."</td>
        <td align='center'> ".$row['quantity']."</td>
        <td align='center'> ".$row['type']."</td>
        <td align='center'> ".$row['de_place']."</td>
        
        <td align='center'>                                
        <strong> ".$row['product_status']."</strong>                  
        </td>

        <td align='center'> ".$row['post_time']."</td>
        <td align='center'> ".$row['pro_details']."</td> 
        <td >Name : ".$row['b_username']." </br> Email : ".$row['b_email']." </br> Phone : ".$row['b_phone']." </td>

    </tr>

   ";
         
      }
 echo " </table>";
 } 
 else
 {
    echo "<h5 align='center'><br><br> No Record Found<br><br></hr>";
  }

}



   mysqli_close ($conn);

?>




             
             <br />

               


           
    </div>      
            </div> 
            </div> 
            </div> 
            </div> 
            </div>          
                     
 

</div>
<br>

<div>
<hr>
</div>



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