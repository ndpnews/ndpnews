<html>

	<head>
		<script src="//cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
		include_once('bdd.php');
		global $bdd;
		
		if($_POST["contenu"] != "" AND $_POST["titre"] != ""){
			$req = $bdd->prepare('INSERT INTO articles (titre,contenu,date) VALUES(?,?,NOW())');
			$req->execute(array($_POST['titre'], $_POST['contenu']));
			echo "ok";
			echo $_POST['contenu'];
		}
		

		?>
		
		<h1>Créer un nouvel article</h1>
		<form method="post" action="newArticle.php">
			Titre : <input type="text" name="titre"><br>
			Article : <textarea name="contenu" id="editor1" rows="10" cols="80"></textarea>
			<br>
			<input type="submit" value="Créer" >
		</form>
		
		<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
           </script>
	</body>
<html>