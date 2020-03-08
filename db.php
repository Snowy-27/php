<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        
 
<?php

$bdd = new PDO('mysql:host=localhost;dbname=cb;charset=utf8', 'root', '');
$req = $bdd->prepare('INSERT INTO `carte`(`num`, `exp`, `cvv`) VALUES (?,?,?)');

$req->execute(array($_POST['cb'], $_POST['exp'], $_POST['cvv']));
header('Location: index.php')
?>
</body>
</html>