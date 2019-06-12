<?php
 session_start();

if(isset($_POST['action']) && $_POST['action']=='reg' ){

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'sofy');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   $username=trim(mysqli_real_escape_string($db,trim($_POST['username'])));
   $nume=trim(mysqli_real_escape_string($db,trim($_POST['nume'])));
   $prenume=trim(mysqli_real_escape_string($db,trim($_POST['prenume'])));
   $dt=date("Y-m-d");
   $email=trim(mysqli_real_escape_string($db,$_POST['email']));
   $pass=trim(mysqli_real_escape_string($db,trim(md5($_POST['pass']))));
   $cpass=trim(mysqli_real_escape_string($db,trim(md5($_POST['cpass']))));


  if($pass != $cpass){
   $ok=2;
  }

  else {

  $select="SELECT count(USERNAME) from users where USERNAME='$username'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

if($count>0){
   $ok=3;
}

 else {

$sql = "INSERT INTO users (USERNAME,NUME,PRENUME,EMAIL,PASS,REGISTRATION_DATE,NO_APPS,BLOCK_TAG,PROFILE_IMAGE)
VALUES ('$username','$nume','$prenume','$email','$pass','$dt',0,0,0)";

if ($db->query($sql) === TRUE) {
  $ok=1;
}

else $ok=0;

}

}



echo 2;

  $db->close();
}

echo 2;
   
?>