<?php
require("Etudiant.php");
?>
<?php

if(isset($_POST['Annuler']))  header("Location: tableau.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sheet.css">
    <title> Notes</title>
</head>
<body >    

<div class="form" > 
    <h1> <b>Saisir vos Notes </b>  </h1> 
    <form action="tableau.php" method="post">
        <label for="etud"> Nom de l'Etudiant : </label> 
        <input type="text"   id="etud" name="etud" required> <br> <br>
        <label for="maths">Note Maths : </label>
        <input type="text" id="maths" name="maths" required> <br> <br>
        <label for="info"> Note Informatique : </label>
        <input type="text" id="info" name="info" required> <br>
       <br>
       <button type="submit" name="valid" > Valider</button>
        <button type="submit" name="Annuler">Annuler </button>
   

    </form>
  
</div>


</body>

<footer>
   
</footer>
</html>