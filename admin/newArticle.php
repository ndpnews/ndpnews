<?php
	date_default_timezone_set('Europe/Paris');
?>
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
		<?php
		include_once('bdd.php');
		global $bdd;
		
		if($_POST["contenu"] != "" AND $_POST["titre"] != ""){
			$req = $bdd->prepare('INSERT INTO articles (titre,contenu,date) VALUES(?,?,NOW())');
			$req->execute(array($_POST['titre'], $_POST['contenu']));
			echo "Article envoyé !";
			echo "<br>";
		}
		

		?>
		<a href="index.php">Retour</a>
		<h1>Créer un nouvel article</h1>
		
		
		<form method="post" action="newArticle.php" class="col-lg-12">

			<legend>Nouvel article</legend>
				Titre : <input type="text" name="titre" class="form-control">
				Article : <textarea name="contenu" id="editor1" rows="10" cols="80" classe="formcontrol"></textarea>
				
				<br><input type="submit" value="Créer" >
		</form>
		
		<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
           </script>
		   
		<div>
	</body>
<html>