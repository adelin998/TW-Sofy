<?php session_start();
 if($_SESSION['adminLog']==false || !isset($_SESSION['adminLog'])){
 	header("Location: index.php");
 }

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'sofy');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);



   $sql="SELECT * from users";
   $res = $db->query($sql);
   
   if(isset($_POST['block'])){
   	$idB=$_POST['block'];
   $sqlBlock="UPDATE users set BLOCK_TAG=1 where ID='$idB'";

   if($db->query($sqlBlock)){
   $sql2="SELECT * from users";
   $res->free();

   $res = $db->query($sql2);
   }
    

    }

      if(isset($_POST['unblock'])){
   	$idB=$_POST['unblock'];
   $sqlBlock="UPDATE users set BLOCK_TAG=0 where ID='$idB'";

   if($db->query($sqlBlock)){
   $sql2="SELECT * from users";
   $res->free();

   $res = $db->query($sql2);
   }
    

    }

       if(isset($_POST['delete'])){
   	$idB=$_POST['delete'];

   $sqlBlock="DELETE from users where ID='$idB'";

   if($db->query($sqlBlock)){
   $sql2="SELECT * from users";
   $res->free();

   $res = $db->query($sql2);
   }
    

    }
/*
if(isset($_POST['downloadSubmit'])){
   $idD=$_POST['downloadSubmit'];
   $sqlDwn="UPDATE apps set NO_DOWNLOADS=(NO_DOWNLOADS+1) where ID='$idD'" ;
   if($db->query($sqlDwn) === TRUE){
    header("Location: app_src/".$row['APP_SRC']);
   }


  }*/



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
	 	<div class="centerAdministrator" style="min-height: 1000px">
	 		<div class="secTitle">
	 			<h2>Users</h2>
	 		</div>

	 		<table id="t01">
			  <tr>
			  	<th>ID</th>
			    <th>Username</th>
			    <th>Number of applications</th>
			    <th>Mail</th>
			    <th>Registration date</th>
			    <th>Operations</th>
			  </tr>
        <?php  while($row = $res->fetch_assoc()) { ?>

			  <tr>
			  	<td><?php echo $row['ID']; ?></td>
			    <td><?php echo $row['USERNAME']; ?></td>
			    <td><?php echo $row['NO_APPS']; ?></td>
			    <td><?php echo $row['EMAIL']; ?></td>
			    <td><?php echo $row['REGISTRATION_DATE']; ?></td>

			    <td id="op" style="width:180px">
                  <form method="post">
			    	<button class="buttonDelete" name="delete" type="submit" value=<?php echo $row['ID']; ?> > Delete</button>
                 </form>
			    	<?php if($row['BLOCK_TAG']==0){ 
			    ?>
			    <form method="post">
			    	<button class="buttonBlock" type="submit" name="block" value=<?php echo $row['ID']; ?> > Block </button>

			    </form>
			    <?php
			     }
			     else {
			    ?>
              <form method="post">
			    	<button class="buttonBlock" type="submit" name="unblock" style="background: #349128" value=<?php echo $row['ID']; ?> > Unblock </button>
			    </form>

			<?php } ?>
			  </td>
			  </tr>

           <?php
            }
           ?>
			</table>
	
	 	</div>
	</section>
	

	
     </body>

     </html>