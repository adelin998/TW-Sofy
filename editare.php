<?php session_start();

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'sofy');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      $idApp=$_GET['id'];
      $sql = "SELECT * FROM apps WHERE ID=".$idApp;
    
      $res=mysqli_query($db,$sql);
      $row=$res->fetch_assoc();
      $res->free();
      $img=$row['LOGO_SRC'];
      $name=$row['NUME'];
      $descriere=$row['DESCRIERE'];
      $pret=$row['COST'];

       if(isset($_POST['upSub'])){
      $nameU=$_POST['name'];
      $descriereU=$_POST['descriere'];
      $pretU=$_POST['pret'];

      $sqlUp = "UPDATE apps SET Nume='$nameU',DESCRIERE='$descriereU',COST='$pretU' where ID='$idApp'";

if ($db->query($sqlUp) === TRUE) {
  // $_SESSION['login_user']=$usernameI;
   header('Location: editare.php?id='.$idApp);
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

        <a href="user_profile.php" style="float: right;margin-right: 30px;margin-top: -5px"><img width="22px" height="22px" style="margin-bottom: -5px;border-radius:50%;" src=<?php echo 'img_users/'.$_SESSION['img'].'.png'; ?>> <?php echo $_SESSION['login_user']; ?></a>


   
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
	 			<p></p>
	 		</div>
	 		<!--<div style="margin-left: 80px; background: #eee;width:160px;text-align:center;height:160px;border-radius: 20px;"><img style="" src="img/profilePic.png" width="150px" height="150px"></div>

	 		<div style="margin-left: 80px;margin-top: 40px;font-size: 18px"><input value="Nume: Popescu"></div>
	 		<div style="margin-left: 80px;margin-top: 30px;font-size: 18px">Prenume: Mihai</div>
	 		<div style="margin-left: 80px;margin-top: 30px;font-size: 18px">Email: mihai.popescu09@gmail.com</div>
	        -->
           <form class="profileForm" method="post" action="#" style="min-height: 500px">
                        
        
                          <h2 style="text-align: center;width: 100%;margin-bottom: 40px">
                            <?php echo $name; ?>
                          </h2>

                          


                        <br>
                        <div class="leftFormProfile" >
                        <br>
                        	<div style="margin-top: -17px">Nume aplicatie</div>
                        	<div style="margin-top: 70px">Descriere</div>
                        	<div style="margin-top: 94px">Pret</div>
                        </div>
                        

                        <div class="rightFormProfile">

	 					<input class="inputLogin" type="text"  name="name" required  style="width:350px" value=<?php echo ucfirst($name); ?> ><br>
	 					<textarea class="inputLogin" type="text" style="width:350px" name="descriere" rows="5" required><?php echo ucfirst($descriere);?></textarea><br>
	 					<input class="inputLogin" type="number" style="width:350px" name="pret" required  max="100" min='0'  value=<?php echo $pret;?>><br>
                        </div>
	 					<div class="regBtn btnProfile">
            <br><br>
	 					<input class="buttonRegister" type="submit" name="upSub" value="Modifica"  style="margin-top: 30px">
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