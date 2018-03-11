<?php
	include_once("db2.php");
	function cleanInput($value){
		if (get_magic_quotes_gpc()){ 
			$value = stripslashes($value);
		} 
		$value = mysql_real_escape_string(strip_tags($value, ENT_QUOTES));
		return $value;
	}
	
	if (isset($_REQUEST['mode']) && cleanInput($_REQUEST['mode'])=='today'){
		$check = mysql_query("SELECT Answer FROM Tried WHERE (Date(NOW()) = Date(Datum))");
		while ($row = mysql_fetch_array($check, MYSQL_ASSOC)){
			echo htmlspecialchars($row['Answer']).".";
		}
	}
	
	if (isset($_REQUEST['mode']) && cleanInput($_REQUEST['mode'])=='sendLogin'){
		$email = cleanInput($_REQUEST['email']);
		if ($email == ''){
			echo "fault";
			die();
		}
		$check = mysql_query("SELECT COUNT(*) as aantal FROM user WHERE Email = '".$email."'");
		$row = mysql_fetch_array($check, MYSQL_ASSOC);
		if ($row['aantal'] == 0){
			echo "fault";
			die();
		}
		$check = mysql_query("SELECT COUNT(*) as aantal FROM user WHERE (Date(NOW()) = Date(opgevraagd)) AND Email = '".$email."'");
		$row = mysql_fetch_array($check, MYSQL_ASSOC);
		if ($row['aantal'] == 0){ 	
			$check2 = mysql_query("SELECT Id, Voornaam FROM user WHERE Email = '".$email."'");
			$row2 = mysql_fetch_array($check2, MYSQL_ASSOC);
			$id = $row2['Id'];
			$naam = $row2['Voornaam'];
			mysql_query("UPDATE user SET opgevraagd = (NOW()) WHERE Id = '".$id."'");
			$h = "From: patrickh@ch.tudelft.nl\r\n";
			$h .= "MIME-Version: 1.0\r\n";
			$h .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$h .= "Reply-To: patrickh@ch.tudelft.nl\r\n";
			$h .= "Return-Path: patrickh@ch.tudelft.nl\r\n";
			$S = "Logingegevens The Game";
			$t = $email;
			$m = "<html><body>Lieve The-Game (HA, you lost!) kandidaat, beste ".$naam.",<br><br>";
			$m .= "Zonde dat je je logingegevens van The Game kwijtgeraakt bent! Gelukkig voor jou zijn we meer dan bereid je uit de brand te helpen.<br>";
			$m .= "Voortaan kun je weer meespelen met the game op <a href='http://www.56edies.nl'>http://www.56edies.nl</a> met de volgende gebruikersnaam: <strong>".$id."</strong>!<br><br>";
			$m .= "Voor vragen of bij problemen kun je je richten tot de Dies.<br>";
			$m .= "We wensen je MaCHtig veel plezier en succes toe bij het spelen van The Game!<br><br>";
			$m .= "MaCHtige groetjes van de Dies!<br><br>";
			$m .= "P.S. Vergeet niet onze facebook te liken om up-to-date te blijven van alle The Game hints: <a href='http://facebook.com/56eDies'>http://facebook.com/56eDies</a></html></body>";
			mail($t,$S,$m, $h);					
			echo "verzonden";
			die();
		}
		else{
			echo "fault";
			die();
		}
	}
	
	if (isset($_REQUEST['mode']) && cleanInput($_REQUEST['mode'])=='newuser'){
		$code = sha1(cleanInput($_REQUEST['code']));
		$voor = cleanInput($_REQUEST['voornaam']);
		$achter = cleanInput($_REQUEST['achternaam']);
		$email = cleanInput($_REQUEST['email']);
		$id = substr(sha1($voor.$achter),0,10);
		$check = mysql_query("SELECT COUNT(*) as aantal FROM Login WHERE code = '".$code."'");	
		$row = mysql_fetch_array($check, MYSQL_ASSOC);
		if ($row['aantal'] == 0){
			echo "code";
			die();
		}
		$check = mysql_query("SELECT COUNT(*) as aantal FROM user WHERE Id = '".$id."'");	
		$row = mysql_fetch_array($check, MYSQL_ASSOC);
		if ($row['aantal'] > 0){
			echo "id";
			die();
		}
		$result = mysql_query("INSERT INTO user (Voornaam,Achternaam,Id,Email) VALUES('".$voor."', '".$achter."', '".$id."', '".$email."')");
		$h = "From: patrickh@ch.tudelft.nl\r\n";
		$h .= "MIME-Version: 1.0\r\n";
		$h .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$h .= "Reply-To: patrickh@ch.tudelft.nl\r\n";
		$h .= "Return-Path: patrickh@ch.tudelft.nl\r\n";
		$S = "Registratie The Game";
		$t = $email;
		$m = "<html><body>Lieve The-Game (HA, you lost!) kandidaat, beste ".$voor.",<br><br>";
		$m .= "Leuk dat je je op hebt gegeven voor The Game, het spel tijdens de Dies-week, waarin je alles komt te weten over MaCHtige personen en kans maakt op leuke prijzen!<br>";
		$m .= "Het is mogelijk om in te loggen met de volgende login: <strong>".$id."</strong> op <a href='http://www.56edies.nl'>http://www.56edies.nl</a>.<br>";
		$m .= "Mocht je problemen ondervinden bij het insturen van je antwoorden, stuur dan een mailtje naar <a href='mailto:patrickh@ch.tudelft.nl'>patrickh@ch.tudelft.nl</a>, of loop even langs op CH en vraag naar Patrick.<br><br>";
		$m .= "Iedere dag zijn we op zoek naar een MaCHtig persoon. We verspreiden gedurende dag hints tijdens de activiteiten, op de CH tv en op facebook.<br>";
		$m .= "Mocht je het antwoord weten, dan kun je deze via je persoonlijke login insturen via <a href='http://www.56edies.nl'>http://www.56edies.nl</a> onder het kopje Wedstrijd.<br>";
		$m .= "The Game start vanaf de Pre-Dies. Tot die tijd is het dan ook niet mogelijk antwoorden in te sturen!<br><br>";
		$m .= "Om het eerlijk te houden, is het per login slechts 1x mogelijk een oplossing per dag in te sturen. Denk dus goed na voor je een gokje waagt!<br>";
		$m .= "Bij het intypen van jouw oplossing, zul je (wanneer je niet de eerste bent die het probeert) de antwoorden zien die op je antwoord lijken.<br>";
		$m .= "Wanneer je antwoord er al tussen staat, betekend dat dat het antwoord al geprobeerd is en dus fout was. Het goede antwoord staat er namelijk nooit tussen!<br><br>";
		$m .= "Ben je de eerste die het goede antwoord instuurt, dan ben je de dagwinnaar en zul je een leuke prijs ontvangen. Als dit het geval is, ontvang je automatisch een mailtje. Zorg er dus voor dat deze emails niet in je ongewenste email belanden!<br>";
		$m .= "Als je de eerste bent die het goede antwoord instuurt, ontvang je 10 punten voor je ranking. Als 2e 9 en zo bouwt dit af naar 0. Je score wordt gedurende de week bijgehouden en de weekwinnaar zal bekend gemaakt worden op het Dies-eindfeest.<br>";
		$m .= "Ook als je niet de dagwinnaar bent, kan het dus lonen alsnog een antwoord in te sturen! Het is dus in je eigen voordeel het antwoord voor je te houden, om zo je concurrentie voor te blijven.<br><br>";
		$m .= "Voor vragen of bij problemen kun je je richten tot de Dies.<br>";
		$m .= "We wensen je MaCHtig veel plezier en succes toe bij het spelen van The Game!<br><br>";
		$m .= "MaCHtige groetjes van de Dies!<br><br>";
		$m .= "P.S. Vergeet niet onze facebook te liken om up-to-date te blijven van alle The Game hints: <a href='http://facebook.com/56eDies'>http://facebook.com/56eDies</a></html></body>";
		mail($t,$S,$m, $h);		
		echo "added";
		
	}
	
	if (isset($_REQUEST['mode']) && cleanInput($_REQUEST['mode'])=='newanswer'){
		$code = sha1(cleanInput($_REQUEST['code']));
		$datum = cleanInput($_REQUEST['datum']);
		$antwoord = sha1(strtolower(cleanInput($_REQUEST['antwoord'])));
		$check = mysql_query("SELECT COUNT(*) as aantal FROM Login WHERE code = '".$code."'");	
		$row = mysql_fetch_array($check, MYSQL_ASSOC);
		if ($row['aantal'] == 0){
			echo "code";
			die();
		}
		$check = mysql_query("SELECT COUNT(*) as aantal FROM Answers WHERE Answer = '".$antwoord."' AND DATE(Dag) = DATE('".$datum."')");	
		$row = mysql_fetch_array($check, MYSQL_ASSOC);
		if ($row['aantal'] > 0){
			echo "exists";
			die();
		}
		$result = mysql_query("INSERT INTO Answers (Answer,Dag) VALUES('".$antwoord."', '".$datum."')");
		echo "added";
	}

	
	if (isset($_REQUEST['mode']) && cleanInput($_REQUEST['mode'])=='checkAnswer'){
		$user_id = cleanInput($_REQUEST['user_id']);
		if ($user_id == ""){
			echo "user";
			die();
		}
		
		$check = mysql_query("SELECT Dag FROM Answers WHERE (DATE(NOW()) = DATE(Dag))");	
		if (mysql_num_rows($check) == 0){
			die();
		}
		$check = mysql_query("SELECT COUNT(*) as aantal FROM user WHERE Id = '".$user_id."'");	
		$row = mysql_fetch_array($check, MYSQL_ASSOC);
		if ($row['aantal'] == 0){
			echo "user";
			die();
		}
		$answer = strtolower(cleanInput($_REQUEST['answer']));
		if ($answer == ""){
			echo "answer";
			die();
		}
		$query = mysql_query("SELECT COUNT(*) as aantal FROM Tried WHERE (Date(NOW()) =  Date(Datum)) AND Answer = '".$answer."'");
		$row = mysql_fetch_array($query, MYSQL_ASSOC);
		if ($row['aantal'] > 0){
			echo "exists";
			die();
		}
		$hanswer = sha1($answer);
		$check = mysql_query("SELECT COUNT(*) as aantal FROM user WHERE (Date(NOW()) = Date(Geprobeert)) AND Id = '".$user_id."'");	
		$row = mysql_fetch_array($check, MYSQL_ASSOC);
		$message = "";
		if ($row['aantal'] == 0){ 
			$query = mysql_query("SELECT COUNT(*) as aantal FROM Answers WHERE (Date(NOW()) = Date(Dag)) AND Answer = '".$hanswer."'");	
			$row = mysql_fetch_array($query, MYSQL_ASSOC);
			if ($row['aantal'] == 1)
				$correct = true;
			else
				$correct = false;
			if (!$correct){
				$result = mysql_query("INSERT INTO Tried (Answer,Id,Datum) VALUES('".$answer."', '".$user_id."', NOW())");
				$message ="fout";
			}
			else{
				$result = mysql_query("INSERT INTO Correct (Id,Date) VALUES('".$user_id."', NOW())");
				$message = "goed";
			}
		}
		else{
			$message = "tried";
		}
		$query = "UPDATE user SET Geprobeert = (NOW()) WHERE Id = '".$user_id."'";
		if(!mysql_query($query)) {
			die(mysql_error());
		}
		$first = false;
		if ($correct){
			$query = mysql_query("SELECT COUNT(*) as aantal FROM Correct WHERE (Date(NOW()) = Date(Date))");
			$row = mysql_fetch_array($query, MYSQL_ASSOC);
			if ($row['aantal'] == 1)
				$first = true;
		}
		
		if ($first){
			$result = mysql_query("SELECT Voornaam, Achternaam, Email FROM user WHERE id = '".$user_id."'");
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$headers = "From: patrickh@ch.tudelft.nl\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .= "Reply-To: patrickh@ch.tudelft.nl\r\n";
			$headers .= "Return-Path: patrickh@ch.tudelft.nl\r\n";
			$Subject = "Gefeliciteerd!";
			$to = $row['Email'];
			$mes = "<html><body>Beste, ".$row['Voornaam'] ." ". $row['Achternaam']. ",<br><br>";
			$mes .= "Je ontvangt deze e-mail omdat je het antwoord op de puzzel van vandaag als eerste goed beantwoord hebt.<br>";
			$mes .= "Gefeliciteerd met deze ontzettend MaCHtige prestatie! <br>";
			$mes .= "Niet alleen levert je dit 10 punten op voor je ranking, maar ook heb je een kaartje gewonnen voor het MaCHtige dies-eindfeest!<br>";
			$mes .= "Je kunt je kaartje ophalen bij de dies of het bestuur. <br>";
			$mes .= "<br><br>";
			$mes .= "MaCHtige groeten,<br>";
			$mes .= "Dies commissie 2012-2013";
			mail($to,$Subject,$mes, $headers);

			$headers = "From: patrickh@ch.tudelft.nl\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .= "Reply-To: patrickh@ch.tudelft.nl\r\n";
			$headers .= "Return-Path: patrickh@ch.tudelft.nl\r\n";
			$Subject = "Nieuwe winnaar!";
			$to = "dies@ch.tudelft.nl";
			$mes = "<html><body>MaCHtige commissiegenootjes,<br><br>";
			$mes .= $row['Voornaam'] ." ". $row['Achternaam']. " heeft vandaag als eerste de puzzel goed beantwoord!<br><br>";
			$mes .= "MaCHtige #baasCHe groetjes van DJ Patty E";
			mail($to,$Subject,$mes, $headers);

		}
		echo $message;
	}
?>