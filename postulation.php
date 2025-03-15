<?php
session_start();
require_once("ConnexionBD.php");
require_once("../bootstrap/controllers/PostulationController.php");
require_once("../bootstrap/models/Postulation.php");
$connexion=new ConnexionBD();
$db=$connexion->getConnexion();
$postu=new Postulation($db);
$postucont=new PostulationController($postu);
$login=$_SESSION['login'];
$postucont->AjouterPostulation($login);
?>