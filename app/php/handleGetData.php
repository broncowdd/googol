<?php

########################
#                      #
#  ████  ██████ ██████ #
# ██  ██ ██     █ ██ █ #
# ██     ██       ██   #
# ██ ███ █████    ██   #
# ██  ██ ██       ██   #
# ██  ██ ██       ██   #
#  ████  ██████  ████  #
#                      #
########################	

	$page='home';

	if (isset($_GET['lang'])){
		define('LANGUAGE',strip_tags($_GET['lang']));
	}else{
		define('LANGUAGE',tools::lang());
	}
	include(CONFIG.'URL_constants.php');

	$lang->setLocale(LANGUAGE);

	if (isset($_GET['mod'])){
		define('MODE',strip_tags($_GET['mod']));
		define('SEARCH_FORM',MODE.'_search');
		//$page=MODE;
	}else{
		//$page='home';
		define('MODE','web');
		define('SEARCH_FORM',MODE.'_search');
	}
	if (MODE=='bannished'){
		$page=MODE;
	}
	if (isset($_GET['start'])){
		define('START',intval(strip_tags($_GET['start'])));
	}else{
		define('START',0);
	}

	if (!empty($_GET['couleur'])){
		define('COLOR',strip_tags($_GET['couleur']));		
	}else{
		define('COLOR','');
	}
	if (!empty($_GET['taille'])){
		define('SIZE',strip_tags($_GET['taille']));
	}else{
		define('SIZE','');
	}

	if (isset($_GET['q'])){
		sleep(1);
		$q_raw=$_GET['q'];
		$q_txt=strip_tags($_GET['q']);
		define('QUERY_RAW',$q_raw);
		define('QUERY_ENCODED',urlencode($q_raw));
		define('QUERY_SANITIZED',$q_txt);
		define('TITLE',$q_txt.' - Googol '.$lang->r('search '));
		define('NO_QUERY_CLASS','');
	}else{
		$q_txt=$q_raw='';
		define('TITLE',$lang->r('Googol - google without lies'));
		define('NO_QUERY_CLASS',' noqueryclass ');
		define('QUERY_RAW','');
		define('QUERY_ENCODED','');
		define('QUERY_SANITIZED','');
	}

	if (!empty($_GET['next'])){
		# load more button -> ajax load, don't add html page
		render(parsePage($q_raw));
		exit();
	}

define('CURRENT_PAGE',$page);



