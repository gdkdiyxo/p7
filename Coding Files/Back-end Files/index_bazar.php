


<!DOCTYPE html>
<html lang="en">

<head>

 <title>Bazar</title>
 

</head>

<body>

  <!----------------  Start Header  ---------------->

  <?php

     $menu = file_get_contents("menu_bazar.php") ;
     $base = basename($_SERVER['PHP_SELF']) ;

     $menu = preg_replace("|<li><a href=\"".$base."\">(.*)</a></li>|U", "<li id=\"current\">$1</li>", $menu) ;


  ?>
  
  <?php

     include 'menu_bazar.php' ;
     
 ?>
  
  <!----------------  End Header  ---------------->

    <!--------------  Section Featured --------------->

     <section id="featured">

      <!----------- slideshow start here ------------>

      
       <!-- slide 1 here -->

        <div data-src="img/slides/camera/slide1/img1.jpg">
          <div class="camera_caption fadeFromLeft">
            <div class="container">
              <div class="row">
                <div class="span6">
                  <h2 class="animated fadeInDown"><strong>Now you can easily <span class="colored"> Buy</span> your products from 
                  <span class="colored"> bazar</span></strong></h2>
                  <p class="animated fadeInUp"> Now it's easy to buy your products and get home delivery</p>
                    <a href="#######" class="btn btn-success btn-large animated fadeInUp">
											<i class="icon-download"></i> Buy Product
										</a>
                  
                </div>
                <div class="span6">
                  <img src="img/slides/camera/slide1/buynsell.png" alt="image loading failed" class="animated bounceInDown delay1" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- slide 2 here -->

        <div data-src="img/slides/camera/slide2/img1.jpg">
          <div class="camera_caption fadeFromLeft">
            <div class="container">
              <div class="row">

                <div class="span6">
                  <img src="img/slides/camera/slide2/subscribe.jpg" alt="" />
                </div>

                <div class="span6">
                  <h2 class="animated fadeInDown"><strong>Subscribe to get <span class="colored">the lastest product updates</span></strong></h2>
                  <p class="animated fadeInUp"> you can subscribe to get E-mail alert for your desired product updates.</p>


              <form method="post" action="index_bazar.php">
              <div class="input-append">
               <input type="email" name="email" class="span3 input-large" value=""<?php echo isset($Eemail) ? $Eemail : ''; ?>" placeholder="Enter Your E-Mail">
               <button type="submit" id="post" name="post" class="btn btn-theme btn-large" >Subscribe</button>
              </div>
             </form>

             


             <?php
    

    $conn = mysqli_connect("localhost","root","","bazar"); 


    if(isset($_POST['post']))
    {

        $Eemail = isset($_POST['email']) ? $_POST['email'] : '';
       

        if ( empty ($Eemail) ) 
       {
         $errors[] = 'Please Enter Your Email';

       }

       
       if ( !isset($errors) ) 
     {

        $sql = 'INSERT INTO subscribe (subscribe_email) VALUES (?) LIMIT 1' ;
        
        $st = $conn->prepare($sql) ;

        $st->bind_param('s',$Eemail) ;


        echo "<script>alert('Sucessfully Subscribed'); 
                  window.location='contact_bazar.php'</script>";

        
        $st->execute();
        $st->close();
        $conn->close();

     }


       else
      {
           echo "<script>alert('Error Occured.Try Again'); 
                  window.location='index_bazar.php'</script>";
      }


    }



  ?>




                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- slideshow end here -->

      <br/>
      <br/>
      <br/>


    </section>
    <!-- /section featured -->

    <section id="content">
      <div class="container">

        <div class="row">
          <div class="span12">
            <div class="row">

              <div class="span6">
                <div class="box flyLeft">
                  <div class="icon">
                    <i class="ico icon-circled icon-bgdark icon-star active icon-3x"></i>
                  </div>
                  <div class="text">
                    <h4>High <strong> Quality </strong></h4>
                    <p>
                      We ensure high quality original products for you
                    </p>
                    
                  </div>
                </div>
              </div>

              <div class="span6">
                <div class="box flyIn">
                  <div class="icon">
                    <i class="ico icon-circled icon-bgdark icon-money active icon-3x"></i>
                  </div>
                  <div class="text">
                    <h4>Lower <strong> Price </strong></h4>
                    <p>
                    You can get your desired products from here in a lowest rate from the vendors
                    </p>
                    
                  </div>
                </div>
              </div>

              <div class="span6">
                <div class="box flyIn">
                  <div class="icon">
                    <i class="ico icon-circled icon-bgdark icon-time active icon-3x"></i>
                  </div>
                  <div class="text">
                    <h4>Delivery <strong>Time</strong> Short </h4>
                    <p>
                      Delivery products in very short times
                      </p>
                    
                  </div>
                </div>
              </div>


              <div class="span6">
                <div class="box flyRight">
                  <div class="icon">
                    <i class="ico icon-circled icon-bgdark icon-user active icon-3x"></i>
                  </div>
                  <div class="text">
                    <h4> <strong> Worker </strong></h4>
                    <p>
                       We provide worker who can help you in your emergency time
                    </p>
                    
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <hr />

    
        <div class="row">
          <div class="span12">
            <div class="solidline"></div>
          </div>
        </div>
    </section>

    <section id="productRequests">
      <div class="container">
        <div class="row">
          <div class="span12">
            <h4 class="title">Recent <strong>Products</strong></h4>
            <div class="row">

              <div class="grid cs-style-6">

                <div class="span4">
                  <div class="item">


                   
    <?php


        include 'config.php';
        include 'connection.php';

        $conn = mysqli_connect("localhost", "root", "", "bazar");

          $sql = "SELECT * FROM vendor_product_post,vendor_products_images 
             WHERE vendor_product_post.b_product_id = vendor_products_images.product_id AND vendor_product_post.category='Fruits'
              ORDER BY vendor_product_post.b_product_id DESC LIMIT 1";


      if ($result = mysqli_query($conn, $sql)) 
     {
      while ($row = mysqli_fetch_assoc($result)) 
     {
        if(isset($_SESSION['user_name']))
       {
             
          echo "
              <figure>
                <div><img src=" . $row['filename'] . " alt=' '/></div>
                 <figcaption>
                  <div>
                  <br />

                  <span>
                   <h6 style='white'>ID : " . $row['b_product_id'] . "<br />
                    Name : " . $row['product_name'] . "<br />
                    Price : " . $row['est_price'] . "<br />
                    Quantity : " . $row['quantity'] . "</h6>
                  </span>

                  </div>
                </figcaption>
              </figure> ";

           }

           else {
             echo "<figure>

                     <div><img src=" . $row['filename'] . " alt=' ' /></div>
                      <figcaption>
                       <div>
                       
                       <br />
                       <span>
                        <h6 style='white' align='center'>ID : " . $row['b_product_id'] . "<br />
                          Name : " . $row['product_name'] . "<br />
                          Price : " . $row['est_price'] . "</h6>
                       </span>
   
                       </div>
                     </figcaption>
                   </figure>  ";

              }

         }
         

         }


    ?>



           </div>
        </div>


                

        <div class="span4">
                  <div class="item">

        <?php



