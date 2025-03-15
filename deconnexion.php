<?php
session_start(); //pour commencer la session : étape nécessaire pour que le script php reconnaisse les variables relatives à la session
session_unset(); //désactiver toutes les variables relatives à la session 
session_destroy(); //détruire la session
header("Location:../bootstrap/pages/Accueil.php"); //rediriger l'utilisateur vers la page d'accueil une fois déconnecté
exit();
?>