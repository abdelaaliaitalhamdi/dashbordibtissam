<?php
require("Etudiant.php");
require("connexion_user.php");
if(isset($_GET['index']))
{   
    $rqt=$db->prepare("SELECT nom,login,password,categorie FROM user WHERE id_U=?"); 
    $rqt->execute([$_GET['index']]);
    foreach($rqt as $key=>$row)
    {   $name=$row["nom"]; 
        $log=$row["login"];
        $pass=$row["password"];
        $cat=$row["categorie"];
    }
}

if(isset($_POST['valider']))
{    if(isset($_GET['index']))
    {
        $user=$_POST['user'];
        $log=$_POST['login'];
        $pass=$_POST['pass']; 
        $cat=$_POST['cat']; 
        $rq=$db->prepare("UPDATE user set nom= :name, login= :log, password= :pass , categorie=:cat WHERE id_U=:iden; " );
        $tab=array('name'=>$user, 'log'=>$log , 'pass'=>$pass , 'cat'=>$cat, 'iden'=>$_GET['index']);
        $rq->execute($tab);
        header("location:ges_user.php");
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
    <title> Modifier Utilisateur</title>
</head>
<body >    

<div class="form" > 
    <h1> <b>Modifier utilisateur</b>  </h1> 
    <form action="" method="post">
        <label for="user"> Nom d'utilisateur : </label> 
        <input type="text"   id="user" name="user"  value=" <?php echo $name ;?>"> <br> <br>
        <label for="login">Login : </label>
        <input type="text" id="login" name="login" value=" <?php echo $log ;?>"> <br> <br>
        <label for="pass"> Password: </label>
        <input type="text" id="pass" name="pass" value=" <?php echo $pass ;?>"> <br> <br>
        <label for="cat"> categorie: </label>
        <input type="text" id="cat" name="cat" value=" <?php echo $cat ;?>" > <br>
       <br>
       <button type="submit" name="valider" > Valider</button>
        <button type="submit" name="Annuler">Annuler </button>
   

    </form>
  
</div>


</body>

<footer>
   
</footer>
</html>