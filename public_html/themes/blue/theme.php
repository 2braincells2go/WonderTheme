<!doctype html>
<html lang="en">
<head>
<?php
	echo "	<meta charset='utf-8'>
	<title>".$c['title']." - ".$c['page']."</title>
	<base href='$hostname'>
	<link rel='stylesheet' href='themes/".$c['themeSelect']."/style.css'>
	<script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
	<meta name='description' content='".$c['description']."'>
	<meta name='keywords' content='".$c['keywords']."'>";
	editTags();
?>

</head>
<body>
	<header>
		<nav id="nav">
			<h1 id="main-title"><a href='./'><?php echo $c['title'];?></a></h1>
			<ul>
				<?php menu("<li><a","</a></li>");?>
			</ul>
		</nav>
	</header>
	<?php if(is_loggedin()) settings();?>

	<div class="clear"></div>
	<div id="wrapper" class="border">
			<?php content($c['page'],$c['content']);?>

	</div>
	
	<div id="side" class="border">
			<?php content('subside',$c['subside']);?>

	</div>

	<div class="clear"></div>
	<footer><p><?php echo $c['copyright'] ." | $sig | $lstatus";?></p></footer>
</body>
</html>