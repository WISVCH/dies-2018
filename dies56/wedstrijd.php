<!DOCTYPE html>
<?php 
	include_once("analytics.php");
?>
<html lang='en'>
	<head>
		<meta charset="utf-8">
		<title>56e Dies Natalis der W.I.S.V. 'Christiaan Huygens'</title>
		<meta name="description" content="56e Dies Natalis der 'W.I.S.V. Christiaan Huygens'">
		<meta name="keywords" content="Dies,Natalis,CH,Christiaan,Huygens,56">
		<meta name="author" content="Patrick van Hesteren">
		<link href="script/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="animate.min.css" rel="stylesheet" type="text/css">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div id = "bar" class="navbar navbar-fixed-top">
		    <div class="navbar-inner" style="height:21px;">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>

					<div class="nav-collapse">
						<ul class="nav">
							<li><a href="index.php" onclick = "return url('index', 'index.php');">Home</a></li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown" onclick = "return url('programma', 'programma.php');">Programma</a>
								<ul class="dropdown-menu">  
									<li><a href="programma.php#Pre-dies" onclick = "return url('Pre-dies', 'programma.php');">Pre-dies</a></li>  
									<li><a href="programma.php#Receptie" onclick = "return url('Receptie', 'programma.php');">Receptie</a></li>  
									<li><a href="programma.php#Ledenlunch" onclick = "return url('Ledenlunch', 'programma.php');">Ledenlunch</a></li>  
									<li><a href="programma.php#Men-Ladiesspecial" onclick = "return url('Men-Ladiesspecial', 'programma.php');">Men- & Ladiesspecial</a></li>  
									<li><a href="programma.php#Cocktailavond" onclick = "return url('Cocktailavond', 'programma.php');">Cocktailavond</a></li>  
									<li><a href="programma.php#Uitbrakontbijt" onclick = "return url('Uitbrakontbijt', 'programma.php');">Uitbrakontbijt</a></li>  
									<li><a href="programma.php#Lunchlezing" onclick = "return url('Lunchlezing', 'programma.php');">Lunchlezing</a></li>  
									<li><a href="programma.php#Kroegentocht" onclick = "return url('Kroegentocht', 'programma.php');">Kroegentocht</a></li>  
									<li><a href="programma.php#Workshop" onclick = "return url('Workshop', 'programma.php');">Workshop</a></li>  
									<li><a href="programma.php#WIDM" onclick = "return url('WIDM', 'programma.php');">WieIsDeMol?-Finaleavond</a></li>
									<li><a href="programma.php#Excursie" onclick = "return url('Excursie', 'programma.php');">Excursie</a></li>  
									<li><a href="programma.php#Eindfeest" onclick = "return url('Eindfeest', 'programma.php');">Eindfeest</a></li>  
								</ul>  
							</li>
							<li><a href="fotos.php" onclick = "return url('fotos', 'fotos.php');">Fotos</a></li>
							<li class="actief"><a href="wedstrijd.php" onclick = "return url('wedstrijd', 'wedstrijd.php');">Wedstrijd</a></li>
							<li><a href="score.php" onclick = "return url('score', 'score.php');">Score</a></li>
							<li><a href="commissie.php" onclick = "return url('commissie', 'commissie.php');">Commissie</a></li>
						</ul>
						<ul class = "nav pull-right">
							<li>
								<a href="#">
									<strong>
										<?php
											$date = strtotime('2013-03-04 00:00:00');
											$remaining = ceil(($date - time())/86400);
											if ($remaining > 2)
												echo "Nog ".$remaining." dagen tot de Dies-week!";
											else{
												if ($remaining == 1)
													echo "Nog ".$remaining." dag tot de Dies-week!";
												else
													echo "De Dies-week is begonnen!";
											
											}
												
										?>
									</strong>
								</a>
							</li>
							<li>
								<a href="#"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2F56e-Dies-Natalis-der-WISV-Christiaan-Huygens%2F486517501368308&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe></a>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="#" id = "fb" style="height: 9px;" data-toggle="dropdown"></a>
								<ul class="dropdown-menu" id = "feed"> 
									<li><a class = "fbhead" href="http://www.facebook.com/56eDies" style="text-align:center;">Facebook live-feed</a></li>
									<?php
										$page = file_get_contents('https://graph.facebook.com/486517501368308/feed?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA&limit=5');
										$data = json_decode($page);
										foreach ($data->data as $news ) {
											$StatusID = explode("_", $news->id);
											if (!empty($news->message)){
									?>
												<li class = "bericht">
													<a href="http://www.facebook.com/56eDies">
														<strong>
									<?php
															echo $news->from->name.": ";
															$x = new DateTime($news->updated_time);
															$x->setTimezone(new DateTimeZone('Europe/Amsterdam'));
															$time = $x->format(DATE_ATOM);
															$x = explode("T",$time);
															$x[1] = substr($x[1],0,-6);
															echo "<p class = 'date'>".$x[0]. " ".$x[1]."</p>";
									?>
														</strong>
														<br>
									<?php
														echo $news->message;
									?>				
													</a>
												</li>
									<?php
											}
										}
									?>
								</ul>
							</li>

							<li>
								<a href="#"onclick='change(); return false;'><i id = "play" class="icon-pause icon-white"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<audio id = "blue" loop ="true">
			<source src="blue.mp3">
			<source src="blue.ogg">
		</audio>
		<br><br>
		<header>
			<img id="logo" src="img/machtig.png">
		</header>
		<div id = "cont" class="middle">
			<div class = "header">
				<h3>Wedstrijd</h3>
			</div>	
			<div class = "text2">
				<p>
					<div class = "machtig">MaCHtig</div> mooi, zijn de prijzen die je net zoals vorig jaar weer kunt winnen in het doorlopende spel "The Game".
					Tijdens de mooiste week van het jaar zal er elke dag een puzzel of een raadsel worden vrijgegeven. 
					De eerste persoon die met de juiste oplossing komt zal beloond worden met een leuk presentje. Dit kan een kaartje zijn voor een van de <div class = "machtig">maCHtige</div> activiteiten, een leuke gadget of de eer om stuiterballen te mogen drinken met de dies commissie.<br><br>

					Op het moment dat de puzzel van de dag beschikbaar wordt zal er op de website de mogelijkheid zijn om je antwoord door te geven. 
					Per dag kan 1 antwoord per persoon ingevoerd worden en de winnaar zal automatisch bericht krijgen. 
					Verder zijn de kansen op een leuke prijs niet verkeken in het geval dat je net 3 seconden te laat was. 
					De eerste 10 personen die het juiste antwoord gevonden hebben krijgen namelijk een bepaald aantal punten toegewezen.
					Deze punten zullen de hele week bijgehouden worden en aan het eind zullen nog een aantal prijzen worden verdeeld onder de <div class = "machtig">maCHtigste</div> CHers.<br><br>

					Zoals je misschien al had kunnen raden zullen alle puzzels en raadsels met het thema <div class = "machtig">MaCHtig</div> te maken hebben. 
					Dat is de eerste tip die jullie helemaal gratis bijkrijgen. 
					Mocht het in de loop van de dag blijken dat de puzzel iets te <div class = "machtig">maCHtig</div> is dan zal er een hint vrijgegeven worden op de site.


				</p>
				<div id = "rank">
					<form>
						<fieldset>
							<legend>
								Rankings
							</legend>
						</fieldset>
						<?php
							include_once("db2.php");
							$ranking = array();
							$query = mysql_query("SELECT Id,Voornaam,Achternaam FROM user");
							while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){	
								$id = $row['Id'];
								$query2 = mysql_query("SELECT Date FROM Correct WHERE ID = '".$id."'");
								$total = 0;
								if (mysql_num_rows($query) > 0){ 
									while ($row2 = mysql_fetch_array($query2, MYSQL_ASSOC)){
										$date = $row2['Date'];
										$query3 = mysql_query("SELECT Id FROM Correct WHERE (DATE('".$date."')=Date(Date)) GROUP BY Id ORDER BY Date ASC");
										$count = 10;
										while ($row3 = mysql_fetch_array($query3, MYSQL_ASSOC)){
											if (($row3['Id'] == $id) && ($count > 0))
												$total = $total + $count;
											$count--;
										}
									}
								}
								$ranking[] = array($total,$row['Voornaam'],$row['Achternaam']);
							}
							function sortByOrder($a, $b) {
								if ($b[0] == $a[0])
									return strcmp($a[1], $b[1]);
								else
									return $b[0] - $a[0];
							}
							usort($ranking, 'sortByOrder');
						?>
						<table id = "tabel">
							<tbody>
							<?php
								$count = count($ranking);
								if ($count > 10)
									$count = 10;
								for($i = 0; $i < $count; $i++){
							?>
									<tr>
										<td width = "335px">
											<?php
												echo $ranking[$i][1]." ".$ranking[$i][2];
											?>
										</td>
										<td width = "10px;">
											<?php

												if (($i == 0) && ($ranking[$i][0] > 0))
													echo "<span class='badge badge-important rank'>".$ranking[$i][0]."</span>";
												else if ((($i == 1) || ($i == 2))&& ($ranking[$i][0] > 0))	
													echo "<span class='badge badge-warning rank'>".$ranking[$i][0]."</span>";
												else if ($ranking[$i][0] > 0)
													echo "<span class='badge badge-success rank'>".$ranking[$i][0]."</span>";
												else
													echo "<span class='badge badge-inverse rank'>".$ranking[$i][0]."</span>";
											?>
										</td>
									</tr>
							<?php
								}
							?>
							</tbody>
						</table>
					</form>
				</div>		
				<form action="game.php" method = "post" onsubmit ="return false;">
					<fieldset>
						<legend>
							Puzzel-oplossingen
						</legend>
					</fieldset>
			    
					<div class="alert alert-error hide" id="fout">
						<a class="close">&times;</a> 
						<h4 class="alert-heading">Oh-oh...</h4>
						Helaas. Jouw oplossing was fout.
					</div>

					<div class="alert alert-error hide" id="exists">
						<a class="close">&times;</a> 
						<h4 class="alert-heading">Oh-oh...</h4>
						Deze oplossing is reeds geprobeerd!<br>Probeer het opnieuw!
					</div>
					
					<div class="alert alert-error hide" id="u">
						<a class="close">&times;</a> 
						<h4 class="alert-heading">Oh-oh...</h4>
						Deze gebruikersnaam is niet geldig.
					</div>
					
					<div class="alert alert-error hide" id="a">
						<a class="close">&times;</a> 
						<h4 class="alert-heading">Oh-oh...</h4>
						Je bent vergeten een antwoord in te vullen.
					</div>
					
					<div class="alert alert-success hide" id="goed">
						<a class="close">&times;</a> 
						<h4 class="alert-heading">Gefeliciteerd!</h4>
						Jij bent echt wel MaCHtig bezig!<br>Je hebt de puzzel van vandaag opgelost!
					</div>

					<div class="alert alert-success hide" id="verzonden">
						<a class="close">&times;</a> 
						<h4 class="alert-heading">Gefeliciteerd!</h4>
						Je logingegevens zijn verzonden naar je emailadres.
					</div>					
					
					<div class="alert alert-error hide" id="fault">
						<a class="close">&times;</a> 
						<h4 class="alert-heading">Helaas!</h4>
						Dit emailadres werd niet gevonden, of heeft vandaag al zijn logingegevens opgevraagd.
					</div>
					
					<div class="alert alert-error hide" id="tried">
						<a class="close">&times;</a> 
						<h4 class="alert-heading">Oh-oh...</h4>
						Je hebt het vandaag al eens geprobeerd!<br>Probeer het morgen weer.
					</div>
					<?php
						$query = mysql_query("SELECT Dag FROM Answers WHERE (DATE(NOW()) = Date(Dag))");
						if (mysql_num_rows($query) > 0){
					?>
							<input id="user" class ="box" type="text" class="span12" placeholder="Gebruikersnaam"><br>
							<input type="text" class ="box" id = "words" placeholder="Jouw oplossing!" data-provide="typeahead"><br>
							<div class = "cent"><button class="btn" type = "submit" onclick = "send();" width = "150px">Versturen</button></div>
					<?php
						} else {
					?>
							<input id="user" disabled = "disabled" class ="box" type="text" class="span12" placeholder="Gebruikersnaam"><br>
							<input type="text" disabled = "disabled" class ="box" id = "words" placeholder="Jouw oplossing!" data-provide="typeahead"><br>
							<div class = "cent"><button class="btn" disabled = "disabled" type = "submit" onclick = "send();" width = "150px">Versturen</button></div>
					<?php
						}
					?>
					<br>
					<div class = "cent"><button class="btn" type = "submit" onclick = "mail();" width = "150px">Login vergeten?</button></div>
				</form>
			</div>
		</div>	
		<br>
	    <!-- Alle Javascript plugins -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		<script type ="text/javascript">
			$('a.dropdown-toggle, .dropdown-menu a').on('touchstart', function(e) {
				e.stopPropagation();
			});
		</script> 
	    <script src="script/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<!---<script src="script.js" type="text/javascript"></script>--->
		<script type="text/javascript">$('#logo').addClass('animated bounceInDown');</script>
		<script type="text/javascript">
			window.onload = function(){
				document.getElementById('blue').play();
				setInterval(animate,5000);
				setInterval(text,5000);
				jQuery('ul.nav li.dropdown').hover(function() {
				  jQuery(this).find('.dropdown-menu').stop(true, true).fadeIn();
				}, function() {
				  jQuery(this).find('.dropdown-menu').stop(true, true).fadeOut();
				});
				jQuery.ajax('server.php',{
					data: {
						'mode': 'today',
					},
					type: 'post',
					success: function(data){
						var words = new Array();
						words = data.split(".");
						$('#words').typeahead({source: words});  
					},
				}); 	
				$(".close").click(function(){
					$(this).parent().fadeOut();
				});			
			};
			var z = true;
			var x = true;
			var y = false;
			
			function send(){
				var id = document.getElementById("user").value;
				var answer =  document.getElementById("words").value;
				document.getElementById("words").value = "";
				jQuery.ajax('server.php',{
					data: {
						'mode': 'checkAnswer',
						'user_id': id,
						'answer': answer,
					},
					type: 'post',
					success: function(data){
						$('.alert').hide();
						if (data == "tried")
							$('#tried').fadeIn();
						if (data == "goed")
							$('#goed').fadeIn();
						if (data == "fout")
							$('#fout').fadeIn();
						if (data == "answer")
							$('#a').fadeIn();
						if (data == "user")
							$('#u').fadeIn();
						if (data == "exists")
							$('#exists').fadeIn();
					},
				});
				return false;
			}

			function mail(){
				var email = prompt("Voer je emailadres in:");
				jQuery.ajax('server.php',{
					data: {
						'mode': 'sendLogin',
						'email': email,
					},
					type: 'post',
					success: function(data){
						$('.alert').hide();
						if (data == "verzonden")
							$('#verzonden').fadeIn();
						if (data == "fault")
							$('#fault').fadeIn();
					},
				});
				return false;
			}
		
			function animate(){
				$("#logo").removeClass();
				if (x === true){
					var t = Math.random();
					if  ((t >= 0) && (t < 0.125))
						$('#logo').addClass('animated flash');
					
					if  ((t >= 0.125) && (t < 0.25))
						$('#logo').addClass('animated bounce');
					
					if  ((t >= 0.25) && (t < 0.375))
						$('#logo').addClass('animated shake');
					
					if  ((t >= 0.375) && (t < 0.50))
						$('#logo').addClass('animated tada');
					
					if  ((t >= 0.50) && (t < 0.625))
						$('#logo').addClass('animated swing');
					
					if  ((t >= 0.625) && (t < 0.75))
						$('#logo').addClass('animated wobble');
					
					if  ((t >= 0.75) && (t < 0.875))
						$('#logo').addClass('animated wiggle');
					
					if  ((t >= 0.875) && (t <= 1))
						$('#logo').addClass('animated pulse');
				}
			}
				
			function change(){
				if (x === true){
					document.getElementById('blue').pause();
					$('#play').removeClass('icon-pause');
					$('#play').addClass('icon-play');
					x = false;
				}
				else{
					document.getElementById('blue').play();
					$('#play').removeClass('icon-play');
					$('#play').addClass('icon-pause');
					x = true;					
				}
			}

			function url(name,u){
				if (z){
					z = false;
					$('#bar').load(u + " #bar", function() {
						$('#play').removeClass();
						if (x === true)
							$('#play').addClass('icon-pause icon-white');
						else
							$('#play').addClass('icon-play icon-white');
						jQuery('li.dropdown').hover(function() {
							jQuery(this).find('.dropdown-menu').stop(true, true).fadeIn();
						}, function() {
							jQuery(this).find('.dropdown-menu').stop(true, true).fadeOut();
						});
					});
					$('#cont').load(u + " #cont", function() {
						$('#cont').removeClass();
						jQuery.ajax('server.php',{
							data: {
								'mode': 'today',
							},
							type: 'post',
							success: function(data){
								var words = new Array();
								words = data.split(".");
								$('#words').typeahead({source: words});
							},
						});
						if (u == "programma.php" && name != "programma")
							window.location.hash = '#'+name;
						else
							scroll(0,0);
						z = true;
					});
					var stateObj = { index: name };
					history.pushState(stateObj, "", u);
				}
				return false;
			}

			function text(){
				if (x === true){
					if (y === true){
						$('.machtig').removeClass('dik');
						y = false;
					}				
					else{
						$('.machtig').addClass('dik');
						y = true;					
					}
				}
			}
		</script>
	</body>
</html>