<?php
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, "fr_FR");
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
				<div class="tit_bot">
       		    <div class="tit">
       		      <h1><span class="tit_span"><img src="images/square-matrix.png" style="width:15px;height:15px;"> Qui sommes-nous ?&nbsp;</span></h1>
				</div>
                  	<div class="text">
					 <p>Nous faisons tous partie de l'atelier coding, il y a:<br>
					<ul>
					<li>M. OMRANE qui dirige l'atelier coding</li>
					<li>Antonin BLANCKAERT qui s'occupe des publications des articles</li>
					<li>Aymeric BARROY qui rédige les articles </li> 
					<li>Maxence BARROY qui code le site</li>
					<li>Thomas ZYCH qui rédige les articles </li>
					<li>Nassim BENGHEZAL qui rédige les articles </li>
					</ul></p>
					 
					<p>Nous espérons que ce site vous plaira car nous y avons passé beaucoup de temps. Vous pouvez nous contacter <a href="contact.php"> ici</a> ou nous donner des idées <a href="ideeArticle.php">ici</a>.</p>
					
					 
					</div>
           	    </div>
            </div>
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
