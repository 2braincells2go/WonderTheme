<?php
$themePath = "/themes/".$c['themeSelect']."/";
$coverPath = $themePath."images/covers/";
$tnPath = $themePath."images/thumbnails/";

Include ('php/functions.php');

?>

<!doctype html>
<html lang="en">
<head>
   <meta name="viewport" content="user-scalable=yes, initial-scale=1.0, width=device-width" />

<?php
	echo "	<meta charset='utf-8'>
	<title>".$c['title']." - ".ucwords(str_replace('-',' ',$c['page']))."</title>
	<base href='$hostname'>
	<script src='".$themePath."/js/jquery-1.11.1.min.js'></script>
	<script src='".$themePath."/js/bootstrap.js'></script>
	<script src='".$themePath."/js/jumbotron.js'></script>
	<link rel='stylesheet' href='".$themePath."/css/wondercms.css'>
	<link rel='stylesheet' href='".$themePath."/css/bootstrap.css'>
	<link rel='stylesheet' href='".$themePath."/css/jumbotron.php'>
	<link rel='stylesheet' href='".$themePath."/css/".$c['page'].".php'>
	<meta name='description' content='".$c['description']."'>
	<meta name='keywords' content='".$c['keywords']."'>";
	editTags();
?>

<style>
.jumbotron {
	background: url('<?php echo $coverPath."cv_".$c['page'].".jpg"; ?>'); 
	background-position: center -400px;
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
}

</style>

</head>
<body>

<?php if(is_loggedin()) {	settings(); }; ?>


	<header>
		<div id="navbar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">
					<h1><?php echo $c['title'];?></h1>
					<h2><?php echo $c['description']; ?></h2>
				</a>
				<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav navbar-right">
								<?php menuWithClass("<li><a","</a></li>");?>
							</ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>		
	</header>

	<div class="clear">
	</div>
	<!-- Main jumbotron for a primary marketing message or call to action -->	
		<div class="jumbotron">
			<div class="container well" id="jumbotron-content">
				<?php content('jumbotron',$c['jumbotron']);?>
			</div>
		</div>
	
	<div id="homePanel">
		<a href="<?php menuItemUrl(1);?>">
			<div class="col-md-2 col-md-offset-2 navbox navbox1" id="navbox1">
				<img class="img-responsive" src="<?php echo $tnPath."tn_"; menuItemSlug(1);?>.jpg" />
				<h3><?php menuItem(1); ?></h3>
			</div>
		</a>
		<a href="<?php menuItemUrl(2);?>">
			<div class="col-md-2 col-md-offset-1 navbox navbox2" id="navbox2">
			<img class="img-responsive" src="<?php echo $tnPath."tn_"; menuItemSlug(2);?>.jpg" />
			<h3><?php menuItem(2); ?></h3>
			</div>
		</a>
		<a href="<?php menuItemUrl(3);?>">
			<div class="col-md-2 col-md-offset-1 navbox navbox3" id="navbox3">
			<img class="img-responsive" src="<?php echo $tnPath."tn_"; menuItemSlug(3);?>.jpg" />
			<h3><?php menuItem(3); ?></h3>
			</div>
		</a>
	</div>
	
	<div class="container col-md-12">
		<div class="col-md-5 col-md-offset-2" id="main-content">
			<?php content($c['page'],$c['content']);?>
		</div>
		<div class="col-md-3 col-md-offset-1 well sidebar">
			<div id="subside">
				<?php content('subside',$c['subside']); ?>
			</div>
			<form class="form" action="mailto:<?php echo $c["adminEmail"]; ?>">
				<fieldset>
					<!-- Text input-->
					<div class="form-group">
						<label class="control-label" for="contactName">Your Name</label>  
						<input id="contactName" name="contactName" type="text" placeholder="John Doe" class="form-control input-md">
						<span class="help-block"></span>  
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="control-label" for="contactInfo">Email/Phone</label>  
						<input id="contactInfo" name="contactInfo" type="text" placeholder="" class="form-control input-md">
						<span class="help-block">john@example.com or 555-555-5555</span>  
					</div>
					<!-- Textarea -->
					<div class="form-group">
						<label class="control-label" for="contactMessage">Message</label>
						<textarea class="form-control" id="contactMessage" name="contactMessage"></textarea>
					</div>
					<!-- Button -->
					<div class="form-group text-right">
						<button id="contactSubmit" name="contactSubmit" class="btn btn-primary">Submit</button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>	
		
	<div class="clearfix">
		&nbsp;
	</div>

	<div id="footer">
		<footer>
			<div class="container-fluid">
				<ul class="col-md-offset-1 col-md-2">
					<li><?php echo "$lstatus"; ?></li>
					<li><?php echo $c['copyright'];?></li>
				</ul>
				<ul class="col-md-offset-5 col-md-3 text-right">
					<li><?php echo "$sig"; ?></li>
					<li>Theme by <a href="http://cristoslc.com" target="_blank">Cristos L-C</a></li>
				</ul>
			</div>
		</footer>
	</div>

<?php addSettings($c); ?>
<script>
	$().ready(function(){pageLoad('<?php echo $c['page']; ?>');});
</script>

</body>
</html>