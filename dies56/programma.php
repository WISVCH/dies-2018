<!DOCTYPE html>
<?php
	include_once("db2.php");
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
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="animate.min.css" rel="stylesheet" type="text/css">
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
							<li class="dropdown active">
								<a class="actief" href="#" data-toggle="dropdown" onclick = "return url('programma', 'programma.php');">Programma</a>
								<ul class="dropdown-menu" id="leftmenu">  
									<li><a href="programma.php#Pre-dies">Pre-dies</a></li>  
									<li><a href="programma.php#Receptie">Receptie</a></li>  
									<li><a href="programma.php#Ledenlunch">Ledenlunch</a></li>  
									<li><a href="programma.php#Men-Ladiesspecial">Men- & Ladiesspecial</a></li>  
									<li><a href="programma.php#Cocktailavond">Cocktailavond</a></li>  
									<li><a href="programma.php#Uitbrakontbijt">Uitbrakontbijt</a></li>  
									<li><a href="programma.php#Lunchlezing">Lunchlezing</a></li>  
									<li><a href="programma.php#Kroegentocht">Kroegentocht</a></li>  
									<li><a href="programma.php#Workshop">Workshop</a></li>  
									<li><a href="programma.php#WIDM">WieIsDeMol?-Finaleavond</a></li>  
									<li><a href="programma.php#Excursie">Excursie</a></li>  
									<li><a href="programma.php#Eindfeest">Eindfeest</a></li>  
								</ul>  
							</li>

							<li><a href="fotos.php" onclick = "return url('fotos', 'fotos.php');">Fotos</a></li>
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
		<div id = "cont" class="container">
			<div class="$row">				
				<div class="span12">
					<section id = "Pre-dies" style= "padding-top:40px;">
						<div class = "header">
							<h1>Pre-Dies</h1>
						</div>
						<div class = "text">
							<div class="gegevens">
								<a href="http://www.facebook.com/events/518625824828876"><img id ="poster" src = "posters/pre-dies.jpg"/></a>
								<?php 
									$result = mysql_query("SELECT * FROM fbevents WHERE id = 1");
									$row = mysql_fetch_array($result, MYSQL_ASSOC);
								?>
								<table class = "info">
									<tbody>
										<tr>
											<td><p>Datum:</p></td>
											<td><p>27 Februari</p></td>
										</tr>
										<tr>
											<td><p>Tijd:</p></td>
											<td><p>17:00</p></td>
										</tr>
										<tr>
											<td><p>Locatie:</p></td>
											<td><p>/Pub</p></td>
										</tr>
										<tr>
											<td><p>Kosten:</p></td>
											<td><p>€0,-</p></td>
										</tr>
																				
										<tr>
											<td>&nbsp</td><td>&nbsp</td>
										</tr>
										
										<tr>
											<td><p>Attending:</p></td>
											<td><p><?php echo $row['Attending'];?></p></td>
										</tr>		
										<tr>
											<td><p>Maybe:</p></td>
											<td><p><?php echo $row['Maybe'];?></p></td>
										</tr>
										<tr>
											<td><p>No-reply:</p></td>
											<td><p><?php echo $row['Noreply'];?></p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<p>
								Woensdag 27 februari zal de kickoff plaatsvinden van de <div class = "machtig">MaCHtigste</div> week van het jaar.<br>
								Tijdens deze avond zal er in de /pub een quiz plaatsvinden, waar alle weetjes omtrent komende activiteiten ten oren komen. Daarnaast kom je erachter wie er nou werkelijk een ballenbak hebben gesorteerd en maak je bovendien kans op leuke prijzen, waaronder misschien wel een gezamelijk drankje met de Dies commissie met hun hevig op en neer deinende, fluoriserend blauwe en tongstrelend lekkere commissiedrank.<br><br>
								Verder zal op deze avond ook de aftrap plaatsvinden van het doorlopend spel.
								Deze kickoff wil je niet missen!<br><br><br><br><br>
							</p>
						</div>
					</section>
					
					<section id = "Receptie" style= "padding-top:40px;">
						<div class = "header">
							<h1>Receptie</h1>
						</div>
						<div class = "text">
							<div class="gegevens">
								<a href="http://www.facebook.com/events/443827662339672"><img id ="poster" src = "posters/diesreceptie.jpg"/></a>
								<?php 
									$result = mysql_query("SELECT * FROM fbevents WHERE id = 2");
									$row = mysql_fetch_array($result, MYSQL_ASSOC);
								?>
								<table class = "info">
									<tbody>
										<tr>
											<td><p>Datum:</p></td>
											<td><p>4 Maart</p></td>
										</tr>
										<tr>
											<td><p>Tijd:</p></td>
											<td><p>14:00</p></td>
										</tr>
										<tr>
											<td><p>Locatie:</p></td>
											<td><p>EWI</p></td>
										</tr>
										<tr>
											<td><p>Kosten:</p></td>
											<td><p>€17,50 Diner</p></td>
										</tr>
																				
										<tr>
											<td>&nbsp</td><td>&nbsp</td>
										</tr>
										
										<tr>
											<td><p>Attending:</p></td>
											<td><p><?php echo $row['Attending'];?></p></td>
										</tr>		
										<tr>
											<td><p>Maybe:</p></td>
											<td><p><?php echo $row['Maybe'];?></p></td>
										</tr>
										<tr>
											<td><p>No-reply:</p></td>
											<td><p><?php echo $row['Noreply'];?></p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<p>
								Vier de verjaardag van onze vereniging samen met het de rest van de leden en feliciteer het bestuur.<br>
								Na de receptie zullen we met z’n allen gaan eten in restaurant LEF. De kosten van het diner zijn 17,50.
							</p>
				 		</div>
					</section>	
					
					<section id = "Ledenlunch" style= "padding-top:40px;">
						<div class = "header">
							<h1>Ledenlunch</h1>
						</div>
						<div class = "text">
							<div class="gegevens">
								<a href="http://www.facebook.com/events/151229918358266"><img id ="poster" src = "posters/ledenlunch.jpg"/></a>
								<?php 
									$result = mysql_query("SELECT * FROM fbevents WHERE id = 3");
									$row = mysql_fetch_array($result, MYSQL_ASSOC);
								?>
								<table class = "info">
									<tbody>
										<tr>
											<td><p>Datum:</p></td>
											<td><p>5 Maart</p></td>
										</tr>
										<tr>
											<td><p>Tijd:</p></td>
											<td><p>12:30</p></td>
										</tr>
										<tr>
											<td><p>Locatie:</p></td>
											<td><p>/Pub</p></td>
										</tr>
										<tr>
											<td><p>Kosten:</p></td>
											<td><p>€1,-</p></td>
										</tr>
																				
										<tr>
											<td>&nbsp</td><td>&nbsp</td>
										</tr>
										
										<tr>
											<td><p>Attending:</p></td>
											<td><p><?php echo $row['Attending'];?></p></td>
										</tr>		
										<tr>
											<td><p>Maybe:</p></td>
											<td><p><?php echo $row['Maybe'];?></p></td>
										</tr>
										<tr>
											<td><p>No-reply:</p></td>
											<td><p><?php echo $row['Noreply'];?></p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<p>
								Altijd al willen bunkeren tot je op het punt staat om te ontploffen? Of grote angst dat scoren er tijdens de cocktailavond niet in zit? Dan is dit dé kans om toch met wat lekkers op zak naar huis te gaan.<br>
								Deze speciale editie van de ledenlunch, die geheel in het teken van het thema <div class = "machtig">maCHtig</div> staat, is dé natte droom van elke zoetekauw!<br>Samengevat: taart, koekjes en andere <div class = "machtig">maCHtige</div> lekkernijen zullen in overvloed aanwezig zijn. Schaf alvast een broek in een maatje groter aan, tover je slabbetje tevoorschijn en wees erbij!<br><br><br><br><br><br><br> 
							</p>
						</div>
					</section>
					
					<section id = "Men-Ladiesspecial" style= "padding-top:40px;">
						<div class = "header">
							<h1>Men- & Ladiesspecial</h1>
						</div>
						<div class = "text">
							<div class="gegevens">
								<a href="http://www.facebook.com/events/198216013636303"><img id ="poster" src = "posters/special.jpg"/></a>
								<?php 
									$result = mysql_query("SELECT * FROM fbevents WHERE id = 4");
									$row = mysql_fetch_array($result, MYSQL_ASSOC);
								?>
								<table class = "info">
									<tbody>
										<tr>
											<td><p>Datum:</p></td>
											<td><p>5 Maart</p></td>
										</tr>
										<tr>
											<td><p>Tijd:</p></td>
											<td><p>17:00</p></td>
										</tr>
										<tr>
											<td><p>Locatie:</p></td>
											<td><p>/Pub</p></td>
										</tr>
										<tr>
											<td><p>Kosten:</p></td>
											<td><p>€5,-</p></td>
										</tr>
																				
										<tr>
											<td>&nbsp</td><td>&nbsp</td>
										</tr>
										
										<tr>
											<td><p>Attending:</p></td>
											<td><p><?php echo $row['Attending'];?></p></td>
										</tr>		
										<tr>
											<td><p>Maybe:</p></td>
											<td><p><?php echo $row['Maybe'];?></p></td>
										</tr>
										<tr>
											<td><p>No-reply:</p></td>
											<td><p><?php echo $row['Noreply'];?></p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<p>
								Hou jij ook niet van gekibbel, maar wel van bunkeren?<br>
								Kom dan op dinsdag voor de cocktail avond naar de men-special.<br>
								Tijdens deze middag, waar het testosteron je om de oren vliegt, kun je zonder getetter van de Delftse vrouw rustig een biertje drinken en volop genieten van een echte mannenmaaltijd.<br>
								Kom dus allemaal dinsdagmiddag naar de /pub en laat aan je concurrenten zien wie nou echt de <div class = "machtig">MaCHtigste</div> is en het meest kan eten.<br><br>

								Ben jij al die Delftse jongens stiekem ook een beetje zat?<br>
								Dan heb je geluk! Dinsdagmiddag voor de cocktailavond hebben wij een heuse ladiesspecial in de /pub. Op deze middag kun je alle sappige details over de jongens doorspreken onder het genot van een uitgebreide hightea.<br>
								Kun je toch niet zonder jongens? Geen probleem, de jongens hebben we verstopt achter een muurtje.<br>
								Dus wil jij ook een middagje ongestoord babbelen over onderwerpen die WEL interessant zijn, kom dan naar de ladiesspecial.
							</p>
						</div>
					</section>
					
					<section id = "Cocktailavond" style= "padding-top:40px;">
						<div class = "header">
							<h1>Cocktailavond</h1>
						</div>
						<div class = "text">
							<div class="gegevens">
								<a href="http://www.facebook.com/events/475663519164461"><img id ="poster" src = "posters/cocktailavond.jpg"/></a>
								<?php 
									$result = mysql_query("SELECT * FROM fbevents WHERE id = 5");
									$row = mysql_fetch_array($result, MYSQL_ASSOC);
								?>
								<table class = "info">
									<tbody>
										<tr>
											<td><p>Datum:</p></td>
											<td><p>5 Maart</p></td>
										</tr>
										<tr>
											<td><p>Tijd:</p></td>
											<td><p>20:00</p></td>
										</tr>
										<tr>
											<td><p>Locatie:</p></td>
											<td><p>/Pub</p></td>
										</tr>
										<tr>
											<td><p>Kosten:</p></td>
											<td><p>€2,- per Cocktail</p></td>
										</tr>
																				
										<tr>
											<td>&nbsp</td><td>&nbsp</td>
										</tr>
										
										<tr>
											<td><p>Attending:</p></td>
											<td><p><?php echo $row['Attending'];?></p></td>
										</tr>		
										<tr>
											<td><p>Maybe:</p></td>
											<td><p><?php echo $row['Maybe'];?></p></td>
										</tr>
										<tr>
											<td><p>No-reply:</p></td>
											<td><p><?php echo $row['Noreply'];?></p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<p>
								Zoals elk jaar staat natuurlijk ook dit jaar weer de <div class = "machtig">MaCHtige</div> cocktailavond op het programma!<br>
								Nadat iedereen bommetje vol zit van de man/ladies special is het tijd om te gaan genieten van de lekkerste cocktails van onze cocktailbar. Er zullen verschillende cocktails op een leuke manier voor ons geshaket worden, waaronder natuurlijk ook een super <div class = "machtig">MaCHtig</div> blauwe cocktail!<br><br>
								Kom dus vooral <div class = "machtig">MaCHtig</div> veel drankjes drinken voor moeilijk weinig pieken!<br><br><br><br><br><br><br>

							</p>
						</div>
					</section>
					
					<section id = "Uitbrakontbijt" style= "padding-top:40px;">
						<div class = "header">
							<h1>Uitbrakontbijt</h1>
						</div>
						<div class = "text">
							<div class="gegevens">
								<a href="http://www.facebook.com/events/538097252867175"><img id ="poster" src = "posters/uitbrakontbijt.jpg"/></a>
								<?php 
									$result = mysql_query("SELECT * FROM fbevents WHERE id = 11");
									$row = mysql_fetch_array($result, MYSQL_ASSOC);
								?>
								<table class = "info">
									<tbody>
										<tr>
											<td><p>Datum:</p></td>
											<td><p>6 Maart</p></td>
										</tr>
										<tr>
											<td><p>Tijd:</p></td>
											<td><p>8:00</p></td>
										</tr>
										<tr>
											<td><p>Locatie:</p></td>
											<td><p>EWI</p></td>
										</tr>
										<tr>
											<td><p>Kosten:</p></td>
											<td><p>€0,- *</p></td>
										</tr>
																				
										<tr>
											<td>&nbsp</td><td>&nbsp</td>
										</tr>
										
										<tr>
											<td><p>Attending:</p></td>
											<td><p><?php echo $row['Attending'];?></p></td>
										</tr>		
										<tr>
											<td><p>Maybe:</p></td>
											<td><p><?php echo $row['Maybe'];?></p></td>
										</tr>
										<tr>
											<td><p>No-reply:</p></td>
											<td><p><?php echo $row['Noreply'];?></p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<p>
								Omdat we weten dat je op de cocktailavond te veel cocktails gaat drinken, hebben we zo’n vermoeden dat je woensdag brakkies in de collegebanken beland.<br>
								Zonde, want deze <div class = "machtig">MaCHtige</div> week is pas net begonnen! Gelukkig staan wij vanaf 9 uur voor je klaar om je te voorzien van een <div class = "machtig">MaCHtige</div> boterham met eieren en spek. En zo’n <div class = "machtig">MaCHtig</div> bordje met eten gaat er altijd wel in toch? Op vertoon van een kaartje voor de volgende dagen ontvang je dit zelfs gratis!<br><br>
								
								Heb je nog geen kaartje voor de komende dagen en wil je toch wat doen aan je kater? Niet getreurd, ook hier is het mogelijk kaartjes in te slaan voor alle <div class = "machtig">MaCHtige</div> activiteiten die nog gaan komen!<br><br><br><br><br>
							</p>
						</div>
					</section>
					
					<section id = "Lunchlezing" style= "padding-top:40px;">
						<div class = "header">
							<h1>Lunchlezing</h1>
						</div>
						<div class = "text">
							<div class="gegevens">
								<a href="http://www.facebook.com/events/579450292072200"><img id ="poster" src = "posters/lunchlezing.jpg"/></a>
								<?php 
									$result = mysql_query("SELECT * FROM fbevents WHERE id = 6");
									$row = mysql_fetch_array($result, MYSQL_ASSOC);
								?>
								<table class = "info">
									<tbody>
										<tr>
											<td><p>Datum:</p></td>
											<td><p>6 Maart</p></td>
										</tr>
										<tr>
											<td><p>Tijd:</p></td>
											<td><p>12:30</p></td>
										</tr>
										<tr>
											<td><p>Locatie:</p></td>
											<td><p>Collegezaal B</p></td>
										</tr>
										<tr>
											<td><p>Kosten:</p></td>
											<td><p>€1,-</p></td>
										</tr>
																				
										<tr>
											<td>&nbsp</td><td>&nbsp</td>
										</tr>
										
										<tr>
											<td><p>Attending:</p></td>
											<td><p><?php echo $row['Attending'];?></p></td>
										</tr>		
										<tr>
											<td><p>Maybe:</p></td>
											<td><p><?php echo $row['Maybe'];?></p></td>
										</tr>
										<tr>
											<td><p>No-reply:</p></td>
											<td><p><?php echo $row['Noreply'];?></p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<p>
								Wil jij je mama ook eens een plezier doen en haar een dag niet je brood laten smeren?<br>
								Of ben je al volwassen genoeg, maar ben je er stiekem te brak voor door de cocktailavond?<br>
								Kom dan naar de lunchlezing op woensdag en kom alle ins en outs te weten over non verbale communicatie tijdens de lezing lichaamstaal.<br>
								Wist je namelijk dat uit de houding van iemand is af te leiden of hij of zij verveeld, geamuseerd , geinteresseerd of misschien wel bijzonder <div class = "machtig">MaCHtig</div> is? Of dat bepaalde bewegingen indiceren dat een persoon liegt?<br>
								Daarnaast is lichaamstaal bepalend bij een eerste indruk die je geeft bij het ontmoeten van nieuwe personen.
								Kortom een leuke en leerzame activiteit, waarbij zelfs je moeder blij wordt.<br><br><br><br>
							</p>
						</div>
					</section>

					<section id = "Kroegentocht" style= "padding-top:40px;">
						<div class = "header">
							<h1>Kroegentocht</h1>
						</div>
						<div class = "text">
							<div class="gegevens">
								<a href="http://www.facebook.com/events/554225107938312"><img id ="poster" src = "posters/kroegentocht.jpg"/></a>
								<?php 
									$result = mysql_query("SELECT * FROM fbevents WHERE id = 7");
									$row = mysql_fetch_array($result, MYSQL_ASSOC);
								?>
								<table class = "info">
									<tbody>
										<tr>
											<td><p>Datum:</p></td>
											<td><p>6 Maart</p></td>
										</tr>
										<tr>
											<td><p>Tijd:</p></td>
											<td><p>18:00</p></td>
										</tr>
										<tr>
											<td><p>Locatie:</p></td>
											<td><p>/Pub</p></td>
										</tr>
										<tr>
											<td><p>Kosten:</p></td>
											<td><p>€3,-</p></td>
										</tr>
																				
										<tr>
											<td>&nbsp</td><td>&nbsp</td>
										</tr>
										
										<tr>
											<td><p>Attending:</p></td>
											<td><p><?php echo $row['Attending'];?></p></td>
										</tr>		
										<tr>
											<td><p>Maybe:</p></td>
											<td><p><?php echo $row['Maybe'];?></p></td>
										</tr>
										<tr>
											<td><p>No-reply:</p></td>
											<td><p><?php echo $row['Noreply'];?></p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<p>
								Voor de woensdag staat de tocht der tochten op het programma.<br>
								Vanaf de /pub zullen wij ons verplaatsen naar het centrum waar diverse cafeetjes en kroegen aangetikt zullen worden. Gezamelijk zullen wij langs de kroegen rollen zodat iedereen na afloop naar huis kan kruipen.<br>
								Drink zo veel mogenlijk verschillende biertjes en wie weet ben jij de enige echte <div class ="machtig">MaCHtige</div> Prins Pilsch!<br>
								Kom dus de Dies vergezellen op hun zoektocht naar de meest adembenemende, smaakpapillen exploderende, huig knuffelende, maag masserende gele rakker van Delft!<br><br><br><br><br><br>
							</p>
						</div>
					</section>
					
					<section id = "Workshop" style= "padding-top:40px;">
						<div class = "header">
							<h1>Workshop</h1>
						</div>
						<div class = "text">
							<div class="gegevens">
								<a href="http://www.facebook.com/events/570251942989159"><img id ="poster" src = "posters/workshop.jpg"/></a>
								<?php 
									$result = mysql_query("SELECT * FROM fbevents WHERE id = 8");
									$row = mysql_fetch_array($result, MYSQL_ASSOC);
								?>
								<table class = "info">
									<tbody>
										<tr>
											<td><p>Datum:</p></td>
											<td><p>7 Maart</p></td>
										</tr>
										<tr>
											<td><p>Tijd:</p></td>
											<td><p>14:00</p></td>
										</tr>
										<tr>
											<td><p>Locatie:</p></td>
											<td><p>Vassiliadis Zaal</p></td>
										</tr>
										<tr>
											<td><p>Kosten:</p></td>
											<td><p>€1,-</p></td>
										</tr>
																				
										<tr>
											<td>&nbsp</td><td>&nbsp</td>
										</tr>
										
										<tr>
											<td><p>Attending:</p></td>
											<td><p><?php echo $row['Attending'];?></p></td>
										</tr>		
										<tr>
											<td><p>Maybe:</p></td>
											<td><p><?php echo $row['Maybe'];?></p></td>
										</tr>
										<tr>
											<td><p>No-reply:</p></td>
											<td><p><?php echo $row['Noreply'];?></p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<p>
								<div class ="machtig">MaCHtige</div> mensen kom je op alle gebieden tegen, zoals je ongetwijfeld gemerkt heb bij het doorlopende spel. Maar hoe komen die mensen zo <div class ="machtig">MaCHtig</div> en hoe komen ze aan die <div class ="machtig">MaCHtige</div> uitstraling?<br>
								Natuurlijk is dit verschillend per persoon, maar 1 ding hebben ze gemeen: ze kunnen allemaal <div class ="machtig">MaCHtig</div> goed overtuigen.<br><br>
								Wil jij ook zo’n <div class ="machtig">MaCHtige</div> baas worden? Kom dan naar de debat-workshop!<br>
								Hierbij worden niet alleen de structuren van het debat behandeld, maar ligt vooral de nadruk op overtuigingstechnieken, het weerleggen van tegenargumenten, het laten overkomen van je verhaal en het leren omgaan met dooddoeners. En dat alles voor een luttele prijs van één euro!<br><br><br><br><br>

							</p>
						</div>
					</section>

					<section id = "WIDM" style= "padding-top:40px;">
						<div class = "header">
							<h1>WieIsDeMol?-Finaleavond</h1>
						</div>
						<div class = "text">
							<div class="gegevens">
								<a href="http://www.facebook.com/events/436076689810907"><img id ="poster" src = "posters/widm.jpg"/></a>
								<?php 
									$result = mysql_query("SELECT * FROM fbevents WHERE id = 12");
									$row = mysql_fetch_array($result, MYSQL_ASSOC);
								?>
								<table class = "info">
									<tbody>
										<tr>
											<td><p>Datum:</p></td>
											<td><p>7 Maart</p></td>
										</tr>
										<tr>
											<td><p>Tijd:</p></td>
											<td><p>20:30</p></td>
										</tr>
										<tr>
											<td><p>Locatie:</p></td>
											<td><p>CH-hok</p></td>
										</tr>
										<tr>
											<td><p>Kosten:</p></td>
											<td><p>€0,-</p></td>
										</tr>
																				
										<tr>
											<td>&nbsp</td><td>&nbsp</td>
										</tr>
										
										<tr>
											<td><p>Attending:</p></td>
											<td><p><?php echo $row['Attending'];?></p></td>
										</tr>		
										<tr>
											<td><p>Maybe:</p></td>
											<td><p><?php echo $row['Maybe'];?></p></td>
										</tr>
										<tr>
											<td><p>No-reply:</p></td>
											<td><p><?php echo $row['Noreply'];?></p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<p>
								Donderdag 7 Maart is het dan eindelijk zo ver: de saboteur, de bedrieger, de Mol maakt zich bekent. Maandenlang heeft dit MaCHtige figuur heel Nederland voor de gek gehouden. Ben jij zeker van je zaak en weet je zeker dat je op de goede persoon zit? Bewijs dan je gelijk tijdens de enige echte Wie-Is-De-Mol?-Finaleavond, welke geheel gepland in de Diesweek valt! <br><br>
								Nodig dus al je vriendjes en vriendinnetjes uit voor deze avond en zorg ervoor dat je half 9 op CH bent!
							</p>
						</div>
					</section>					
					
					<section id = "Excursie" style= "padding-top:40px;">
						<div class = "header">
							<h1>Excursie</h1>
						</div>
						<div class = "text">
							<div class="gegevens">
								<a href="http://www.facebook.com/events/183803375099394"><img id ="poster" src = "posters/excursie.jpg"/></a>
								<?php 
									$result = mysql_query("SELECT * FROM fbevents WHERE id = 9");
									$row = mysql_fetch_array($result, MYSQL_ASSOC);
								?>
								<table class = "info">
									<tbody>
										<tr>
											<td><p>Datum:</p></td>
											<td><p>8 Maart</p></td>
										</tr>
										<tr>
											<td><p>Tijd:</p></td>
											<td><p>9:00</p></td>
										</tr>
										<tr>
											<td><p>Locatie:</p></td>
											<td><p>Brussel</p></td>
										</tr>
										<tr>
											<td><p>Kosten:</p></td>
											<td><p>€20,-</p></td>
										</tr>
																				
										<tr>
											<td>&nbsp</td><td>&nbsp</td>
										</tr>
										
										<tr>
											<td><p>Attending:</p></td>
											<td><p><?php echo $row['Attending'];?></p></td>
										</tr>		
										<tr>
											<td><p>Maybe:</p></td>
											<td><p><?php echo $row['Maybe'];?></p></td>
										</tr>
										<tr>
											<td><p>No-reply:</p></td>
											<td><p><?php echo $row['Noreply'];?></p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<p>
								Vrijdag, na een rustige donderdag, vertrekken wij vroeg in de ochtend met 3 busjes en een auto naar het <div class = "machtig">MaCHtige</div> Brussel!<br>
								Hier zullen we allereerst een bezoek brengen aan het Europees parlement, want dit is toch zeker een plek met veel MaCHt. Na ons bezoek gaan we naar het hostel, vanuit daar zullen we vertrekken naar het centrum van Brussel. Hier zal een <div class = "machtig">MaCHtige</div> speurtocht plaatsvinden die jullie leidt langs alle mooie plekjes in Brussel! S'avonds hebben wij een restaurantje geregeld waar we gezellig met z’n allen zullen eten.<br>
								Maar de avond moet nog beginnen, want we gaan namelijk flink stappen die avond! We gaan naar een grote mooie club in Brussel waar we tot in de late uurtjes door kunnen feesten, want we slapen gezellig met z’n allen in een hostel!<br>
								Op zaterdag zullen we rond 10.00 uitchecken en op ons gemak terugkeren naar Delft. Onderweg rijden we nog langs het Atomium, wat natuurlijk niet te missen is bij een dagje Brussel.<br><br>
							</p>
						</div>
					</section>
					
					<section id = "Eindfeest" style= "padding-top:40px;">
						<div class = "header">
							<h1>Eindfeest</h1>
						</div>
						<div class = "text">
							<div class="gegevens">
								<a href="http://www.facebook.com/events/573199066027117"><img id ="poster" src = "posters/eindfeest.jpg"/></a>
								<?php 
									$result = mysql_query("SELECT * FROM fbevents WHERE id = 10");
									$row = mysql_fetch_array($result, MYSQL_ASSOC);
								?>
								<table class = "info">
									<tbody>
										<tr>
											<td><p>Datum:</p></td>
											<td><p>21 Maart</p></td>
										</tr>
										<tr>
											<td><p>Tijd:</p></td>
											<td><p>21:00</p></td>
										</tr>
										<tr>
											<td><p>Locatie:</p></td>
											<td><p>Koornbeurs</p></td>
										</tr>
										<tr>
											<td><p>Kosten:</p></td>
											<td><p>€3,-</p></td>
										</tr>
																				
										<tr>
											<td>&nbsp</td><td>&nbsp</td>
										</tr>
										
										<tr>
											<td><p>Attending:</p></td>
											<td><p><?php echo $row['Attending'];?></p></td>
										</tr>		
										<tr>
											<td><p>Maybe:</p></td>
											<td><p><?php echo $row['Maybe'];?></p></td>
										</tr>
										<tr>
											<td><p>No-reply:</p></td>
											<td><p><?php echo $row['Noreply'];?></p></td>
										</tr>
									</tbody>
								</table>
							</div>
							<p>
								Ben jij de baas van de dansvloer? Ben jij de koning van de soepele heupen?<br>
								Mis deze <div class = "machtig">maCHtige</div> fuif dan niet!<br>
								Tijdens dit eindfeest, dat plaats zal vinden op 21 maart, zullen we de zogehete ‘DIES-vibe’ gezamelijk herleven.<br>
								We zullen met je vlammen en feesten. We zullen met je zuipen en kruipen. We zullen het witte licht zien knipperen en zwarte gaten be<div class = "machtig">maCHtig</div>en.<br>
								Kortom zet deze datum groot in je agenda, en mis hem niet!<br><br>
								Kom dus allemaal naar Project BeatriX, want jij willem toch ook Maximaal!?<br><br><br><br><br><br>
							</p>
						</div>
					</section>
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
	    <script src="script/plugins/bootstrap/js/bootstrap.js" type="text/javascript"></script>
		<script type="text/javascript">$('#logo').addClass('animated bounceInDown');</script>
		<script type="text/javascript">
			window.onload = function(){
				document.getElementById('blue').play();
				setInterval(animate,5000);
				setInterval(text,5000);
			};
			jQuery('ul.nav li.dropdown').hover(function() {
				jQuery(this).find('.dropdown-menu').stop(true, true).show();
				jQuery(this).addClass('open');
			}, function() {
				jQuery(this).find('.dropdown-menu').stop(true, true).hide();
				jQuery(this).removeClass('open');
			});
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