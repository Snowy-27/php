<?php  session_start(); ?>

<nav class="nav-menu d-none d-lg-block">
  <ul>
    <li class="active"><a href="#header">Accueil</a></li>
    <li><a href="#linux">Derniere video</a></li>
    <li><a href="#message">Boite de reception</a></li>
    <li><a href="#contact">Contact</a></li>
    <?php
    if (isset($_SESSION['nom'])) {
         ?>

         <li class="profil"><a href="board.php"><?php echo $_SESSION['nom'] ?></a></li>
         <li><a href="php/deco.php">Deconnexion</a></li><?php

    }
    else {
         ?>
         <li><a href="login.php">Connexion</a></li>
         <?php
    }

    ?>
  </ul>
</nav><!-- .nav-menu -->
