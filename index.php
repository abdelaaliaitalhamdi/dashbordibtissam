<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atelier 7</title>
    <link rel="stylesheet" href="sheet.css">
</head>
<body >
<div class="form" > 
<h1> Authentification </h1>
    <form action="" method="POST">
        <label for="id">   Login : </label> 
        <input type="text"   id="id" name="id"> <br> <br>
        <label for="password"> Password : </label>
        <input type="password" id="password" name="password">  <br> <br>
        <label for="cat">Catégorie : </label>
        <select name="cat">
            <option value="Aucun"> Aucun </option>
            <option value="Professeur"> Professeur </option>
            <option value="Etudiant"> Etudiant </option>
            <option value="Administrateur"> Administrateur </option>
        </select>
        <br>
        <br> <br>
        
        <button type="reset" name="annuler"> Annuler </button>
        <button type="submit" name="submit">Valider</button>
        <?php
     require("connexion_user.php");
  if(isset($_POST['submit'])) {
  // Récupération des valeurs entrées dans les champs
  $id = $_POST['id'];
  $password = $_POST['password'];
  // Variables de validation  
    $st="SELECT * FROM user";
    $requete=$db->query($st);
    $log=$requete->fetchAll(PDO::FETCH_ASSOC);
    foreach($log as $key=>$row)
    { 
        if($id== $row["login"] && $password==$row["password"])
        {  echo "yes";
            if($_POST["cat"]== $row["categorie"])
            {
                $i=$row["categorie"];
                if($i=="Etudiant" ) { header('location:User_std.php'); break;}
                elseif($i=="Professeur"){header('location:User_Prof.php'); break;} 
                elseif($i=="Administrateur"){header('location:User_Admin.php'); break;}
                else {echo "<p> choisissez une catégorie </p>";}
            }
          }
    }
        echo "<p> Mot de passe ou identifiant incorrete</p>";
    }

 


 
 ?>
       
    </form>
  
</div>
<br>


</body>

<footer>

</footer>
</html>