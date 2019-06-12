<!DOCTYPE html>

    <?php 
     session_start();
     if( isset($_SESSION['logged']) && $_SESSION['logged']==true){
    	header('Location: user_page.php');
    } ?>

	 <html>
     
	 <head>
     
	 <meta charset="utf-8"/>
	 
	 <title>Online Software Repository</title>
     
	 <link rel="stylesheet" type="text/css" href="css/style.css"/> 
	 
	 <link rel='icon' href="img/fav.png">
     
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

     <script type="text/javascript">
    $(document).ready(function () {
        $('#uname').focus();

        $("#submit").click(function () {
           var username=$('#uname').val();
           var password=$('#pass').val();

           var result=$('.result').html('');

            if(username !='' && password !=''){ 
            	var urltopass='action=login&username='+username+'&password='+password;

            	  $.ajax({
                url: "scripts/check.php",
                type: 'POST',
                data: urltopass,
                success: function (responseText) {
                    
                    if(responseText==0){
                        result.html('<br><br><p>Date incorecte</p>');
                    }

                    else if(responseText==1) {
                        window.location='user_page.php';
                    } 

                    if(responseText==-1){
                        result.html('<br><br><p>Ne pare rau,dar acest cont este blocat momentan!</p>');
                    }

                    
                }
            });
            }

            return false;
          
        });
    });
    </script>

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

	 <section class="sectionLogin" >
	 	
	 	<div class="centerLogin">
              
	 			<div class="formAdd">



	 				<form method="post">
                        
	 					<h1 class="h1Form"> Autentificare </h1>
	 					
	 					<input class="inputLogin" name='uname' id="uname" type="text" placeholder="Nume Utilizator"  minlength="5" reqiured><br>
	 					<input class="inputLogin" id='pass' name="uname" type="password" placeholder=" Parola" minlength="5" required><br>
	 					<input class="buttonLogin btn1" type="submit" name="submit" id='submit' value="Autentificare">

	 					<a href="inregistrare.php"><input class="buttonLogin btn2" type="button" value="Inregistrare"></a>
                        
                        <div class="result"></div>

	 				</form>



	 			</div>
	 	</div>
	</section>
	

	

      
	   
     </body>

     </html>