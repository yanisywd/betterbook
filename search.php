
<?php
require("con_mysqli.php");
if(isset ($_GET['s']) AND !empty($_GET['s']) ){
$recherche=htmlspecialchars($_GET['s']);
$sql='SELECT * FROM produits WHERE nom LIKE "%'.$recherche.'%" ORDER BY id DESC';
$nom = $con->query($sql);

$sentence='les resultats de votre recherche :';

}
error_reporting(E_ERROR | E_PARSE);
if($recherche ==null)
{
    $recherche='';
    $sentence='Aucun Livre Trouver !';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home1.css"></a>
   <link rel="stylesheet" href="search.css"></a>
   <style>
        body {
            background-color:  rgb(63, 63, 63);
        }
    </style>
</head>
<body>
<nav class="navbar"></nav>

<script src="nav.js"></script>



<section class="search-results">
   
   <h4 class="tt"><?php echo"$sentence" ?> <span><?php echo" $recherche" ?></span></h4> 
   

</section>

<?php  if($recherche==''){
    exit();
    }  ?>


 
<div class="product-container">


    <?php
      while($product=mysqli_fetch_assoc($nom)):  ?>
              
            <div class="product-card">
                <div class="product-image">
                    <img src="<?=$product['image']?>" class="product-thumb" alt="">
                    <button class="card-btn">ajouter au pannier</button>
                </div>
                <div class="product-info">
                    <h3 class="product-brand"><?=$product['nom']?> </h3>
                    <p class="product-short-des"><?=$product['description']?> </h</p>
                    <h4 class="price"><?=$product['prix']?> DA</h4>
                    
                    
                </div>
            </div>
        

        <?php   endwhile; ?>
  




</div>
             
         
             
   
         
        







<footer> </footer>
    <script src="footer.js"></script>
</body>
</html>