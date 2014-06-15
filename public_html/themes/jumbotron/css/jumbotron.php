<?php
Include ('css.php');
?>

/********************
	Homepage Settings
*********************/

#homePanel { 
	display: none;
}

#jumbotron-content {
	display: none;
}

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

.navbar-brand h1 {
	font-size: 1.5em;
	display: inline;
	clear: none;
	color: rgb(255,255,255);
}

.navbar-brand h2 {
	font-size: 1.2em;
	font-style: italic;
	display: inline;
	clear: none;
	margin-left: 15px;
	color: rgb(255,255,255);
}

/***********
	Jumbotron
************/

.jumbotron {
	position: relative;
	background: black; 
	width: 100%;
	height: 500px;
}

#jumbotron-content {
	background: rgba(0,0,0,0.5);
	margin-top: 100px;
	color: white;
	border: none;
}

/*********
	Navbox
**********/

.navbox {
	position: relative;
	min-height: 200px;
	text-align: center;
	padding: 0;
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

.sidebar form {
	margin-top: 20px;
}

/*********
	Footer
**********/

footer {
	width: 100%;
	background: steelblue;
	margin-bottom: 0;
	margin-top: 20px;
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