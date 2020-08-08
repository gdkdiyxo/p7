
  
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

 <title>MY POST DETAILS VIEW</title>
  
  <style>

 /* ----- Variables ----- */
$color-primary: #4c4c4c;
$color-secondary: #a6a6a6;
$color-highlight: #ff3f40;

/* ----- Global ----- */
* {
	box-sizing: border-box;
}



h3 {
	font-size: 0.7em;
	letter-spacing: 1.2px;
	color: $color-secondary;
}

img {
	   max-width: 60%;
	   filter: drop-shadow(1px 1px 3px $color-secondary);
	}

/* ----- Product Section ----- */
.product {
	display: grid;
	grid-template-columns: 0.9fr 1fr;
	margin: auto;
	padding: 2.5em 0;
	min-width: 400px;
	background-color: white;
	border-radius: 10px;
}

/* ----- Photo Section ----- */
.product__photo {
	position: relative;
   
   
}

.photo-container {
	position: absolute;
	left: 4.5em;
	display: grid;
	grid-template-rows: 1fr;
	width: 80%;
	height: 25%;
	border-radius: 10px;
	box-shadow: 5px 5px 25px -2px rgba(0, 0, 0, 0.3);
}


	img {
		position: left;
		left: 5.5em;
		top: 2em;
		max-width: 50%;
		filter: saturate(150%) contrast(120%) hue-rotate(10deg)
			drop-shadow(1px 20px 10px rgba(0, 0, 0, 0.3));
	}
}

.photo-album {
	padding: 0.7em 1em;
	border-radius: 0 0 6px 6px;
	background-color: #fff;

	ul {
		display: flex;
		justify-content: space-around;
	}

	li {
		float: left;
		width: 55px;
		height: 55px;
		padding: 7px;
		border: 1px solid $color-secondary;
		border-radius: 3px;
	}
}

/* ----- Informations Section ----- */
.product__info {
	padding: 0.8em 0;
}

.title {
	h1 {
		margin-bottom: 0.1em;
		color: $color-primary;
		font-size: 1.5em;
		font-weight: 900;
	}

	span {
		font-size: 0.7em;
		color: $color-secondary;
	}
}

.price {
	margin: 1.5em 0;
	color: $color-highlight;
	font-size: 1.2em;

	span {
		padding-left: 0.15em;
		font-size: 2.9em;
	}
}

.variant {
	overflow: auto;

	h3 {
		margin-bottom: 1.1em;
	}

	li {
		float: left;
		width: 35px;
		height: 35px;
		padding: 3px;
		border: 1px solid transparent;
		border-radius: 3px;
		cursor: pointer;

		&:first-child,
		&:hover {
			border: 1px solid $color-secondary;
		}
	}

	li:not(:first-child) {
		margin-left: 0.1em;
	}
}

.description {
	clear: left;
	margin: 2em 0;

	h3 {
		margin-bottom: 1em;
	}

	ul {
		font-size: 0.8em;
		list-style: disc;
		margin-left: 1em;
	}

	li {
		text-indent: -0.6em;
		margin-bottom: 0.5em;
	}
}

