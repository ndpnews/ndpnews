<?php
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, "fr_FR");
	include_once('admin/bdd.php');
	global $bdd;
?>
<html>
	<head>
		<title>Article - NDP-News</title>
		<?php include('head.php'); ?>
	</head>
	

	<body>
	<!-- Latest compiled and minified JavaScript -->
		
		
		<!-- Barre de navigation -->
		<?php include_once("nav.php"); ?>
		<!-- Logo -->
		<img src="/images/logo2.png" class="img-responsive" style="margin-top: 50px;">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php
						$req = $bdd->prepare('SELECT id, titre, contenu, auteur, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM articles WHERE id = ?');
						$req->execute(array($_GET['id']));
						$donnees = $req->fetch();
					?>
					<!-- Titre -->
					<h1 class="page-header">
						<?php echo $donnees['titre']; ?>
					</h1>
					<!-- Auteur -->
					<p class="lead">
						par <?php echo $donnees['auteur']; ?>
					</p>
					<!-- Jour de publication --> 
					<p><span class="glyphicon glyphicon-time"></span><?php echo $donnees['date_fr']; ?></p>
					<p><?php echo $donnees['contenu']; ?></p>
				
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default page-header">
						<div class="panel-heading">Archives</div>
						<div class="panel-body">
							<?php include('right.php'); ?>
						</div>
						
					</div>
				</div>
			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>	
</html>