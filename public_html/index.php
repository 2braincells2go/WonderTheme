<?php
ob_start();
session_start();
$rp = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
$hostname = '//'.$_SERVER['HTTP_HOST'].str_replace($rp, '', $_SERVER['REQUEST_URI']);
$c['password'] = 'admin';
$c['loggedin'] = false;
$c['page'] = 'home';
$d['page']['home'] = "<h3>Congratulations! Your website is now powered by WonderCMS.</h3><br />\nLogin to the admin panel with the 'Login' link in the footer. The password is admin.<br />\nChange the password as soon as possible.<br /><br />\n\nClick on the content to edit and click outside to save it.<br /><br />\n\nWonderCMS weights only around 15kB. (8kB zipped)";
$d['page']['example'] = "This is an example page.<br /><br />\n\nTo add a new one, click on the existing pages (in the admin panel) and enter a new one below the others.";
$d['new_page']['admin'] = "Page <b>".str_replace('-',' ',$rp)."</b> created.<br /><br />\n\nClick here to start editing!";
$d['new_page']['visitor'] = "Sorry, but <b>".str_replace('-',' ',$rp)."</b> doesn't exist. :(";
$d['default']['content'] = "Click to edit!";
$c['themeSelect'] = "blue";
$c['menu'] = "Home<br />\nExample";
$c['title'] = 'Website title';
$c['subside'] = "<h3>ABOUT YOUR WEBSITE</h3><br />\nYour photo, website description, contact information, mini map or anything else.<br /><br />\n\n This content is static and is visible on all pages.";
$c['description'] = 'Your website description.';
$c['keywords'] = 'enter, your website, keywords';
$c['copyright'] = '&copy;'. date('Y') .' Your website';
$sig = "Powered by <a href='http://wondercms.com'>WonderCMS</a>";
$hook['admin-richText'] = "rte.php";

foreach($c as $key => $val){
	if($key == 'content')continue;
	$fval = @file_get_contents('files/'.$key);
	$d['default'][$key] = $c[$key];
	if($fval)$c[$key] = $fval;
	switch($key){
		case 'password':
			if(!$fval)$c[$key] = savePassword($val);
			break;
		case 'loggedin':
   			if(isset($_SESSION['l']) and $_SESSION['l']==$c['password'])$c[$key] = true;
			if(isset($_REQUEST['logout'])){
				session_destroy();
				header('Location: ./');
				exit;
			}
			if(isset($_REQUEST['login'])){
				if(is_loggedin())header('Location: ./');
				loginForm();
			}
			$lstatus = (is_loggedin())? "<a href='$hostname?logout'>Logout</a>": "<a href='$hostname?login'>Login</a>";
			break;
		case 'page':
			if($rp)$c[$key]=$rp;
			$c[$key] = getSlug($c[$key]);
			if(isset($_REQUEST['login']))continue;
			$c['content'] = @file_get_contents("files/".$c[$key]);
			if(!$c['content']){
				if(!isset($d['page'][$c[$key]])){
						header('HTTP/1.1 404 Not Found');
						$c['content'] = (is_loggedin())? $d['new_page']['admin']:$c['content'] = $d['new_page']['visitor'];
				}else{
					$c['content'] = $d['page'][$c[$key]];
				}
			}
			break;
		default:
			break;
	}
}
loadPlugins();

# Load default content for theme, if any
$themeContent = 'themes/'.$c['themeSelect'].'/default-content.php';
if (file_exists($themeContent)) {
	include ($themeContent);
}

require("themes/".$c['themeSelect']."/theme.php");

function loadPlugins(){
	global $hook,$c;
	$cwd = getcwd();
	if(chdir("./plugins/")){
		$dirs = glob('*', GLOB_ONLYDIR);
		if(is_array($dirs))foreach($dirs as $dir){
			require_once($cwd.'/plugins/'.$dir.'/index.php');
		}
	}
	chdir($cwd);
	$hook['admin-head'][] = "<script type='text/javascript' src='./js/editInplace.php?hook=".$hook['admin-richText']."'></script>";
}

function getSlug($p){
	$p = strip_tags($p);
	preg_match_all('/([a-z0-9A-Z-_]+)/', $p, $matches);
	$matches = array_map('strtolower', $matches[0]);
	$slug = implode('-', $matches);
	return $slug;
}

function is_loggedin(){
	global $c;
	return $c['loggedin'];
}

function editTags(){
	global $hook;
	if(!is_loggedin() && !isset($_REQUEST['login'])) return;
	foreach($hook['admin-head'] as $o){
		echo "\t".$o."\n";
	}
}

function content($id,$content){
	global $d;
	echo (is_loggedin())? "<span title='".$d['default']['content']."' id='".$id."' class='editText richText'>".$content."</span>": $content;
}

function menu($stags,$etags){
	global $c,$hostname;
	$mlist = explode('<br />',$c['menu']);
	for($i=0;$i<count($mlist);$i++){
		$page = getSlug($mlist[$i]);
		if(!$page) continue;
		echo $stags." href='".$hostname.$page."'>".str_replace('-',' ',$page)." ".$etags." \n";
	}
}

function loginForm(){
	global $c, $msg;
	$msg = '';
	if(isset($_POST['sub'])) login();
	$c['content'] = "<form action='' method='POST'>
	Password <input type='password' name='password'>
	<input type='submit' name='login' value='Login'> $msg
	<br /><br /><b class='toggle'>Change password</b>
	<div class='hide'><br />Type your old password above and your new one below.<br />
	New Password <input type='password' name='new'>
	<input type='submit' name='login' value='Change'>
	<input type='hidden' name='sub' value='sub'>
	</div>
	</form>";
}

function login(){
	global $c, $msg;
	if(md5($_POST['password'])<>$c['password']){
		$msg = "Wrong Password";
		return;
	}
	if($_POST['new']){
		savePassword($_POST['new']);
		$msg = 'Password changed';
		return;
	}
	$_SESSION['l'] = $c['password'];
	header('Location: ./');
	exit;
}

function savePassword($p){
	$file = @fopen('files/password', 'w');
	if(!$file){
		echo "Error opening password. Set correct permissions (644) to the password file.";
		exit;
	}
	fwrite($file, md5($p));
	fclose($file);
	return md5($p);
}

function settings(){
	global $c,$d;
	echo "<div class='settings'>
	<h3 class='toggle'>↕ Settings ↕</h3>
	<div class='hide'>
	<div class='change border'><b>Theme</b>&nbsp;<span id='themeSelect'><select name='themeSelect' onchange='fieldSave(\"themeSelect\",this.value);'>";
	if(chdir("./themes/")){
		$dirs = glob('*', GLOB_ONLYDIR);
		foreach($dirs as $val){
			$select = ($val == $c['themeSelect'])? ' selected' : ''; 
			echo '<option value="'.$val.'"'.$select.'>'.$val."</option>\n";
		}
	}
	echo "</select></span></div>
	<div class='change border'><b>Navigation <small>(hint: add your page below and <a href='javascript:location.reload(true);'>click here to refresh</a>)</small></b><br /><span id='menu' title='Home' class='editText'>".$c['menu']."</span></div>";
	foreach(array('title','description','keywords','copyright') as $key){
		echo "<div class='change border'><span title='".$d['default'][$key]."' id='".$key."' class='editText'>".$c[$key]."</span></div>";
	}
	echo "</div></div>";
}
ob_end_flush();
?>