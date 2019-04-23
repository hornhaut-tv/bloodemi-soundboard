<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<title>Bloodemi's Soundboard</title>
		
		<!-- Style Sheets -->		<link rel="icon" href="/favicon.ico" type="image/x-icon" /><link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		<!-- Style Sheets -->		<link rel="stylesheet" type="text/css" href="style/style.css" />


		<!-- jQuery HTML Tooltip -->
		<script type='text/javascript'>
			  $(function () {
				  $(document).tooltip({
					  track: true,
					  content: function () {
						  return $(this).prop('title');
					  }
				  });
			  });
		</script>
		
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
										$fileArr = explode(".", $file);
										echo "<div class=\"soundItem\">
												<table cellspacing=\"0\" cellpadding=\"0\" width=\"0\">
													<tr>
														<td><p title=\"Anh&ouml;ren\" style=\"cursor: pointer; font-size: 20px; padding-right: 10px;\" onclick=\"playAudio('". $fileArr[0] .".". $fileArr[1] ."')\">&#9654;</p></td>
														<td>
															<input type=\"hidden\" value=\"!". $fileArr[0] ."\" id=\"". $i ."\">
															<p style=\"cursor: pointer;\" onclick=\"copyToClipboard('". $i ."')\">!". $fileArr[0] ."</p>
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
		
	</body>
</html>