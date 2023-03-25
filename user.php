<?php
class Utilisateur {
private $id_U;
private $Nom;
private $Pass;
private $login;
private $categorie; 

function __construct($nom,$login,$pass,$cat)
{
 $this->Nom=$nom; $this->Pass=$pass ; $this->login=$login; $this->categorie=$cat;
}
function getNom(){return $this->Nom;}
function getPass(){return $this->Pass;}
function getCat(){return $this->categorie;}
function getLog(){return $this->login;}
function setNom($nom){$this->Nom=$nom;}
function setPass($p){$this->Pass=$p;}
function setLog($l){$this->login=$l;}
function setCat($c){$this->categorie=$c;}

}

?>
