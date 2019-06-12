<?php
$ok=5;
if(isset($_POST['regSub'])){

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'sofy');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   $username=trim($_POST['username']);
   $nume=trim($_POST['nume']);
   $prenume=trim($_POST['prenume']);
   $dt=date("Y-m-d");
   $email=$_POST['email'];
   $pass=trim(md5($_POST['pass']));
   $cpass=trim(md5($_POST['cpass']));


  if($pass != $cpass){
   $ok=2;
  }

  else {

  $select="SELECT count(USERNAME) from users where USERNAME='$username'";
    $result = mysqli_query($db,$select);
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



  $db->close();
}

if($ok==1){
  header("Location: login.php");
}
   
?>

<!DOCTYPE html>
     
	 <html>
     
	 <head>
     
	 <meta charset="utf-8"/>
	 
	 <title>Online Software Repository</title>
     
	 <link rel="stylesheet" type="text/css" href="css/style.css"/> 
	 
	 <link rel='icon' href="img/fav.png">
     
	 </head>
     
	 <body>

<!-- Bara de navigare -->
	 <nav>
	   <div class="topnav">
  <p class="menuTitle"><img src="img/fav.png" width="28px" height="28px" style="margin-bottom: -6px;">  Online Software Repository</p>
  <a href="index.php"><img src="img/home.png" width="22px" height="22px" style="margin-bottom: -3px;"> Acasa</a>
    <a href="adauga.php"><img src="img/add.png" width="22px" height="22px" style="margin-bottom: -3px;"> Adauga aplicatie</a>
     <a href="login.php" style="float: right;margin-right: 30px;margin-top: -5px"><img src="img/user.png" width="22px" height="22px" style="margin-bottom: -3px;"> Log in</a>

</div> 
	 </nav>
<!-- Sfarsit bara de navigare -->


	 <section class="sectionRegister" >
	 	
	 	<div class="centerRegister">

	 			<div class="formAddRegister">

	 				<form method="post">

	 					<h1 class="h1Form"> Inregistreaza-te </h1>

	 					<input class="inputLogin" type="text" id="username" placeholder="Nume Utilizator" name="username" minlength="5" 
	 					 required><br>
	 					<input class="inputLogin" type="text" id="nume" name="nume" placeholder="Numele Dvs." minlength="5" required><br>
	 					<input class="inputLogin" type="text" id="prenume" name="prenume" placeholder="Prenumele Dvs." minlength="5" required><br>
                    


	 					<input class="inputLogin" type="text" id="email" name="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required><br>

	 					<input class="inputLogin" type="password" id="pass" name="pass" placeholder="Parola" title="Minim 5 caractere de tipul A-Z,a-z,0-9" minlength="4" required><br>
	 					<input class="inputLogin" type="password" id="cpass" name="cpass" placeholder="Repeta Parola" title="Introduceti aceeasi parola ca mai sus." minlength="4" required><br>

	 					<div class="regBtn">
	 					<input class="buttonRegister" name="regSub" id="regSub" type="submit" value="Inregistreaza-te" >
                        </div>

                        <br>
                        <div class="result"> 
                        <?php if($ok==0){
                         echo "Eroare sql!";
                        } 

                        else
                          if ($ok==2) {
                            echo "Confirmare parola gresita!";
                          }

                          else
                            if ($ok==3) {
                              echo "Acest cont exista deja in baza de date!";
                            }


                      ?>
                         </div>

	 				</form>


	 			</div>
	 	</div>
	</section>
	

	

      
	   
     </body>

     </html>