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

 <title>Vendor Profile</title>
 
  <!-- Profile Block and Others -->

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">

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
       <h4 class="w3-center bold text-shadow: 2px 2px #FF0000" style="color:black" ;>MY PROFILE : VENDOR</h4> 
       <hr></hr>
      
       <p><i class="fa fa-user-circle fa-fw w3-margin-right w3-large w3-text-teal"></i>


       <?php  include 'v_signup_info_db.php' ?>

       <?php
           
           echo '<tr> 
                   <td>'.$firstname.'</td>     
                   <td>'.$lastname.'</td>                                   
                </tr>';
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

 <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i> 
  <?php
    
    echo '<tr> 
            <td>'.$email.'</td>                                     
         </tr>';
 ?>  
</p>

<p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>
<?php
    
    echo '<tr> 
            <td>'.$phone.'</td>                                      
         </tr>';
?>  
</p>


      </div>
    </div>
    <br>
    
    <!------------------ Flip for More Info ---------------->

    <div class="w3-card w3-round">

      <div class="w3-white">

        <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme w3-left-align w3-hover-white">
        <i class="fa fa-info-circle fa-fw w3-margin-right"></i> More Info</button>
        <div id="Demo1" class="w3-hide w3-container">

       <hr>

       <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Address : 
       
       <?php
    
         echo '<tr> 
                <td>'.$address.'</td>                                     
             </tr>';
       ?>
       
       </p>

       <p><i class="fa fa fa-registered fa-fw w3-margin-right w3-large w3-text-teal"></i>Registration Date : 

       <?php
    
          echo '<tr> 
                  <td>'.$reg_time.'</td>                                     
               </tr>';
       ?>

      </p>

        </div>
    
      <button onclick="window.location.href='v_profile_edit.php';" class="w3-button w3-block w3-theme w3-left-align w3-hover-white">
       <i class="fa fa-edit fa-fw w3-margin-right"></i>Edit Profile</button>
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


<?php

include 'config.php' ;

$use = $_SESSION['user_name'];


$conn = mysqli_connect("localhost","root","","bazar");

$productSaved = FALSE;

if (isset($_POST['done'])) 
{
  
  $buyerName = isset($_POST['b_name']) ? $_POST['b_name'] : '';

  $buyerEmail = isset($_POST['b_email']) ? $_POST['b_email'] : '';
  
  $buyerPhone = isset($_POST['b_phone']) ? $_POST['b_phone'] : '';
 

  $pro_cat = isset($_POST['category']) ? $_POST['category'] : '';

  $Type = isset($_POST['type']) ? $_POST['type'] : '';

  $proName = isset($_POST['product_name']) ? $_POST['product_name'] : '';

  $Price = isset($_POST['est_price']) ? $_POST['est_price'] : '';

  $Quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';

  $Details = isset($_POST['pro_details']) ? $_POST['pro_details'] : '';

  $place = isset($_POST['de_place']) ? $_POST['de_place'] : '';



   if (empty($buyerName)) 
  {
      $errors[] = 'Please Enter Your Name';
  }

   if (empty($buyerEmail)) 
  {
      $errors[] = 'Please Enter Your Email';
  }

   if (empty($buyerPhone)) 
  {
      $errors[] = 'Please Enter Your Phone Number';
  }
 

  if (empty($pro_cat)) 
  {
      $errors[] = 'Please Choose a Category';
  }
 
 if (empty($Type)) 
  {
      $errors[] = 'Please Choose Your Type';
  }



    if (!is_dir(UPLOAD_DIR)) 
  {
      mkdir(UPLOAD_DIR, 0777, true);
  }

  
  $filenamesToSave = [];

  $allowedMimeTypes = explode(',', UPLOAD_ALLOWED_MIME_TYPES);

  
  if (!empty($_FILES)) {
      if (isset($_FILES['file']['error'])) {
          foreach ($_FILES['file']['error'] as $uploadedFileKey => $uploadedFileError) {
              if ($uploadedFileError === UPLOAD_ERR_NO_FILE) {
                  $errors[] = 'You did not provide any files.';
              } elseif ($uploadedFileError === UPLOAD_ERR_OK) {
                  $uploadedFileName = basename($_FILES['file']['name'][$uploadedFileKey]);

                  if ($_FILES['file']['size'][$uploadedFileKey] <= UPLOAD_MAX_FILE_SIZE) {
                      $uploadedFileType = $_FILES['file']['type'][$uploadedFileKey];
                      $uploadedFileTempName = $_FILES['file']['tmp_name'][$uploadedFileKey];

                      $uploadedFilePath = rtrim(UPLOAD_DIR, '/') . '/' . $uploadedFileName;

                      if (in_array($uploadedFileType, $allowedMimeTypes)) {
                          if (!move_uploaded_file($uploadedFileTempName, $uploadedFilePath)) {
                              $errors[] = 'The file "' . $uploadedFileName . '" could not be uploaded.';
                          } else {
                              $filenamesToSave[] = $uploadedFilePath;
                          }
                      } else {
                          $errors[] = 'The extension of the file "' . $uploadedFileName . '" is not valid. Allowed extensions: JPG, JPEG, PNG, or GIF.';
                      }
                  } else {
                      $errors[] = 'The size of the file "' . $uploadedFileName . '" must be of max. ' . (UPLOAD_MAX_FILE_SIZE / 1024) . ' KB';
                  }
              }
          }
      }
  }

  
   if (!isset($errors)) 
  {
      
      $sql = 'INSERT INTO vendor_product_post (b_username,b_name,b_email,b_phone,category,type,product_name,est_price,quantity,pro_details,de_place) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
    
      $statement = $conn->prepare($sql);

      $statement->bind_param('sssssssdsss',$use,$buyerName,$buyerEmail,$buyerPhone,$pro_cat,$Type,$proName,$Price,$Quantity,$Details,$place);
      

      $statement->execute();

      $lastInsertId = $conn->insert_id;

      $statement->close();


      $sql_1 = 'INSERT INTO vendor_product_comments (product_id,vendor_username) VALUES (?, ?)';

      $st = $conn->prepare($sql_1);

      $st->bind_param('is', $lastInsertId, $use);

      $st->execute();

      $st->close();


       foreach ($filenamesToSave as $filename) 
      {
          $sql = 'INSERT INTO vendor_products_images (product_id,filename,img_user) VALUES (?, ?,?)';

          $statement = $conn->prepare($sql);

          $statement->bind_param('iss', $lastInsertId, $filename,$use);

          $statement->execute();

          $statement->close();


         


      }
        
      echo "<script>alert('Information Store Sucessfully'); 
      window.location='v_my_post.php'</script>";

      $conn->close();

      $productSaved = TRUE;

     
  }


  else{
           echo "<script>alert('Eror Ocured.Try Again'); 
                  window.location='v_profile.php'</script>";
       }

}

