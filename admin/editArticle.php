<?php
	date_default_timezone_set('Europe/Paris');
?>
<html>

	<head>
		<meta charset="utf-8">
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	</head>
	<body>
	<div class="container">
		<h1>Edition d'article</h1>
		<?php
			
			
				include_once('bdd.php');
				global $bdd;
				
				$req = $bdd->query('SELECT id, titre, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM articles ORDER BY date DESC');
				while($donnees = $req->fetch())
				{
					?><p><?php echo $donnees['titre']; ?> <?php echo $donnees['date_fr']; ?> <a href="modifArticle.php?id=<?php echo $donnees['id']; ?>"><button type="button" class="btn btn-primary">Editer</button></a></p>
				<?php
				}
		
		?>
	
	
	</div>
	</body>
</html>
