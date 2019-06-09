<?php session_start(); 
   if((!isset($_SESSION['logged'])) || $_SESSION['logged']!=true ){
   	header("Location: login.php");
   }

   if(isset($_POST['addSub'])){

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'sofy');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   $nume=trim($_POST['nume']);
   $tags=trim($_POST['tags']);
   $descriere=$_POST['descriere'];
   $so=$_POST['so'];
   $categorie=$_POST['categorie'];
   $cost=$_POST['cost'];
   $dt=date("Y-m-d");
   $size=$_FILES["fileArhiva"]["size"];
   $arhiva= basename($_FILES["fileArhiva"]["name"]);
   $logo= basename($_FILES["fileLogo"]["name"]);
   $id=$_SESSION["idUser"];


$sql = "INSERT INTO apps (NUME,ID_UPLOADER,CATEGORIE,S_O,TAGS,DESCRIERE,COST,UPLOAD_DATE,RATING,NO_DOWNLOADS,SIZE,ACCEPT_TAG,APP_SRC,LOGO_SRC)
VALUES ('$nume','$id','$categorie','$so','$tags','$descriere','$cost','$dt',0,0,'$size',0,'$arhiva','$logo')";

if ($db->query($sql) === TRUE) {
    header('Location: user_page.php');
} 

else {
    echo "eroare sql";
}

   
 $db->close();
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
    
        
           <a href="scripts/logout.php" style="border-radius:5px;padding-top: 4px;height:13px;float: right;margin-right: 30px;margin-top: 7px;background: #e8353b;"><img src="img/logout.png" width="22px" height="22px" style="margin-bottom: -5px;"> Log out</a>

        <a href="user_profile.php" style="float: right;margin-right: 30px;margin-top: -5px"><img src="img_users/1.png" width="22px" height="22px" style="margin-bottom: -5px;border-radius:50%;"> <?php echo $_SESSION['login_user']; ?></a>


      <form class="searchForm" method="post">
      <input type="text" name="searchValue" placeholder="Search..">
      <button type="submit" name="searchSubmit"><img src="img/searchIcon.png" width="22px" height="22px" style="margin-bottom: -3px;"></button>
    </form>
    </div> 
       </nav>
  <!-- Sfarsit bara de navigare -->



	 <section class="sectionAdauga" >
	 	
	 	<div class="centerAdauga">

	 			<div class="formAddAdauga">

	 				<form method="post" enctype="multipart/form-data">

	 					<h1 class="h1Form"> Formular de adaugare a unei aplicatii </h1><br>

					

	 					<input class="inputLogin" type="text" placeholder="Numele aplicatiei" name="nume" required><br>
	 					<input class="inputLogin" type="text" placeholder="Tag-uri" name="tags" required><br>
	 					<textarea type="text" placeholder="Descriere aplicatie" class="inputLogin" rows="4" name="descriere" required ></textarea>
	 					<select class="inputLogin" name="so" required>
	 						<option value="" selected style="display:none">Sistemul de operare</option>
                        	<option value="Windows 10">Windows 10</option>
                        	<option value="Windows XP">Windows XP</option>
                        	<option value="Windows Vista">Windows Vista</option>
                        	<option value="Widnows 7">Widnows 7</option>
                        	<option value="Windows 8">Windows 8</option>
                        	<option value="Windows NT">Windows NT</option>
                        	<option value="Linux">Linux</option>
                        	<option value="Mac OS">Mac OS</option>
                        	<option value="iOS">iOS</option>
                        	<option value="Android">Android</option>
                        </select>

                      
	 					<br>
	 					<select class="inputLogin" name="categorie" required>
	 						<option value="" selected style="display:none">Categoria</option>
                        	<option value="Afacere">Afacere</option>
                        	<option value="Arta si design">Arta si design</option>
                        	<option value="Comunicare">Comunicare</option>
                        	<option value="Cumparaturi">Cumparaturi</option>
                        	<option value="Divertisment">Divertisment</option>
                        	<option value="Domeniu Medical">Domeniu Medical</option>
                        	<option value="Educatie">Educatie</option>
                        	<option value="Familie">Familie</option>
                        	<option value="Jocuri">Jocuri</option>
                        	<option value="Altele">Altele</option>
                        </select>
	 					<br>
	 					<input class="inputLogin" name="cost" placeholder="Pretul aplicatiei" type="number" min="0" max="100" required>
	 					<br><br>

	 					    <div >Arhiva aplicatie: </div><input type="file" id="fileArhiva" name="fileArhiva" accept=".zip,.rar" required>
						<div for="fileUp" style="margin-top:37px;" >Logo aplicatie: </div><input type="file" id="fileLogo" name="fileLogo" accept=".jpg,.jpeg,.gif,.tiff,.png,.bmp" required><br><br>

	 					<div class="regBtn">
	 					<input class="buttonRegister" type="submit" name="addSub" value="Adauga Aplicatie" >
                        </div>
                       
	 				</form>


	 			</div>
	 	</div>
	</section>
	

	

      
	   
     </body>

     </html>