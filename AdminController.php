<?php
require_once '../bootstrap/models/Admin.php';
class AdminController {
    private Admin $admin;

    public function __construct(Admin $admin) {
        $this->admin = $admin;
    }
    public function compositionclub()
    {
        $nomclub=$_POST["nomclub"];
        $this->admin->compositionclub($nomclub);
    }

    public function afficherNbEtudiants(){
        $this->admin->nbEtudiantsClubs();
    }

    public function afficherNiveau() {

        $nomclub=$_POST["nomclub"];
        $niveau = $this->admin->niveauClub($nomclub);
    }

    public function afficherFiliere(){
        $nomclub=$_POST["nomclub"];
        $filiere = $this->admin->filiereClub($nomclub);
    }

    public function afficherAge() {
        $nomclub=$_POST["nomclub"];
        $age = $this->admin->ageClub($nomclub);
    }

    public function ajouterClub() {
        $nom=$_POST["nomclub"];
        $annee_creation=$_POST["annee"];
        if (!$this->admin->rechercherClub($nom)) {
            $this->admin->insererClub($nom, $annee_creation);
        }
        else echo "<div style='color:red; font-weight=bold;'><h3>Ce nom de club existe déjà !</h3></div>";
    }

    public function modifierClub() {
        $nom=$_POST["nomclub"];
        if ($this->admin->rechercherClub($nom))
        {   $nouvannee=$_POST["nouvannee"];
            $this->admin->modifieranneeClub($nom, $nouvannee);
            $nouvnom=$_POST["nouvnom"];
            $this->admin->modifiernomClub($nom, $nouvnom);
        
        } else echo "<div style='color:red; font-weight=bold;'><h3>Ce club est inexistant !</h3></div>";
    }

    public function supprimerClub(){

         $nom=$_POST["nomclub"];
        if ($this->admin->rechercherClub($nom)) {
            $this->admin->supprimerClub($nom);
        } else echo "<div style='color:red; font-weight=bold;'><h3>Ce club est inexistant !</h3></div>";
    }

    public function afficherClubs(){
        $this->admin->afficherClubs();
    }

    public function accepterPostulation(){
        $login=$_POST["login"];
        $nomClub=$_POST["nomclub"];
        if ($this->admin->rechercherpostulation($login, $nomClub)) {
            $this->admin->ajouterAppartenance($login, $nomClub);
            $this->admin->supprimerPostulation($login, $nomClub);
        } else echo "<div style='color:red; font-weight=bold;'><h3>Cet étudiant n'a pas de demande d'adhésion pour ce club !</h3></div>";
    }

    public function refuserPostulation(){
        $login=$_POST["login"];
        $nomClub=$_POST["nomclub"];
        if ($this->admin->rechercherpostulation($login, $nomClub)) {
        $this->admin->supprimerPostulation($login, $nomClub);
        }else echo "<div style='color:red; font-weight=bold;'><h3>Cet étudiant n'a pas de demande de postulation pour ce club !</h3></div>";
    }

    public function supprimerappartenance()  {
        $login=$_POST["login"];
        $nomClub=$_POST["nomclub"];
        if ($this->admin->rechercherappartenance($login,$nomClub)) {
        $this->admin->supprimerAppartenance($login, $nomClub);
        } else echo "<div style='color:red; font-weight=bold;'><h3>Cet étudiant ne fait pas partie ce club !</h3></div>";
    }
}
?>
