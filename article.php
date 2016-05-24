<?php
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, "fr_FR");
	include_once('admin/bdd.php');
	global $bdd;
	function getSrc($html){

	$doc = new DOMDocument();
	$doc->loadHTML($html);
	$xpath = new DOMXPath($doc);
	$src = $xpath->query("//img/@src");
	
	$srcs = array();
	foreach($src as $s){
		array_push($srcs,$s->nodeValue);
		
	}
	$html = setA($html, $srcs);
	return $html;
}
function setA($html, $srcList){
	$i = 0;
	
	//Trouver pos
	$pos[$i][0] = strpos($html,"<img");

	//Insérer a
	$href="<a data-lightbox='image-1' alt='' href='" . $srcList[$i] . "'>";
	$html = substr_replace($html, $href, $pos[$i][0], 0);

	//Trouver pos2
	$pos[$i][1] = strpos($html,">",  $pos[$i][0]+ strlen($href));
	
	$pos[$i][1] = $pos[$i][1] + 1;

	//Insérer /a
	$html = substr_replace($html, "</a>", $pos[$i][1], 0);

	$i = $i + 1;
	print_r($srcList[i]);
	while ($pos[$i-1][0]){
		$pos[$i][0] = strpos($html,"<img", $pos[$i - 1][1]);
		
		$href="<a data-lightbox='image-1' href='" . $srcList[$i] . "'>";
		$html = substr_replace($html, "$href", $pos[$i][0], 0);

		$pos[$i][1] = strpos($html,">",  $pos[$i][0]+strlen($href));
		$pos[$i][1] = $pos[$i][1] + 1;
		
		$html = substr_replace($html, "</a>", $pos[$i][1], 0);
		
		$i = $i + 1;
	}
	return $html;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--Code par Maxence BARROY -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>NDP News</title>
<link href="lightbox/src/css/lightbox.css" rel="stylesheet">
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body>

<div id="main2">
<!-- header begins -->
<div id="header">
    <?php include('header.php');?>
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
						<?php echo getSrc($donnees['contenu']); ?>
						
						
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
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<script src="/lightbox/src/js/lightbox.js"></script>
</body>

</html>
