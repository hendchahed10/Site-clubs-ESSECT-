<?php
require_once("../bootstrap/models/Inscription.php");
class InscriptionController
{
    private $inscri;
    public function __construct($inscri)
    {
        $this->inscri=$inscri;
    }
    public function AjouterEtudiant()
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $nom=$_POST["nom"];
            $prenom=$_POST["prenom"];
            $niveau=$_POST["niveau"];
            $filière=$_POST["filiere"];
            $email=$_POST["email"];
            $age=$_POST["age"];
            $login=$_POST["login"];
            $mdp=$_POST["mdp"];
            $mdp2=$_POST["mdp2"];
            if($mdp!=$mdp2)
            {
                echo "<div style='color:red; font-weight=bold;'><h3>Vérifiez votre mot de passe !</h3></div>";
            }
            else
            {
                $this->inscri->InsertionEtudiant($login,$mdp,$nom,$prenom,$age,$niveau,$filière,$email);
            }
        }
    }
    public function AjouterAppartenance()
    {
        if(($_SERVER["REQUEST_METHOD"]=="POST")&&isset($_POST["clubs"]))
        {
            $clubs=$_POST["clubs"];
            $login=$_POST["login"];
            $this->inscri->InsertionAppartenance($login,$clubs);
        }
    }
}
?>