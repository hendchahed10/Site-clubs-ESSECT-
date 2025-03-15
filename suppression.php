<?php
require_once("ConnexionBD.php");
require_once("../bootstrap/models/Suppression.php");
require_once("../bootstrap/controllers/SuppressionController.php");
$connexion=new ConnexionBD();
$db=$connexion->getConnexion();
$suppression=new Suppression($db);
$suppcontroller=new SuppressionController($suppression);
session_start(); //pour commencer la session : étape nécessaire pour que le script php reconnaisse les variables relatives à la session
$login=$_SESSION['login'];
session_unset(); //désactiver toutes les variables relatives à la session 
session_destroy(); //détruire la session
$suppcontroller->SuppressionCompte($login);
exit();
?>