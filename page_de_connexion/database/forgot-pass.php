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
	if (isset($_POST['name']) && isset($_POST['email'])) {

		if (!empty($_POST['name'] && !empty($_POST['email']) )) {
			$reponse = $bdd->prepare('SELECT `id`,`password` FROM `login` WHERE email = ? AND name = ?');
			$reponse->execute(array($_POST['email'], $_POST['name']));

			while ($donnees = $reponse->fetch())
			{

				$pass = $donnees['password'];
			}
			if (isset($pass)) {
				?>
				<div class="limiter">
					<div class="container-login100">
						<div class="wrap-login100">
							<span class="login100-form-title">
								<?php
								echo "Votre mot de passe est $pass";?><br><br><?php
								echo "Vous allez etre redirigé vers la page de connexion d'ici 5secondes.";
								header("refresh:5;url=../login.php");
								?>
							</span>
						</div>
					</div>
				</div>
				<?php
			}
			else{
				?>
				<div class="limiter">
					<div class="container-login100">
						<div class="wrap-login100">
							<span class="login100-form-title">
								<?php
								echo "Aucun compte existe avec cet email ou ce nom !";?><br><br><?php
								echo "Vous allez etre redirigé vers la page d'inscription.";
								header("refresh:4;url=../singup.php");

								?>
							</span>
						</div>
					</div>
				</div>
				<?php
			}


		}

	}
	else{
		header('Location: ../index.php');
	}



	?>

</body>
</html>
