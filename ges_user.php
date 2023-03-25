<?php
require("user.php");
?>
<?php 
require("connexion_user.php");
?>
 <?php  
    error_reporting(0);
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST["nouveau"]))  header("Location: new_user.php");  
        elseif(isset($_POST['quit'])) {   
            header("Location:index.php");
            }
            }
            ?>
<?php
if(isset($_POST['save']))
{
echo "<h1 align='center'> C'est bien Enregistré dans la base de données</h1>";
}
?>
<?php 
if(isset($_POST['valid']))
{    
    $user=$_POST['user'];
    $log=$_POST['login'];
    $pass=$_POST['pass']; 
    $cat=$_POST['cat']; 
    $us=new Utilisateur($user,$log,$pass,$cat);
   $q=$db->prepare("INSERT INTO user (nom,login,password,categorie) VALUES (:name,:log,:pass,:cat)");
   $q->bindParam(':name',$user);
   $q->bindParam(':log',$log);
   $q->bindParam(':pass',$pass);
   $q->bindParam(':cat',$cat);
   $q->execute();

  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sheet.css">
    <title>Tableau des utilisateurs</title>
    <style>
    th{
    color:beige;
    height:auto; 
    border: 2px solid rgb(70, 159, 221);
    padding: 10px 10px;
    background-color: rgb(30, 169, 211);
    }
    td{
        color:beige;   
        background-color: rgb(30, 169, 211);
        height:fit-content;
        width: fit-content;
    }
    .btn{
        width:30px;
        height:30px;

    }
    a{
        background-color:  rgb(100, 72, 146);
            text-decoration:none;
            color: beige;
            font-family: Georgia, 'Times New Roman', Times, serif;
           font-size: 17px;
    }
    </style>
</head>

<body>
    <div class="form">
    <h1>Table des utilisateurs</h1>
    <form action="" method="POST">
    <button type="submit" name="save" >Enregistrer</button>
    <button type="submit" name="nouveau" >Nouveau</button>
    <button  name="quit">Quitter</button>
    <br><br>
    <table>
        <tr>
            <th>Nom</th>
            <th>login</th>
            <th>Password</th>
            <th>Catégorie</th>  
        </tr>
    <?php
    
      $rq="SELECT * FROM user";
      $requete=$db->query($rq);
      $e=$requete->fetchAll(PDO::FETCH_ASSOC);
      foreach($e as $key=>$row)
      {   $us=new Utilisateur($row["nom"],$row["login"],$row["password"],$row["categorie"]);
          $i=$row["id_U"];
        echo "<tr>";
        echo"<td>".$us-> getNom()."</td>";
        echo"<td>".$us->getLog()."</td>";
        echo"<td>".$us->getPass()."</td>"; 
        echo"<td>".$us->getCat()."</td>";
        echo"<td><button class='btn' name='M' style='color:beige;'><a href='modifier_user.php?index=$i '>M</a></button></td>";
        echo"<td><button class='btn' name='S' style='color:beige;'><a href='supprimer_user.php?id=$i '>S</a></button></td>";
        echo "</tr>";

      }
     
        
        ?>
    </table>
    
    
    </form>
</div>
</body>
</html>