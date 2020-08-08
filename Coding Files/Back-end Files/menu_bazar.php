
 

 <head>

  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="bazar" />
  <meta name="Himel" content="" />

  <!--------------------   CSS  --------------------->

  <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-responsive.css" rel="stylesheet" />
  <link href="css/flexslider.css" rel="stylesheet" />
  <link href="css/prettyPhoto.css" rel="stylesheet" />
  <link href="css/camera.css" rel="stylesheet" />
  <link href="css/jquery.bxslider.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  
  <link href="css/menubar.css" rel="stylesheet" />

 <!---------------------  Theme skin  ------------------>

  <link href="color/default.css" rel="stylesheet" />

  <!----------------- Fav and touch icons -------------->

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
  <link rel="shortcut icon" href="ico/favicon.png" />

   <!-----------------   Style for Logo  ------------------>
	 <style> 

    .logo-image
   {

    width: 80px;
    height: 35px;
    overflow: hidden;
    margin-top: -4px;
    opacity: 0.8;
    
  }
   

  .dropbtn 
  {
    background-color: white; 
    color: black;
    padding: 10px;
    font-size: 14px;
    border: none;
  }

   .dropdown 
  {
    position: relative;
    display: inline-block;
  }

  .dropdown-content 
 {
   display: none;
   position: absolute;
   background-color: #f1f1f1;
   min-width: 200px;
   box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
   z-index: 1;
 }

 .dropdown-content a 
{
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: green;}



  </style>


</head>


<body>


<div id="wrapper">

