<?php $bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', ''); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<?php
	if (  isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])) {

		if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
			$reponse = $bdd->prepare('SELECT `email` FROM `login` WHERE email = ?');
			$reponse->execute(array($_POST['email']));
			while ($donnees = $reponse->fetch())
			{
				$email = $donnees['email'];
			}
			if (isset($email)) {
				if ($email == $_POST['email']) {
					?>
					<div class="limiter">
						<div class="container-login100">
							<div class="wrap-login100">
								<span class="login100-form-title">
									un compte existe avec l'email <?php echo $_POST['email'] ?> vous allez etre redirigez vers la page de connexion
								</span>
							</div>
						</div>
					</div>


					<?php
					header("refresh:4;url=../login.php");
				}
			}else {

				$req = $bdd->prepare('INSERT INTO `login`(`name`, `email`, `password`) VALUES (?, ?, ?)');
				$req->execute(array($_POST['name'], $_POST['email'], $_POST['pass']));
				?>
				<div class="limiter">
					<div class="container-login100">
						<div class="wrap-login100">
							<span class="login100-form-title">
								Compte cree avec succes vous allez etre redirigez vers la page de connexion
							</span>
						</div>
					</div>
				</div>


				<?php
				header("refresh:4;url=../login.php");
			}


		}

	}
	else{
		header('Location: ../index.php');
	}



	?>

</body>
</html>
