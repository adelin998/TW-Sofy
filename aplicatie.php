    <?php 
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'sofy');

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    $idApp=$_GET['id'];
    $sql = "SELECT * FROM apps WHERE ID=".$idApp;
    $res=mysqli_query($db,$sql);
    $row=$res->fetch_assoc();
    $res->free();
    $nume=$row['NUME'];
    $categorie=$row['CATEGORIE'];
    $so=$row['S_O'];
    $descriere=$row['DESCRIERE'];
    $size=$row['SIZE'];
    $tags=$row['TAGS'];
    $cost=$row['COST'];
    $data_upload=$row['UPLOAD_DATE'];
    $downloads=$row['NO_DOWNLOADS'];
    $uploader_ID=$row['ID_UPLOADER'];
    $stars=floor($row['RATING']);
    $logo=$row['LOGO_SRC'];
    $emptyStars=5-$stars;
    $sql = "SELECT * FROM users WHERE ID=".$uploader_ID;
    $res=mysqli_query($db,$sql);
    $row=$res->fetch_assoc();
    $res->free();
    $uploader=$row['USERNAME'];

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

      <section>
       <div class="left">
         <div class="dropdown">
           <button onclick="history.go(-1);">Back </button>
         </div>
       </div>

       <div class="center">	
        <h2 class="appTitle"><?php echo $nume ?></h2><br>
        <div class="leftApp">
        <!-- <img src="img/netflix.png" > -->
         <img  onerror="this.onerror=null; this.src='img/default.svg'" src=<?php echo "logo_src/".$logo; ?>  />
       </div>
       <div class="rightApp">
        <ul>
         <li>Categorie : <?php echo $categorie ?> </li>
         <li>Sistem de operare : <?php echo $so ?> </li>
         <li>Cost Aplicatie : <?php echo $cost ?> </li>
         <li>Taguri : <?php echo $tags ?> </li>
         <li>Rating : <?php for($i=0;$i<$stars;$i++) {?>
           <img src="img/star.png" width="20px" style="margin-bottom: -5px;width:20px;height:20px" >
         <?php }
         for($j=0;$j<$emptyStars;$j++)   {
           ?>
           <img src="img/emptyStar.png" width="20px" style="margin-bottom: -5px;width:20px;height:20px" >
         <?php }?>
         <br>
         <li>Descarcari : <?php echo $downloads ?> </li>
         <li>Uploadat de : <?php echo $uploader ?> </li>
         <li>Size : <?php echo $size ?> </li>
         <li>Data upload : <?php echo $data_upload ?> </li>
       </ul>
     </div>
      <p class="description">Descriere : <br><br> <?php echo $descriere ?>  </p>
      <form class="downloadForm" action="index.html">
        <button value="" class="downloadBtn" type="submit">
         <img src="img/download.png" width="30px">
         Download
       </button>
      </form>
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