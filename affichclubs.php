<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #ebd3fc;";>
<?php
require_once("ConnexionBD.php");
require_once("../bootstrap/controllers/AdminController.php");
require_once("../bootstrap/models/Admin.php");
$connexion=new ConnexionBD();
$db=$connexion->getConnexion();
$admin=new Admin($db); 
$admincont=new AdminController($admin);
$admincont->afficherClubs();
?>  
</body>
</html>


