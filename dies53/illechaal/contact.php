<div id="introprog">
                        <h2>Contact</h2>
                        <p> Als je contact wilt opnemen met ons, vul dan onderstaand formulier in, dan zullen we zo snel mogelijk contact opnemen.</p>
                  </div>

                    <div class="box">
                     <?php
					 	if($_POST['submit']){
							$bericht = "Beste Dies, <br /><br />" . $_POST['opmerking'].  "<br /><br />Jullie kunnen mij bereiken op telefoon nummer: " . $_POST['telefoon'] . " <br />Mijn e-mail adres is: " . $_POST['email'] . "<br /><br />Met vriendelijk groet,<br /> <br /> <br /> " . $_POST['naam'] . ".<br /><br />";
							
							echo "Het volgende bericht is naar de Dies Commissie verzonden: <br /><br />";
							
							echo $bericht;
							
							$to      = 'xanvier@gmail.com';
							$subject = 'Iemand heeft het contact formulier ingevuld.';
							$message = $bodytag = str_replace("<br />", "\r\n", $bericht) . "Verzonden vanaf ip:" . $_POST['submit'];
							$headers =  'From: dies@ch.tudelft.nl' . "\r\n" .
    									"Reply-To: " . $_POST['email'] . "\r\n" .
    									'X-Mailer: PHP/' . phpversion();

							mail($to, $subject, $message, $headers);
						} else {
					 ?>
                     
                      <h2>Contact formulier</h2>
                      <form name="form1" method="post" action="">
                        <table width="100%" border="0">
                          <tr>
                            <td>Uw naam:</td>
                            <td><input type="text" name="naam" id="naam"></td>
                          </tr>
                          <tr>
                            <td>Uw Telefoon nummer</td>
                            <td><input type="text" name="telefoon" id="telefoon"></td>
                          </tr>
                          <tr>
                            <td>Uw e-mail adres</td>
                            <td><input type="text" name="email" id="email"></td>
                          </tr>
                          <tr>
                            <td>Vraag of opmerking</td>
                            <td><textarea name="opmerking" cols="20" rows="4"></textarea></td>
                          </tr>
                          <tr>
                            <td><input name="ip" type="hidden" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>"></td>
                            <td><input name="submit" type="submit" value="Verzend"></td>
                          </tr>
                        </table>
                                            </form>
                        <?php } ?>
                      <p>&nbsp;</p>
                    </div>                    
                    </div>
                <div class="clearing">&nbsp;</div>       
      </div>