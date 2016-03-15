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
		if(isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0){
			if ($_FILES['fichier']['size'] <= 3000000)

				{
					$infosfichier = pathinfo($_FILES['fichier']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
					if (in_array($extension_upload, $extensions_autorisees))
					{
						$nom = basename($_FILES['fichier']['name']);
						move_uploaded_file($_FILES['fichier']['tmp_name'], '/home/u893828718/public_html/images/uploads/' . basename($_FILES['fichier']['name']));
                        echo "L'envoi a bien été effectué !";echo "<br>";
						echo "Le nom à taper pour l'édition d'articles sera donc : images/uploads/";
						echo $nom;
					}

				}
		 

			}
		
	?>
		<h1>Upload de fichiers</h1>
		<br>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<input type="file" name="fichier" />
			<input type="submit" value="Envoyer le fichier">
	</div>
</body>
</html>
