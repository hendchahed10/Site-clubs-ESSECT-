<?php
class Admin {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function compositionClub($nomclub)
    {
        $stmt="SELECT login,Nom,Prenom,Age,Niveau_etudes,Filiere,Mail FROM APPARTENANCE A,ETUDIANT E WHERE A.login_etudiant=E.login AND nom_club='$nomclub'";
        $res=mysqli_query($this->conn,$stmt);
        $i=1;
        while ($row = $res->fetch_assoc())
        {
            echo "<div style='font-size:30px;color:rgb(42, 147, 180);font-weight:bold;text-decoration:underline; text-align:center;'>Membre n°$i :</div>";
            foreach($row as $key=>$value)
        {
            echo "<div style='font-weight:bold;color:purple; font-size:25px; text-align:center;'>$key : </div>   <div style='font-size:22px; text-align:center;'>$value</div> ";
        }
        echo "<br><br><br>";
        $i++;
        }
        
    }

    public function nbEtudiantsClubs() {
        $stmt1 ="SELECT COUNT(login_etudiant) AS Nombre_etudiants FROM appartenance WHERE nom_club='Infolab'";
        $res1=mysqli_query($this->conn,$stmt1);
        $row1 = $res1->fetch_assoc();
        $n1= $row1['Nombre_etudiants'];
        $stmt2 ="SELECT COUNT(login_etudiant) AS Nombre_etudiants FROM appartenance WHERE nom_club='Enactus'";
        $res2=mysqli_query($this->conn,$stmt2);
        $row2 = $res2->fetch_assoc();
        $n2= $row2['Nombre_etudiants'];
        $stmt3 ="SELECT COUNT(login_etudiant) AS Nombre_etudiants FROM appartenance WHERE nom_club='Fahmoulougia'";
        $res3=mysqli_query($this->conn,$stmt3);
        $row3 = $res3->fetch_assoc();
        $n3= $row3['Nombre_etudiants'];
        $stmt4 ="SELECT COUNT(login_etudiant) AS Nombre_etudiants FROM appartenance WHERE nom_club='ESSECT FM'";
        $res4=mysqli_query($this->conn,$stmt4);
        $row4 = $res4->fetch_assoc();
        $n4= $row4['Nombre_etudiants'];
        echo "<div class='progress' role='progressbar' aria-label='Success example' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>
                    <div class='progress-bar bg-success' style='width: 25%'> ESSECT FM : $n4</div>
                    </div>
                    <div class='progress' role='progressbar' aria-label='Info example' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100''>
                    <div class='progress-bar bg-info text-dark' style='width: 50%'>Fahmoulougia : $n3</div>
                    </div>
                    <div class='progress' role='progressbar' aria-label='Warning example' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100'>
                    <div class='progress-bar bg-warning text-dark' style='width: 75%'>Enactus : $n2</div>
                    </div>
                    <div class='progress' role='progressbar' aria-label='Danger example' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100'>
                    <div class='progress-bar bg-danger' style='width: 100%'>Infolab : $n1</div>
                    </div>";
    }

    public function ageClub($nomClub){
        $stmt = "SELECT Age, COUNT(*) AS Nombre_étudiants FROM appartenance a, etudiant e WHERE a.login_etudiant=e.login AND nom_club='$nomClub' GROUP BY Age";
        $res=mysqli_query($this->conn,$stmt);
        while ($row = $res->fetch_assoc())
        {
            foreach($row as $key=>$value)
        {
            echo "<div style='font-weight:bold;color:purple; font-size: 20px;'>$key :</div>   <div style='font-size:17px;'>$value</div> ";
        }
        echo "<br><br><br>";
        }
    }

    public function filiereClub($nomClub) {
        $stmt ="SELECT Filiere, COUNT(*) AS Nombre_étudiants FROM appartenance a, etudiant e WHERE a.login_etudiant=e.login AND nom_club='$nomClub' GROUP BY filiere";
        $res=mysqli_query($this->conn,$stmt);
        while ($row = $res->fetch_assoc())
        {
            foreach($row as $key=>$value)
        {
            echo "<div style='font-weight:bold;color:purple; font-size: 20px;'>$key :</div>   <div style='font-size:17px;'>$value</div> ";
        }
        echo "<br><br><br>";
        }
    }

    public function niveauClub($nomClub){
        $stmt ="SELECT niveau_etudes, COUNT(*) AS Nombre_étudiants FROM appartenance a, etudiant e WHERE a.login_etudiant=e.login AND nom_club='$nomClub' GROUP BY niveau_etudes";
        $res=mysqli_query($this->conn,$stmt);
        while ($row = $res->fetch_assoc())
        {
            foreach($row as $key=>$value)
        {
            echo "<div style='font-weight:bold;color:purple; font-size: 20px;'>$key :</div>   <div style='font-size:17px;'>$value</div> ";
        }
        echo "<br><br><br>";
        }
    }

    public function rechercherClub($nomClub){
        $stmt = "SELECT * FROM club WHERE nom = '$nomClub'";
        $res=mysqli_query($this->conn,$stmt);
        if (mysqli_num_rows($res)!=0)
        {return true;} //retourne vrai si le club existe déjà
        else
        {return false;} //retourne faux si le club n'existe pas 
    }

