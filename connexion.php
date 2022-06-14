<?php

try{
    $access = new pdo ("mysql:host=localhost;dbname=betterbook;charset=utf8","root", "");
    $access->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING );// run an exception in case a query fails
}catch(exeption $e)
{
    $e->getMessage();
}

?>
