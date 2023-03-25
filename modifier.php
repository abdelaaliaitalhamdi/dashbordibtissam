<?php
require("Etudiant.php");
require("connexion_user.php"); 
if(isset($_GET['index']))
{   
    $rqt=$db->prepare("SELECT Name,maths,info FROM etudiant WHERE id=?"); 
    $rqt->execute([$_GET['index']]);
    foreach($rqt as $key=>$row)
    {   $name=$row["Name"]; 
        $maths=$row["maths"];
        $info=$row["info"];
    }
}

if(isset($_POST['valider']))
{    if(isset($_GET['index']))
    {
        $n=$_POST['etud'];
        $i=floatval($_POST['info']);
        $m=floatval($_POST['maths']);
        $rq=$db->prepare("UPDATE etudiant set Name= :name, maths= :maths, info= :info WHERE id=:iden; " );
        $tab=array('name'=>$n, 'maths'=>$m , 'info'=>$i , 'iden'=>$_GET['index']);
        $rq->execute($tab);
        header("location:tableau.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sheet.css">
    <title> Modifier Note</title>
</head>
<body >    

<div class="form" > 
    <h1> <b>Modifier Note </b>  </h1> 
    <form action="" method="post">
        <label for="etud"> Nom de l'Etudiant : </label> 
        <input type="text"   id="etud" name="etud" value=<?php echo $name; ?>> <br> <br>
        <label for="maths">Note Maths : </label>
        <input type="text" id="maths" name="maths" value=<?php echo $maths; ?>> <br> <br>
        <label for="info"> Note Informatique : </label>
        <input type="text" id="info" name="info" value=<?php echo $info; ?>> <br>
       <br>
       <button type="submit" name="valider" > Valider</button>
        <button type="reset" name="Annuler">Annuler </button>
   

    </form>
  
</div>


</body>

<footer>
   
</footer>
</html>