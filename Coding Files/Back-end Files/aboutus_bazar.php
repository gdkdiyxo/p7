

<?php

session_start();


?>



<!DOCTYPE html>
<html lang="en">

<head>

 <title>About Us</title>
 
  <style>
.center {
  
 
  align-items: center;
  height: 200px;
 
}


*{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
}

.team-section{
	overflow: hidden;
	text-align: center;
	background: #34495e;
	padding: 60px;
}

.team-section h1{
	text-transform: uppercase;
	margin-bottom: 20px;
	color: white;
	font-size: 30px;
}

.border{
	display: block;
	margin: auto;
	width: 600px;
	height: 5px;
	background: #3498db;
	margin-bottom: 40px;
}

.ps{
	margin-bottom: 35px;
}

.ps a {
	display: inline-block;
	margin: 30px;
	width: 250px;
	height: 250px;
	overflow: hidden;
	border-radius: 50%
}

.ps a img{
	width: 100%;
	filter: grayscale(100%);
	transition: 0.4s all;
}

.ps a:hover > img{
	filter: none;
}

.section{
	width: 600px;
	margin: auto;
	font-size:25px;
	color: white;
	text-align: justify;
	margin-bottom: 35px;
}

.section:target {
	height: auto;	
}

.name{
	display: block;
	margin-bottom: 30px;
	text-align: center;
	text-transform: uppercase;

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

 
    <!-------------------  About Us Information HTML  ------------->  

    <div>

 <br />
  <br />
  <div class="team-section">

  <h1 class="set-title" align="center" ><u>Meet The Team Bazar</h1></u>
   <br></br>
    <br></br>

     <div class="ps">
       <a href="#p2"><img src="admin_bazar_1.jpg" alt="face"></a>
    </div>

      <div class="section" id="p2">
  	   <span class="name">Md. Hafizur Rahman</span>
  	      <span class="border"></span>
          <p>
  	      	Currently Studying at North South University (CSE)<br/>
            <br/> Full Stack Web Developer <br/> CEO of Bazar <br/><br />
               Email : hafizur.rahman@bazar.com
  	      	
  	      </p>
  </div>

</div>


  <br/>
  <br/>
  <br/>
         
  <!---------------  End of The form and Data Insertion Complete   ---------------->
        
  <?php include 'footer_bazar.php'?>
  
  </body>

 </html>


 

