<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>53ste Dies Natalis der W.I.S.V. 'Christiaan Huygens'</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/favicon.ico" rel="icon" type="image/x-icon" />

</head>

<body>

	<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript">
    try {
    var pageTracker = _gat._getTracker("UA-6303915-3");
    pageTracker._trackPageview();
    } catch(err) {}</script>
    <div id="main"><div id="main2">
            <div id="corner1">&nbsp;</div>
            <div id="corner2">&nbsp;</div>
            <div id="header">
                <h1><a href="./index.php">Ille<span>CH</span>aal</a></h1>
<div id="menu">
                    <ul>
                        <li><a href="index.php">Hoofdpagina</a></li>
                      <li><a href="index.php?page=programma">Programma</a></li>
                      <li><a href="./index.php?page=comissie">Commissie</a></li>
                      <li><a href="./index.php?page=contact">Contact</a></li>
        </ul>
              </div>
            </div>    
<div id="middle">
                <div id="sidebar">
             
                    <h2>Aftellen...</h2>
                    <div class="box">
                    <?php
                   		function dateDiff($dformat, $endDate, $beginDate){
                        	$date_parts1=explode($dformat, $beginDate);
                            $date_parts2=explode($dformat, $endDate);
                            $start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);
                            $end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);
                            if($end_date - $start_date > 0){
								return $end_date - $start_date;
							}else{
								return 0;
							}
                         }
                     
						
						echo "<p>Nog <span>".dateDiff("/", "3/1/2010" , date("m/d/Y", time())) . "</span> dagen tot de Dies-week!!</p>";
					 
					 
					 
					 ?>
                     
                    
                    
                    
                  </div>
                    <h2>Foto's...</h2>
              <ul>
                        <li>Er zijn nog geen Dies activiteiten geweest...<em></em> </li>
                  </ul>
                  	<h2 class="hblue">Sponsors</h2>
                    <div class="box">
                    <center>
                      <a href="http://www.stud.nl/"><img src="images/stud.gif" width="84" height="125" /></a> 
					</center>
                    <br /><hr noshade="noshade" color="#000000" />
                   </div>
              </div>                
                <div id="right">
                    <?php 
						if($_GET['page'] == ""){
							include("home.php");
						}else{
							include($_GET['page'] . ".php");
						}	
						?>
                    
            <div id="footer">
                <p>Copyright &copy; 53<sup>ste</sup> Dies Comissie der WISV 'Christiaan Huygens'<a href="http://www.alphastudio.pl" target="_blank"></a></p>
            </div>
    </div></div>

</body>
</html>