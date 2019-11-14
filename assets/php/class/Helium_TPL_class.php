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
######################################
#                                    #
#        ░░░░░░ ░░░░░  ░░░░          #
#        ░ ░░ ░ ░░  ░░  ░░           #
#          ░░   ░░  ░░  ░░           #
#          ░░   ░░░░░   ░░           #
#          ░░   ░░      ░░           #
#          ░░   ░░      ░░ ░░        #
#         ░░░░  ░░     ░░░░░░        #
#                                    #
######################################

/**
 ****************************************
 * Description
 * @name        : Helium_TPL_class.php
 * @Package     : Helium
 * @Author      : Bronco
 * @Description : All templating process
 * @Version     : 1.0beta1
 ****************************************
 **/
# TPL SYNTAX 
# you can insert data in the template adding {{ }} 
# ex: {{$title}} {{ROOT_PATH}} (dont use arrays)
# ex2:{{$object->method}}

class tpl{
	private $tpl; # array
	private $tpl_path; # str / array
	private $tpl_list=[]; # array
	private $current_folder_item_nb; # integer
	private $avatar_size=256; # integer (px)
	private $avatar_style='square'; # string [dot/square]
	private $context; # reference : contains the reference to vars & instances you want to use in tpl with {{ }} 
	private $locale; # reference : contains the reference to locale class (if used) 
	private $users; # reference : contains the reference to users class (if used) 
	private $secure; # reference : contains the reference to secure class (if used) 
	
	public function __construct($tpl_path='templates'){
		if (is_string($tpl_path)){
			$tpl_path=[$tpl_path];
		}
		$this->tpl_path=$tpl_path;	
		$this->setTpl(array());

		foreach ($tpl_path as $path) {
			$this->setTplList($path);
		}

	}

	###########################
	# METHODS #################
	###########################
	

	# loadTemplate
	###########################
	# load and prepare the templates array and $this->tpl
	# only loads the tpl once
	private function loadTemplate($tpl_name=''){
		if (!$tpl_name){return false;}
		if (empty($this->tpl_list[$tpl_name])){return false;}
		if (empty($this->tpl[$tpl_name])){
			$this->tpl[$tpl_name]=file_get_contents($this->tpl_list[$tpl_name]);
		}
		return $this->tpl[$tpl_name];
	}

	# render
	###########################
	# complete a template with an array replacing keys by values 
	# and applying {{}} replacements
	# (echo=false by default; if not, template is returned)
	## $tpl_name as string
	## $replacement as array (can be multidimensionnal array)
	## $echo as boolean
	## Return : string
	public function render($tpl_name=null,$replacement=null,$echo=false){
		if(!empty($tpl_name)){
			$tpl=$this->loadTemplate($tpl_name);
			if (!empty($tpl)){
				$temp=$tpl;
				if (!empty($replacement)){
					$replacement=$this->addReplacementChar($replacement);
					$temp=str_replace(array_keys($replacement),array_values($replacement),$tpl);
				}
				$temp=$this->insertValue($temp);	
				if ($echo){	echo $temp;return;}else{return $temp;}

			}else{
				throw new Exception("the template $tpl_name doesn't exists", 1);
				return false;
			}
		}else{
			throw new Exception("no template name", 1);
			return false;
		}	
	}

	# ifLoggedRender
	###########################
	# render the tpl if a user is logged (see previous method)
	public function ifLoggedRender($tpl_name=null,$replacement=null,$echo=false){
		$login=$this->secure->getConnectedLogin();

		if (!$login){return false;}
		$user_data=$this->users->get($login);
		if(!empty($tpl_name)){
			$tpl=$this->loadTemplate($tpl_name);
			if (!empty($tpl)){
				$temp=$tpl;
				if (!empty($replacement)){
					$temp=str_replace(array_keys($replacement),array_values($replacement),$tpl);
				}
				$temp=$this->insertValue($temp);	
				if ($echo){	echo $temp;return;}else{return $temp;}

			}else{
				throw new Exception("the template $tpl_name doesn't exists", 1);
				return false;
			}
		}else{
			throw new Exception("no template name", 1);
			return false;
		}	
	}


	# echo
	###########################
	# alias for render
	public function echo($tpl_name=null,$replacement=null){
		$this->render($tpl_name,$replacement,true);
	}

	# used in insertvalue
	private function getVar($name_only){
		if (is_string($name_only)){
			$name_only=str_replace('$','',$name_only);
		}else{
			return $name_only;
		}
		
		# used to extract value from a tpl var
		if (!empty($$name_only)){
			return $$name_only;
		}elseif (isset($this->context[$name_only])){
			return $this->context[$name_only];
		}else{
			return $name_only.': not defined !';
		}
		return $s;
	}

