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
			
	<div class="tit_bot">
		<div class="tit">
       		      <h1><span class="tit_span"><img src="images/square-matrix.png" style="width:15px;height:15px;"> Nous contacter&nbsp;</span></h1>
		</div>
		<div class="text">
			<form method="post" action="contact.php">
				Votre E-Mail : <input type="text" name="email">
				Votre message : <textarea name="message" rows="10" cols="50">
				<input type="submit" value="Envoyer !">
			
			</form>
		</div>
	<div>
	 
	 <div id="footer">

			<?php include('footer.php'); ?>

			
			</div>

</div>


</div>
</body>
</html>