<?php
class connexion {
    private $conn;
    public function __construct($db) {
        $this->conn=$db;
    }
    public function rechercheLogin($login){
        $query ="SELECT* FROM etudiant WHERE login = '$login'"; /* Recherche si $login existe dans 
                                                                                                  la base de données*/

        $res=mysqli_query($this->conn,$query);
        if(mysqli_num_rows($res)!=0)
        {return true;} //retourne true si le login existe
        else{return false;} //retourne false si le login n'existe pas                                                                                           
    }
    public function vérifMdp($login, $mdp) {
        $query = "SELECT * FROM etudiant WHERE login = '$login'";
        $res = mysqli_query($this->conn, $query);
    
        //pour vérifier si la requête retourne un enregistrement
        if (mysqli_num_rows($res) > 0) {
            // pour récupérer l'enregistrement
            $row = mysqli_fetch_assoc($res);
            //pour récupérer le mdp crypté de la base de données
            $hashedPassword = $row['mdp'];
            // Comparer le mdp passé en paramètres au mdp crypté récupéré à travers la requête SELECT
            return password_verify($mdp, $hashedPassword);
    }
}
}
