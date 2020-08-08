

<?php

session_start();


?>



<!DOCTYPE html>
<html lang="en">

<head>

 <title>Contact Us</title>
 
  
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

 
  
     
    <!-------------------  PHP Code Start and Data Inserted Into Databse contact_us Table  ------------->  

 <?php
        
     include 'config.php' ;
     include_once("connection.php");

     $conn = mysqli_connect("localhost","root","","bazar");

     $Saved = FALSE;


     if(isset($_POST['post']))
    {

       $Nname = isset($_POST['name']) ? $_POST['name'] : '';
       $Eemail = isset($_POST['email']) ? $_POST['email'] : '';
       $Ssubject = isset($_POST['subject']) ? $_POST['subject'] : '';
       $Mmessage = isset($_POST['message']) ? $_POST['message'] : '';

      
        if ( empty ($Nname) ) 
       {
         $errors[] = 'Please Enter Your Name';

       }

        if ( empty ($Eemail) )  
       {
         $errors[] = 'Please Enter Your Email';

       }

        if ( empty ($Ssubject) ) 
       {
         $errors[] = 'Please Enter Your Subject';
       }

        if ( empty ($Mmessage) ) 
       {
         $errors[] = 'Please Enter Your Message';
       }

      
     
       if ( !isset($errors) ) 
     {

        $contact_us_table = 'INSERT INTO contact_us (name,email,subject,message) VALUES (?,?,?,?)' ;
        
        $st = $conn->prepare($contact_us_table) ;

        $st->bind_param('ssss',$Nname,$Eemail,$Ssubject,$Mmessage) ;


        echo "<script>alert('Your Query Send Sucessfully'); 
                  window.location='index_bazar.php'</script>";

        
        $st->execute();
        $st->close();
        $conn->close();

        $Saved = TRUE;
       
     }


      else{
              echo "<script>alert('Error Occured. Complete All The Input Fields Properly and Try Again'); 
                      window.location='contact_bazar.php'</script>";
          }


      }



  ?>



  <!-------------------  PHP Code END and Data Inserted Into Databse contact_us Table  ------------->  



 <!-----------------------    Form     ------------------>

  <br>
  <h5 align="center">Having Any Query ! Write Us</h5>

  <div class="card text-center">
    <div class="card-body">
     <hr>
      <div class="col-md-8 col-sm-8 marb20">
        <div class="contact-info">
          <div class="space">
             
    
              <form method="post" action="contact_bazar.php" class="contactForm" enctype="multipart/form-data">
              
              
                <input type="text" name="name" required placeholder="Write Your Name" value="<?php echo isset($Nname) ? $Nname : ''; ?>">

                <input type="email" name="email" required placeholder="Write Your Email" value="<?php echo isset($Eemail) ? $Eemail : ''; ?>">
           
                <input type="text" name="subject" required placeholder="Write Your Subject" value="<?php echo isset($Ssubject) ? $Ssubject : ''; ?>">
             
                <textarea name="message" placeholder="Message (Not more than 100 letters)"  rows="4" required value="<?php echo isset($Mmessage) ? $Mmessage : ''; ?>"></textarea>

              
                <button type="submit" id="post" name="post" class="btn btn-form">Send Message</button>
                 <br></br>
           
            
              </form>

            </div>

          </div>
        </div>
     </div>
  </div>


  <br>
         
  <!-------------------  End of The form and Data Insertion Complete   ---------------->
        
  <?php include 'footer_bazar.php'?>
  
  </body>

 </html>


 

