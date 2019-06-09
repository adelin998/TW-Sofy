<?php
session_start();
unset($_SESSION['idUser']);
   session_unset();
   
   if(session_destroy()) {
      header("Location: ../login.php");
   }
?>