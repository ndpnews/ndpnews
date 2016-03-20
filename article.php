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
<title>NDP News</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" />

<!-- Image Preloader -->
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>

</head>
<body>

<div id="main">
<!-- header begins -->
<div id="header">
    <div id="logo"> <img src="images/logo.png"/>  </div>
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
    
    	<div id="content">
        	<div id="right">
            <?php include('right.php'); ?>	
           	</div>  
            <div id="left">
			  <?php
			  
			  $req = $bdd->prepare('SELECT id, titre, contenu, auteur, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM articles WHERE id = ?');
			  $req->execute(array($_GET['id']));
			  
			  while($donnees = $req->fetch())
			  {
				  ?>
				<div class="tit_bot">
       		    <div class="tit">
       		      <h1><span class="tit_span"><img src="images/square-matrix.png" style="width:15px;height:15px;">  <?php echo $donnees['titre']; ?>&nbsp;</span></h1>
				</div>
                  	<div class="text">
					
                    	<?php echo $donnees['date_fr']; ?><br>
			<?php echo $donnees['auteur']; ?>
						<br>
						<?php echo $donnees['contenu'] ?>
						
						
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
            <div style="clear: both"><img src="images/spaser.gif" alt="" width="1" height="1" /></div>
         <!-- footer begins -->
            <div id="footer">
			<?php include("footer.php"); ?>
			</div>


				<!-- footer ends -->
        </div>
    <!-- content ends -->
</div>
</body>
</html>
