


<?php

session_start();

 


?>



<!DOCTYPE html>
<html lang="en">

<head>

 <title>Meat & Fish</title>
 
 
 
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
   
  
   <section id="content">
      <div class="container">
        <div class="row">

          <div class="span4">

            <aside class="left-sidebar">

             

             
              <div class="widget">

                <h5 class="widgetheading">Paid video ads for trending Products</h5>
                <div class="video-container">
                  <iframe width="850" height="450" src="https://www.youtube.com/embed/J9thhWbFqLU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </div>
              </div>

              <div class="widget">

                <h5 class="widgetheading">Rules & Regulations</h5>
                <p>
                  Here we'll write some rules & regulations about our service.
                </p>

              </div>
            </aside>
          </div>


          <div class="span8">

            <div class="row">
              <div class="span8">
                <h4 class="title">Recent <strong> Products</strong></h4>

                <div class="row">


                  <!--------------------- PHP CODE -------------------->


       <?php

         // AND vendor_product_post.Active = 1
          include 'config.php';
          include 'connection.php';

          $conn = mysqli_connect("localhost", "root", "", "bazar");

          $sql = "SELECT * FROM vendor_product_post,vendor_products_images 
            WHERE vendor_product_post.b_product_id = vendor_products_images.product_id AND vendor_product_post.category='Meat'
         
            ORDER BY vendor_product_post.b_product_id DESC LIMIT 0,10";


           if ($result = mysqli_query($conn, $sql)) 
          {
               while ($row = mysqli_fetch_assoc($result)) 
              {
                 if(isset($_SESSION['user_name']))
                {
                      
                   echo "<div class='span3'>
                   <div class='item'>
                    <div class='flip-card'>
                     <div class='flip-card-inner' size='width:180px,height:160px'>
                      <div class='flip-card-front' >

                           <img src=" . $row['filename'] . " style='width:250px;height:200px'>

                         </div>

                         <div class='flip-card-back'>
                   
                            <h5><b>" . $row['category'] . "</b></h5>

                            <p>Product ID : " . $row['b_product_id'] . "</p>
                            <p>Product Name : " . $row['product_name'] . "</p>
                            <p>Price : " . $row['est_price'] . "</p>
                            <p>Quantity : " . $row['quantity'] . "</p>
                            <p>Type : " . $row['type'] . "</p>

                            <p><button class='btn btn-success btn-sm'><a href='details_page.php?product_id=" . $row['b_product_id'] . "'>Details</a></button></p>

                      </div>
                    </div>
                  </div>
                </div>
              </div> ";
                    }

                    else{
                      echo "<div class='span3'>
                        <div class='item'>
                         <div class='flip-card'>
                          <div class='flip-card-inner' size='width:200px,height:180px'>
                           <div class='flip-card-front' >

                                <img src=" . $row['filename'] . " style='width:200px;height:200px'>

                              </div>

                              <div class='flip-card-back'>

                                <h5><b>" . $row['category'] . "</b></h5>

                                <p>Product Name : " . $row['product_name'] . "</p>
                                <p>Price : " . $row['est_price'] . "</p>
                                <p>Quantity : " . $row['quantity'] . "</p>
                                <p>Type : " . $row['type'] . "</p>
                                <p>Status : " . $row['product_status'] . "</p>


                       
                      </div>
                    </div>
                  </div>
                </div>
              </div> ";
                    }

                  }
                  

                  }





                  ?>


                  <!--------------------------    PHP  ------------------------------>




                </div>



                <hr><br>

                <div id="pagination">
                  <span class="all">Page 1 of 2</span>
                  <span class="current">1</span>

                  <a href="meat_fish.php" class="inactive">2</a>


                </div>
              </div>
            </div>
          </div>
    </section>





    <!--------------   Footer Starts ------------------>

   <?php include 'footer_bazar.php'?>


  </body>