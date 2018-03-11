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
							<li class="actief"><a href="fotos.php" onclick = "return url('fotos', 'fotos.php');">Fotos</a></li>
							<li><a href="wedstrijd.php" onclick = "return url('wedstrijd', 'wedstrijd.php');">Wedstrijd</a></li>
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
		<div id = "cont" class ="middle">
			<div class = "header">
				<h3>Foto's</h3>
			</div>	
			<div class = "text2">
				<p>
					Tijdens de <div class ="machtig">maCHtige</div> DIES-week gaan wij een hoop <div class ="machtig">maCHtige</div> activiteiten organiseren! Wij begrijpen dat het met bijvoorbeeld een <div class ="machtig">maCHtige</div> cocktailavond of een kroegentocht lastig is om alles te herinneren van de activiteiten. Daarom zullen wij hier een korte sfeerimpressie geven,om alle <div class ="machtig">maCHtige</div> momenten te herleven! 
					<br><br>
					Natuurlijk hebben we de Flitcie die op onze activiteiten weer klaar staat om een paar <div class ="machtig">maCHtige</div> plaatjes te schieten. Voor alle foto's kun je terecht op de Flitcie site. 
				</p>
			</div>
			<div class = "text2">
				<div id="fotos" class="carousel slide">
					<div class="carousel-inner">
						<?php
							$dir = dirname(__FILE__)."/fotos/";
							$dh = opendir($dir);
							$first = true;
							while (($file = readdir($dh)) != false) {
								if (($file != ".") && ($file != "..")){
									if ($first == true){
										$first = false;
						?>
										<div class="active item"><?php echo '<img src="fotos/'.$file.'" id="b">'; ?></div>
						<?php
									}
									else {
						?>	
										<div class="item"><?php echo '<img src="fotos/'.$file.'" id="b">'; ?></div>
						<?php
									}
								}
							}
							closedir($dh);
						?>
					</div>
					<a class="carousel-control left" href="#fotos" data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#fotos" data-slide="next">&rsaquo;</a>
				</div>

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
			};
			var z = true;
			var x = true;
			var y = false;
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
		</script>
	</body>
</html>