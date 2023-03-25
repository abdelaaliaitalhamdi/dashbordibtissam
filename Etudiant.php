<?php
 class Etudiant
 {
private $id_E;
private $Nom;
private $note_maths;
private $note_info;

 public function __construct($nom,$math,$info)
{
 $this->Nom=$nom;
 $this->note_maths=$math;
 $this->note_info=$info;
}
 public function getId(){return $this->$id_E;}
 public function settId($id){ $this->$id_E= $id;}
 public function setNom($nom)
 {
    $this->Nom=$nom;
 }
  public function getNom()
 {
    return $this->Nom;
 }
  public function setInfo($info)
 {
    $this->note_info=$info;
 }
 public function getInfo()
 {
    return $this->note_info;
 }
 public function setMaths($math)
 {
    $this->note_maths=$math;
 }
 public function getMaths()
 {
    return $this->note_maths;
 }
public function moyenne()
{
    $sum=$this->note_maths+$this->note_info;
    return $sum/2;
}
public function mention($mo){
    if($mo>=10 && $mo<12) $men='P';
    elseif ($mo >=12 && $mo< 14) $men='A.B';
    elseif($mo>=14 && $mo<16) $men='B';
    elseif($mo>=16 ) $men='T.B';
    else $men='Pas de mention';
    return $men;
}

}

?>