	# insertValue
	###########################
	# replace all {{DATA}} content with the $this->context['DATA'] result:
	# if DATA is a integer/string/array: put the $this->context['DATA'] content
	# if DATA is an instance: replace all {{DATA->method}} or {{DATA->method('string',number,...)}} with the method's result
	# Caution ! if you use a string that contains " ' ( ) , you MUST escape them !
	## $string as string
	## Return : string
	private function insertValue($string=null){
		if (!$string){return null;}
		$escape_chars=array(			
			'\,'=>'**escaped_comma**',
		);
		$unescape_chars=array(
			','=>'**escaped_comma**',
		);

		preg_match_all('#(?<replace>\{\{ *(?<var>\$[a-zA-Z_][a-zA-Z0-9_]*?=)*(?<name>[^@]*?)(?<params>\(.*?\))? *\}\})#',$string,$tpl_variable); # changed (?<name>[^@()]*?) into (?<name>[^@]*?)

		if (!empty($tpl_variable)){			
			foreach($tpl_variable['name'] as $key=>$name){
				$name=trim($name);
				$name_only=str_replace('$','',$name);
				# include file
				if (strtolower($name_only)=='include'){
					$path=str_replace(["'",'"','(',')'],'',$tpl_variable['params'][$key]);

					if (is_file($path)){
						if (pathinfo($path,PATHINFO_EXTENSION)=='php'){
							ob_start();
							include($path);
							$string=str_replace($tpl_variable['replace'][$key],ob_get_clean(),$string);

						}else{
							$string=str_replace($tpl_variable['replace'][$key],file_get_contents($path),$string);
						}				
						
					}else{
						$string=str_replace($tpl_variable['replace'][$key],'include failed: '.$path.' doesn\'t exists',$string);
					}
				}elseif ($name[0]==='"'){
				# traduction shortcut
					$name=substr($name, 1,strlen($name)-2);
					$name=$this->locale?$this->locale->r($name):$name;
					$string=str_replace($tpl_variable['replace'][$key],$name,$string);

				}elseif (strpos($name, '->')===false){ # it's NOT a method call
					if ( 
						$name[0]=='$'
						&&strpos($name, '[')===false
					){
						# variable
						$string=str_replace($tpl_variable['replace'][$key],$this->getVar($name_only),$string);
					}else{
						# constant
						if (defined($name_only)){
							$string=str_replace($tpl_variable['replace'][$key],constant($name_only),$string);
						}else{
							$string=str_replace($tpl_variable['replace'][$key],'CONSTANT "'.$name_only.'": not defined !',$string);
						}
					}
				}else{
					# it's a method call : object->method
					$obj=explode('->',$name_only);
					$obj=array_map('trim',$obj);

					$object_name=$obj[0];
					$method=$obj[1];

					if ($object_name=='tpl'||$object_name=='this'){
						$object=$this;
					}elseif (!empty($$object_name)){
						$object=$$object_name;
					}elseif (!empty($this->context[$object_name])){
						$object=$this->context[$object_name];
					}

					if (empty($object)){continue;}


					$tpl_variable['params'][$key]=str_replace(array_keys($escape_chars),array_values($escape_chars),$tpl_variable['params'][$key]);
					$params=explode(',',substr($tpl_variable['params'][$key], 1,strlen($tpl_variable['params'][$key])-2));

					# getting parameters
					if (!empty($params[0])){
						$array=array();
						foreach ($params as $k=>$p){
							$p=trim($p);
							# boolean
							if ($p=='false'){$array['par'.$k]=false;}
							elseif ($p=='true'){$array['par'.$k]=true;}							
							# integer
							elseif (intval($p)){$array['par'.$k]=intval($p);}
							# string
							elseif ($p[0]=='"'||$p[0]=="'"){$array['par'.$k]=substr($p, 1,strlen($p)-2);}	
							# var
							elseif ($p[0]=='$'){
								$array['par'.$k]=$this->getVar($p);
							}
							# constant
							else{
								$array['par'.$k]=constant($p);
							}

						}
						if (!empty($object)){
							$ret=call_user_func_array(array($object, $obj[1]), $array);
						}else{
							$ret=call_user_func_array(array($this->context[$object_name], $obj[1]), $array);
						}
						
					}else{ # there's no parameter
						if (
							!empty($object 
							&&method_exists($object,$method)
						)){
							$ret=$object->$method();
						}else{
							$ret=$this->context[$object_name]->$method();
						}

					}
					if (!empty($tpl_variable['var'][$key])){ 
						# if it's an assignation to a context var ($var=obj->method())
						# create a context var with the returned value
						$assignation_var=substr($tpl_variable['var'][$key], 1,strlen($tpl_variable['var'][$key])-2);
						$this->context[$assignation_var]=$ret;
						$string=str_replace_first($tpl_variable['replace'][$key],'',$string);
					}else{
						$string=str_replace_first($tpl_variable['replace'][$key],$ret,$string);
					}
					
				}
			}
			
		}

		$string=str_replace(array_values($unescape_chars),array_keys($unescape_chars),$string);
		return $string;
	}

