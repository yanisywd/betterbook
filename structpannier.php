
<?php
function article($product_id,$productimg,$productprix,$productname,){
    //$productprix=$productprix*(int)$_SESSION['amount'][$product_id];
    $contenu="
<form action= \"pannier.php?action=remove&id=$product_id\"method='post' >
<div class='imagebk'>
    <img src=$productimg  width=\"150\" height=\"200\">
    <h7 >$productname</h7>
    <div class='prix'><span>prix: $productprix DA</span></div>
    <div class='button3'><button type='submit' name='remove' class='aj-2'>Supprimer</button></div>
    <div class='btnplus'>
    <button type='button'>+</button>
    <input type=\"text\"  value='1'>
    <button type='button'>-</button>
    </div>
</div>

</form> 
";
echo $contenu;
}
?>