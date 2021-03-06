<?php
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, "fr_FR");
	include_once('admin/bdd.php');
	global $bdd;
?>
<html>
	<head>
		<title>Article - NDP-NEWS</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<?php include_once("nav.php"); ?>
		<!-- Logo -->
		<img src="/images/logo2.png" class="img-responsive" style="margin-top: 50px;">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php
						
						$req = $bdd->query('SELECT id, titre, contenu, auteur, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM articles WHERE categorie="article" ORDER BY date DESC LIMIT 0, 10');
						while($donnees = $req->fetch())
						{
					?>
					<h2>
						<?php echo $donnees['titre']; ?>
					</h2>
					
					<p class="lead">
						par <?php echo $donnees['auteur']; ?>
					</p>
					
					<p><span class="glyphicon glyphicon-time"></span><?php echo $donnees['date_fr']; ?></p>
					<?php
							$pos1 = strpos($donnees['contenu'], '<img');
							$pos2 = strpos($donnees['contenu'], '>', $pos1);$pos2 = $pos2 + 1;$longeur = $pos2 - $pos1;	
							$img = substr($donnees['contenu'], $pos1, $longeur);
							
							$doc = new DOMDocument();
							$doc->loadHTML($donnees['contenu']);
							$xpath = new DOMXPath($doc);
							$src = $xpath->evaluate("string(//img/@src)");
							
						?>
						<?php echo $img; ?>	
						<p><?php echo strip_tags(substr($donnees['contenu'], 0, 300), '<br><p><iframe>');?></p>
					<a class="btn btn-primary" href="article.php?id=<?php echo $donnees['id']; ?>">Lire plus<span class="glyphicon glyphicon-chevron-right"></span></a>
					<hr>
					<?php
					  }
					?>
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