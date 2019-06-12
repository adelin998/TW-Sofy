<?php
 session_start();

 if(isset($_POST['action']) && $_POST['action']=='login' ){

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'sofy');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
    $myusername = trim(mysqli_real_escape_string($db,$_POST['username']));
      $mypassword = md5(mysqli_real_escape_string($db,$_POST['password'])); 
      
      $sql = "SELECT * FROM users WHERE username = '$myusername' and pass= '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      $result->free();

      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        
         $res=mysqli_query($db,$sql);
         $id=$res->fetch_assoc();

         if($id['BLOCK_TAG']==1)
         {
            echo -1;
         }

         else {

         $_SESSION['logged']=true;
         $_SESSION['login_user'] = $myusername;
         
         $_SESSION['idUser']=(int)($id['ID']);
         $_SESSION['img']=rand(1,5);
         
        echo 1;
     }

      }

      else {
         echo 0;
      }
   
   $db->close();
 }
?>