<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<title>Bloodemi's Soundboard</title>
		
		<link rel="icon" href="/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		
		<script type="text/javascript">
			function playAudio(songNo) {
				var player=document.getElementById('player');
				var source=document.getElementById('sourceMp3');
				source.src='/sounds/' + songNo;

				if (player.paused) {
					player.load();
					player.play();
				} else {
					player.pause();
					player.currentTime = 0
				}
			}
		</script>

	</head>

	<body>
		<div class="site">
			<img src="images/logo.png">

<?php
	// Twitch API Credentials
	$client_id = '1cq3tqmw523zn03v0egw7se8att5vm';
	$redirect_uri = 'https%3A%2F%2Fsounds.bloodemi.net%2F';
?>

			<!-- Twitch Login Button -->
			<div id="twitch-connect">
	        	<a href="https://id.twitch.tv/oauth2/authorize?client_id=<?php echo $client_id; ?>&redirect_uri=<?php echo $redirect_uri; ?>&response_type=token&scope=user:read:email+chat:read+chat:edit"><img src="https://ttv-api.s3.amazonaws.com/assets/connect_dark.png" /></a>

	        	<script type="text/javascript">
	        		<!-- 
	        			const clientId = <?php echo "'" . $client_id . "'"; ?>;
	        			const channel  = 'Bloodemi';
	        		// -->
	        	</script>
	        </div>
	        <!-- Twitch Login Button (End) -->

			<div class="home">
				<a href="http://bloodemi.net/"> <p>Zurück zur Startseite</p> </a>
			</div>
		</div>
		<div class="site">
				<?php
						$audioFolder = 'sounds/';
						$files = scandir($audioFolder);
						$var_audio = "";
						sort($files);
						$i = 1;
						foreach ($files as $file)
							{
								if ($file != '.' && $file != '..')
									{
										list($command, $ext) = explode(".", $file);
										echo "<div class=\"soundItem\">
												<table cellspacing=\"0\" cellpadding=\"0\" width=\"0\">
													<tr data-command=\"!" . $command . "\">
														<td>
															<p class=\"button-play\" onclick=\"playAudio('". $command .".". $ext ."')\">
																<i class=\"fas fa-play\"></i>
															</p>
														</td>
														<td width=\"90%\">
															<p class=\"command\">!". $command ."</p>
														</td>
														<td>
															<p class=\"button-chat\">
																<i class=\"fas fa-comment-dots\"></i>
															</p>
														</td>
													</tr>
												</table>
											  </div>";
										$i++;
									}
							}



						echo "<div class=\"clear\"></div>";
							
					 echo "<audio id=\"player\">
							<source id=\"sourceMp3\" src=\"\" type=\"audio/mp3\">
						</audio>"; ?>
			<div class="home">
				<a href="http://bloodemi.net/"> <p>Zurück zur Startseite</p> </a>
			</div>				
		</div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="//unpkg.com/twitch-js@2.0.0-beta.33/dist/twitch.js"></script>
        <script src="js/soundboard-chat-integration.js"></script>
		
		<script type="text/javascript">
// Allianz der Geiervoegel
console.log(`                  
                           .;@@      ;;,'                          
                    @@@@@@@@@         +@@@@@@@@+                   
                   +@@@@@@@#            @@@@@@@@                   
             @+    ,@@@@@@@             ;@@@@@@@     @:            
            @@@     @@@@@@@             '@@@@@@@    ;@@'           
          '@@@@@    +@@@@@@              @@@@@@    ;@@@@@          
          @@@@@@@    @@@@@@             ;@@@@@    @@@@@@@;         
           @@@@@@@@   @@@@@,            @@@@@    @@@@@@@;          
             @@@@@@@@   @@@@           @@@@#   @@@@@@@#            
         @     @@@@@@@@ @@@@@         @@@@@ '@@@@@@@.    @         
         @@@      :@@@@@@@@.            @@@@@@@@@      @@@@        
         @@@@@        ;@@@+              @@@@        @@@@@,        
          @@@@@@@@+    @@@        @  @@; +@@+   '@@@@@@@@@         
           @@@@@@@@@@@@@@@        '@@@@  ,@@@@@@@@@@@@@@:          
              @@@@@@@@@@@@      @@@@@@@@ #@@@@@@@@@@@#             
                      .#@@@  @@@'   ;;  .@@@,                      
                  @'    @@@@ @@@        @@@     ;;                 
                     '@@@@@@@ @@@@    ;@@@@@@@                     
                          ;@@@@@@@@@@@@@@                          
                             :@@@@@@@@                             
                              @@@@@@@                              
                              @@@@@@@'                             
                             @@      @                             
                         @@#@         @'@@                         
                          + @@        @                            

Dies ist ein Projekt von HORNHAUT.tv und der Allianz der Geiervögel. Wir sind eine Initiative zur Förderung kleiner Streamer. Wenn dich derartige Projekte interessieren, dann solltest du unbedingt mal bei uns reinschauen!

https://www.reddit.com/r/AllianzDerGeiervoegel
https://twitter.com/geierallianz
`);
		</script>
	</body>
</html>