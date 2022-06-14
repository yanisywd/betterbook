

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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



<form action="res-aj.php" method="POST" class='formulaire' >
    <input type="text" name='nom' class='sty' placeholder='nom du livre'>
    <br>
    <input type="text" name='description' class='sty' placeholder='description'>
    <br>
    <input type="text" name='prix' class='sty' placeholder='prix'>
    <br>
    <input type="text" name='auteur' class='sty' placeholder='auteur'>
    <br>
    <input type="text" name='image' class='sty' placeholder='image'>
    <br>
    <input type="text" name='categorie' class='sty' placeholder='categorie'>
    <br>
    <select name="dispo" class='sty up'>
        <br>
    <option value="1" type='text' >disponible</option>
    <option value="0" type='text'  >Non disponible</option>
    </select>
    <br>

  <button ><input type="submit" class='aj' value='Ajouter' > </button>
  </form>

 

  <footer> </footer>
    <script src="footer.js"></script>
</body>
</html>