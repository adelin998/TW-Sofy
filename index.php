<?php session_start();

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

 
  <a href="login.php" style="float: right;margin-right: 30px;margin-top: -5px"><img src="img/user.png" width="22px" height="22px" style="margin-bottom: -3px;"> Log in</a>


 <form class="searchForm" method="post">
      <input type="text" name="searchValue" placeholder="Search..">
      <button type="submit" name="searchSubmit"><img src="img/searchIcon.png" width="22px" height="22px" style="margin-bottom: -3px;"></button>
    </form>



</div> 
	 </nav>

<!-- Sfarsit bara de navigare -->

	 <section >
	 	<div class="left">
      <br>
      <form method="post">
        <br><br>
	 				<select name="category" class="dropbtn2" style="background: #2980B9; transition-duration: 0.4s;" onmouseover="this.style.background='#216796'" onmouseout="this.style.background='#2980B9'">
            <option value="-1"> Categorie</option>
	 					<option value="0"> Afacere</option>
	 					<option value="1"> Arta si design</option>
	 					<option value="2"> Comunicare</option>
						<option value="3"> Cumparaturi</option>
	 					<option value="4"> Divertisment</option>
	 					<option value="5"> Domeniul medical</option>
	 					<option value="6"> Educatie</option>
	 					<option value="7"> Familie</option>
	 					<option value="8"> Jocuri</option>
	 					<option value="9"> Altele</option>
	 				</select><br><br>

	 				<select name="so" class="dropbtn2" style="background: #2980B9">
             <option value="-1"> Sistem operare</option>
	 					<option value="0"> Windows</option>
	 					<option value="1"> Linux</option>
	 					<option value="2"> Mac OS</option>
	 				</select><br><br>

	 				<select name="price" class="dropbtn2" style="background: #2980B9">
             <option value="-1"> Pret</option>
	 					<option value="0"> Gratis</option>
	 					<option value="1"> Cu plata</option>
	 				</select><br><br>

	       <button type="submit" name="categorySubmit" style="width: 100%; background: green; margin-top: 15px;">Filtreaza</button>
       </form>
	 	</div>
	 	<div class="center">

	 		 <?php


if(isset($_POST['searchSubmit'])){
$value=trim($_POST['searchValue']);
if(isset($_POST['orderSubmit'])){
    if($_POST['order']=='0'){
    	 $sql = "SELECT * from apps where NUME like '%$value%' and ACCEPT_TAG is not null order by RATING desc";
    }

    else if($_POST['order']=='1'){
     $sql = "SELECT * from apps where ACCEPT_TAG is not null order by UPLOAD_DATE desc";
    }
   
  else if($_POST['order']=='2'){
     $sql = "SELECT * from apps where ACCEPT_TAG is not null order by NO_DOWNLOADS desc";
    }

   else if($_POST['order']=='3'){
     $sql = "SELECT * from apps where ACCEPT_TAG is not null order by COST asc";
    }

   else{
   	 $sql = "SELECT * from apps where ACCEPT_TAG is not null order by COST desc";
   }
}

  else{
   $sql = "SELECT * from apps where NUME like '%$value%' and ACCEPT_TAG is not null order by RATING desc";// where  ID_UPLOADER=".$_SESSION['idUser'];
    }
}

else {

   if(isset($_POST['orderSubmit'])){
    if($_POST['order']=='0'){
    	 $sql = "SELECT * from apps where ACCEPT_TAG is not null order by RATING desc";
    }

    else if($_POST['order']=='1'){
     $sql = "SELECT * from apps where ACCEPT_TAG is not null order by UPLOAD_DATE desc";
    }
   
  else if($_POST['order']=='2'){
     $sql = "SELECT * from apps where ACCEPT_TAG is not null order by NO_DOWNLOADS desc";
    }

   else if($_POST['order']=='3'){
     $sql = "SELECT * from apps where ACCEPT_TAG is not null order by COST asc";
    }

   else{
   	 $sql = "SELECT * from apps where ACCEPT_TAG is not null order by COST desc";
   }
}


else if(isset($_POST['categorySubmit'])){


  include "scripts/filter.php";

  }

  else{
   $sql = "SELECT * from apps order by RATING desc";// where  ID_UPLOADER=".$_SESSION['idUser'];
  }


} 

   $result = $db->query($sql);

   if ($result->num_rows > 0) {

   	?>

	 		<div class="secTitle">
	 			<p>Cele mai descarcate aplicatii  </p>
	 		</div>
	 		<div class="filterClass">
	 			<form method="post">
	 				<select name="order">
	 					<option value="0">Cele mai populare</option>
	 					<option value="1">Cele mai recente</option>
	 					<option value="2">Cele mai descarcate</option>
	 					<option value="3">Pret crescator</option>
	 					<option value="4">Pret descrescator</option>
	 				</select>
	 				<button type="submit" name="orderSubmit">Ordoneaza</button> 
	 			</form>
	 		</div>


	<?php
    // output data of each row
        while($row = $result->fetch_assoc()) {
      $stars=floor($row['RATING']);
      $emptyStars=5-$stars;

       ?>
       
        <div class="item edit" id="item1">
          
        <a href=<?php echo "aplicatie.php?id=".$row["ID"]; ?>>
          <div class="itemContent">
            <br>

        <img  onerror="this.onerror=null; this.src='img/default.svg'" src=<?php echo "logo_src/".$row['ID']."/".$row['LOGO_SRC']; ?>  />
                 <p class="itemTitle"> <?php echo $row['NUME'];?> </p>
         <?php for($i=0;$i<$stars;$i++) {?>
         <img src="img/star.png" width="20px" style="margin-bottom: -5px;width:20px;height:20px" >
              <?php }
                    for($j=0;$j<$emptyStars;$j++)   {
               ?>
                    
              <img src="img/emptyStar.png" width="20px" style="margin-bottom: -5px;width:20px;height:20px" >
                    <?php }?>
                    
              <br>
                 <p><b> <?php echo ucfirst($row['CATEGORIE']); ?></b></p>
        <p><i> <?php 
        if($row['COST']!=0)
        echo "Pret: ".ucfirst($row['COST'])." lei"; 
          else
            echo "Gratis";

        ?> </i></p>
        <p><i> <?php echo ucfirst($row['NO_DOWNLOADS']); ?> descarcari</i></p>
          </div></a>
                   
	 	  </div>
          
       <?php
      }
     } else {
    echo "<h2 style='width:100%;text-align:center;margin-top:100px' > No App</h2>";
     }
        $db->close();

   ?>                        
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