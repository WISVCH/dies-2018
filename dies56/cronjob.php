<?php
	include_once("db2.php");
	//Pre-dies 518625824828876
	
	$page = file_get_contents('https://graph.facebook.com/518625824828876/attending?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp1 = 0;
	foreach ($data->data as $news )
		$temp1++;
		
	$page = file_get_contents('https://graph.facebook.com/518625824828876/maybe?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp2 = 0;
	foreach ($data->data as $news )
		$temp2++;
		
	$page = file_get_contents('https://graph.facebook.com/518625824828876/noreply?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp3 = 0;
	foreach ($data->data as $news )
		$temp3++;		
	echo $temp1 . " ". $temp2 . " ". $temp3 ."<br>";
	mysql_query("UPDATE fbevents SET Attending=".$temp1.", Maybe=".$temp2.", Noreply=".$temp3." WHERE id = 1");
	
	//Receptie 443827662339672
	$page = file_get_contents('https://graph.facebook.com/443827662339672/attending?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp1 = 0;
	foreach ($data->data as $news )
		$temp1++;
		
	$page = file_get_contents('https://graph.facebook.com/443827662339672/maybe?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp2 = 0;
	foreach ($data->data as $news )
		$temp2++;
		
	$page = file_get_contents('https://graph.facebook.com/443827662339672/noreply?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp3 = 0;
	foreach ($data->data as $news )
		$temp3++;		
	echo $temp1 . " ". $temp2 . " ". $temp3 ."<br>";
	mysql_query("UPDATE fbevents SET Attending=".$temp1.", Maybe=".$temp2.", Noreply=".$temp3." WHERE id = 2");
		
	//Ledenlunch 151229918358266
	$page = file_get_contents('https://graph.facebook.com/151229918358266/attending?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp1 = 0;
	foreach ($data->data as $news )
		$temp1++;
		
	$page = file_get_contents('https://graph.facebook.com/151229918358266/maybe?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp2 = 0;
	foreach ($data->data as $news )
		$temp2++;
		
	$page = file_get_contents('https://graph.facebook.com/151229918358266/noreply?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp3 = 0;
	foreach ($data->data as $news )
		$temp3++;		
	echo $temp1 . " ". $temp2 . " ". $temp3 ."<br>";
	mysql_query("UPDATE fbevents SET Attending=".$temp1.", Maybe=".$temp2.", Noreply=".$temp3." WHERE id = 3");	
	
	//Men-ladiesspecial 198216013636303
	$page = file_get_contents('https://graph.facebook.com/198216013636303/attending?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp1 = 0;
	foreach ($data->data as $news )
		$temp1++;
		
	$page = file_get_contents('https://graph.facebook.com/198216013636303/maybe?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp2 = 0;
	foreach ($data->data as $news )
		$temp2++;
		
	$page = file_get_contents('https://graph.facebook.com/198216013636303/noreply?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp3 = 0;
	foreach ($data->data as $news )
		$temp3++;	
	echo $temp1 . " ". $temp2 . " ". $temp3 ."<br>";
	mysql_query("UPDATE fbevents SET Attending=".$temp1.", Maybe=".$temp2.", Noreply=".$temp3." WHERE id = 4");	
	
	//Cocktailavond 475663519164461
	$page = file_get_contents('https://graph.facebook.com/475663519164461/attending?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp1 = 0;
	foreach ($data->data as $news )
		$temp1++;
		
	$page = file_get_contents('https://graph.facebook.com/475663519164461/maybe?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp2 = 0;
	foreach ($data->data as $news )
		$temp2++;
		
	$page = file_get_contents('https://graph.facebook.com/475663519164461/noreply?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp3 = 0;
	foreach ($data->data as $news )
		$temp3++;		
	echo $temp1 . " ". $temp2 . " ". $temp3 ."<br>";
	mysql_query("UPDATE fbevents SET Attending=".$temp1.", Maybe=".$temp2.", Noreply=".$temp3." WHERE id = 5");	

	//Uitbrakontbijt 538097252867175
	$page = file_get_contents('https://graph.facebook.com/538097252867175/attending?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp1 = 0;
	foreach ($data->data as $news )
		$temp1++;
		
	$page = file_get_contents('https://graph.facebook.com/538097252867175/maybe?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp2 = 0;
	foreach ($data->data as $news )
		$temp2++;
		
	$page = file_get_contents('https://graph.facebook.com/538097252867175/noreply?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp3 = 0;
	foreach ($data->data as $news )
		$temp3++;		
	echo $temp1 . " ". $temp2 . " ". $temp3 ."<br>";
	mysql_query("UPDATE fbevents SET Attending=".$temp1.", Maybe=".$temp2.", Noreply=".$temp3." WHERE id = 11");	

	//Lunchlezing 579450292072200
	$page = file_get_contents('https://graph.facebook.com/579450292072200/attending?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp1 = 0;
	foreach ($data->data as $news )
		$temp1++;
		
	$page = file_get_contents('https://graph.facebook.com/579450292072200/maybe?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp2 = 0;
	foreach ($data->data as $news )
		$temp2++;
		
	$page = file_get_contents('https://graph.facebook.com/579450292072200/noreply?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp3 = 0;
	foreach ($data->data as $news )
		$temp3++;	
	echo $temp1 . " ". $temp2 . " ". $temp3 ."<br>";
	mysql_query("UPDATE fbevents SET Attending=".$temp1.", Maybe=".$temp2.", Noreply=".$temp3." WHERE id = 6");	

	//Kroegentocht 554225107938312
	$page = file_get_contents('https://graph.facebook.com/554225107938312/attending?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp1 = 0;
	foreach ($data->data as $news )
		$temp1++;
		
	$page = file_get_contents('https://graph.facebook.com/554225107938312/maybe?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp2 = 0;
	foreach ($data->data as $news )
		$temp2++;
		
	$page = file_get_contents('https://graph.facebook.com/554225107938312/noreply?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp3 = 0;
	foreach ($data->data as $news )
		$temp3++;		
	echo $temp1 . " ". $temp2 . " ". $temp3 ."<br>";
	mysql_query("UPDATE fbevents SET Attending=".$temp1.", Maybe=".$temp2.", Noreply=".$temp3." WHERE id = 7");

	//Workshop 570251942989159
	$page = file_get_contents('https://graph.facebook.com/570251942989159/attending?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp1 = 0;
	foreach ($data->data as $news )
		$temp1++;
		
	$page = file_get_contents('https://graph.facebook.com/570251942989159/maybe?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp2 = 0;
	foreach ($data->data as $news )
		$temp2++;
		
	$page = file_get_contents('https://graph.facebook.com/570251942989159/noreply?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp3 = 0;
	foreach ($data->data as $news )
		$temp3++;		
	echo $temp1 . " ". $temp2 . " ". $temp3 ."<br>";
	mysql_query("UPDATE fbevents SET Attending=".$temp1.", Maybe=".$temp2.", Noreply=".$temp3." WHERE id = 8");
	
	//Excursie 183803375099394
	$page = file_get_contents('https://graph.facebook.com/183803375099394/attending?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp1 = 0;
	foreach ($data->data as $news )
		$temp1++;
		
	$page = file_get_contents('https://graph.facebook.com/183803375099394/maybe?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp2 = 0;
	foreach ($data->data as $news )
		$temp2++;
		
	$page = file_get_contents('https://graph.facebook.com/183803375099394/noreply?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp3 = 0;
	foreach ($data->data as $news )
		$temp3++;		
	echo $temp1 . " ". $temp2 . " ". $temp3 ."<br>";
	mysql_query("UPDATE fbevents SET Attending=".$temp1.", Maybe=".$temp2.", Noreply=".$temp3." WHERE id = 9");
	
	//Eindfeest 573199066027117
	$page = file_get_contents('https://graph.facebook.com/573199066027117/attending?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp1 = 0;
	foreach ($data->data as $news )
		$temp1++;
		
	$page = file_get_contents('https://graph.facebook.com/573199066027117/maybe?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp2 = 0;
	foreach ($data->data as $news )
		$temp2++;
		
	$page = file_get_contents('https://graph.facebook.com/573199066027117/noreply?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp3 = 0;
	foreach ($data->data as $news )
		$temp3++;	
	echo $temp1 . " ". $temp2 . " ". $temp3 ."<br>";
	mysql_query("UPDATE fbevents SET Attending=".$temp1.", Maybe=".$temp2.", Noreply=".$temp3." WHERE id = 10");

	//WIDM 436076689810907
	$page = file_get_contents('https://graph.facebook.com/436076689810907/attending?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp1 = 0;
	foreach ($data->data as $news )
		$temp1++;
		
	$page = file_get_contents('https://graph.facebook.com/436076689810907/maybe?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp2 = 0;
	foreach ($data->data as $news )
		$temp2++;
		
	$page = file_get_contents('https://graph.facebook.com/436076689810907/noreply?access_token=520187094675923|OcGraoxcC7OH7gurPtx9Rqb8KnA');
	$data = json_decode($page);
	$temp3 = 0;
	foreach ($data->data as $news )
		$temp3++;	
	echo $temp1 . " ". $temp2 . " ". $temp3 ."<br>";
	mysql_query("UPDATE fbevents SET Attending=".$temp1.", Maybe=".$temp2.", Noreply=".$temp3." WHERE id = 12");
	
?>




