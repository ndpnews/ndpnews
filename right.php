<div class="tit_bot">
				<div class="tit">
       		      <h1><span class="tit_span">  Archives&nbsp;</span></h1>
				</div>
					<div class="text" style="padding: 0px">
				<?php
				$req1 = $bdd->query('SELECT id, titre, DATE_FORMAT(date, \'%d %M %Y\') AS date_fr FROM articles ORDER BY date DESC');
				//Premier fetch
				
				$donnees = $req1->fetch();
				?><ul>
					<li><input type="checkbox" id="c1" /><i class="fa fa-angle-double-right"></i><i class="fa fa-angle-double-down"></i><label for="c1"> <?php $dateTime = strtotime($donnees['date_fr']);$annee = strftime("%G", $dateTime);echo $annee;?></label>
						<ul>
							<li><input type="checkbox" id="c2" /><i class="fa fa-angle-double-right"></i><i class="fa fa-angle-double-down"></i> <label for="c2"> <?php $dateTime = strtotime($donnees['date_fr']);$mois = strftime("%B", $dateTime);echo $mois;?></label>
								<ul>
									<li><b><?php
												$dateTime = strtotime($donnees['date_fr']);
												$date = strftime("%d", $dateTime);
												echo $date;?></b> - <a href="article.php?id=<?php echo $donnees['id'];?>"><?php echo $donnees['titre'];?></a>
									</li>
									
				<?php
				//Fin
				$nC = 3;
				while($donnees = $req1->fetch())
				{
					
					$dateTime = strtotime($donnees['date_fr']);
					//Si c'est la même année
					if($annee == strftime("%G", $dateTime)){
						//Si c'est le même mois
						if($mois == strftime("%B", $dateTime))
						{
							//Mettre l'article
						?><li><b><?php
									$dateTime = strtotime($donnees['date_fr']);
											$date = strftime("%d", $dateTime);
											echo $date;?></b> - <a href="article.php?id=<?php echo $donnees['id'];?>"><?php echo $donnees['titre'];?></a>
							</li>
						<?php
						}
						else
							//Si c'est pas le même mois
							//Mettre le nouveau mois puis l'article
						{
							?></ul></li><li><input type="checkbox" id="c<?php echo $nC;?>" /><i class="fa fa-angle-double-right"></i><i class="fa fa-angle-double-down"></i> <label for="c<?php echo $nC;?>"> <?php $nC = $nC + 1;$dateTime = strtotime($donnees['date_fr']);$mois = strftime("%B", $dateTime);echo $mois;?></label>
							<ul><li><b><?php
												$dateTime = strtotime($donnees['date_fr']);
												$date = strftime("%d", $dateTime);
												echo $date;?></b> - <a href="article.php?id=<?php echo $donnees['id'];?>"><?php echo $donnees['titre'];?></a>
									</li>
						<?php
						}
					}
					else
					{
						//Si c'est pas la même année?>
						</ul></li></ul></li><li><input type="checkbox" id="c<?php echo $nC;?>" /><i class="fa fa-angle-double-right"></i><i class="fa fa-angle-double-down"></i> <label for="c<?php echo $nC;?>"> <?php $nC = $nC + 1; $dateTime = strtotime($donnees['date_fr']);$annee = strftime("%G", $dateTime);echo $annee;?></label><ul>
						<li><input type="checkbox" id="c<?php echo $nC;?>" /><i class="fa fa-angle-double-right"></i><i class="fa fa-angle-double-down"></i> <label for="c<?php echo $nC;?>"> <?php $nC = $nC + 1; $dateTime = strtotime($donnees['date_fr']);$mois = strftime("%B", $dateTime);echo $mois;?></label><ul>
						<li><b><?php
												$dateTime = strtotime($donnees['date_fr']);
												$date = strftime("%d", $dateTime);
												echo $date;?></b> - <a href="article.php?id=<?php echo $donnees['id'];?>"><?php echo $donnees['titre'];?></a>
									</li>
					<?php	
					}
					
				}
				?></ul></li></ul></li></ul>
					</div>
			</div>