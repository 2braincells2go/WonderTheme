<?php
Include ('css.php');
?>

/****************
	Core elements
*****************/

html,body {
	height: 100%;
}

body {
	background: rgb(255,255,255);
}

/***************
	Main Content
****************/

#main-content {
	font-size: 125%;
	line-height: 150%;
}

.contentarea {
	margin: 0;
	padding: 20px;
	background: rgba(255,255,255,1.0);
}

/********************
	Response Messages
*********************/
.error {
	color: red;
}

.success {
	color: green;
}

/********
	Navbar
********/

.navbar {
	margin: 0;
	border: none;
	clear: both;
}

.navbar ul li {
	text-transform: capitalize;
}

.navbar-brand {
}

.navbar-brand h1 {
	display: inline;
	margin-top: 0;
	padding-top: 0;
	font-size: 150%;
	color: rgb(255,255,255);
}

.navbar-brand h2 {
	display: none;
	margin-top: 0;
	padding-top: 0;
	font-size: 130%;
	font-style: italic;
	margin-left: 15px;
	color: rgb(255,255,255);
}

/* Medium Devices, Desktops */
@media only screen and (min-width : 768px) {
	.navbar-brand h2 {
		display: inline;
	}
}


/***********
	Jumbotron
************/

.jumbotron {
	position: relative;
	background: none; 
	width: 100%;
	height: 300px;
	margin-bottom: 0;	
}

#jumbotron-content {
	display: none;
	background: rgba(0,0,0,0.5);
	margin-top: 40px;
	color: white;
	border: none;
}

/* Medium Devices, Desktops */
@media only screen and (min-width : 768px) {
	.jumbotron {
		height: 500px;
	}
	#jumbotron-content {
		margin-top: 100px;
	}
}

/********************
	Homepanel Settings
*********************/

#homePanel { 
	display: none;
	background: antiquewhite;
}

/*********
	Navbox
**********/

.navbox {
	position: relative;
	min-height: 200px;
	text-align: center;
	padding: 0;
	margin-top: 40px;
	margin-bottom: -20px;
}

.navbox img {
	height: auto;
	width: 100%;
}

.navbox h3 {
	width: 100%;
	margin: 0 0 50px 0;
	padding: 10px 0 0 0;
}

.navbox:hover h3 {
	text-decoration: underline;
}

/**********
	Sidebar
***********/

.sidebar {
	margin-top: 20px;
}

.sidebar form {
	margin-top: 20px;
}



/* Medium Devices, Desktops */
@media only screen and (min-width : 768px) {
	.sidebar {
		margin-top: 0;
	}
}

/*********
	Footer
**********/

footer {
	width: 100%;
	background: steelblue;
	margin: 0;
	padding: 10px auto;
}

footer ul {
	margin: 10px auto 0 auto;
	padding: 10px auto;
}

footer ul li {
	display: block;
	margin: 10px 20px 10px 20px;
	padding: 10px auto;
}

footer a {
	color: rgb(50,50,50);
	font-weight: bold;
}

footer a:hover {
	color: white;
}

/* Medium Devices, Desktops */
@media only screen and (min-width : 768px) {
	.footer-right {
		text-align: right;
	}		
}
