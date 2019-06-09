<?php session_start();

  if( (!isset($_SESSION['logged'])) || $_SESSION['logged']!=true){

  	header ('Location: login.php');
  }

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'sofy');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $id=$_GET['id'];
   $sql="SELECT * from apps where ID='$id'";
   $res=mysqli_query($db,$sql);
   $row = $res->fetch_assoc();
   $res->free();
   $idUp=$row['ID_UPLOADER'];

   $sql1="SELECT * from users where ID='$idUp'";
   $result=mysqli_query($db,$sql1);
   $username=$result->fetch_assoc();
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
 <a href="user_profile.php"> <button class="dropbtn"><img class="dropImg" src="img/profilePic.png" width="22px" height="22px" style="margin-bottom: -3px;">Profilul meu</button></a>
</div>


	 	</div>

      





	 	<div class="center centerUser" style="min-height: 800px">
	 		<h2 class="appTitle"><?php echo $row['NUME']; ?>  </h2><br>
	 		<div class="leftApp">
	 			<img onerror="this.onerror=null; this.src='img/default.svg'" src=<?php echo "logo_src/".$row['LOGO_SRC']; ?> >
	 		</div>
       	<div class="rightApp">
       		
       			<ul>
       				<li>Categorie : <?php echo ucfirst($row['CATEGORIE']); ?> </li>
       				<li>Sistem de operare : <?php echo ucfirst($row['S_O']); ?></li>
       				<li>Cost Aplicatie : <?php if($row['COST']==0) echo "Gratis"; else echo $row['COST']; ?></li>
       				<li>Taguri : <?php echo $row['TAGS']; ?> </li>
       				<li>Rating : 
       				<?php 
       				$stars=floor($row['RATING']);
    	            $emptyStars=5-$stars;  
    	                  ?>

    	                  <?php for($i=0;$i<$stars;$i++) {?>
	 			 <img src="img/star.png" width="20px" style="margin-bottom: -5px;width:20px;height:20px" >
       				<?php }
                    for($j=0;$j<$emptyStars;$j++)   {
       				 ?>
                    
       				<img src="img/emptyStar.png" width="20px" style="margin-bottom: -5px;width:20px;height:20px" >
                    <?php }?> </li>
       				<li>Descarcari : <?php echo $row['NO_DOWNLOADS'] ; ?></li>
       				<li>Uploadat de : <?php echo $username['USERNAME']; ?> </li>
       				 <li>Size : <?php 
                     echo $row['SIZE'].' MB'; 
       				 ?> </li>
       				<li>Data upload : <?php echo $row['UPLOAD_DATE']; ?> </li>





       			</ul>
       	</div>
	 	<p class="description">Descriere : <br><br><?php  echo $row['DESCRIERE']; ?> </p>

		<div class="downloadForm" >
	<a href=<?php 
	echo "app_src/".$row['APP_SRC']; ?> ><button  class="downloadBtn" >
			<img src="img/download.png" width="30px">
			Download 
		</button>
		</a>
		</div>
	 	</div>

	</section>
	      
	<script>
  function hide(id) { 
            document.getElementById(id).style.display='none'; 
    }  

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