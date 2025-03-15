<?php
require_once '../bootstrap//models/Connexion.php';

class ConnexionController {
    private Connexion $connexion;

    public function __construct($db) {
        $this->connexion = new Connexion($db);
    }

    // Récupère le login depuis le formulaire
    public function recupererLogin() {
        return $_POST['login'];
    }

    // Récupère le mot de passe depuis le formulaire
    public function recupererMdp(){
        return $_POST['password'];
    }

    // Vérifie si l'utilisateur est l'admin
    public function verifieAdmin($login){
        return $login == 'ADMIN';
    }

    // Connexion de l'admin
    public function Connexion(){
        $login = $this->recupererLogin();
        $mdp = $this->recupererMdp();
        if ($this->verifieAdmin($login)) {
            if($mdp!='eefir10222225')
            {echo "<div style='color:red; font-weight:bold;'><h3>Vérifiez votre mot de passe !</h3></div>";
            return false;
            }
            else
            {header('Location:../bootstrap/views/admin.html'); //ouvre la page admin puisque l'utilisteur connecté est l'ADMIN
            return true;
            }    
    }

        else {
            if (!$this->connexion->rechercheLogin($login)) {
                echo "<div style='color:red; font-weight:bold;'><h3>Vérifiez votre login !</h3></div>";
                return false;
            }
            else 
            {
                if (!$this->connexion->vérifMdp($login, $mdp))
                {
                    echo "<div style='color:red; font-weight:bold;'><h3>Vérifiez votre mot de passe !</h3></div>";
                    return false;
                }
                else 
                {
                    header("Location:../bootstrap/pages/Accueil.php"); //dirige l'utilisateur vers la page d'accueil après 3s
                    return true;
                }
            }
        }
        
    }
}
?>