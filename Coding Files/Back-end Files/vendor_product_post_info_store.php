<?php

        
         $conn = mysqli_connect("localhost","root","","bazar");

      
         if (isset($_POST['ok'])) 
        {
           
          $Type = isset($_POST['client_name']) ? $_POST['client_name'] : '';
         
          
         if (!isset($errors)) 
        { 

    
             $sql = 'INSERT INTO vendor_product_comments(client_name) VALUES (?)';
    
             $statement = $conn->prepare($sql);

             $statement->bind_param('s',$Type) ;

             echo "<script>alert('Information and comment sent successfully'); 
                     window.location='c_profile.php'</script>";
      
                  $statement->execute();

                $statement->close();

                $conn->close();

     
          }


  else{
           echo "<script>alert('Eror Ocured.Try Again'); 
                  window.location='details_page.php'</script>";

                 
       }

}

?>


            <form method="post" action="">
              <input type="text" name="name">
              <button type="submit" name="ok" >YES</button>
            </form>   
         
        

    