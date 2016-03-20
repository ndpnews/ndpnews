<?php
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, "fr_FR");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>NDP News</title>
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

    <div id="logo"> <img  style="width:1009px;"src="images/logo.png"/>  </div>
    <div id="buttons">
          <a href="index.php" class="but"  title="">Accueil</a>
          <a href="#" class="but" title="">Atelier Coding</a>
          <a href="#"  class="but" title="">HTML</a>
          <a href="#"  class="but" title="">CSS</a>
          <a href="#" class="but" title="">Javascript</a>
		  <a href="#" class="but" title="">Créer un site web</a>
		  <a href="#" class="but" title="">Tuto en vidéo</a>
		  <a href="#" class="but" title="">HTML Editor</a>
		  <a href="#" class="but" title="">SVG Editor</a>
    </div>
</div>
<!-- header ends -->
    <!-- content begins -->
    <?php
	
			  include_once('admin/bdd.php');
			  global $bdd;
			  ?>
    	<div id="content">
        	<div id="right">
					
				<?php include('right.php'); ?>
				
           	</div>  
            <div id="left">
			  <?php
			  
			  $req = $bdd->query('SELECT id, titre, contenu, auteur, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM articles ORDER BY date DESC LIMIT 0, 10');
			  while($donnees = $req->fetch())
			  {
				  ?>
				<div class="tit_bot">
       		    <div class="tit">
       		      <h1><span class="tit_span"><img src="images/square-matrix.png" style="width:15px;height:15px;">  <?php echo $donnees['titre']; ?>&nbsp;</span></h1>
				</div>
                  	<div class="text">
					
                    	<?php echo $donnees['date_fr']; ?><br>
			<b><?php echo $donnees['auteur']; ?></b>
						<br>
						<?php echo strip_tags(substr($donnees['contenu'], 0, 300), '<br><p>'); ?>...
						
						<div class="read"><a href="article.php?id=<?php echo $donnees['id']; ?>"><img src="images/add.png" alt="" style="width:25px;height:25px;"/></a>
						</div>
                    	<br />
					</div>
           	    </div>
				<?php
			  }
				?>
            </div>
			<?php
			// Fin de la boucle des billets
			$req->closeCursor();
			?>
            <br />
         <!-- footer begins -->
            <div id="footer">

			<?php include('footer.php'); ?>

			
			</div>


				<!-- footer ends -->
        </div>
    <!-- content ends -->
</div>
</body>
</html>
