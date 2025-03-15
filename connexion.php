<?php
session_start(); //indique qu'une session a été initiée
require_once("ConnexionBD.php");
require_once("../bootstrap/controllers/ConnexionController.php");
$connexion=new ConnexionBD();
$db=$connexion->getConnexion();
$conncontroller=new ConnexionController($db);
$login=$conncontroller->recupererLogin();
if ($conncontroller->Connexion())
{
    $_SESSION['login']=$login;
}
?>