<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		<?php $song_count = 5678;
					$hour_of_music = (int)($song_count/10);
		?>
		<p>
			I love music.
			I have <?= $song_count?> total songs,
			which is over <?= $hour_of_music?> hours of music!
		</p>

		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
			<ol>
				<?php
					$newspages = $_GET["newspages"];
					if ($newspages > 5){
						$newspages = 5;
					}
					for($news_pages = 11;$news_pages >= 7 + (5 - $newspages); $news_pages--) {
								if ($news_pages > 9) { ?>
					  			<li><a href="https://www.billboard.com/archive/article/2019<?= $news_pages?>">2019-<?= $news_pages?></a></li>
								<?php }
								else {?>
									<li><a href="https://www.billboard.com/archive/article/2019<?= "0".$news_pages?>">2019-<?= "0".$news_pages?></a></li>
								<?php }
				}?>
			</ol>
		</div>

		<div class="section">
			<h2>My Favorite Artists</h2>
			<ol>
				<?php
					$artists = file("favorite.txt");
					for($i = 0 ; $i < count($artists) ; $i++){?>
						<li><a href = "http://en.wikipedia.org/wiki/<?=implode("_",explode(" ",$artists[$i]))?>"><?=$artists[$i]?></a></li>
				<?php } ?>
			</ol>
		</div>

		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php $music = glob("lab5/musicPHP/songs/*.mp3");
					for($i = 0 ; $i < count($music) ; $i++){?>
						<li class="mp3item">
							<a href="<?= $music[$i]?>"><?= basename($music[$i])." (".(int)(filesize($music[$i])/1024)." KB)"?></a>
						</li>
				<?php }?>



				<?php
					$m3u_list = glob("lab5/musicPHP/songs/*.m3u");
					$m3u_list = array_reverse($m3u_list);
					for($i = 0 ; $i < count($m3u_list) ; $i++){?>
						<li class="playlistitem"><?=basename($m3u_list[$i])?>:
							<ul>
								<?php
								$mp3_list = file($m3u_list[$i]);
								for($j = 0 ; $j < count($mp3_list) ; $j++) {
									if(strpos($mp3_list[$j],"#") === False){?>
										<li><?= $mp3_list[$j]?></li>
								<?php }
								}?>

							</ul>
						<?php }?>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
