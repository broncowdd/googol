<?php
##############################################
#                                            #
# ██  ██ ██████ ████    ████  ██  ██ █     █ #
# ██  ██ ██      ██      ██   ██  ██ ██   ██ #
# ██  ██ ██      ██      ██   ██  ██ ███ ███ #
# ██████ █████   ██      ██   ██  ██ ███████ #
# ██  ██ ██      ██      ██   ██  ██ ██ █ ██ #
# ██  ██ ██      ██ ██   ██   ██  ██ ██   ██ #
# ██  ██ ██████ ██████  ████   ████  ██   ██ #
#                                            #
##############################################
#############################################
#                                           #
# ░░░░    ░░░░   ░░░░   ░░░░  ░░░░   ░░░░░░ #
#  ░░    ░░  ░░ ░░  ░░ ░░  ░░  ░░    ░░     #
#  ░░    ░░  ░░ ░░     ░░  ░░  ░░    ░░     #
#  ░░    ░░  ░░ ░░     ░░░░░░  ░░    ░░░░░  #
#  ░░    ░░  ░░ ░░     ░░  ░░  ░░    ░░     #
#  ░░ ░░ ░░  ░░ ░░  ░░ ░░  ░░  ░░ ░░ ░░     #
# ░░░░░░  ░░░░   ░░░░  ░░  ░░ ░░░░░░ ░░░░░░ #
#                                           #
#############################################
/**
 ****************************************
 * Description
 * @name        : Helium_locale_class.php
 * @Package     : Helium
 * @Author      : Bronco
 * @Description : All language functions
 * @Version     : 1.0
 * @use: $locale->e('text') , $locale->r('text');
 ****************************************
 **/




class language{
	private $locale; # array
	private $locale_path;
	private $language='fr-fr';

	public function __construct($locale_path='locales/',$lang=null){
		$this->locale_path=$locale_path;
		$this->load($lang);
	}

	###########################
	# METHODS #################
	###########################


	# load
	###########################
	# load the language file
	## $lang as string
	## Return : array
	private function load($language=null){
		if (!$language){
			$language=$this->language;
		}else{
			$this->language=$language;
		}
		if (is_file($this->locale_path.$language.'.php')){
			include ($this->locale_path.$language.'.php');
		}else{$lang=array();}
		$this->locale=$lang;		
	}

	# availableLanguages
	###########################
	# return the languages (the files in locale directory)

	public function availableLanguages(){
		$l=glob($this->locale_path.'*.php');
		foreach($l as $key=>$lang){
			$l[$key]=str_replace('.php','',basename($lang));
		}
		return $l;
	}

	# e
	###########################
	# echo the traduction if available
	## $text as string
	## Return : Null
	public function e(string $text=''){
		$lang=$this->locale;
		if (isset($lang[$text])){$t= $lang[$text];}else{$t= $text;}
		echo $t;
	}

	# r
	###########################
	# return the traduction if available
	## $text as string
	## Return : string
	public function r(string $text=''){
		$lang=$this->locale;
		if (isset($lang[$text])){$t= $lang[$text];}else{$t= $text;}
		return $t;
	}

	# browserLanguage
	###########################
	# return browser's language
	public function browserLanguage(){
		if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
			$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
			return $language{0}.$language{1};
		}else{return 'fr';}
	}

	###########################
	# SETTERS #################
	###########################
	public function setLocale(string $value=''){
		$this->load($value);
	}

	###########################
	# GETTERS #################
	###########################
	private function getLocale(){return $this->locale;}
	public function getLanguage(){return $this->language;}


}
