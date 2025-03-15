<?php
require_once("ConnexionBD.php");
require_once("../bootstrap/controllers/InscriptionController.php");
require_once("../bootstrap/models/Inscription.php");
$connexion=new ConnexionBD();
$db=$connexion->getConnexion();
$inscri=new Inscription($db);
$inscricont=new InscriptionController($inscri);
$inscricont->AjouterEtudiant();
$inscricont->AjouterAppartenance();
?>