.buy--btn {
	padding: 1.5em 3.1em;
	border: none;
	border-radius: 7px;
	font-size: 0.8em;
	font-weight: 700;
	letter-spacing: 1.3px;
	color: #fff;
	background-color: $color-highlight;
	box-shadow: 2px 2px 25px -7px $color-primary;
	cursor: pointer;

	&:active {
		transform: scale(0.97);
	}
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

  <div>


 <br />
  <br />
    <br />

   <section class="product">
	 <div class="product__photo">
		<div class="photo-container">
			<div class="photo-main">
				<div class="controls">
					
				</div>
				
       
        <?php


         include 'config.php';
         include 'connection.php';
 
        // $p_id = $_GET['product_id'];
        $p_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
        $p_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
         if(isset($p_id)){echo $p_id;}
        
      

       
       
         $sql = " SELECT * FROM vendor_product_post LEFT JOIN vendor_products_images  
                  ON vendor_products_images.product_id = vendor_product_post.b_product_id LEFT JOIN 
                  vendor_product_comments ON vendor_product_comments.product_id = vendor_product_post.b_product_id WHERE 
                   vendor_product_post.b_username='$use' AND vendor_product_post.b_product_id= $p_id LIMIT 1 ";
      
        

           if ($result = mysqli_query($conn, $sql)) 
         {

           while ($row = mysqli_fetch_assoc($result)) 
          {


             echo "  
                  <center>
                    <img id='item-display' src='" . $row['filename'] . "' alt=''></img>
                 </center> 
              
                </div>
                   <div class='photo-album'>
                  <ul>
                      
                    </ul>
                  </div>
                 </div>
               </div>
               
               <div class='product__info'>
               <div class='title'>

               <h1> " . $row['product_name'] . " </h1>
               <h5><span>Category : " . $row['category'] . "</span></h5>
         
               <h5><span> Type : <b> <font color='blue'> " . $row['type'] . " </font></b></span><br/> </h5>
               <h6> Product ID :  " . $row['b_product_id'] . "</h6>
               <span>Quantity : " . $row['quantity'] . "</span>
               <h5> Status : " . $row['product_status'] . "</h5> 

              
              <div class='btn-group cart'>
              <a onclick='window.location.href='##';' href='####' data-target='#update' data-toggle='modal'>
              <button type='button' class='btn btn-success btn-sm'> UPDATE STATUS </button></a>
              </div>
              <br/>
              <br/>


              
               <span> Delivery Place : ".$row['de_place']."</span><br/>
               <span> Posted Time :  ".$row['post_time']."</span>
  
         
               </div>

               <div class='price'>
                  Price : <b><font color='red'>" . $row['est_price'] . "</font></b></span><br/>
               </div>
               
               <span><h6><b>My Posted Contact Info : </b></h6>
                Name : ".$row['b_username']." </br> Email : ".$row['b_email']." </br> Phone : ".$row['b_phone']." </span>
           


             
               <div class='description'>
                  <h3>Product Details :</h3>
                  <ul>
                    <li>".$row['pro_details']."</li>
                 </ul>
               </div>

              <br>
              <hr>


              <h5>Comment Received From :</h5> Comment Time : ".$row['comment_time']." <br /> Username : ".$row['client_username']." <br/>Name : <strong>".$row['client_name']."</strong> 
                             <br/> Phone : ".$row['client_phone']." <br/> Comment : ".$row['client_comment']." 
                             <hr style='height:1px;border-width:0;color:black;background-color:black'>


           
              <form method='post' action='v_my_post_details.php'>
              
              <input type='text' placeholder='PRODUCT ID' name='pro'><br />                         
            
              <textarea id='reply_post' name='reply_post'></textarea><br/>                              
              <button class='btn btn-success btn-sm' type='submit' name='reply_done'>
              <a href='v_my_post_details.php?product_id=".$row['b_product_id'] ."'>
              <strong> REPLY</strong></button></a><br/>   
              </form>

            <br />
            <hr />
  
           
              ";


             
           echo"    </div>
               </section>";





           }
        
         }


			


?>

<?php error_reporting (E_ALL ^ E_NOTICE); ?>






<div id="update" class="modal fade" role="dialog">
     <div class="modal-dialog">
 
         <div class="modal-content">
           <div class="modal-body">                   
                                     
               <div class="modal-body">


             <div class="form-group">
             <form method="post" action="v_my_post_details.php" enctype="multipart/form-data">
              
              <table>


  <?php

   
   $p_id = $_GET['product_id'];


   $conn = mysqli_connect("localhost","root","","bazar"); 

   $use = $_SESSION['user_name'];


    $sql = "SELECT * FROM vendor_product_post,vendor_products_images 
        WHERE vendor_product_post.b_product_id=vendor_products_images.product_id 
       AND vendor_product_post.b_product_id= $p_id LIMIT 1";

       $result = mysqli_query($conn,$sql) ;

        while ($row = mysqli_fetch_assoc($result)) 
      {

                echo "ID : $p_id <h6> Status : " . $row['product_status'] . "</h6> ";


      }


      ?>
                       
         
          <tr>
             <td><input type="text" placeholder="PRODUCT ID" name="produ">                         
            </td>    
          </tr>

          <tr>
             <td><input type="text" placeholder="Enter Your Status" name="product_st">                         
            </td>    
          </tr>
             
            <hr>
    
          </table>

              <button class="btn btn-primary pull-right" type="submit" name="complete" >YES</button>
               <div class="modal-footer">     
    
         </form>   
         <hr>

          <button class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
         <hr>
            

         <?php
   
  
            include 'connection.php';

           $conn = mysqli_connect("localhost","root","","bazar");
       
          //  $id = $_GET['product_id'];
          $p_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
          $p_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
  
         // $s= intval($p_id) ;

     if (isset($_POST['complete'])) 
    {
      
      $product_st = $_POST['product_st'];
      $prod = $_POST['produ'];

       
      //$p_id  = $_GET['product_id'] ;
     
     
       $sql = "UPDATE vendor_product_post SET product_status = '$product_st' WHERE b_product_id='$prod' ";

      if (mysqli_query($conn, $sql))
    {   
      echo "<script>alert('Status Update successfully'); 
      window.location='v_profile.php'</script>";
       mysqli_close($conn);
     
      exit;
 } 
  
  else 
{
  echo "<script>alert('Error occured updating status'); 
  window.location='v_my_post_details.php'</script>";

}
   }

?>
 

     
 <?php
   
  
   include 'connection.php';

  $conn = mysqli_connect("localhost","root","","bazar");

 //  $id = $_GET['product_id'];
 $p_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
 $p_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';

// $s= intval($p_id) ;

if (isset($_POST['reply_done'])) 
{

$rep_post = $_POST['reply_post'];
$p = $_POST['pro'];


//$p_id  = $_GET['product_id'] ;


$sql = "UPDATE vendor_product_comments SET vendor_reply = '$rep_post' WHERE product_id='$p' LIMIT 1";

if (mysqli_query($conn, $sql))
{   
echo "<script>alert('Replied successfully'); 
window.location='v_profile.php'</script>";
mysqli_close($conn);

exit;
} 

else 
{
echo "<script>alert('Error occured replying'); 
window.location='v_my_post_details.php'</script>";

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


<?php include 'footer_bazar.php'?>    
