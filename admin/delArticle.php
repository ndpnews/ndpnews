<html>
	<head>
		<script src="//cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
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
		<h1>Suppression d'articles</h1>
			<?php
			
			
				include_once('bdd.php');
				global $bdd;
				
				if($_GET['id'] != "")
			{
			$req = $bdd->prepare('DELETE FROM articles WHERE id = :id');
			$req->execute(array('id' => $_GET['id']));
			echo('Article supprimé');
			echo('<br>');
			}
			
				$req = $bdd->query('SELECT id, titre, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM articles ORDER BY date DESC');
				while($donnees = $req->fetch())
				{
					?><p><?php echo $donnees['titre']; ?> <?php echo $donnees['date_fr']; ?> <button type="button" class="btn btn-danger" onclick="
					var r = confirm('Etes-vous sûr ?');
					if (r == true)
					{
						var id = '<?php echo $donnees['id']; ?>'
						var text = 'delArticle.php?id=';
						document.location.href=text+id;
					}
						">Supprimer</button></p>
				<?php
				}
		
		?>
		
		</div>
	</html>

<html>