<?php session_start();

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'sofy');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      
      $sql = "SELECT * FROM users WHERE ID=".$_SESSION['idUser'];
      $res=mysqli_query($db,$sql);
      $row=$res->fetch_assoc();
      $res->free();

      $username=$row['USERNAME'];
      $nume=$row['NUME'];
      $prenume=$row['PRENUME'];
      $email=$row['EMAIL'];

      if(isset($_POST['submit'])){
        $usernameI=$_POST['username'];
        $numeI=$_POST['nume'];
        $prenumeI=$_POST['prenume'];
        $emailI=$_POST['email'];
        $idd=$_SESSION['idUser'];
      $sqlUp = "UPDATE users SET USERNAME='$usernameI',NUME='$numeI',PRENUME='$prenumeI',EMAIL='$emailI' where ID='$idd'";

if ($db->query($sqlUp) === TRUE) {
   $_SESSION['login_user']=$usernameI;
   header('Location: user_profile.php');
} 

      }

   $db->close();
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
    
        <a href="adauga.php"><img src="img/add.png" width="22px" height="22px" style="margin-bottom: -3px;"> Adauga aplicatie</a>
           <a href="scripts/logout.php" style="border-radius:5px;padding-top: 4px;height:13px;float: right;margin-right: 30px;margin-top: 7px;background: #e8353b;"><img src="img/logout.png" width="22px" height="22px" style="margin-bottom: -5px;"> Log out</a>

        <a href="user_profile.php" style="float: right;margin-right: 30px;margin-top: -5px"><img src="img_users/1.png" width="22px" height="22px" style="margin-bottom: -5px;border-radius:50%;"> <?php echo $_SESSION['login_user']; ?></a>


   
    </div> 
       </nav>
  <!-- Sfarsit bara de navigare -->

	 <section >
	 	<div class="left">

       <div class="dropdown">
  <a href="user_page.php"><button class="dropbtn"><img class="dropImg" src="img/grid.png" width="22px" height="22px" style="margin-bottom: -3px;">Aplicatiile mele</button></a>
</div>

       <div class="dropdown">
  <a href="user_profile.php">  <button class="dropbtn"><img class="dropImg" src="img/profilePic.png" width="22px" height="22px" style="margin-bottom: -3px;">Profilul meu</button></a>
</div>


	 	</div>
	 	<div class="center">
	 		<div class="secTitle">
	 			<p>Profilul meu</p>
	 		</div>
	 		<!--<div style="margin-left: 80px; background: #eee;width:160px;text-align:center;height:160px;border-radius: 20px;"><img style="" src="img/profilePic.png" width="150px" height="150px"></div>

	 		<div style="margin-left: 80px;margin-top: 40px;font-size: 18px"><input value="Nume: Popescu"></div>
	 		<div style="margin-left: 80px;margin-top: 30px;font-size: 18px">Prenume: Mihai</div>
	 		<div style="margin-left: 80px;margin-top: 30px;font-size: 18px">Email: mihai.popescu09@gmail.com</div>
	        -->
           <form class="profileForm" method="post" action="#">
                        <div class="leftFormProfile">
                        	<label><img style="" src="img/user2.png" width="40px" height="40px"></label><br>
                        	<div style="margin-top: 37px">Nume utilizator</div>
                        	<div style="margin-top: 32px">Numele dvs.</div>
                        	<div style="margin-top: 32px">Prenumele dvs.</div>
                        	<div style="margin-top: 32px">E-mail</div>
                        </div>
                        <div class="rightFormProfile">
                        <p><?php echo $username; ?></p><br>
	 					<input class="inputLogin" type="text"  name="username" placeholder="Nume Utilizator" value=<?php echo $username; ?>><br>
	 					<input class="inputLogin" type="text" name="nume" placeholder="Numele Dvs." value=<?php echo ucfirst($nume);?> ><br>
	 					<input class="inputLogin" type="text" name="prenume" placeholder="Prenumele Dvs." value=<?php echo ucfirst($prenume);?>><br>
	 					<input class="inputLogin" type="text" name="email" placeholder="E-mail" value=<?php echo $email;?>><br>
                        </div>
	 					<div class="regBtn btnProfile">

	 					<input class="buttonRegister" type="submit" name="submit" value="Modifica" >
                        </div>
                        

	 				</form>


	 	</div>
	</section>
	      
	<script>
function myFunction(x) {
  document.getElementById(x).classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

     </body>
     </html>