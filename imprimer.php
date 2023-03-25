<?php 
require("Etudiant.php");
require("connexion_user.php");
if(isset($_GET['id']))
{
require_once('fpdf/fpdf.php');
$rq=$db->prepare("SELECT * FROM etudiant WHERE id=?");
$rq->execute([$_GET['id']]);
$etd=$rq->fetchALL(PDO::FETCH_ASSOC);
foreach($etd as $key=>$row)
$e= new Etudiant($row['Name'],$row["maths"],$row["info"]);
// Création d'une instance de TCPDF
$pdf = new FPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->AddPage();
// Ajout du contenu du bulletin
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Bulletin de l\'Etudiant :', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, 'Nom: '.$e->getNom(),0, 1);
$pdf->Cell(0, 10, 'Note de Maths : '.$e->getMaths(), 0, 1);
$pdf->Cell(0, 10, 'Note de info:'.$e->getInfo(), 0, 1);
$pdf->Cell(0, 10, 'Moyenne '.$e->moyenne(),0, 1);
$pdf->Cell(0, 10, 'Mention : '.$e->mention($e->moyenne()), 0, 1);
$pdf->Ln(5);

// Génération du fichier PDF
$pdf->Output('bulletin.pdf', 'D');

}
?>