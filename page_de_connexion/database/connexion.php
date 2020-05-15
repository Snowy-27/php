<?php  session_start();?>
<?php $bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'snowy', 'toor'); ?>
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
	if (isset($_POST['pass']) && isset($_POST['email'])) {

		if (!empty($_POST['pass'] && !empty($_POST['email']) )) {
			$reponse = $bdd->prepare('SELECT `name`, `email`, `password` FROM `login` WHERE email = ?');
			$reponse->execute(array($_POST['email']));

			while ($donnees = $reponse->fetch())
			{

				$pass = $donnees['password'];
				$name = $donnees['name'];
				$email = $donnees['email'];
				$id = $donnees['id'];
			}
			if (isset($pass)) {
				if ($pass == $_POST['pass']) {
					header('Location: ../index.php');
					$_SESSION['nom'] = $name;
					$_SESSION['email'] = $email;
					$_SESSION['pass'] = $pass;
					$_SESSION['id'] = $id;

				}
			}
			else{
				?>
				<div class="limiter">
					<div class="container-login100">
						<div class="wrap-login100">
							<span class="login100-form-title">
								erreur, veuillez <span class="login100-form-title"><a href="../login.php">reesayer</a></span>
							</span>
						</div>
					</div>
				</div>


				<?php
			}


		}

	}
	else{
		header('Location: ../login.php');
	}



	?>

</body>
</html>
