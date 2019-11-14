<?php 


######################################
#                                    #
# ▒▒▒▒▒   ▒▒▒▒  ▒▒▒▒▒  ▒▒▒▒▒▒  ▒▒▒▒  #
# ▒▒  ▒▒ ▒▒  ▒▒ ▒▒  ▒▒ ▒ ▒▒ ▒ ▒▒  ▒▒ #
# ▒▒  ▒▒ ▒▒  ▒▒ ▒▒  ▒▒   ▒▒    ▒▒    #
# ▒▒▒▒▒  ▒▒▒▒▒▒ ▒▒▒▒▒    ▒▒     ▒▒   #
# ▒▒     ▒▒  ▒▒ ▒▒  ▒▒   ▒▒      ▒▒  #
# ▒▒     ▒▒  ▒▒ ▒▒  ▒▒   ▒▒   ▒▒  ▒▒ #
# ▒▒     ▒▒  ▒▒ ▒▒  ▒▒  ▒▒▒▒   ▒▒▒▒  #
#                                    #
######################################
define('USE_DB',false);
define('USE_REST',false);
define('USE_SECURE',false);
define('USE_CACHE',false);
define('USE_LOCALE',true);
define('USE_TEMPLATE',true);
define('USE_CFG',false);
define('USE_THUMBNAILS',false);

######################################
#                                    #
# ▒▒▒▒▒   ▒▒▒▒  ▒▒▒▒▒▒ ▒▒  ▒▒  ▒▒▒▒  #
# ▒▒  ▒▒ ▒▒  ▒▒ ▒ ▒▒ ▒ ▒▒  ▒▒ ▒▒  ▒▒ #
# ▒▒  ▒▒ ▒▒  ▒▒   ▒▒   ▒▒  ▒▒  ▒▒    #
# ▒▒▒▒▒  ▒▒▒▒▒▒   ▒▒   ▒▒▒▒▒▒   ▒▒   #
# ▒▒     ▒▒  ▒▒   ▒▒   ▒▒  ▒▒    ▒▒  #
# ▒▒     ▒▒  ▒▒   ▒▒   ▒▒  ▒▒ ▒▒  ▒▒ #
# ▒▒     ▒▒  ▒▒  ▒▒▒▒  ▒▒  ▒▒  ▒▒▒▒  #
#                                    #
######################################

define('DATA','./data/');
	define('CONFIG',DATA.'config/');
	define('USERS',DATA.'users/');
	define('AVATARS',DATA.'avatars/');

define('ASSETS','./assets/');
	define('PHP',ASSETS.'php/');
	define('JS',ASSETS.'js/');
	define('IMG',ASSETS.'img/');
	define('CSS',ASSETS.'css/');
	define('HTML',ASSETS.'html/');

define('APP','./app/');
	define('APP_PHP',APP.'php/');
	define('APP_JS',APP.'js/');
	define('APP_IMG',APP.'img/');
	define('APP_CSS',APP.'css/');
	define('APP_HTML',APP.'html/');
	define('APP_FONTS',APP.'fonts/');

######################################
#                                    #
#  ▒▒▒▒  ▒   ▒▒ ▒▒▒▒▒▒  ▒▒▒▒   ▒▒▒▒  #
#   ▒▒   ▒▒  ▒▒ ▒▒     ▒▒  ▒▒ ▒▒  ▒▒ #
#   ▒▒   ▒▒▒ ▒▒ ▒▒     ▒▒  ▒▒  ▒▒    #
#   ▒▒   ▒▒▒▒▒▒ ▒▒▒▒▒  ▒▒  ▒▒   ▒▒   #
#   ▒▒   ▒▒ ▒▒▒ ▒▒     ▒▒  ▒▒    ▒▒  #
#   ▒▒   ▒▒  ▒▒ ▒▒     ▒▒  ▒▒ ▒▒  ▒▒ #
#  ▒▒▒▒  ▒▒   ▒ ▒▒      ▒▒▒▒   ▒▒▒▒  #
#                                    #
######################################

define('APP_NAME','Googol');
define('APP_AUTHOR','Bronco');
define('YEAR',date('Y'));
define('APP_LICENCE','GNU GPL');






#############################################
#                                           #
#  ▒▒▒▒   ▒▒▒▒  ▒▒  ▒▒ ▒▒▒▒▒▒  ▒▒▒▒   ▒▒▒▒  #
# ▒▒  ▒▒ ▒▒  ▒▒ ▒▒▒ ▒▒ ▒▒       ▒▒   ▒▒     #
# ▒▒     ▒▒  ▒▒ ▒▒▒▒▒▒ ▒▒▒▒▒    ▒▒   ▒▒ ▒▒▒ #
# ▒▒  ▒▒ ▒▒  ▒▒ ▒▒ ▒▒▒ ▒▒       ▒▒   ▒▒  ▒▒ #
#  ▒▒▒▒   ▒▒▒▒  ▒▒  ▒▒ ▒▒      ▒▒▒▒   ▒▒▒▒  #
#                                           #
#############################################
	define('OFFLINE',false); # for local testing only (don't touch)
	define('DEBUG',false); 	 # for debugging only (don't touch)
	
	define('VERSION','v4.1'); 
	define('BANNISHMENT_DURATION',1800); //seconds
	define('USE_DISTANT_THUMBS',false);
	define('THUMBS_DURATION',180);// seconds
	define('THEME','style_google.css');
	define('PAUSE_DURATION',60); // minutes
	define('USE_WEB_OF_TRUST',false);

################################
#                              #
# ▒     ▒  ▒▒▒▒   ▒▒▒▒   ▒▒▒▒  #
# ▒▒   ▒▒   ▒▒   ▒▒   ▒ ▒▒  ▒▒ #
# ▒▒▒ ▒▒▒   ▒▒     ▒▒   ▒▒     #
# ▒▒ ▒ ▒▒   ▒▒   ▒   ▒▒ ▒▒  ▒▒ #
# ▒▒   ▒▒  ▒▒▒▒   ▒▒▒▒   ▒▒▒▒  #
#                              #
################################
	define('LOGO1','<em class="G">G</em><em class="o1">o</em>');
	define('LOGO2','<em class="o2">o</em><em class="g">g</em><em class="o1">o</em><em class="l">l</em>');
	define('CAPCHA_DETECT','<div id="recaptcha" class="g-recaptcha" data-sitekey=');
	define('SAFESEARCH_ON','&safe=on');
	define('SAFESEARCH_IMAGESONLY','&safe=images');
	define('SAFESEARCH_OFF','&safe=off');
	define('SAFESEARCH_LEVEL',SAFESEARCH_OFF);// SAFESEARCH_ON, SAFESEARCH_IMAGESONLY, SAFESEARCH_OFF
	define('TPL_CHAR','#'); # this char will be putted at star of the keys in the replacement arrays ( ['replacethis'=>'bythat'] will become ['#replacethis'=>'bythat']) to avoid unwanted replacements

