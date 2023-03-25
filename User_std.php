<?php
include("Etudiant.php");  
require("connexion_user.php");
?>
 <?php  
    error_reporting(0);
    if($_SERVER['REQUEST_METHOD']=="POST"){  
       if(isset($_POST['quit'])) {   
             header('Location: index.php');
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
    <title>Tableau des Notes</title>
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
    <h1>Tableau des Notes</h1>
    <form action="" method="POST">
    <button  name="quit">Quitter</button>
    <br><br>
    <table>
        <tr>
            <th>Nom</th>
            <th>Maths</th>
            <th>Informatique</th>
            <th>Moyenne</th>  
            <th>Mention</th>
        </tr>
    <?php
    
      $rq="SELECT * FROM etudiant";
      $requete=$db->query($rq);
      $e=$requete->fetchAll(PDO::FETCH_ASSOC);
      foreach($e as $key=>$row)
      {   $etd=new Etudiant($row["Name"],$row["maths"],$row["info"]);
          $i=$row["id"];
        echo "<tr>";
        echo"<td>".$etd-> getNom()."</td>";
        echo"<td>".$etd->getMaths()."</td>";
        echo"<td>".$etd->getInfo()."</td>";
        echo"<td>".$etd->moyenne()."</td>";
        echo"<td>".$etd->mention($etd->moyenne())."</td>";
        echo"<td><button class='btn' name='I' style='color:beige;'><a href='imprimer.php?id=$i '>I</a></button></td>";
        echo "</tr>";

      }
     
        
        ?>
    </table>
    
    
    </form>
</div>
</body>
</html>