    public function insererClub($nomclub,$annee_création){
        $stmt ="INSERT INTO club VALUES ('$nomclub',$annee_création)";
        $res=mysqli_query($this->conn,$stmt);
                if($res)
                {
                    echo "Le club a été ajouté avec succès.";
                    header("refresh:2; url=../bootstrap/views/admin.html"); //rediriger l'utilisateur vers la page d'accueil après 3s
                } else echo "REQUETE NON EXECUTEE.";
     
    }

    public function modifiernomClub( $nom, $nouvnom){
        $stmt = "UPDATE club SET nom='$nouvnom' WHERE nom = '$nom'";
        $stmt2 = "UPDATE appartenance SET nom_club='$nouvnom' WHERE nom_club = '$nom'";
        $stmt3 = "UPDATE postulation SET nom_club='$nouvnom' WHERE nom_club = '$nom'";
        $res=mysqli_query($this->conn,$stmt);
        $res2=mysqli_query($this->conn,$stmt2);
        $res3=mysqli_query($this->conn,$stmt3);
                if($res==true && $res2==true && $res3==true)
                {
                    echo "Le nom a été modifié avec succès.";
                    header("refresh:2; url=../bootstrap/views/admin.html"); //rediriger l'utilisateur vers la page d'accueil après 3s
                } else echo "REQUETE NON EXECUTEE.";
    }

    public function modifieranneeClub( $nom, $annee){
        $stmt = "UPDATE club SET annee_creation = $annee WHERE nom = '$nom'";
        $res=mysqli_query($this->conn,$stmt);
                if($res)
                {
                    echo "L'année a été modifié avec succès.";
                    header("refresh:2; url=../bootstrap/views/admin.html"); //rediriger l'ADMIN vers la page admin après 2s
                } else echo "REQUETE NON EXECUTEE.";
    }

    public function supprimerClub($nom){
        $req="DELETE FROM club WHERE nom='$nom'";
        $res=mysqli_query($this->conn,$req);
        if($res)
        {
            echo "Le club a été supprimé.";
            header("refresh:2; url=../bootstrap/views/admin.html"); //rediriger l'ADMIN vers la page admin après 2s
        } else echo "REQUETE NON EXECUTEE.";
    }

    public function afficherClubs(){
        $stmt = "SELECT * FROM club";
        $res=mysqli_query($this->conn,$stmt);
        $i=1;
        while ($row = $res->fetch_assoc())
        {
            echo "<div style='font-size:30px;color:rgb(42, 147, 180);font-weight:bold;text-decoration:underline; text-align:center;'>Club n°$i :</div>";
            foreach($row as $key=>$value)
        {
            echo "<div style='font-weight:bold;color:purple; font-size:25px; text-align:center;'>$key : </div>   <div style='font-size:22px; text-align:center;'>$value</div> ";
        }
        echo "<br><br><br>";
        $i++;
        }
    }

    public function rechercherpostulation($login, $nomClub){
        $req="SELECT * FROM postulation WHERE login_etudiant='$login' AND nom_club='$nomClub'"; /*recherche si le couple (login,nom_club) passé 
                                                                                    en paramètres existe déjà dans la table postulation*/
        $res=mysqli_query($this->conn,$req);
        if (mysqli_num_rows($res)!=0)
        {return true;} //retourne vrai si le couple (login,nom_club) existe
        else
        {return false;} //retourne faux si le couple (login,nom_club) n'existe pas 
    }

    public function supprimerPostulation($login, $nomClub){
        $stmt ="DELETE FROM postulation WHERE login_etudiant = '$login' AND nom_club = '$nomClub'";
        $res=mysqli_query($this->conn,$stmt);
        if ($res)
        {echo "La demande a été supprimée avec succès.";
        header("refresh:2; url=../bootstrap/views/admin.html"); //rediriger l'ADMIN vers la page admin après 2s
        } else "REQUETE NON EXECUTEE";
    }

    public function rechercherappartenance($login, $nomClub){
        $req="SELECT * FROM appartenance WHERE login_etudiant='$login' AND nom_club='$nomClub'"; /*recherche si le couple (login,nom_club) passé 
                                                                                         en paramètres existe déjà dans la table postulation*/
        $res=mysqli_query($this->conn,$req);
        if (mysqli_num_rows($res)!=0)
        {return true;} //retourne vrai si le couple (login,nom_club) existe
        else
        {return false;} //retourne faux si le couple (login,nom_club) n'existe pas 
    }

    public function ajouterAppartenance($login,$nomclub)
    {
        $stmt="INSERT INTO APPARTENANCE VALUES ('$login','$nomclub')";
        $res=mysqli_query($this->conn,$stmt);
        if ($res)
        {   echo "L'étudiant a été ajouté au club avec succès.";
            header("refresh:2; url=../bootstrap/views/admin.html"); //rediriger l'ADMIN vers la page admin après 2s
        }else "REQUETE NON EXECUTEE";
    }

    public function supprimerAppartenance($login, $nomClub){
        $stmt ="DELETE FROM appartenance WHERE login_etudiant = '$login' AND nom_club = '$nomClub'";
        $res=mysqli_query($this->conn,$stmt);
        if ($res)
        {echo "L'étudiant a été supprimé du club avec succès.";
        header("refresh:2; url=../bootstrap/views/admin.html"); //rediriger l'ADMIN vers la page admin après 2s
        } else "REQUETE NON EXECUTEE";
    }
}
?>