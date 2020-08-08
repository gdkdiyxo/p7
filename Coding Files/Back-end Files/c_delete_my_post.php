

<?php
   
      include 'config.php';
      include 'connection.php';

      $conn = mysqli_connect("localhost","root","","bazar");
          
      $id = $_GET['product_id'];

      $sql = "DELETE FROM client_demand_post WHERE b_product_id= $id LIMIT 1;".
              "DELETE FROM client_products_images WHERE product_id= $id LIMIT 1;".
               "DELETE FROM client_product_comments WHERE product_id= $id LIMIT 1;" ;


      if (mysqli_multi_query($conn, $sql))
     {   
         echo "Your Record Successfully Deleted" ;
         mysqli_close($conn);
         header('Location: c_profile.php'); 
         exit;
    } 
     
     else 
   {
      echo "Error Deleting Record";
   }


?>