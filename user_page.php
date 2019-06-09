<?php session_start();

  if( (!isset($_SESSION['logged'])) || $_SESSION['logged']!=true){

  	header ('Location: login.php');
  }

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'sofy');

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if(isset($_POST['yes']) ){

    $id=$_POST['idValue2'];

    $sql = "DELETE FROM apps WHERE ID=".$id;

if ($db->query($sql) === TRUE) {
    header("Location: user_page.php");
}


 else {
    header('Location: user_page.html');
}

   
 }

 else if(isset($_POST['no'])){
   header("Location: user_page.php");
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
  <div class="body">
	<!-- Bara de navigare -->
			 <nav>
			   <div class="topnav">
		  <p class="menuTitle"><img src="img/fav.png" width="28px" height="28px" style="margin-bottom: -6px;">  Online Software Repository</p>
		
		    <a href="adauga.php"><img src="img/add.png" width="22px" height="22px" style="margin-bottom: -3px;"> Adauga aplicatie</a>
           <a href="scripts/logout.php" style="border-radius:5px;padding-top: 4px;height:13px;float: right;margin-right: 30px;margin-top: 7px;background: #e8353b;"><img src="img/logout.png" width="22px" height="22px" style="margin-bottom: -5px;"> Log out</a>

		    <a href="user_profile.php" style="float: right;margin-right: 30px;margin-top: -5px"><img width="22px" height="22px" style="margin-bottom: -5px;border-radius:50%;" src=<?php echo 'img_users/'.$_SESSION['img'].'.png'; ?>> <?php echo $_SESSION['login_user']; ?></a>

  <form class="searchForm" method="post">
      <input type="text" name="searchValue" placeholder="Search..">
      <button type="submit" name="searchSubmit"><img src="img/searchIcon.png" width="22px" height="22px" style="margin-bottom: -3px;"></button>
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
	 	

    <?php


if(isset($_POST['searchSubmit'])){
$value=trim($_POST['searchValue']);
if(isset($_POST['orderSubmit'])){
    if($_POST['order']=='0'){
    	 $sql = "SELECT * from apps where NUME like '%$value%'  order by RATING desc";
    }

    else if($_POST['order']=='1'){
     $sql = "SELECT * from apps order by UPLOAD_DATE desc";
    }
   
  else if($_POST['order']=='2'){
     $sql = "SELECT * from apps order by NO_DOWNLOADS desc";
    }

   else if($_POST['order']=='3'){
     $sql = "SELECT * from apps order by COST asc";
    }

   else{
   	 $sql = "SELECT * from apps order by COST desc";
   }
}

  else{
   $sql = "SELECT * from apps where NUME like '%$value%' order by RATING desc";// where  ID_UPLOADER=".$_SESSION['idUser'];
    }
}

else {

   if(isset($_POST['orderSubmit'])){
    if($_POST['order']=='0'){
    	 $sql = "SELECT * from apps order by RATING desc";
    }

    else if($_POST['order']=='1'){
     $sql = "SELECT * from apps order by UPLOAD_DATE desc";
    }
   
  else if($_POST['order']=='2'){
     $sql = "SELECT * from apps order by NO_DOWNLOADS desc";
    }

   else if($_POST['order']=='3'){
     $sql = "SELECT * from apps order by COST asc";
    }

   else{
   	 $sql = "SELECT * from apps order by COST desc";
   }
}

  else{
   $sql = "SELECT * from apps order by RATING desc";// where  ID_UPLOADER=".$_SESSION['idUser'];
    }

}


   $result = $db->query($sql);

   if ($result->num_rows > 0) {

   	?>
  	<div class="secTitle">
	 			<p>Aplicatiile mele</p>
	 		</div>

	 		<div class="filterClass" style="margin-bottom: 0px">
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
        	
	 			<a href=<?php echo "appUser.php?id=".$row["ID"]; ?>>
	 				<div class="itemContent">
	 					<br>

	 			<img  onerror="this.onerror=null; this.src='img/default.svg'" src=<?php echo "logo_src/".$row['LOGO_SRC']; ?>  />
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

	 		    <a href=<?php echo "editare.php?id=".$row['ID'] ?> ><button class="editBtn">Editeaza</button></a>

                <form method="post">
                	<input type="number" name="idValue" style="display: none" value=<?php echo $row['ID']; ?>>
	 			<button class="stergeBtn"  id="deleteBtn" type="submit" name="delete" >Sterge</button> 
                </form>
                   
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
	</div>

       <?php 
       if(isset($_POST['delete'])){
   

       	?>
       <form class="deleteForm" method="post">
    	<h2>Are you sure do you want to delete this application?</h2>
    	<input type="number" name="idValue2" style="display: none" value=<?php echo $_POST['idValue']; ?>>
       <button type="submit" name="yes">Yes</button>
       <button name="no">No</button>
       </form>

      <style type="text/css">
        
      	.body{
      		opacity: .2;
      	}
      </style>

       	<?php
       }
       ?>
   
     </body>
     </html>