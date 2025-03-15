<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
$admincont->afficherNbEtudiants();
?>  
</body>
</html>


