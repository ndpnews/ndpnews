<?php
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, "fr_FR");
	
	
			  include_once('admin/bdd.php');
			  global $bdd;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--Code par Maxence BARROY -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>NDP-News</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<!-- Image Preloader -->
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>

	<link rel="icon" type="image/png" href="images/favicon.png" />
</head>
<body>

<div id="main">
<!-- header begins -->
<div id="header">

    <?php include('header.php');?>
</div>
<div id="content">
	 <div id="right">
					
				<?php include('right.php'); ?>
				
           	</div> 
	<div id="left">
	<div class="tit_bot">
		<div class="tit">
       		      <h1><span class="tit_span"><img src="images/square-matrix.png" style="width:15px;height:15px;"> Nous contacter&nbsp;</span></h1>
		</div>
		<div class="text">
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
			//=====Déclaration des messages au format texte et au format HTML.
			$message_txt = $_POST['message'];
			//==========
			 
			//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = "Contact ". $_POST['nom'];
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
			mail($mail,$sujet,$message,$header);
			echo $message;
			echo $header;
			//==========


		}
		
		
		
		
		?>
			<form method="post" action="contact.php" class="formulaire">
			<br>
				Votre E-Mail :      <input type="email" name="email"><br>
				Votre Nom : <input type="text" name="nom"><br>
				Votre message : <textarea name="message" rows="10" cols="50"></textarea>
				<input type="submit" value="Envoyer !">
			
			</form>
		</div>
	</div>
	</div>
	 
	 <div id="footer">

			<?php include('footer.php'); ?>

			
			</div>

</div>


</div>
</body>
</html>
