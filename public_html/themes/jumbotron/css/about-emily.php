<?php
Include ('css.php');
$c['page']='about-emily';
?>

ul.nav a.menu-<?php echo $c['page'] ?> {
	font-weight: bold;
	color: white;
}

.jumbotron {
	background: url('<?php echo $coverPath."cover_".$c['page'].".jpg"; ?>') no-repeat center center fixed; 
  background-size: cover;
}

#main-content ul {
	height: auto;
  margin-bottom:20px;
	width: 80%;
	margin: auto;
  overflow:hidden;
	list-style-type: circle;
}

#main-content li{
  float:left;
  display:list-item;
	width: 33%;
}

@media (max-width: 768px) {
		#main-content ul {
			height: auto;
		}

		#main-content li{
			float:none;
			display:list-item;
		}
}