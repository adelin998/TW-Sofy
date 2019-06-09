<?php session_start();

  if( (!isset($_SESSION['logged'])) || $_SESSION['logged']!=true){

  	header ('Location: login.php');
  }

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'sofy');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

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
		  <a href="scripts/logout.php" style="float: right;margin-right: 30px;margin-top: -5px"><img src="img/logout.png" width="22px" height="22px" style="margin-bottom: -5px;"> Log out</a>
		  <form class="searchForm">
		  <input type="text" placeholder="Search..">
		  <button type="submit"><img src="img/searchIcon.png" width="22px" height="22px" style="margin-bottom: -3px;"></button>
		</form>
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

      





	 	<div class="center centerUser">
	 		<h2 class="appTitle">Netflix  <?php echo $_GET['id']; ?> </h2><br>
	 		<div class="leftApp">
	 			<img src="img/netflix.png" >
	 		</div>
       	<div class="rightApp">
       		
       			<ul>
       				<li>Categorie : Divertisment</li>
       				<li>Sistem de operare : Windows,Linux,Mac OS</li>
       				<li>Cost Aplicatie : Gratis</li>
       				<li>Taguri : #filme #familie #seriale #timpliber </li>
       				<li>Rating : 
       				<img src="img/star.png" width="20px" style="margin-bottom: -5px;" >
       				<img src="img/star.png" width="20px" style="margin-bottom: -5px;" >
       				<img src="img/star.png" width="20px" style="margin-bottom: -5px;" >
       				<img src="img/star.png" width="20px" style="margin-bottom: -5px;" >
       				<img src="img/emptyStar.png" width="20px" style="margin-bottom: -5px;" ></li>
       				<li>Descarcari : 567</li>
       				<li>Uploadat de : maria_margherita </li>
       				<li>Size : 3.42 GB</li>
       				<li>Data upload : 14/03/2018 </li>





       			</ul>
       	</div>
	 	<p class="description">Descriere : <br><br>Netflix is the world’s leading subscription service for watching TV episodes and movies on your favorite device. This Netflix mobile application delivers the best experience anywhere, anytime.
Get the free app as a part of your Netflix membership and you can instantly watch thousands of TV episodes & movies on your mobile device. Netflix, Inc. is an American media-services provider headquartered in Los Gatos, California, founded in 1997 by Reed Hastings and Marc Randolph in Scotts Valley, California. The company's primary business is its subscription-based streaming OTT service which offers online streaming of a library of films and television programs, including those produced in-house. As of January 2019, Netflix had over 139 million paid subscriptions worldwide, including 58.49 million in the United States, and over 148 million subscriptions total including free trials. It is available almost worldwide except in mainland China, Syria, North Korea, Iran, and Crimea. The company also has offices in the Netherlands, Brazil, India, Japan, and South Korea. Netflix is a member of the Motion Picture Association of America (MPAA). </p>

		<form class="downloadForm" action="index.html">
		<button value="" class="downloadBtn" type="submit">
			<img src="img/download.png" width="30px">
			Download
		</button>
		</form>
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