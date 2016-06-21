<?php
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, "fr_FR");
?>
<html>
	<head>
		<title>NDP-News</title>
		<?php include('head.php'); 
		include_once('admin/bdd.php');
			  global $bdd;?>
		<?php if(isset($_POST['note'])){
			switch($_POST['note'])
			{
				case 1:
					$bdd->exec('UPDATE poll SET note1 = note1 + 1');
				break;
				case 2:
					$bdd->exec('UPDATE poll SET note2 = note2 + 1');
				break;
				case 3:
					$bdd->exec('UPDATE poll SET note3 = note3 + 1');
				break;
				case 4:
					$bdd->exec('UPDATE poll SET note4 = note4 + 1');
				break;
				case 5:
					$bdd->exec('UPDATE poll SET note5 = note5 + 1');
				break;
			}
		}
			
		?>
	</head>
	
	<body>
		<?php include_once("nav.php");?>
		<img src="/images/logo2.png" class="img-responsive" style="margin-top: 50px;">
		<div class="container">
			<div class="row">
			
				<div class="col-md-8">
					<h1 class="page-header">
						Articles
					</h1>
					<?php
						$req = $bdd->query('SELECT id, titre, contenu, auteur, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM articles ORDER BY date DESC LIMIT 0, 7');
						while($donnees = $req->fetch())
						{ ?>
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
					<div class="panel panel-primary">
						<div class="panel-heading">Combien noteriez-vous le site ?</div>
						
							<div class="panel-body" style="padding-top:5px;padding-bottom:5px;"><style>.radio:hover{text-decoration: none;}.radio > label:hover{text-decoration:none !important;cursor: default !important;}</style>
									<?php if(isset($_POST['note'])){
										echo '<p style="margin: 0px;">Merci pour votre avis</p>';
										echo '</div>';
									}
									else{
										?>
									<form method="post" action="index.php" style="margin-bottom: 0px;margin-top:0px;">	
									<div class="radio">
										<label>
											<input type="radio" name="note" id="note1" value="1">
											1
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="note" id="note2" value="2">
											2
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="note" id="note3" value="3">
											3
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="note" id="note4" value="4">
											4
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="note" id="note5" value="5">
											5
										</label>
									</div>
									</div>
									<div class="panel-footer">
										<button type="submit" class="btn btn-default">Envoyer !</button>
									</div>
									</form>
									<?php
									}?>
									
							
							
					</div>
				</div>
				
			</div>
		</div>
		

	</body>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		
		
</html>