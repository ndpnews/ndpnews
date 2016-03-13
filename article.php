<?php
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, "fr_FR");
	include_once('admin/bdd.php');
	global $bdd;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
            <div class="tit_bot">
				<div class="tit">
       		      <h1><span class="tit_span">  Archives&nbsp;</span></h1>
				</div>
					<div class="text">
				<?php
				$req1 = $bdd->query('SELECT id, titre, DATE_FORMAT(date, \'%d %M %Y\') AS date_fr FROM articles ORDER BY date DESC');
				while($donnees = $req1->fetch())
				{
				?><b><?php
				$dateTime = strtotime($donnees['date_fr']);
				$date = strftime("%d %B %G", $dateTime);
				echo $date;?></b> - <a href="article.php?id=<?php echo $donnees['id'];?>"><?php echo $donnees['titre'];?></a><br><?php
				}
				?>
					</div>
			</div>	
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


			
			<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
            Copyright  2016    <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a> | <a href="admin">Administration</a> | <a href="http://github.com/ndpnews/ndpnews">Code source sur Github</a></div>


				<!-- footer ends -->
        </div>
    <!-- content ends -->
</div>
</body>
</html>
