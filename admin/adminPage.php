<?php session_start();
if($_SESSION['adminLog']==false || !isset($_SESSION['adminLog'])){
 	header("Location: index.php");
 }
?>
<!DOCTYPE html>
     
	 <html>
     
	 <head>
     
	 <meta charset="utf-8"/>
	 
	 <title>Online Software Repository</title>
     
	 <link rel="stylesheet" type="text/css" href="../css/style.css"/> 
	 
	 <link rel='icon' href="../img/fav.png">
     
	 </head>
     
	 <body>


	<!-- Bara de navigare -->
			 <nav>
			   <div class="topnav">
		  <p class="menuTitle"><img src="../img/fav.png" width="28px" height="28px" style="margin-bottom: -6px;">  Online Software Repository</p>
		    <a href="adminPage.php"><img src="../img/dash.png" width="22px" height="22px" style="margin-bottom: -3px;"> Dashboard</a>

		  <a href="logout.php" style="border-radius:5px;padding-top: 4px;height:13px;float: right;margin-right: 30px;margin-top: 7px;background: #e8353b;"><img src="../img/logout.png" width="22px" height="22px" style="margin-bottom: -5px;"> Log out</a>
		
		</div> 
			 </nav>
 	<!-- Sfarsit bara de navigare -->

	 <section class="sectionAdministrator" >
	 	<div class="centerAdministrator" s>
	 		<div class="secTitle">
	 			<h2>Dashboard administrator</h2>
	 		</div>

	 		<a href="users_administrator.php">
	 		<div class="buttonAdministratorLeft">
	 			 <img class="imgAdministrator" src="../img/usersIcon.png"/ > 
	 			<p class="buttonAdministratorContent">Useri</p>
	 		</div>
	 	    </a>

	 	    <a href="apps_administrator.php">
	 		<div class="buttonAdministratorRight">
	 			<img class="imgAdministrator" src="../img/appsIcon.png"/ > 
	 			<p class="buttonAdministratorContent">Apps</p>
	 		</div>
	 	    </a>
	
	 	</div>
	</section>
	
     </body>

     </html>