<!------------------ Start Header ---------------->

  <header>

    <div class="top">
      <div class="container">
        <div class="row">

          <div class="span6">
          
          </div>
     
     <div class="span6">     

     <ul class="social-network">

     
     </ul>

      </div>

        </div>
      </div>
    </div>


    <div class="container">

      <div class="row nomargin">

        <div class="span3">

           <div class="logo-image" id="logo">
              <a href="index_bazar.php"><img src="img/logo/logo.png" class="img-fluid" /></a>
            </div>

        </div>

        <div class="span9">
          <div class="navbar navbar-static-top">

            <div class="navigation">

              <nav>
                <ul class="nav topnav">

                <li><a href="index_bazar.php">Home</a></li>

                <li><a href="fruits_vege.php">Fruits &amp Vegetables</a></li>
                 <li><a href="meat_fish.php">Meat &amp Fish</a></li>
                 <li><a href="groceries.php">Groceries</a></li>
                 <li><a href="homemade.php">Homemade</a></li>
                 <li><a href="worker.php">Worker</a></li>


             <?php
    
                  if(!isset($_SESSION)) 
                 { 
                    session_start(); 
                  } 

                  if(isset($_SESSION['user_name']))
                 {
         
   
             ?>

<!-------------------------------   After user login    ---------------------------->
                 
           <div class="dropdown"> 
             <button class="dropbtn">
               <i class="pe-7s-user"></i>

    <?php 
    
      $use = $_SESSION['user_name'];
     
      $conn = mysqli_connect("localhost","root","","bazar");

      $sql = "SELECT * FROM client_signup WHERE username='$use'";
      $sql_vendor = "SELECT * FROM vendor_signup WHERE username='$use'";
      $sql_admin = "SELECT * FROM admin WHERE username='$use'";

     
       if($result = mysqli_query($conn,$sql))
      {

           while ($row = $result->fetch_assoc()) 
          {
                  
                $firstname = $row["firstname"];      
                    
                echo '<tr> 
                        <td>'.$firstname.'</td>                    
                      </tr>';

                echo"
                    </button>
                    <div class='dropdown-content'> 

                    <a href='c_profile.php'>My Profile</a>
                    
                    <hr><a href='c_logout.php' class='w3-bar-item w3-button w-3-padding-10px'>Logout</a></hr>
                    
                    </div> " ;

               }
       
         }


         if($result = mysqli_query($conn,$sql_vendor))
         {
   
              while ($row = $result->fetch_assoc()) 
             {
                     
                   $firstname = $row["firstname"];      
                       
                   echo '<tr> 
                           <td>'.$firstname.'</td>                    
                         </tr>';
   
                   echo"
                       </button>
                       <div class='dropdown-content'> 
   
                       <a href='v_profile.php'>My Profile</a>
                       
                       <hr><a href='v_logout.php' class='w3-bar-item w3-button w-3-padding-10px'>Logout</a></hr>
                       
                       </div> " ;
        
                  }
          
            }


            if($result = mysqli_query($conn,$sql_admin))
            {
      
                 while ($row = $result->fetch_assoc()) 
                {
                        
                      $f = $row["username"];      
                          
                      echo '<tr> 
                             <td><h6 style="color:red"> '.$f.'</h6></td>                     
                            </tr>';
      
                      echo"
                          </button>
                          <div class='dropdown-content'> 
      
                          <a href='admin_profile.php'>Admin Profile</a>
                          
                          <hr><a href='admin_logout.php' class='w3-bar-item w3-button w-3-padding-10px'>Logout</a></hr>
                          
                          </div> " ;
           
                     }
             
               }

      
    ?>

              
   <?php


   }

   else
  {
   

   ?>
     

     <li><a href="contact_bazar.php">Contact Us</a></li>

      <li>
         
          <a href="#myModal" role="button" class="btn btn-large btn-primary" data-toggle="modal">Sign Up</a>

         <!------------- Popup for Signup --------------->

           <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >


              <div class="modal-header">
                  <button type="button" color="red" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Sign Up</h3>
              </div>

              <div class="modal-body" "flip-card back">

                  <form action="menu_bazar.php" method="post">

                      <label for="Type">Choose Your type</label>

                        <select onchange="location = this.options[this.selectedIndex].value;">

                            <option value="1" selected>Choose Here</option>
                            <option value="c_signup.php">Client Sign Up</option>
                            <option value="v_signup.php">Vendor Sign Up</option>
                            
                        </select>​

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                  </form>

               </div>

           </div>
        
      </li>
        
        
      <li>    
       
     <!------------------  Log In Pop Up  ---------------> 
        
       <a  href="##myModal" role="button" class="btn btn-large btn-primary"  data-target="#login" data-toggle="modal">Log In</a>

         <div id="login" class="modal fade" role="dialog">
           <div class="modal-dialog">
  
             <div class="modal-content">
               <div class="modal-body">
                                               
                 <h3>Log In</h3>
                                      
                  <div class="modal-body" "flip-card back">

                    <form action="menu_bazar.php" method="post">

                     <label for="Type">Choose Your type</label>

                      <select onchange="location = this.options[this.selectedIndex].value;">

                          <option value="1" selected>Choose Here</option>
                          <option value="c_login.php">Client Log In</option>
                          <option value="v_login.php">Vendor Log In</option>

                     </select>​


          <div class="modal-footer">
                                                
            <div class="form-group">
                        
    <!---------------  FORGOT PASSWORD  --------------->

     <a onclick="window.location.href='#####';" class="btn btn-lg btn-primary pull-left" href="#####" data-target="#changepassword" data-toggle="modal">

      <i class="fa fa-lock fa-fw w3-margin-left"></i> Forgot Password</a>
        <div id="Demo2" class="w3-hide w3-container">
        <div class="w3-row-padding">
        </div>
        </div>
 
   <!-------------------- Popup For Change Password-------------------->

   <div id="changepassword" class="modal fade" role="dialog">
      <div class="modal-dialog">
  
          <div class="modal-content">
            <div class="modal-body">                   
                                      
                <div class="modal-body">

 <!---------------------   Input Form ( Change Password )  ------------------->

    <form method="post" action="menu_bazar.php" >

      <table>

        <tr>
        <td>Username :</td>
            <td><input type="text" size="15" name="user"></td> 
        </tr>

        <tr>
        <td>Phone Number :</td>
            <td><input type="text" size="15" name="phone_no"></td> 
        </tr>


        <tr>
        <td>Reset Code :</td>
            <td><input type="text" size="15" name="reset_code"></td> 
        </tr>

        <tr>
        <td>New Password :</td>
            <td><input type="password" size="15" name="newpassword"></td>
        </tr>

      <hr>
  
      </table>

      <button class="btn btn-primary pull-right" type="submit" name="done" > Save</button>

      <div class="modal-footer">     
  
   </form>   

     <hr>

      <button class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
      <hr>


      <?php
    

    $conn = mysqli_connect("localhost","root","","bazar"); 

   
   if(isset($_POST['done']))
  {              
    
    $user=$_POST['user'];
    $phone_no=$_POST['phone_no'];
    $newpassword=$_POST['newpassword'];
    $reset_code=$_POST['reset_code'];

    
    $sql = "SELECT username,phone,pass_re_code,password FROM client_signup WHERE username='$user' 
               AND phone='$phone_no' AND pass_re_code='$reset_code' "; 

     $sql_2 = "SELECT username,phone,pass_re_code,password FROM vendor_signup WHERE 
                 username='$user' AND phone='$phone_no' AND pass_re_code='$reset_code' "; 

     $result = mysqli_query($conn,$sql) ;

     $res = mysqli_query($conn,$sql_2) ;

     while ($row = mysqli_fetch_array($result)) 
    {

          $username = $row['username'] ; 
           $phone = $row['phone'] ;  
            $pass = $row['password'] ;
             $r_code = $row['pass_re_code'] ;


           if( $username == $user && $phone == $phone_no  && $r_code == $reset_code)
          {
              
              $up ="UPDATE client_signup SET password='$newpassword' WHERE username='$user' AND phone ='$phone_no' AND pass_re_code='$reset_code' ";

              $upda = mysqli_query($conn, $up) ;


               if($upda)
              {
                  echo "<script>alert('New Password Update Sucessfully'); 
                  window.location='c_login.php'</script>"; 

              }

              else{
                    echo "<script>alert('Error.Password Not Updated.Try Again'); 
                    window.location='index_bazar.php'</script>";
                 }
              

              
           }

           else {

                   echo "<script>alert('Your Username and Phone Number are Wrong');  
                   window.location='index_bazar.php'</script>";
              }

    }


      while ($row = mysqli_fetch_array($res)) 
    {

          $username = $row['username'] ; 
           $phone = $row['phone'] ;  
            $pass = $row['password'] ;
             $r_code = $row['pass_re_code'] ;

             if( $username == $user && $phone == $phone_no  && $r_code == $reset_code)
             {
              
              $up ="UPDATE vendor_signup SET password='$newpassword' WHERE username='$user' AND phone ='$phone_no' 
                        AND pass_re_code='$reset_code' ";

              $upda = mysqli_query($conn, $up) ;


               if($upda)
              {
                  echo "<script>alert('New Password Update Sucessfully'); 
                  window.location='v_login.php'</script>"; 

              }

              else{
                    echo "<script>alert('Error.Password Not Updated.Try Again'); 
                    window.location='index_bazar.php'</script>";
                 }
              

           }

           else {

                   echo "<script>alert('Your Username and Phone Number are Wrong');  
                   window.location='index_bazar.php'</script>";
              }

    }


  }


?>



          

        <div class="form-group">
                          
                                    

                                   </div>                                                              
                               </div>
            
                           </form>
                      
                      </div>                           
                    </div>           
                </div>
            </div>  
        </div>
          

          <!--------------   Input Form End ( Change Password ) HTML ----------------->
        
         
  


<!------------------- End Of The Change Password Full Part  --------------------->

      <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                          
        </div>                                                                                                          
          </div>


                 </form>
                      
               </div>                           
                  
            </div>
                                 
        </div>
              
       </div>  
    </div>
          
          
        </li> 



 <?php

 }

?>


                </ul>
        
              </nav>
      
            </div>

            <!----------------------  End Navigation  --------------->

          </div>
        </div>
      </div>
    </div>

  </header>

  <!----------------  End Header  ---------------->

<!-----------   javascript ----------->

  
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

  <!------------- Template Custom JavaScript File ------------>

  <script src="js/custom.js"></script>

</body>



















  