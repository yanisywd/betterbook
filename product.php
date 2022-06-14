<?php
error_reporting(E_ERROR | E_PARSE);
require('fonction.php');
require("con_mysqli.php");
$Produits=afficher();
$con=mysqli_connect('localhost','root');
mysqli_select_db($con , 'betterbook');
session_start();
if(isset ($_GET['id'])){
$product_id= $_GET['id'];
$sql="SELECT * FROM produits WHERE id='$product_id'";
$result = $con->query($sql);
$pr=mysqli_fetch_assoc($result);
$_SESSION['cur_id']=$product_id;
}



if(isset($_POST['add'])){
    //if(isset($_POST['amount'])){
        
    if(isset($_SESSION['cart'])){        
        $item_array_id=array_column($_SESSION['cart'],'product_id');
        //print_r($item_array_id);
        if(in_array($_POST['product_id'],$item_array_id )){
          echo "<script> alert('already in pannier') </script>";
          echo "<script>window.location='demo.php </script>";
 
         }else{   
         $count=count($_SESSION['cart']);
         $item_array=array('product_id'=>$_POST['product_id']);
         $_POST['product_id']=$num;//pour avoir l id du livre dans une varible
         $_SESSION['cart'][$count]=$item_array;
         //$session['amount'][$num]=$_POST['amount'];
         //print_r( $_SESSION['cart']); 
        }
        
    }
    else{
        $item_array=array('product_id'=>$_POST['product_id']);
        $_SESSION['cart'][0]=$item_array;
        $session['amount'][0]=$_POST['amount'];
        //print_r($_SESSION['cart']);
        
    }
 //}else{echo('erreur la valeur de quantite est vide!');}

}

//if(isset($_POST['amount'])){
    //$_SESSION['cur_id']=array('id'=>$_POST['amount'];)
    //print_r($_SESSION['cur_id']);
     
 //}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="home1.css"></a>
   <link rel="stylesheet" href="product.css"></a>
   <style>
        body {
            background-color:  rgb(63, 63, 63);
        }
    </style>
</head>
<body>
<nav class="navbar"></nav>

<script src="nav.js"></script>



<?php 
error_reporting(E_ERROR | E_PARSE);
 $copie=$_SESSION['cur_id'];
$sql="SELECT * FROM produits WHERE id='$copie'";
$result = $con->query($sql);
  $pr=mysqli_fetch_assoc($result);?>

<section class="product-d">

   
    <img src="<?=$pr['image']?>" class="size" alt="">
    <div class="details">
        <h3 class="book-name"><?=$pr['nom']?></h3>
        <p class="book-author"><?= $pr['auteur'] ?></p>
        <p class="des">Description:</p>
        <p class='col'><?=$pr['description']?></p>
        <span class="book-price"><?=$pr['prix']?> <span>DA</span></span>
        <p class="book-author"><?php if(($pr['dispo'])==1){ echo'disponible';}else{ echo'non disponible';} ?></p>
        <form action="product.php" method="POST">
        <button type="submit" name="add" class="btn">ajouter au pannier</button>
         <input type="hidden" name="product_id" value="<?= $pr['id'] ?>">
         <input type="submit" name="amount" placeholder='quantite'>
         
    </form>

    </div>
   
</section>



<h2>Recommandé pour vous</h2>

<div class="product-container">
        <?php foreach($Produits as $produit): ?>
            <div class="product-card">
                <div class="product-image">
                
                <a href="product.php?id=<?= $produit->id ?>"> <img src="<?=$produit->image?>" class="product-thumb" alt=""></a>
                    <button class="card-btn">ajouter au pannier</button>
                </div>
                <div class="product-info">
                    
                    <a href="product.php">  <h3 class="product-brand"><?=$produit->nom?> </h3></a>
                    <p class="product-short-des"><?=$produit->description?> </h</p>
                    <h4 class="price"><?=$produit->prix?> DA</h4>
                    
                    
                </div>
            </div>
            <?php endforeach ;  ?>
        </div>



















<footer> </footer>
    <script src="footer.js"></script>
</body>
</html>