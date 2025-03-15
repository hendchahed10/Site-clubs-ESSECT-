<?php
require_once("ConnexionBD.php");
require_once("../bootstrap/controllers/AdminController.php");
require_once("../bootstrap/models/Admin.php");
$connexion=new ConnexionBD();
$db=$connexion->getConnexion();
$admin=new Admin($db);
$admincont=new AdminController($admin);
$admincont->ajouterClub();
?>