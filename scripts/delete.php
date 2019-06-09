<?php

 if(isset($_POST['yes']) ){

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'sofy');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
    $id=$_POST['idValue2'];

    $sql = "DELETE FROM apps WHERE ID=".$id;

if ($db->query($sql) === TRUE) {
   header('Location: y.html');

    header("Location: user_page.php");
}


 else {
    header('Location: y.html');
}
   
   $db->close();
 }

 else if(isset($_POST['no'])){
   header("Location: user_page.php");
 }
?>