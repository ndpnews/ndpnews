<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">NDP-News</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-left">
						<li<?php if(stripos($_SERVER['REQUEST_URI'],"index.php")!=false){echo " class='active'";} ?>><a href="index.php">Accueil</a></li>
						<li<?php if(stripos($_SERVER['REQUEST_URI'],"catArticle.php")!=false){echo " class='active'";} ?>><a href="catArticle.php">Articles</a></li>
						<li<?php if(stripos($_SERVER['REQUEST_URI'],"tuto.php")!=false){echo " class='active'";} ?>><a href="tuto.php">Tutoriels</a></li>
						<li<?php if(stripos($_SERVER['REQUEST_URI'],"quisommesnous.php")!=false){echo " class='active'";} ?>><a href="quisommesnous.php">Qui sommes-nous ?</a></li>
						
					</ul>
				</div>
				
			</div>
		</nav>