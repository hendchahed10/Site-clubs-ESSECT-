<?php
class Inscription
{
    private $conn;
    public function __construct($db)
    {
        $this->conn=$db;
    }
    public function verifEtudiant($login)
    {
        $req="SELECT login FROM etudiant WHERE login='$login'"; //recherche si le login passé en paramètres existe déjà 
        $res=mysqli_query($this->conn,$req);
        if (mysqli_num_rows($res)!=0)
        {return true;} //retourne vrai si le login existe
        else
        {return false;} //retourne faux si le login n'existe pas 
    }
    public function InsertionEtudiant($login,$mdp,$nom,$prénom,$age,$niveau,$filière,$mail)
    {
            if($this->verifEtudiant($login) ||$login=='ADMIN')
            {
                echo "<div style='color:red; font-weight=bold;'><h3>Ce nom d'utilisareur est déjà pris. Choisissez-en un autre.</h3></div>";
            }
            else //si le nom d'utilisateur saisi n'existe pas dans la BD, y insérer l'étudiant comme nouvel enregistrement 
            {
                $hashedpw=password_hash($mdp, PASSWORD_DEFAULT);
                $req="INSERT INTO ETUDIANT VALUES('$login','$hashedpw','$nom','$prénom',$age,'$niveau','$filière','$mail')";
                $res=mysqli_query($this->conn,$req);
                if($res)
                {
                    echo "Vous avez été enregistré(e) avec succès !";
                    header("refresh:2; url=../bootstrap/pages/Accueil.php"); //rediriger l'utilisateur vers la page d'accueil après 3s
                } else echo "REQUETE NON EXECUTEE.";
        }
    }
    public function InsertionAppartenance($login,$clubs)
    {
     foreach($clubs as $club)
     {
        $req="INSERT INTO APPARTENANCE VALUES('$login','$club')";
        $res=mysqli_query($this->conn,$req);
        if(!$res)
        {
            echo "REQUETE NON EXECUTEE.";
        }
     }
    }
}
?>