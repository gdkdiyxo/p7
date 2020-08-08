
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

 <title>MY OWN POSTS HISTORY</title>
 
  <!-- Profile Block and Others -->

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

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
       <br />
        
      <table align ="center" border="2px" style="width:98%" ; line-height:50px;">
      <tr>
         <th colspan="100%"><h4 class="title" align="center"><strong>MY POST HISTORY : Vendor</strong></h4>
      </tr>
      
        <tr>

          <th>Product ID</th>
          <th>Product Name</th>
          <th>Image </th>

          <th colspan="1">Product Category <hr style="height:1px;border-width:0;color:black;background-color:black">Price
            <hr style="height:1px;border-width:0;color:black;background-color:black"> Quantity
          </th>


          <th>Type <hr style="height:1px;border-width:0;color:black;background-color:black">Place
          </th>

          <th>Post Time<hr style="height:1px;border-width:0;color:black;background-color:black">Status
          </th>
        
          <th>Details</th>
          <th>Contact (My Own)</th> 
          <th>Comment (Received)<hr style="height:1px;border-width:0;color:black;background-color:black">Your Reply
          </th>
          
          <th>Delete</th>

        </tr> 

     <?php

      ini_set( "display_errors", 0);

      include 'config.php';
      include 'connection.php';

      $use = $_SESSION['user_name'];

      $conn = mysqli_connect("localhost","root","","bazar");
          
       
      /* $sql = "SELECT * FROM user_demand_post ud INNER JOIN b_products_images img_t ON 
      ud.b_product_id=img_t.product_id WHERE ud.b_username=img_t.img_user LIMIT 5";
      */
      $sql = "SELECT * FROM vendor_product_post LEFT JOIN vendor_products_images  
      ON vendor_products_images.product_id = vendor_product_post.b_product_id LEFT JOIN 
             vendor_product_comments ON vendor_product_comments.product_id = vendor_product_post.b_product_id WHERE 
             vendor_product_post.b_username='$use' LIMIT 5";
      
    //  $comment_table = "SELECT * FROM  WHERE vendor_username='$use' LIMIT 5";
      // $sql = "SELECT * FROM client_demand_post WHERE b_username='$use' LIMIT 5";
        
         $data = mysqli_query($conn,$sql) ;
         $total = mysqli_num_rows($data) ;

        if($total>0)
      {

        while ($row=mysqli_fetch_assoc($data))
      {

           if(isset($_SESSION['user_name']))
         {
          echo "

         <tr>
           <td rowspan='3' align ='center'>".$row['b_product_id']."</td>
          

          <tr>
           <td rowspan='3' align ='center'>".$row['product_name']."</td>
          </tr>
          
        
           <td rowspan='3' align ='center'> <img src=".$row['filename']." alt='Paris' style='width:130px;height:100px'></td>

           <td rowspan='3' align ='center'>".$row['category']." <hr style='height:1px;border-width:0;color:black;background-color:black'> ".$row['est_price']."
           <hr style='height:1px;border-width:0;color:black;background-color:black'> ".$row['quantity']."</td>
           
           <td rowspan='3' align ='center'> ".$row['type']." <hr style='height:1px;border-width:0;color:black;background-color:black'> ".$row['de_place']." </td>

           
           <td rowspan='3' align ='center'> 
           ".$row['post_time']." <hr style='height:1px;border-width:0;color:black;background-color:black'>
           
           <form method='post' action='v_my_post.php'>
           <input type='text' id='st' name='st'><br/>                              
           <button class='btn btn-success btn-sm' type='submit' name='yes' id='yes'>
           <a href='v_my_post.php?product_id=".$row['b_product_id'] ."'>
           <strong> UPDATE</strong></button></a><br/>".$row['product_status']."   
           </td>

           </form>
  
           <td rowspan='3' align ='center'> ".$row['pro_details']."</td> 
           <td rowspan='3' align ='center'>Name : ".$row['b_username']." </br> Email : ".$row['b_email']." </br> Phone : ".$row['b_phone']." </td>
           
           <td rowspan='3' align ='center'> ".$row['client_username']." | <strong>".$row['client_name']."</strong> | ".$row['client_phone']." <br>
            ".$row['client_comment']." <hr style='height:1px;border-width:0;color:black;background-color:black'>
            


           <form method='post' action='v_my_post.php'>
           <input type='text' id='reply_post' name='reply_post'><br/>                              
           <button class='btn btn-success btn-sm' type='submit' name='ok' id='ok'>
          
           
           <a href='v_my_post.php?product_id=" .$row['b_product_id'] . "'>REPLY</a></button></td>
           </form>

            
            </td>
           <td rowspan='3' align ='center'><button class='btn btn-danger btn-sm'><a href='v_delete_my_post.php?product_id=" .$row['b_product_id'] . "'>Delete</a></button></td>
           
           

       </tr>

</div>
</div> " ;


      }
      else "ERROR";
    }
    
    }

    else 
    {  
        echo "&emsp;&emsp;<b>No Record Exist</b><hr/>";
     }

     
  ?>

    </table>

    

    <?php
   
   
   include 'config.php';
   include 'connection.php';

   $conn = mysqli_connect("localhost","root","","bazar");


   $id = $_GET['product_id'];
   $p = $_POST['st'];


   if(isset($_POST['yes']))
   {              
 
      $sql =" UPDATE vendor_product_post SET product_status='$p' WHERE b_product_id='14' LIMIT 1 " ;

     if (mysqli_query($conn, $sql))
           {
               mysqli_close($conn);
               echo "<script>alert('Status Update Sucessfully'); 
               window.location='v_profile.php'</script>";
               exit;

           }
           else{
                 echo "<script>alert('Eror .Try Again'); 
                 window.location='v_my_post.php'</script>";
              }
           
              $conn->close();

    }



?>




<?php
   
   
   include 'config.php';
   include 'connection.php';

   $conn = mysqli_connect("localhost","root","","bazar");


   $id = $_GET['product_id'];
   $rep = $_POST['reply_post'];


   if(isset($_POST['ok']))
   {              
   
  
      $sql =" UPDATE vendor_product_comments SET vendor_reply ='$rep' WHERE product_id=$id LIMIT 1 " ;

            if (mysqli_query($conn, $sql))
           {
               mysqli_close($conn);
               echo "<script>alert('Replied Sucessfully'); 
                    </script>";

                    header('Location: v_profile.php'); 
                    exit;
            

           }

              else 
            {
               echo "Error Occured ! Try Again";
             }
           
              $conn->close();

    }


    
   
?>



      
             <div>
           </div>
          <br />
          <br />
          <br />
       <hr/>


  <?php include 'footer_bazar.php'?>      

   
  
    
 </body>




 
      
  