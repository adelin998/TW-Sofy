
  <?php 

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
   $categorie=$row['CATEGORIE'];

if(isset($_POST['downloadSubmit'])){
   $idD=$_POST['downloadSubmit'];
   $sqlDwn="UPDATE apps set NO_DOWNLOADS=(NO_DOWNLOADS+1) where ID='$idD'" ;
   if($db->query($sqlDwn) === TRUE){
    header("Location: app_src/".$id."/".$row['APP_SRC']);
   }


  }


   $sql1="SELECT * from users where ID='$idUp'";
   $result=mysqli_query($db,$sql1);
   $username=$result->fetch_assoc();
   $result->free();
    
   $sql2="SELECT * from apps where CATEGORIE='$categorie' and ID!= '$id' ORDER BY RATING DESC limit 3";
   $result2=mysqli_query($db,$sql2) or die($db->error);
 

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
          <a href="index.php"><img src="img/home.png" width="22px" height="22px" style="margin-bottom: -3px;"> Acasa</a>
          <a href="adauga.php"><img src="img/add.png" width="22px" height="22px" style="margin-bottom: -3px;"> Adauga aplicatie</a>
          <a href="login.php" style="float: right;margin-right: 30px;margin-top: -5px"><img src="img/user.png" width="22px" height="22px" style="margin-bottom: -3px;"> Log in</a>
          <form class="searchForm">
            <input type="text" placeholder="Search..">
            <button type="submit"><img src="img/searchIcon.png" width="22px" height="22px" style="margin-bottom: -3px;"></button>
          </form>
        </div> 
      </nav>
      <!-- Sfarsit bara de navigare -->

   <section >
    <div class="left">
      <a href="index.php">
          <button class="back_button">Back </button>
       </a>
       </div>

    <div class="center centerUser" style="min-height: 800px">
      <h2 class="appTitle"><?php echo $row['NUME']; ?>  </h2><br>
      <div class="leftApp">
        <img onerror="this.onerror=null; this.src='img/default.svg'" src=<?php echo "logo_src/".$row['ID']."/".$row['LOGO_SRC']; ?> >
      </div>
        <div class="rightApp">
          
            <ul>

               <div class="suggestions" style="float:right; width: 50%; display: flex;flex-direction: column; justify-content: center; align-self: center; text-align: center;">
               <p> Aplicatii similare: </p>

                <?php  while($sugestion = $result2->fetch_assoc()) { ?>
                <div class="edit2" style="text-align: center; ">
                  <a href= <?php echo "aplicatie.php?id=".$sugestion["ID"]; ?> > 
                  <div class="itemContent2">
                     <img  onerror="this.onerror=null; this.src='img/default.svg'" src=<?php echo "logo_src/".$sugestion['ID']."/".$sugestion['LOGO_SRC']; ?>  />
                      
                  </div>
                  <p class="itemTitle2"> <?php echo $sugestion['NUME'];?> </p>
              </div></a>
                <?php } ?>
            </div>
                
                           



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

      <form method="post" > 
  
  <button  class="downloadBtn" name="downloadSubmit" value=<?php echo $row['ID']; ?> >
      <img src="img/download.png" width="30px">
      Download 
    </button>

  </form>

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