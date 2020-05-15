<?php  session_start();?>
<?php $bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'snowy', 'toor'); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
     <head>
          <meta charset="utf-8">
          <title></title>
     </head>
     <body>
          <?php
          if (isset($_POST['bio'])) {
               // on verifie si le formulaire est present
               if (!empty($_POST['bio'])) {
                    // on verifie qu'il ne soit pas vide
                    $req = $bdd->prepare('SELECT * FROM `login` WHERE email = ?');
                    // je selectionne tout de la database ou l'email est $_session['email']
                    $req->execute(array($_SESSION['email']));
                    // je l'execute
                    while ($donnees = $req->fetch())
                    {

                         $id = $donnees['id'];
                         // j'enregiste l'id dans la variable $id pour l'utiliser juste apres
                         
                    }

                    $reponse = $bdd->prepare('UPDATE `login` SET `description`= ? WHERE id = ?');
                    // j'inserre la description/biographie dans la database ($_POST['bio']) ou l'id est $id
                    $reponse->execute(array($_POST['bio'], $id));
                    //j'execute 
                    header('Location: ../board.php');


               }
          }
          else{
               header('Location: ../index.php');

          }

           ?>

     </body>
</html>
