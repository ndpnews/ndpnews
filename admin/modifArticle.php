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
	<a href="/admin/index.php">Retour à l'accueil</a>
		<h1>Edition d'article</h1>
		<p>(Veillez à ne pas dépasser 640px de longueur lorsque vous mettez une image (Vous pouvez régler cela lorsque vous insérez l'image))</p>
		<?php
		include_once('bdd.php');
		global $bdd;
		
		if($_GET['id'] != ""){
			$req = $bdd->prepare('SELECT titre, contenu, id, auteur, categorie FROM articles WHERE id = ?');
			$req->execute(array($_GET['id']));
			
			$donnees = $req->fetch();
			
		}
		?>
		<?php if($_POST['auteur'] != "" AND $_POST["contenu"] != "" AND $_POST["titre"] != "" AND $_POST['categorie'] != "")
		{
			$req = $bdd->prepare('UPDATE articles SET titre = ?,contenu = ?, auteur = ?, categorie = ? WHERE id = ?');
			$req->execute(array($_POST['titre'], $_POST['contenu'],$_POST['auteur'],$_POST['categorie'], $_POST['id']));
			echo "Article envoyé !";
			echo "<br>";
		}
		?>
		
		<form method="post" action="modifArticle.php" class="col-lg-12">

			<legend>Nouvel article</legend>
				Titre : <input type="text" name="titre" class="form-control" value="<?php echo $donnees['titre']; ?> ">
				Auteur : <input type="text" name="auteur" class="form-control" value="<?php echo htmlspecialchars($donnees['auteur']); ?>">
				Catégorie : <select name="categorie" class="form-control"><option class="form-control" value="article" <?php if ($donnees['categorie']=="article"){echo "selected";}?>>Article</option>
				<option value="tuto" class="form-control" <?php if ($donnees['categorie']=="tuto"){echo "selected";}?>>Tutoriel</option>
				<option>Aucune</option>
				</select>
				Article : <textarea name="contenu" id="editor1" rows="10" cols="80" classe="formcontrol"><?php echo $donnees['contenu'];?></textarea>
				<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
				<br><input type="submit" value="Modifier" >
		</form>
		
		<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
           </script>
	
	</div>
	</body>
</html>
