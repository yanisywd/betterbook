<?php
$res="vide";
require('fonction.php');
require("con_mysqli.php");
$base=200;
$Produits=afficher();
session_start();
if(isset ($_GET['filtre_cat']) ){
    $cat=htmlspecialchars($_GET['filtre_cat']);
    $sql='SELECT * FROM produits WHERE categorie LIKE "%'.$cat.'%" ORDER BY id DESC';
    $message= "voici les livres de la categorie";
    $res = $con->query($sql);//object oriented style Required Specifies the SQL query string and specify which con is used
}
if(isset ($_GET['filtre_amount']) ){
    $message=null;
    if($_GET['filtre_amount']=='inf'){
        $prix_f=htmlspecialchars($_GET['filtre_amount']);
        $sql='SELECT * FROM produits WHERE prix < 300' ;
        $res = $con->query($sql);//object oriented style Required Specifies the SQL query string and specify which con is used
        }
    if($_GET['filtre_amount']=='sup'){
    $prix_f=htmlspecialchars($_GET['filtre_amount']);
    $sql='SELECT * FROM produits WHERE prix > 300' ;
    $res = $con->query($sql);//object oriented style Required Specifies the SQL query string and specify which con is used
    }

}
if(isset($_POST['add'])){
   if(isset($_SESSION['cart'])){        
       $item_array_id=array_column($_SESSION['cart'],'product_id');
      // print_r($item_array_id);//comment here to hide the array 
       if(in_array($_POST['product_id'],$item_array_id )){
         echo "<script> alert('already in pannier') </script>";
         echo "<script>window.location='demo.php </script>";

        }else{   
        $count=count($_SESSION['cart']);
        $item_array=array('product_id'=>$_POST['product_id']);
        $_SESSION['cart'][$count]=$item_array;
        //print_r( $_SESSION['cart']); 
    }
       
   }
   else{
       $item_array=array('product_id'=>$_POST['product_id']);
       $_SESSION['cart'][0]=$item_array;
      // print_r($_SESSION['cart']);
   }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <style>
        body {
            background-color:  rgb(63, 63, 63);
        }
    </style>
    <link rel="stylesheet" href="home1.css">
</head>

<body>
   
        <nav class="navbar"></nav>

    <script src="nav.js"></script>
    
    <script src="slide.js"></script>
    
    
    <div class="div1">
        <h2 class="centertxt">Une Meilleur facon d'acheter des livres</h2>
    </div>
    <header class="hed1">
        <div class="content">
            <img src="book.jpeg" class="logo" alt="">

        </div>
    </header>

    <?php 
       if(isset($_SESSION['cart'])){
           $count=count($_SESSION['cart']);
           ?> <h1 class='number'> vous avez <span color="red"><?=$count?> </span>Livres dans votre pannier</h1> <?php
          
       }
    ?>
    <br>
     
    <form method="GET" action="demo.php" class='filtre'>
    <label for="category">filtre de recherche par categorie</label>
  <select name="filtre_cat" id="">
    <option value="Psychology" type='submit'>Psychology</option>
    <option value="business ">business & Management</option>
    <option value="investisment">investisment</option>
    <option value="Enfant">enfant</option>
    <option value="story teller">story teller</option>
  </select>
  
  <button  class="button4"><input type="submit"value='FILTRER' class='aj-2'></button>
  </form>

  <form method="GET" action="demo.php" class='filtre'>
    <label for="category">filtre de recherche par prix</label>
  <select name="filtre_amount" id="">
    <option value="sup" type='submit'>prix >300 DA</option>
    <option value="inf" type='submit'>prix < 300 DA</option>
    
  </select>
  
  <button  class="button4"><input type="submit"value='FILTRER' class='aj-2'></button>
  </form>










  <h6></h6>
  <?php if($res!='vide'){
    if($message!=null){
           ?><h6><?$message.$cat;?></h6><?php }?>
  <div class="product-container">
      <?php while($product=mysqli_fetch_assoc($res)): ?>
       
        <form action="demo.php" method="POST">
            <div class="product-card">
                <div class="product-image">
                <a href="product.php?id=<?= $product['id'] ?>">
                 <img src="<?=$product['image']?>" class="product-thumb" alt="">
                </a>
                    <button type='submit' name='add' class="card-btn">ajouter au pannier</button>
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                </div>
                <div class="product-info">
                    <h3 class="product-brand"><?=$product['nom']?> </h3>
                    <p class="product-short-des"><?=$product['description']?> </h</p>
                    <h4 class="price"><?=$product['prix']?> DA</h4>
                    
                    
                </div>
            </div>
      </form>
        <?php endwhile; ?>
      </div>
      <?php } ?>
     
    




<section class="product">
        <h3 class="product-category" style='color:white'>meilleur vente</h3>
        <button class="pre-btn"><img src="arrow.png" height="50" /></button>
        <button class="nxt-btn"><img src="arrow.png" height="50" /></button>


        <div class="product-container">
        <?php foreach($Produits as $produit): ?>
            <form action="demo.php" method="POST">
            <div class="product-card">
                <div class="product-image">
                <a href="product.php?id=<?= $produit->id ?>">
                 <img src="<?=$produit->image?>" class="product-thumb" alt="">
                </a>
                
                    
                    <button type="submit" name="add" class="card-btn">ajouter au pannier</button>
                    <input type="hidden" name="product_id" value="<?= $produit->id ?>">
                    
                    
                </div>
                <div class="product-info">
                    
                    <a href="product.php">  <h3 class="product-brand"><?=$produit->nom?> </h3></a>
                    <p class="product-short-des"><?=$produit->description?> </h</p>
                    <h4 class="price"><?=$produit->prix?> DA</h4>
                    <p class="product-short-des"><?php if(($produit->dispo)==1){echo'disponible';}else{echo'non disponible';}?> </h</p>

                    
                    
                </div>
            </div>
            </form>
            <?php endforeach ;  ?>
        </div>

        

    </section>





    <footer> </footer>
    <script src="footer.js"></script>


   

</body>


</html>