?>


<!------------------------  Middle Column  -------------------------->
  
 <div class="w3-col m7">
  
    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding w3-teal w3-opacity-min">
            <h3 style="color:white" ;><b>Post Your Product</b></h3>

            <br>
            <h6 style="color:white" ;><b>Product Information :</b></h6>
           
            <form method="post" action="v_profile.php" class="w3-container w3-card-4 w3-light-grey" enctype="multipart/form-data">
            <br>
            
              <input type="text" name="b_name"  placeholder="Enter Your Name" value="<?php echo isset($buyerName) ? $buyerName : ''; ?>">

              <input type="text" name="b_email"  placeholder="Enter Your Email" value="<?php echo isset($buyerEmail) ? $buyerEmail : ''; ?>">

              <input type="text" name="b_phone"  placeholder="Enter Your Phone Number"  value="<?php echo isset($buyerPhone) ? $buyerPhone : ''; ?>">
            

             <p><label>Product Category</label></p>

               <select class="form-control" name="#">
                  <option value="##" selected>Fruits and vegetable</option>
                  <option value="#">Meat and Fish</option>
                  <option value="#">Groceries</option>
                  <option value="#">Homemade</option>
                  <option value="##">Worker</option>
                  
              </select>

            <input type="text" name="category"  placeholder="Enter Your Category"  value="<?php echo isset($pro_cat) ? $pro_cat: ''; ?>">
           <br></br>
            
           <p><label>Buying Catagory </label></p>

                <select class="form-control" name="##">
                  <option value="Regular" selected>Regular : 2-3 Working Days </option>
                  <option value="Emergency">Emergency : 6 - 8  Hours</option>
                  <option value="Super Speed">Super Speed : 30 Mins to 1 Hour</option>
                </select>
          
            <input type="text" name="type"  placeholder="Enter Your Type"  value="<?php echo isset($Type) ? $Type: ''; ?>">

           <br></br>

            <input type="text" name="product_name"  placeholder="Product Name" value="<?php echo isset($proName) ? $proName: ''; ?>">

            <input type="text" name="est_price"  placeholder="Enter Your Price" value="<?php echo isset($Price) ? $Price: ''; ?>">

            <input type="text" name="quantity"   placeholder="Enter Your Quantity" value="<?php echo isset($Quantity) ? $Quantity: ''; ?>">

           <br></br>

          <label for="file">Images</label>
          <input type="file" id="file" name="file[]" multiple>

          <br></br>

          <textarea class="w3-input w3-border" name="pro_details" type="text" placeholder="Product Details" value="<?php echo isset($pDetails) ? $pDetails: ''; ?>"></textarea>

          <hr>

          <input type="text" name="de_place"  placeholder="Delivery Place" value="<?php echo isset($place) ? $place: ''; ?>">

          <br></br>

          <button type="submit" id="submit" name="done" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Post</button> 
          <br></br>

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

    <button onclick="window.location.href='v_my_post.php';" class="w3-button w3-block w3-theme w3-left-align w3-hover-green"> 
    <i class="fa fa-sticky-note-o fa-fw w3-margin-right"></i>MY POSTS</button>

    <button onclick="window.location.href='v_my_comment.php';" class="w3-button w3-block w3-theme w3-left-align w3-hover-green"> 
    <i class="fa fa-comment fa-fw w3-margin-right"></i>MY COMMENTS</button>
      
    <button onclick="window.location.href='demand_post_c.php';" class="w3-button w3-block w3-theme w3-left-align w3-hover-green"> 
    <i class="fa fa-list-ul fa-fw w3-margin-right"></i>Recent Requests </button>

    <br />

    <button onclick="window.location.href='chat_with_admin.php';" class="w3-button w3-block w3-theme w3-left-align w3-hover-green"> 
    <i class="far fa-comment-alt-dots fa-fw w3-margin-right"></i>Chat With Admin </button>
        

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