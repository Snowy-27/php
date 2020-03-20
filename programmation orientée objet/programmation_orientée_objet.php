<!DOCTYPE html>
<html>
<head>
	<title>site</title>
</head>
<body>
	<?php 
		interface Travailleur {
			public function Travailler();

		}


		class player implements Travailleur
		{
			public $pseudo;
			protected $age;
			public $weapon;

			public function __construct($pseudo, $age, $weapon)
			{
				$this->pseudo = $pseudo;
				$this->setAge($age);
				$this->weapon = $weapon;
					
			}
			public function travailler()
			{
				return "Je suis un joueur et je joue";
				?><br><br>
				<?php
			}
			
			public function setAge($age)
			{
				if (is_int($age) && $age >= 1 && $age <= 120) {
					$this->age = $age;
				}
				else{
					?>

					<h2>  L'age doit etre un entier !!!!!</h2>
					<style type="text/css">
						h2{
							color: blue;
						}
					</style>
					<?php  
				}
				
				
			}
			public function getAge()
			{
				return $this->age;
			}
			public function presentation()
			{
				?> <br><?php  
				echo("Bienvenue au joueur $this->pseudo vous avez $this->age ans et votre arme est $this->weapon.");
				?><br><br><?php
			}
		}
		/**
		 * 
		 */
		class player_upgrade extends player
		{
			
			function __construct($pseudo, $age, $weapon,$life)
			{
				parent::__construct($pseudo, $age, $weapon);
				$this->life = $life;
				
			}
				public function travailler()
			{
				return "Je suis un plus fort et je joue";
				?> <br><br><?php
			}
			
			public function presentation()
			{
				?> <br><br><?php
				echo("Bonjour au joueur $this->pseudo vous avez $this->age ans et votre arme est $this->weapon et vous avez $this->life.");
				?> <br><br><?php
			}
		}
		function faireTravailler(Travailleur $objet)
		{
			echo "Travail en cours : {$objet->travailler()}";
		}


		$player1 = new player("snowy", 14, "ak");
		$player1->presentation();
		faireTravailler($player1);
		

		$player_upgrade1 = new player_upgrade("ifrex", 18, "deagle", "full vie");
		$player_upgrade1->presentation();
		faireTravailler($player_upgrade1);



		class debutant implements Travailleur{
					
			public function travailler(){
				return "JE suis un etudiant et je travaille";}
					
		}


		$etudiant = new debutant;
		faireTravailler($etudiant);


		
		
	?>

</body>
</html>
