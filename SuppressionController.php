<?php
require_once("../bootstrap/models/Suppression.php");
class SuppressionController
{
    private $supp;
    public function __construct($supp)
    {
        $this->supp=$supp;
    }
    public function SuppressionCompte($login)
    {
        $this->supp->SupprimerCompte($login);
    }
}
?>