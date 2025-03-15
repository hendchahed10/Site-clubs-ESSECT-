<?php
class Postulation
{
    private $conn;
    public function __construct($db)
    {
        $this->conn=$db;
    }
    public function vérifPostulation($login,$nom_club)
    {
        $req="SELECT * FROM postulation WHERE login_etudiant='$login' AND nom_club='$nom_club'"; /*recherche si le couple (login,nom_club) passé 
                                                                            en paramètres existe déjà dans la table postulation*/
        $res=mysqli_query($this->conn,$req);
        if (mysqli_num_rows($res)!=0)
        {return true;} //retourne vrai si le couple (login,nom_club) existe
        else
        {return false;} //retourne faux si le couple (login,nom_club) n'existe pas 
    }
    public function InsertionPostulation($login,$nom_club,$nom,$prenom,$age,$niveau,$filiere,$email,$filedata)
    {
            if($this->vérifPostulation($login,$nom_club))
            {
                echo "<div style='color:red; font-weight=bold;'><h3>Vous avez déjà une demande de postulation en attente pour ce club !</h3></div>";
            }
            else //si le couple (login,nom_club) n'existe pas dans la BD, l'insérer comme nouvel enregistrement 
            {
                $req="INSERT INTO POSTULATION VALUES ('$login','$nom_club', '$nom','$prenom',$age,'$niveau','$filiere','$email','$filedata')";
                $res=mysqli_query($this->conn,$req);
                if($res)
                {
                    echo "Votre demande a été envoyée avec succès.";
                    header("refresh:2; url=../bootstrap/pages/Accueil.php"); //rediriger l'utilisateur vers la page d'accueil après 3s
                } else echo "REQUETE NON EXECUTEE.";
        }
    }
}
?>