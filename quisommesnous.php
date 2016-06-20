<?php
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, "fr_FR");
?>
<html>
	<head>
		<title>NDP-News</title>
		<?php include('head.php'); ?>
	</head>
	<?php 
		include_once("admin/bdd.php");
		global $bdd;
		include_once("nav.php");
		?>
		<img src="/images/logo2.png" class="img-responsive" style="margin-top: 50px;">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1 class="page-header">
						Qui sommes-nous ?
					</h1>
					<p>
						<p>Nous faisons tous partie de l'atelier coding, il y a:<br>
						<ul>
						<li>M. OMRANE qui dirige l'atelier coding</li>
						<li>Antonin BLANCKAERT qui s'occupe des publications des articles</li>
						<li>Aymeric BARROY qui corrige les articles </li> 
						<li>Maxence BARROY qui code le site</li>
						<li>Thomas ZYCH qui rédige les articles </li>
						<li>Nassim BENGHEZAL qui rédige les articles </li>
						</ul></p>
						 
						<p>Nous espérons que ce site vous plaira car nous y avons passé beaucoup de temps. Vous pouvez nous contacter <a href="contact.php"> ici</a> ou nous donner des idées <a href="ideeArticle.php">ici</a>.</p>
					</p>
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
	</body>
	<!-- Latest compiled and minified JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</html>
	