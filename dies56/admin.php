<?php
	include_once("db2.php");
	include_once("analytics.php");
	include("excelwriter.inc.php");
	function cleanInput($value){
		if (get_magic_quotes_gpc()){ 
			$value = stripslashes($value);
		} 
		$value = mysql_real_escape_string(strip_tags($value, ENT_QUOTES));
		return $value;
	}
?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset="utf-8">
		<title>56e Dies Natalis der W.I.S.V. 'Christiaan Huygens'</title>
		<meta name="description" content="56e Dies Natalis der 'W.I.S.V. Christiaan Huygens'">
		<meta name="keywords" content="Dies,Natalis,CH,Christiaan,Huygens,56">
		<meta name="author" content="Patrick van Hesteren">
		<link href="script/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="style2.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id = "admin">		
			<form action="admin.php" method = "post" onsubmit ="return false;">
				<fieldset>
					<legend>
						Nieuwe gebruikers
					</legend>
				</fieldset>
					
				<div class="alert alert-error hide" id="code">
					<a class="close">&times;</a> 
					<h4 class="alert-heading">Oh-oh...</h4>
					Ingevoerde code is incorrect.
				</div>

				<div class="alert alert-error hide" id="id">
					<a class="close">&times;</a> 
					<h4 class="alert-heading">Oh-oh...</h4>
					Deze id bestaat al!
				</div>
				
				<div class="alert alert-success hide" id="added">
					<a class="close">&times;</a> 
					<h4 class="alert-heading">Gefeliciteerd!</h4>
					Gebruiker toegevoegd!
				</div>

				<input id="pass" type="password" placeholder="Admin Password"><br>
				<input id="voornaam" type="text" placeholder="Voornaam"><br>
				<input id="achternaam" type="text" placeholder="Achternaam"><br>
				<input id="email" type="text" placeholder="Email"><br>
				<button class="btn" type = "submit" onclick = "send();">Versturen</button>
			</form>
			
			<form action="admin.php" method = "post" onsubmit ="return false;">
				<fieldset>
					<legend>
						Nieuw antwoord
					</legend>
				</fieldset>
					
				<div class="alert alert-error hide" id="code2">
					<a class="close">&times;</a> 
					<h4 class="alert-heading">Oh-oh...</h4>
					Ingevoerde code is incorrect.
				</div>

				<div class="alert alert-error hide" id="exists">
					<a class="close">&times;</a> 
					<h4 class="alert-heading">Oh-oh...</h4>
					Dit antwoord bestaat al!
				</div>
				
				<div class="alert alert-success hide" id="added2">
					<a class="close">&times;</a> 
					<h4 class="alert-heading">Gefeliciteerd!</h4>
					Antwoord toegevoegd!
				</div>

				<input id="pass2" type="password" placeholder="Admin Password"><br>
				<input id="antwoord" type="text" placeholder="Antwoord"><br>
				<input id="datum" type="datetime" placeholder="Datum (jaar-maand-dag)"><br>
				<button class="btn" type = "submit" onclick = "send2();">Versturen</button>
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		<script src="script/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			window.onload = function(){
				$(".close").click(function(){
					$(this).parent().fadeOut();
				});		
			};
			
			function send(){
				var pass = document.getElementById("pass").value;
				var voornaam = document.getElementById("voornaam").value;
				var achternaam = document.getElementById("achternaam").value;
				var email = document.getElementById("email").value;
				jQuery.ajax('server.php',{
					data: {
						'mode': 'newuser',
						'code': pass,
						'voornaam': voornaam,
						'achternaam': achternaam,
						'email': email,
					},
					type: 'post',
					success: function(data){
						$('.alert').hide();
						if (data == "code"){
							$('#code').fadeIn();
							document.getElementById("pass").value = "";
						}
						if (data == "added"){
							$('#added').fadeIn();
							document.getElementById("voornaam").value = "";
							document.getElementById("achternaam").value = "";
							document.getElementById("email").value = "";
						}
						if (data == "id")
							$('#id').fadeIn();
					},
				});
			}
			function send2(){
				var pass = document.getElementById("pass2").value;
				var antwoord = document.getElementById("antwoord").value;
				var datum = document.getElementById("datum").value;
				jQuery.ajax('server.php',{
					data: {
						'mode': 'newanswer',
						'code': pass,
						'antwoord': antwoord,
						'datum': datum,
					},
					type: 'post',
					success: function(data){
						$('.alert').hide();
						if (data == "code"){
							$('#code2').fadeIn();
							document.getElementById("pass2").value = "";
						}
						if (data == "added"){
							$('#added2').fadeIn();
							document.getElementById("antwoord").value = "";
						}
						if (data == "exists")
							$('#exists').fadeIn();
					},
				});
			}

		</script>
		<?php
			$fileName = "users.xls";
			$excel = new ExcelWriter($fileName);
			
			if($excel==false)	
			{
				echo $excel->error;
				die;
			}
			$myArr=array(
						"Voornaam",
						"Achternaam",
						"Id",
						"Geprobeert",
						"Email"
						);
			
			$excel->writeLine($myArr);
			$check = mysql_query("SELECT Voornaam, Achternaam, Id, Geprobeert, Email FROM user");
			while ($row = mysql_fetch_array($check, MYSQL_ASSOC)){
				$excel->writeRow();
				$excel->writeCol($row['Voornaam']);
				$excel->writeCol($row['Achternaam']);
				$excel->writeCol($row['Id']);
				$excel->writeCol($row['Geprobeert']);
				$excel->writeCol($row['Email']);
			}
			$excel->close();
		?>
	</body>
</html>
