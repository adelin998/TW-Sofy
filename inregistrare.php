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

  <script type="text/javascript">
    $(document).ready(function () {
       $('#username').focus();

        $("#regSub").click(function () {
            var username=$('#username').val();
             var nume=$('#nume').val();
              var prenume=$('#prenume').val();
                var email=$('#email').val();
                 var pass=$('#pass').val();
                  var cpass=$('#cpass').val();


           var result=$('.result').html('');

            if(true){ 
            	var urltopass='action=reg&username='+username+'&nume='+nume+'&prenume='+prenume+'&email='+email+'&pass='+pass+'&cpass='+cpass;

            	  $.ajax({
                url: "scripts/checkReg.php",
                type: 'POST',
                data: urltopass,
                success: function (responseText) {
                    
                    if(responseText==2){
                        result.html('<br><br><p>Eroare confirmare parola!</p>');
                    }

                    if(responseText==3){
                        result.html('<br><br><p>Acest username exista deja in baza de date!</p>');
                    }

                    else if(responseText==1) {
                        window.location='login.php';
                    } 

                    else

                    if(responseText==0){
                        result.html('<br><br><p>Eroare sql</p>');
                    }

                    else
                    	 result.html('<br><br><p>Eroare sql</p>');

                    
                }
            });
            }

            return false;
          
        });
    });
    </script>


	 <section class="sectionRegister" >
	 	
	 	<div class="centerRegister">

	 			<div class="formAddRegister">

	 				<form method="post">

	 					<h1 class="h1Form"> Inregistreaza-te </h1>

	 					<input class="inputLogin" type="text" id="username" placeholder="Nume Utilizator" name="username" minlength="5" 
	 					 required><br>
	 					<input class="inputLogin" type="text" id="nume" name="nume" placeholder="Numele Dvs." minlength="5" required><br>
	 					<input class="inputLogin" type="text" id="prenume" name="prenume" placeholder="Prenumele Dvs." minlength="5" required><br>
                    


	 					<input class="inputLogin" type="text" id="email" name="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required><br>

	 					<input class="inputLogin" type="password" id="pass" name="pass" placeholder="Parola" title="Minim 5 caractere de tipul A-Z,a-z,0-9" minlength="4" required><br>
	 					<input class="inputLogin" type="password" id="cpass" name="cpass" placeholder="Repeta Parola" title="Introduceti aceeasi parola ca mai sus." minlength="4" required><br>

	 					<div class="regBtn">
	 					<input class="buttonRegister" name="regSub" id="regSub" type="submit" value="Inregistreaza-te" >
                        </div>

                        <br>
                        <div class="result"></div>

	 				</form>


	 			</div>
	 	</div>
	</section>
	

	

      
	   
     </body>

     </html>