	# renderForEach
	###########################
	# render template for each value of an array.
	# if values are arrays, they will be used as a replacement array (see render)
	# in tpl, use tpl->renderForEach('tpl','context_var_name')
	public function renderForEach($tpl=null,$data=null){
		$data=$this->getVar($data);
		
		if (
			!$data
			||!is_array($data)
			||!$tpl
		){
			return false;
		}
		$complete='';

		foreach ($data as $key=>$value) {
			if (is_array($value)){
				$value=$this->addReplacementChar($value);
				$value[TPL_CHAR.'key']=$key;
			}else{
				$value=[TPL_CHAR.'value'=>$value,TPL_CHAR.'key'=>$key];
			}
			$complete.=$this->render($tpl,$value);
		}
		return $complete;
	}

	# getDataFromUrl
	###########################
	# create a context var from json url data
	public function getDataFromUrl($url=null){
		if (!$url){return false;}
		$data = tools::getJsonFromURL($url);
		return $data;
	}

	# scanFolder
	###########################
	# return an array containing the file's list in a folder
	public function scanFolder($folder=null,$mask='*',$basename=false){
		if (!$folder){return false;}
		$data = glob($folder.$mask);
		if ($basename){$data=array_map('basename', $data);}
		return $data;
	}
	
	# addReplacementChar
	###########################
	# add the TPL_CHAR as a prefix to all array's keys
	public function addReplacementChar($array=null){
		if (!$array||!is_array($array)){return false;}
		return array_combine(array_map(function($k){ if (strpos($k,TPL_CHAR)!==0){return TPL_CHAR.$k;}else{return $k;} }, array_keys($array)),$array);
	}


	# avatarPath
	###########################
	# creates an avatar from the string parameter (if needed) and returns the path (uses ROR.php).
	public function avatarPath($string='',$size=null,$style=null){
		if (!$size) {$size =$this->avatar_size;}
		if (!$style){$style=$this->avatar_style;}

		$str=PHP.'ror.php?str='.$string.'&sz='.$size.'&style='.$style;
		return $str;
	}

	# exists
	###########################
	# checks if tpl exists or not
	public function exists($string=''){
		return !empty($this->tpl_list[$string]);
	}

	###########################
	# SETTERS #################
	###########################
	public function setContext(&$context=null){			
		$this->context=&$context;
		$this->secure=tools::getClassInstance($context,'secure');
		$this->locale=tools::getClassInstance($context,'locale');
		$this->users=tools::getClassInstance($context,'users');
	}	

	public function setTpl($value=[]){
		if ($value&&!is_array($value)){
			$value=array();
		}
		$this->tpl=$value;
	}	
	public function setTplPath($value='templates'){
		$this->tpl_path=$value;
	}

	public function setAvatarSize($value=256){
		$this->avatar_size=$value;
	}

	public function setAvatarStyle($value='square'){
		$this->avatar_style=$value;
	}

	public function setTplList($tpl_path=null){
		if (!is_dir($tpl_path)){
			exit('the template path "'.$tpl_path.'" doesn\'t exist');
		}

		$iter = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($tpl_path, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST,
            \RecursiveIteratorIterator::CATCH_GET_CHILD # Ignore "Permission denied"
        );
		
        $tpl_array = array($tpl_path);
        foreach ($iter as $path => $dir) {      
            $tpl_array[] = $path; 
        }

		$temp=array();
		foreach($tpl_array as $t){
			if (is_file($t)){
            	$name=basename($t);
				$temp[str_replace('.html','',$name)]=$t;
            }
		}
		$this->tpl_list=array_merge($this->tpl_list,$temp);
	}

	###########################
	# GETTERS #################
	###########################
	public function getTplPath(){return $this->tpl_path;}
	public function tpl(){return $this->tpl;}
	public function tpl_list(){return $this->tpl_list;}
	public function getAvatarSize(){return $this->avatar_size;}
	public function getAvatarStyle(){return $this->avatar_style;}

}
