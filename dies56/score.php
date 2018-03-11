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
									<li><a href="programma.php#Eindfeest" onclick = "return url('Eindfeest', 'programma.php');">Eindfeest</a></li>
								</ul>  
							</li>
							<li><a href="fotos.php" onclick = "return url('fotos', 'fotos.php');">Fotos</a></li>
							<li><a href="wedstrijd.php" onclick = "return url('wedstrijd', 'wedstrijd.php');">Wedstrijd</a></li>
							<li class="actief"><a href="score.php" onclick = "return url('score', 'score.php');">Score</a></li>
							<li><a href="commissie.php" onclick = "return url('commissie', 'commissie.php');">Commissie</a></li>
						</ul>
						<ul class = "nav pull-right" style="height:41px;">
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
		<div id = "cont" class="container">
			<div class="row">
				<div class="span12">
					<div class = "header">
						<h3>The Game Scorebord</h3>
					</div>
				</div>
			</div>
			<br>
			<?php
				$count = count($ranking);
				$rows = ceil($count/10);
				//rijen
				for($a = 0; $a < $rows; $a++){
					if($a == 0){
			?>		
						<div class="row">
			<?
					}
					else if($a % 3 == 0){
			?>		
						</div>
						<br>
						<div class="row">
			<?
					}
			?>
			<div class="span4">
				<table id="score">
					<tbody>
					<tr>
			<?		
					for($p = 0; $p < 10; $p++){
			?>
						<td width="200px">
							<?php
								if ((($a * 10) + $p) < $count){
									echo $ranking[($a * 10) + $p][1]." ".$ranking[($a * 10) + $p][2];
								}
								else{
									break;
								}
							?>
						</td>
						<td>
							<?php
								if ((($a * 10) + $p == 0) && ($ranking[($a * 10) + $p][0] > 0))
									echo "<span class='badge badge-important rank'>".$ranking[($a * 10) + $p][0]."</span>";
								else if (((($a * 10) + $p == 1) || (($a * 10) + $p == 2))&& ($ranking[($a * 10) + $p][0] > 0))	
									echo "<span class='badge badge-warning rank'>".$ranking[($a * 10) + $p][0]."</span>";
								else if ($ranking[($a * 10) + $p][0] > 0)
									echo "<span class='badge badge-success rank'>".$ranking[($a * 10) + $p][0]."</span>";
								else
									echo "<span class='badge badge-inverse rank'>".$ranking[($a * 10) + $p][0]."</span>";
							?>
						</td>
					</tr>
					</div>
				<?php
					}
				?>
					</tbody>
				</table>
			</div>
		<?
			}
		?>
		</div>
		</div>
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
				jQuery('li.dropdown').hover(function() {
				  jQuery(this).find('.dropdown-menu').stop(true, true).fadeIn();
				}, function() {
				  jQuery(this).find('.dropdown-menu').stop(true, true).fadeOut();
				});
			};
			var z = true;
			var x = true;
			var y = false;
			var playing = true;
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
		</script>
	</body>
</html>