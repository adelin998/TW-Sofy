<?php session_start();?>

  <?php 
  if(isset($_POST['submitAdmin'])){
    if(trim($_POST['userAdmin'])=="admin" && trim($_POST['passAdmin'])=="sofy2019"){
        $_SESSION['adminLog']=true;
        header("Location: adminPage.php");
    }

    else
        $_SESSION['adminLog']=false;
    
  }

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
  <a href="../index.php"><img src="../img/home.png" width="22px" height="22px" style="margin-bottom: -3px;"> Acasa</a>

    

</div> 
   </nav>
<!-- Sfarsit bara de navigare -->

   <section class="sectionLogin" >
    
    <div class="centerLogin">
              
        <div class="formAdd">



          <form method="post">
                        
            <h1 class="h1Form"> Administrator </h1>
            
            <input class="inputLogin" name='userAdmin' id="uname" type="text" placeholder="Nume Utilizator"  minlength="5" reqiured><br>
            <input class="inputLogin" id='pass' name="passAdmin" type="password" placeholder=" Parola" minlength="5" required><br><br>
           <center> <input class="buttonLogin btn1" type="submit" name="submitAdmin" id='submit' value="Autentificare" style="float: none"></center>
         
                        <div class="result"></div>

          </form>





        </div>
    </div>
  </section>

    
     </body>

     </html>