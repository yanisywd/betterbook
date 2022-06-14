<?php 
require("con_mysqli.php");
$Anom=$_POST['nom'];
$Adescription=$_POST['description'];
$Aprix=$_POST['prix'];
$Aauteur=$_POST['auteur'];
$Aimage=$_POST['image'];
$Acategorie=$_POST['categorie'];
$dispo=$_POST['dispo'];
if($_POST['nom']==null){
       ?> 
       <h1>vous avez entrer des champ vide veillez reesayer !</h1>
       
       <a href="ajouter_produit.php">reesayer</a> 
       <br>
       <a href="demo.php">annuler</a>
       <?php
       
}elseif($_POST['nom']!=null){
$sql="INSERT INTO produits ( nom,description,prix,auteur,image,categorie,dispo) VALUES( '$Anom','$Adescription','$Aprix','$Aauteur','$Aimage','$Acategorie','$dispo');";
mysqli_query($con,$sql);//execure req
 ?> <h1>le produit a bien etait ajouter !!</h1>
<a href="demo.php">revenir au menu principale</a>
<br>
<a href="ajouter_produit.php">ajouter un autre</a> <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



</body>
</html>