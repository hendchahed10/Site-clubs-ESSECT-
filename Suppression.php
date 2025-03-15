<?php
class Suppression{
    private $conn;
    public function __construct($db)
    {
        $this->conn=$db;
    }
    public function SupprimerCompte($login)
    {
        $req="DELETE FROM ETUDIANT WHERE login='$login'";
        $req1="DELETE FROM appartenance WHERE login_etudiant='$login'";
        $req2="DELETE FROM postulation WHERE login_etudiant='$login'";
        $res=mysqli_query($this->conn,$req);
        $res1=mysqli_query($this->conn,$req1);
        $res2=mysqli_query($this->conn,$req2);
        if($res==true && $res1==true && $res2==true)
        {
            echo "Votre compte a été supprimé.";
            header("refresh:3; url=../bootstrap/pages/Accueil.php"); //rediriger l'utilisateur vers la page d'accueil après 3s
        } else echo "REQUETE NON EXECUTEE.";
    }
}
?>