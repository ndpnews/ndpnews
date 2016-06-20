<?php
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, "fr_FR");
?>
<html>
	<head>
		<title>Proposer un article - NDP-News</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<?php
	
			  include_once('admin/bdd.php');
			  global $bdd;
			  ?>
		<?php include_once("nav.php");?>
		<img src="/images/logo2.png" class="img-responsive" style="margin-top: 50px;">
		<div class="container">
			<div class="row">
			<?php
		if(isset($_POST['email']) AND isset($_POST['message']) and isset($_POST['nom']))
		{
			
			$mail = 'admin@ndp-news.tk'; // Déclaration de l'adresse de destination.
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
			{
				$passage_ligne = "\r\n";
			}
			else
			{
				$passage_ligne = "\n";
			}
			$_POST['message'] = $_POST['email']. "
".$_POST['message'];

			//=====Déclaration des messages au format texte et au format HTML.
			$message_txt = $_POST['message'];
			//==========
			 
			//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = "Idee ". $_POST['nom'];
			//=========
			 
			//=====Création du header de l'e-mail.
			$header = "From: \"".$_POST['nom']."\"<".$_POST['email'].">".$passage_ligne;
			$header.= "Reply-to: \"".$_POST['nom']."\"<".$_POST['email'].">".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			//==========
			 
			//=====Création du message.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format texte.
			$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format HTML
			$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			//==========
			 
			//=====Envoi de l'e-mail.
			mail($mail,$sujet,$_POST['message']);
			//==========


		}
		
		
		
		
		?>
				<div class="col-md-8">
					<h1 class="page-header">
						Proposer un article
					</h1>
					<form class="form-horizontal" method="post" action="ideeArticle.php" class="formulaire">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputNom" class="col-sm-2 control-label">Nom</label>
							<div class="col-sm-10">
								<input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom">
							</div>
						</div>
						<div class="form-group">
							<label for="inputIdee" class="col-sm-2 control-label">Votre idée</label>
							<div class="col-sm-10">
								<textarea name="message" class="form-control" id="inputIdee" placeholder="Votre idée" rows="10" cols="50"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Envoyer</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default page-header">
						<div class="panel-heading">Archives</div>
						<div class="panel-body">
							<?php include('right.php'); ?>
						</div>
						
					</div>
				</div>
	</body>
</html>