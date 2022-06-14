<?php 
require('structpannier.php');
require('fonction.php');
require("con_mysqli.php");
$Produits=afficher();
session_start();
$sql='SELECT * FROM produits';
$result = $con->query($sql);
$total=0;
if(isset($_POST['remove'])){
   // print_r($_GET['id']); verification 
   if($_GET['action']=='remove'){
       //we pass here the id by url so we use get 
       foreach($_SESSION['cart'] as $key=>$value){
           if($value['product_id']==$_GET['id']){
               unset($_SESSION['cart'][$key]);
             }
       }
   }
}
if(isset($_POST['amount'])){
    
    $_SESSION['cur_id']=$_POST['amount'];
    print_r($_SESSION['cur_id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pannier</title>
    <link rel="stylesheet" href="home1.css">
    <link rel="stylesheet" href="pannier.css"></a>

    <style>
        body {
            background-color:  rgb(63, 63, 63);
        }
    </style>
</head>
<body>
<nav class="navbar"></nav>
<script src="nav.js"></script>
  <section class='sec'>
      <div>
<h5 class='pannier'>votre pannier</h5>

  
<?php 
if(isset($_SESSION['cart'])){
$product_id=array_column($_SESSION['cart'],'product_id');

 while($row=mysqli_fetch_assoc($result)){
    foreach($product_id as $id){
      if($row['id']==$id){
          
         article($row['id'],$row['image'],$row['prix'],$row['nom']); 
         $total=$total+(int)$row['prix'];
          //$total=$total+((int)$row['prix']*(int)$GLOBALS["amount"][$id]);
          
      }}}
    
    
}else{
    echo ' pannier vide ';
}
?>

</div>
<div class='total'><h5>total: <?= $total .' ' . 'DA'?></h5></div>





</section>
<footer> </footer>
    <script src="footer.js"></script>

    
</body>
</html>