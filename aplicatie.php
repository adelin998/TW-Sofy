
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

  if(isset($_POST['note'])){
    $val=$_POST['note'];
     $sqlRating="INSERT INTO rating (ID_APP,VALUE) VALUES ('$id','$val')" ;
   if($db->query($sqlRating) === TRUE ){
    //header("Location: aplicatie.php?id=".$id);
   }

    $sqlSetRating="SELECT avg(VALUE) AS valRating from rating  where ID_APP='$id'" ;
     $rValue=mysqli_query($db,$sqlSetRating);
     $resR = $rValue->fetch_assoc();
     $noteV=$resR['valRating'];

     $sqlUpdateRating="UPDATE apps set RATING='$noteV' where ID='$id'";
      if($db->query($sqlUpdateRating) === TRUE ){
    //header("Location: aplicatie.php?id=".$id);
   }
   header("Location: aplicatie.php?id=".$id);

  }


   $sql1="SELECT * from users where ID='$idUp'";
   $result=mysqli_query($db,$sql1);
   $username=$result->fetch_assoc();
   $result->free();
    
   $sql2="SELECT * from apps where CATEGORIE='$categorie' and ID!= '$id' and ACCEPT_TAG > 0 ORDER BY RATING DESC limit 3";
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
              
                <?php  
                $aux=0;
                while($sugestion = $result2->fetch_assoc()) { 
                if($aux==0){
                   ?>  <p> Aplicatii similare: </p> <?php
                     $aux=1;
                }
                  ?>

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
        
              <li>Descarcari : <?php echo $row['NO_DOWNLOADS'] ; ?></li>
              <li>Uploadat de : <?php echo $username['USERNAME']; ?> </li>
               <li>Size : <?php 
                     echo $row['SIZE'].' MB'; 
               ?> </li>
              <li>Data upload : <?php echo $row['UPLOAD_DATE']; ?> </li>
                   <li>Rating : 
              <?php 
              $stars=round($row['RATING']);
                  $emptyStars=5-$stars;  
                        ?>

                        <?php for($i=0;$i<$stars;$i++) {?>
         <img src="img/star.png" width="20px" style="margin-bottom: -5px;width:20px;height:20px" >
              <?php }
                    for($j=0;$j<$emptyStars;$j++)   {
               ?>
                    
              <img src="img/emptyStar.png" width="20px" style="margin-bottom: -5px;width:20px;height:20px" >
                    <?php }?> </li>


                    <li><br>

                </li>



                <style type="text/css">
               
                  .setRating{
                    text-align: center;
                    background: #ddd;
                    width: 230px;
                    color: #19283f;
                    padding: 10px;
                    border-radius: 8px;
                    padding-bottom: 17px;
                    transition-duration: 0.5s;
                    margin-left: auto;
                    margin-right: auto;
                  }

                  .setRating p{
                    font-weight: bold;
                    margin-top: 0px;
                  }

                  .setRating button{
                 border: 0px;
                 background: #ddd;
                 cursor: pointer;
                  }

                  .rating-center{
                    width: 100%;
                    text-align: center;
                    margin-top: 40px;
                  }
                 

                </style>
         

            </ul>


        </div>

    <p class="description"> <span  style="" > <br>Descriere : <br><br><?php  echo $row['DESCRIERE']; ?>

   </span>  </p>

    <div class="downloadForm" >

      <form method="post" > 
  
  <button  class="downloadBtn" name="downloadSubmit" value=<?php echo $row['ID']; ?> >
      <img src="img/download.png" width="30px">
      Download 
    </button>

  </form>

  <div class="rating-center">
                  <form  class="setRating" method="post">
                <p>  Acorda o nota aplicatiei</p> 

                     <button type="submit" name="note" value="1" onmouseover="rating('1')" onmouseout="hideRating('1')"> <img   onerror="this.onerror=null; this.src='img/star.png'" src="img/emptyStar.png" id="1" width="20px" style=" margin-bottom: -5px;width:25px;height:25px" ></button>

                         <button type="submit" name="note" value="2" onmouseover="rating('2')" onmouseout="hideRating('2')">  <img onerror="this.onerror=null; this.src='img/star.png'" src="img/emptyStar.png" id="2" width="20px" style="margin-bottom: -5px;width:25px;height:25px" ></button>
                            <button type="submit" name="note" value="3" onmouseover="rating('3')" onmouseout="hideRating('3')">    <img  onerror="this.onerror=null; this.src='img/star.png'" src="img/emptyStar.png" id="3" width="20px" style="margin-bottom: -5px;width:25px;height:25px" ></button>
                                   <button type="submit" name="note" value="4" onmouseover="rating('4')" onmouseout="hideRating('4')">  <img   onerror="this.onerror=null; this.src='img/star.png'" src="img/emptyStar.png" id="4" width="20px" style="margin-bottom: -5px;width:25px;height:25px" ></button>
                                       <button type="submit" name="note" value="5" onmouseover="rating('5')" onmouseout="hideRating('5')">   <img  onerror="this.onerror=null; this.src='img/star.png'" src="img/emptyStar.png" id="5" width="20px" style="margin-bottom: -5px;width:25px;height:25px" ></button>
                                       <p id="result" style="margin-top: 10px;font-weight: bold;margin-bottom: 0px">Parerea ta</p>
                

                  </form>

</div>
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


function rating(id) { 
  if(id==1){
            document.getElementById(id).src='img/star.png'; 
            document.getElementById('result').innerHTML='Nu recomand'; 
          }

          else if(id==2){
              document.getElementById(id).src='img/star.png'; 
                document.getElementById(id-1).src='img/star.png'; 
                 document.getElementById('result').innerHTML='Slab'; 
          }
            else if(id==3){
              document.getElementById(id).src='img/star.png'; 
                document.getElementById(id-1).src='img/star.png'; 
                 document.getElementById(id-2).src='img/star.png'; 
                  document.getElementById('result').innerHTML='Acceptabil'; 
          }
               else if(id==4){
              document.getElementById(id).src='img/star.png'; 
                document.getElementById(id-1).src='img/star.png'; 
                 document.getElementById(id-2).src='img/star.png'; 
                  document.getElementById(id-3).src='img/star.png'; 
                   document.getElementById('result').innerHTML='Bun'; 
          }
                 else if(id==5){
              document.getElementById(id).src='img/star.png'; 
                document.getElementById(id-1).src='img/star.png'; 
                 document.getElementById(id-2).src='img/star.png'; 
                  document.getElementById(id-3).src='img/star.png'; 
                     document.getElementById(id-4).src='img/star.png'; 
                      document.getElementById('result').innerHTML='Excelent'; 
          }
    }  

    function hideRating(id){
 
       if(id==1){
            document.getElementById(id).src='img/emptyStar.png'; 

          }

          else if(id==2){
              document.getElementById(id).src='img/emptyStar.png'; 
                document.getElementById(id-1).src='emptyStar.png'; 
          }
            else if(id==3){
              document.getElementById(id).src='img/emptyStar.png'; 
                document.getElementById(id-1).src='img/emptyStar.png'; 
                 document.getElementById(id-2).src='img/emptyStar.png'; 
          }
               else if(id==4){
              document.getElementById(id).src='img/emptyStar.png'; 
                document.getElementById(id-1).src='img/emptyStar.png'; 
                 document.getElementById(id-2).src='img/emptyStar.png'; 
                  document.getElementById(id-3).src='img/emptyStar.png'; 
          }
                 else if(id==5){
              document.getElementById(id).src='img/emptyStar.png'; 
                document.getElementById(id-1).src='img/emptyStar.png'; 
                 document.getElementById(id-2).src='img/emptyStar.png'; 
                  document.getElementById(id-3).src='img/emptyStar.png'; 
                     document.getElementById(id-4).src='img/emptyStar.png'; 
          }
    }


</script>

     </body>
     </html>