include 'connection.php';

$conn = mysqli_connect("localhost", "root", "", "bazar");

  $sql = "SELECT * FROM vendor_product_post,vendor_products_images 
     WHERE vendor_product_post.b_product_id = vendor_products_images.product_id AND vendor_product_post.category='Meat'
      ORDER BY vendor_product_post.b_product_id DESC LIMIT 1";


if ($result = mysqli_query($conn, $sql)) 
{
while ($row = mysqli_fetch_assoc($result)) 
{
if(isset($_SESSION['user_name']))
{
     
  echo "
      <figure>
        <div><img src=" . $row['filename'] . " alt=' ' /></div>
         <figcaption>
          <div>

          <br />
     
          <span>
           <h6 style='white'>ID : " . $row['b_product_id'] . "<br />
            Name : " . $row['product_name'] . "<br />
            Price : " . $row['est_price'] . "<br />
            Quantity : " . $row['quantity'] . "</h6>
          </span>

          </div>
        </figcaption>
      </figure> ";

   }

   else {
     echo "<figure>

             <div><img src=" . $row['filename'] . " alt=' ' /></div>
              <figcaption>
               <div>
                
               <br />
               <span>
                <h6 style='white' align='center'>ID : " . $row['b_product_id'] . "<br />
                  Name : " . $row['product_name'] . "<br />
                  Price : " . $row['est_price'] . "</h6>
               </span>

               </div>
             </figcaption>
           </figure>  ";

      }

 }
 
 }


?>



   </div>
</div>


                
             </div>
            </div>
          </div>
        </div>
      </div>
    </section>

 <!--------------   Footer Starts ------------------>

  <?php include 'footer_bazar.php'?>

  
   </body>

 </html>


