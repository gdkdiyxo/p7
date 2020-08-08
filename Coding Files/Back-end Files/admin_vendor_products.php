
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

 <title>Vendor Products</title>
 
  
  <style>

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
       <br />
        
      <table id="my_post">
    
        <tr>

          <th>Product ID</th>
          <th>User Name <hr style="height:2px;border-width:0;color:black;background-color:#ddd">Name
          </th>
          <th>E-mail <hr style="height:2px;border-width:0;color:black;background-color:#ddd">Phone
          </th>
          
          <th>Product Name <hr style="height:2px;border-width:0;color:black;background-color:#ddd">Product Category
                <hr style="height:2px;border-width:0;color:black;background-color:#ddd">Place
          </th>
          
          <th>Image </th>

          <th>Type <hr style="height:2px;border-width:0;color:black;background-color:#ddd">
                 Price <hr style="height:2px;border-width:0;color:black;background-color:#ddd">Quantity
          </th>
        
        

          <th>Post Time<hr style="height:2px;border-width:0;color:black;background-color:#ddd">Status
          </th>
        
          <th>Details</th>

          <th>Client's Side</th>

        </tr> 


     <?php

      ini_set( "display_errors", 0);

      include 'config.php';
      include 'connection.php';

      $use = $_SESSION['user_name'];

      $conn = mysqli_connect("localhost","root","","bazar");
          

      $sql = "SELECT * FROM vendor_product_post LEFT JOIN vendor_products_images  
      ON vendor_products_images.product_id = vendor_product_post.b_product_id LEFT JOIN 
             vendor_product_comments ON vendor_product_comments.product_id = vendor_product_post.b_product_id ";
      
        
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
                  <td>".$row['b_product_id']."</td>

                  <td> ".$row['b_username']." <hr style='height:2px;border-width:0;color:black;background-color:black'> 
                  ".$row['b_name']." 
                 </td>

                 <td> ".$row['b_email']." <hr style='height:2px;border-width:0;color:black;background-color:black'> 
                 ".$row['b_phone']." 
                 </td>

                <td> ".$row['product_name']." <hr style='height:2px;border-width:0;color:black;background-color:black'> 
                   ".$row['category']." <hr style='height:2px;border-width:0;color:black;background-color:black'> 
                   ".$row['de_place']." 
                </td>

               <td> <img src=".$row['filename']." alt='Paris' style='width:130px;height:100px'></td>

               <td>".$row['type']." <hr style='height:2px;border-width:0;color:black;background-color:black'>  
                    ".$row['est_price']." <hr style='height:2px;border-width:0;color:black;background-color:black'> 
                       ".$row['quantity']." 
               </td>

               

               <td> ".$row['post_time']." <hr style='height:2px;border-width:0;color:black;background-color:black'>
                        <strong>".$row['product_status']."</strong>   
               </td>

               <td>".$row['pro_details']."</td>
                
               <td>Ven. Reply : ".$row['vendor_reply']." <hr style='height:2px;border-width:0;color:black;background-color:black'> Client's
                  Username :".$row['client_username']."  <br />
                  Name : ".$row['client_name']."   <br />
                  Phone : ".$row['client_phone']."   <br />
                  Comment : ".$row['client_comment']."   <br />
                  Time : ".$row['comment_time']." 

               </td>
                
           
           
                </tr> " ;
       
        }

        else "ERROR OCCURED" ;

     }
    
    }

      else 
    {  
        echo "&emsp;&emsp;<b>Empty Table.No Record Exist</b><hr/>";
     }

     
  ?>

    </table>


        <br />
      <br />
    <hr/>


   <?php include 'footer_bazar.php'?>      


 </body>




      
  