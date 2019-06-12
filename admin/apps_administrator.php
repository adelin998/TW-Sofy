<?php session_start();
 if($_SESSION['adminLog']==false || !isset($_SESSION['adminLog'])){
 	header("Location: index.php");
 }

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'sofy');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);



   $sql="SELECT * from apps order by ACCEPT_TAG";
   $res = $db->query($sql);
   

   if(isset($_POST['accept'])){
   	$idB=$_POST['accept'];
   $sqlBlock="UPDATE apps set ACCEPT_TAG=1 where ID='$idB'";

   if($db->query($sqlBlock)){
   $sql2="SELECT * from apps order by ACCEPT_TAG";
   $res->free();

   $res = $db->query($sql2);
   }
    

    }

       if(isset($_POST['delApp'])){
   	$idB=$_POST['delApp'];
   $sqlBlock="DELETE from apps where ID='$idB'";

   if($db->query($sqlBlock)){
   $sql2="SELECT * from apps order by ACCEPT_TAG";
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

	 <section class="sectionAdministrator">
	 	<div class="centerAdministrator">
	 		<div class="secTitle">
	 			<h2>Apps</h2>
	 		</div>

			<table id="t01">
					  <tr>
               
			  	<th>ID</th>
			  	<th>User</th>
			    <th>Name</th>
			    <th>Category</th>
			    <th>Operating System</th>
			    <th>Rating</th>
			    <th>Tags</th>
			    <th>Cost</th>
			    <th>Operations</th>
			  </tr>

        <?php  while($row = $res->fetch_assoc()) {
               
   $sqlUser="SELECT * from  users where ID=".$row['ID_UPLOADER'];
   $resUser = $db->query($sqlUser);
   $idUser=$resUser->fetch_assoc();
         ?>

			  <tr >
			    
			    <td><?php echo $row['ID']; ?></td>
			    <td><?php echo $idUser['USERNAME'];  ?></td>
			    <td><?php echo $row['NUME']; ?></td>
			    <td><?php echo $row['CATEGORIE']; ?></td>
			    <td><?php echo $row['S_O']; ?></td>
			    <td><?php echo $row['RATING']; ?></td>
			    <td><?php echo $row['TAGS']; ?></td>
			    <td><?php echo $row['COST']." lei"; ?></td>

			    <td id="op" style="width: 180px">
                   
                   <?php if($row['ACCEPT_TAG']==1) {  ?> 
                	<p class="buttonAccept acc" style="margin-top: 0px;margin-bottom: 0px" >Accepted</p>
                    <?php } else { ?>
                   
                    <form method="post">
                	 <button class="buttonAccept" name="accept" type="submit" value=<?php echo $row['ID']; ?> >Accept</button>
                   </form>
                 <?php } ?>
                   <form method="post">
                	 <button class="buttonDelete2" type="submit"  name="delApp" value=<?php echo $row['ID'] ; ?> >Delete</button>
                   </form>


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