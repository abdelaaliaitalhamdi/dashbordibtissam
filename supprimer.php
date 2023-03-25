<?php
require("Etudiant.php");
Define("DBNAME","notes");
    Define("DBHOST","localhost");
    Define("DBUSER","root");
    Define("DBPASS","");
    try{
        $db=new PDO("mysql:host=".DBHOST."; dbname=".DBNAME, DBUSER,DBPASS );
        //$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MMODE,PDO::FETCH_ASSOC);
  
      }catch(PDOException $e)
      {
        echo "Erreur:". $e->getmessage();
      } 
?>
<?php
if(isset($_GET['id']))
{
$indice= (int) $_GET['id'] ;
$rq=$db->prepare("DELETE FROM etudiant WHERE id=?");
$rq->execute([$_GET['id']]);
header("Location: tableau.php");

}

?>