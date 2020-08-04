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
$req = $bdd->prepare('INSERT INTO `user`(`name`, `email`) VALUES (?,?)');

$req->execute(array($_POST['name'], $_POST['email']));
header('Location: index.php')
?>
</body>
</html>
