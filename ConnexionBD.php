<?php
class ConnexionBD {
    // Attributs d'identification à la BD
    private $serveur = "localhost";
    private $base = "site_clubs_essect";
    private $utilisateur = "root";
    private $mdp = "";

    // Variable de connexion
    public $conn;

    // Fonction de connexion à la BD
    public function getConnexion() {
        // Établir la connexion
        $this->conn = mysqli_connect($this->serveur, $this->utilisateur, $this->mdp, $this->base);

        // Vérifier la connexion
        if ($this->conn === false) {
            die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
        }

        // Retourner l'objet de connexion
        return $this->conn;
    }

    }

?>