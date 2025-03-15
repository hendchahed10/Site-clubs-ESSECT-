<?php
require_once("../bootstrap/models/Postulation.php");
class PostulationController
{
    private $postu;
    public function __construct($postu)
    {
        $this->postu=$postu;
    }
    public function AjouterPostulation($login)
    {
        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_FILES['cv']))
        {
            $nom=$_POST["nom"];
            $prenom=$_POST["prenom"];
            $niveau=$_POST["niveau"];
            $filière=$_POST["filiere"];
            $email=$_POST["email"];
            $age=$_POST["age"];
            $nom_club=$_POST["clubs"];
            $CV=$_FILES["cv"]; 
            $fileTmpPath=$CV["tmp_name"]; //emplacement temporaire du fichier
            $filedata = base64_encode(file_get_contents($fileTmpPath));
            $this->postu->InsertionPostulation($login,$nom_club,$nom,$prenom,$age,$niveau,$filière,$email,$filedata);
        }
    }
}
?>