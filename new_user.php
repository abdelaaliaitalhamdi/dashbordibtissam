<?php
require("user.php");
?>
<?php

if(isset($_POST['Annuler']))  header("Location: ges_user.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sheet.css">
    <title> User</title>
    <style>
     #user,#login,#pass,#cat{
    margin-left: 5px;
    height: 30px;
    width: 190px;
    text-align: center;
    font-size: 15px; 
}
    </style>
</head>
<body >    

<div class="form" > 
    <h1> <b>Saisir les infos des utilisateurs </b>  </h1> 
    <form action="ges_user.php" method="post">
        <label for="user"> Nom d'utilisateur : </label> 
        <input type="text"   id="user" name="user" required> <br> <br>
        <label for="login">Login : </label>
        <input type="text" id="login" name="login" required> <br> <br>
        <label for="pass"> Password: </label>
        <input type="text" id="pass" name="pass" required> <br> <br>
        <label for="cat"> categorie: </label>
        <input type="text" id="cat" name="cat" required> <br>
       <br>
       <button type="submit" name="valid" > Valider</button>
        <button type="submit" name="Annuler">Annuler </button>
   

    </form>
  
</div>


</body>

<footer>
   
</footer>
</html>