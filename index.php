<?php
#######################################
#                                     #
#  ████  █   ██ █████  ██████ ██   ██ #
#   ██   ██  ██ ██  ██ ██     ██   ██ #
#   ██   ███ ██ ██  ██ ██      ██ ██  #
#   ██   ██████ ██  ██ █████    ███   #
#   ██   ██ ███ ██  ██ ██      ██ ██  #
#   ██   ██  ██ ██  ██ ██     ██   ██ #
#  ████  ██   █ █████  ██████ ██   ██ #
#                                     #
#######################################

/**
 ****************************************
 * Description
 * @name        : index.php
 * @Package     : Googol
 * @Author      : Bronco
 * @Description : seriously (°_°) ?
 * @Version     : 2.0
 ****************************************
 **/

###############################
#                             #
#  ▒▒▒▒  ▒▒  ▒▒  ▒▒▒▒  ▒▒▒▒▒▒ #
#   ▒▒   ▒▒▒ ▒▒   ▒▒   ▒ ▒▒ ▒ #
#   ▒▒   ▒▒▒▒▒▒   ▒▒     ▒▒   #
#   ▒▒   ▒▒ ▒▒▒   ▒▒     ▒▒   #
#  ▒▒▒▒  ▒▒  ▒▒  ▒▒▒▒   ▒▒▒▒  #
#           Context           #
###############################
require_once('data/config/constants.php');
require_once('data/config/constants_regexes.php');
require_once(PHP.'load_classes.php');
require_once(APP_PHP.'class_app.php');
require_once(PHP.'functions.php');
define('CURRENT_URL',tools::getURL());
define('CURRENT_QUERY_URL',CURRENT_URL.'?'.$_SERVER['QUERY_STRING']);
define('BROWSER_TYPE',tools::isMobile());
define('RACINE',tools::getRoot());
# instanciation
$context=[]; # $context contains referencies for the dependency injection in tpl class

if (USE_THUMBNAILS) 			{
	$thumbs  =new thumbs();
	$context['thumbs']=&$thumbs;
}
if (USE_CACHE) 			{
	$cache  =new cache();
	$context['cache']=&$cache;
}
if (USE_LOCALE) 		{
	$lang 	 =new language();
	$context['lang']=&$lang;
}
if (USE_SECURE) 		{	
	$users =new users();
	$context['users']=&$users;
	$secure =new secure();
	$context['secure']=&$secure;	
}
if (USE_DB) 			{
	require_once(CONFIG.'db_config.php');
	$db 	 =new DB($db,FILES_DB_NAME,$tables);	
	$context['db']=&$db;
}
if (USE_CFG) 			{
	require_once(CONFIG.'config_format.php');
	$cfg 	 =new config(CONFIG,$config_format);	
	$context['cfg']=&$cfg;
}
if (USE_TEMPLATE) 		{
	$tpl 	 =new TPL([HTML,APP_HTML]);
	$context['tpl']=&$tpl;
}
if (USE_REST) 			{
	$rest 	=new REST();
	require_once(APP_PHP.'serverREST.php');
}
require_once(CONFIG.'config.php');
$app=new app();
$context['app']=&$app;
$context['colors']=$config['colors'];
$context['sizes']=$config['sizes'];
$context['alternatives']=$config['alternatives'];


tools::setInstancesContext($context); # inject the dependencies context into the instances.
tools::handlePostInstances($context); # & handle post/get data destinated to classes (if a class has methods handlePost() or handleGet(), they will be called)

# Application's post & get data 
require_once(APP_PHP.'handlePostData.php');
require_once(APP_PHP.'handleGetData.php');

$tpl->echo('header');
$tpl->echo($page);// $page defined in handleGetData
$tpl->echo('footer');

?>


