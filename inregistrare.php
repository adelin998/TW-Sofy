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
  <a href="index.html"><img src="img/home.png" width="22px" height="22px" style="margin-bottom: -3px;"> Acasa</a>
    <a href="adauga.html"><img src="img/add.png" width="22px" height="22px" style="margin-bottom: -3px;"> Adauga aplicatie</a>
     <a href="login.html" style="float: right;margin-right: 30px;margin-top: -5px"><img src="img/user.png" width="22px" height="22px" style="margin-bottom: -3px;"> Log in</a>
  <form class="searchForm">
  <input type="text" placeholder="Search..">
  <button type="submit"><img src="img/searchIcon.png" width="22px" height="22px" style="margin-bottom: -3px;"></button>
</form>
</div> 
	 </nav>
<!-- Sfarsit bara de navigare -->

	 <section class="sectionRegister" >
	 	
	 	<div class="centerRegister">

	 			<div class="formAddRegister">

	 				<form>

	 					<h1 class="h1Form"> Inregistreaza-te </h1>
	 					<input class="inputLogin" type="text" placeholder="Nume Utilizator" title="Minim 5 caractere de tipul A-Z,a-z,0-9"
	 					pattern="[A-Za-z0-9][A-Za-z0-9][A-Za-z0-9][A-Za-z0-9][A-Za-z0-9]"><br>
	 					<input class="inputLogin" type="text" placeholder="Numele Dvs."><br>
	 					<input class="inputLogin" type="text" placeholder="Prenumele Dvs."><br>
                        <select class="inputLogin" name="Sexul">
                        	<option value="" selected style="display:none">Sexul dvs.</option>
                        	<option value="Masculin">Sex Masculin</option>
                        	<option value="Feminin">Sex Feminin</option>
                        </select>

	 					<br>
	 					

	 					<input class="inputLogin" type="text" placeholder="E-mail"><br>
	 					<input class="inputLogin" type="password" placeholder="Parola" title="Minim 5 caractere de tipul A-Z,a-z,0-9"
	 					pattern="[A-Za-z0-9][A-Za-z0-9][A-Za-z0-9][A-Za-z0-9][A-Za-z0-9]"><br>
	 					<input class="inputLogin" type="password" placeholder="Repeta Parola" title="Introduceti aceeasi parola ca mai sus."><br>
	 					<div class="regBtn">
	 					<a href="index.html"><input class="buttonRegister" type="button" value="Inregistreaza-te" ></a>
                        </div>
	 				</form>
	 			</div>
	 	</div>
	</section>
	

	

      
	   
     </body>

     </html>