<?php 
########################
#                      #
#  ████  █████  █████  #
# ██  ██ ██  ██ ██  ██ #
# ██  ██ ██  ██ ██  ██ #
# ██████ █████  █████  #
# ██  ██ ██     ██     #
# ██  ██ ██     ██     #
# ██  ██ ██     ██     #
#                      #
########################

class app{
	private $context;
	private $data;
	private $pages;

	public function __construct(){
		# Bannished from google ?
		if (is_file(DATA.'Bannished')){
			if(filemtime(DATA.'Bannished')+BANNISHMENT_DURATION>time()){
				define('BANNISHED',true);
			}else{
				@unlink(DATA.'Bannished');
			}
		}
		tools::defineIfUndefined('BANNISHED',false);

		# clean old thumbnails
		$fs=glob(DATA.'thumbs/*');
		if(!empty($fs)){
			foreach ($fs as $file){
				if (@date('U')-@date(filemtime($file))>THUMBS_DURATION){
					unlink ($file);
				}
			}
		}

	}
	public function get($key){
		if (isset($_GET[$key])){
			return tools::sanitizeData($_GET[$key]);
		}
		return false;
	}
	public function post($key){
		if (isset($_POST[$key])){
			return tools::sanitizeData($_POST[$key]);
		}
		return false;
	}
	public function session($key){
		if (isset($_SESSION[$key])){
			return tools::sanitizeData($_SESSION[$key]);
		}
		return false;
	}

	# how many minutes of bannishment
	public function bannishmentDuration(){
		if (BANNISHED){
			$filet=filemtime(DATA.'Bannished')+BANNISHMENT_DURATION;
			return round(($filet-time())/60);
		}

	}

	public function basename($path=''){
		return basename($path);
	}	

	public function wotScript(){
		if(USE_WEB_OF_TRUST){return '<script type="text/javascript" src="http://api.mywot.com/widgets/ratings.js"></script>';}
	}	

	public function logoFontFamily(){
		$selected_logo_font=tools::dirContent(APP_FONTS.'fontslogo/*.woff');
		define('LOGO_FONT',basename($selected_logo_font[array_rand($selected_logo_font)]));
		define('LOGO_FONT_FAMILY',trim(preg_replace('#[^a-zA-Z]| #','_',LOGO_FONT)));
	}	

	public function safeSearchLevel(){
		if (SAFESEARCH_LEVEL==SAFESEARCH_ON){return '<b class="ss_on">'.$this->context['lang']->r('Filter on').'</b>';}
		if (SAFESEARCH_LEVEL==SAFESEARCH_OFF){return '<b class="ss_off">'.$this->context['lang']->r('Filter off').'</b>';}
		if (SAFESEARCH_LEVEL==SAFESEARCH_IMAGESONLY){return '<b class="ss_images">'.$this->context['lang']->r('Filter images only').'</b>';}
	}	

	public function renderColorsOptions(){
		$colors=$this->context['colors'];
		$return='';
			foreach ($colors as $get=>$color){
				if ($get==COLOR){$sel=' selected ';}else{$sel='';}
				$return.= $this->context['tpl']->render('option',['selected'=>$sel,'key'=>$get,'value'=>$color]);
			}
		return $return;
	}	
	
	public function renderSizesOptions(){
		$colors=$this->context['sizes'];
		$return='';
			foreach ($colors as $get=>$size){
				if ($get==SIZE){$sel=' selected ';}else{$sel='';}
				$return.= $this->context['tpl']->render('option',['selected'=>$sel,'key'=>$get,'value'=>$size]);
			}
		return $return;
	}	

	public function highlight($str=''){
		if (empty($str)){return;}
		if (is_string($str)){
			$str=strip_tags($str);
			$words=explode(' ',QUERY_SANITIZED);
			$regex = '#\\b(\\w*)(';
		    $sep = '';
		    foreach ($words as $word)
		    {
		        $regex .= $sep . preg_quote($word, '#');
		        $sep = '|';
		    }
		    $regex .= ')(\\w*)\\b#i';
		    return preg_replace($regex, '\\1<span class="highlighted">\\2</span>\\3', $str);
		}elseif(is_array($str)){
			foreach ($str as $key => $value) {
				$str[$key]=$this->highlight($value);
			}
			return $str;
		}


	}

	public function deepUrlDecode(string $url){
		while(urldecode($url) != $url){
			$url = urldecode($url);
		}
		return $url;
	}

	public function parsePage($page){
		if (MODE=='web'){ 
			preg_match_all(REGEX_WEB, $page, $data);			
			$retour=array(
				'link'=>array_map([$this,'deepUrlDecode'],$data['link']),
				'title'=>$this->highlight($data['title']),
				'higlightedlink'=>$this->highlight(array_map([$this,'deepUrlDecode'],$data['link'])),
				'description'=>$this->highlight($data['description']),
				'nb_pages'=>false,
				'current_page'=>START,
				'query'=>QUERY_RAW,
				'mode'=>MODE
				);
			$pages=false;
		}elseif (MODE=='news'){ 
			preg_match_all(REGEX_NEWS,$page,$r);
			preg_match_all(REGEX_PAGES,$page,$p);
			$p=count($p[0]);

			$retour=array(
				'title'=>$this->highlight($r['title']),
				'description'=>$this->highlight($r['description']),
				'link'=>array_map('strip_tags',$r['link']),
				'thumbnail'=>$r['thumbnail'],
				'current_page'=>START,
				'nb_pages'=>$p,
				'query'=>QUERY_RAW,
				'mode'=>MODE
			);
			$pages=false;
		}elseif (MODE=='images'){
			preg_match_all(REGEX_IMG,$page,$r);
			//preg_match_all($config['regex']['pages'],$page,$p);
			$retour		=array(
				'urlimg'=>$r['link'],		
				'urlpage'=>$r['link'],
				'imgfilename'=>array_map('basename',$r['link']),
				'h'=>$r['h'],
				'w'=>$r['w'],
				'link'=>array_map('strip_tags',$r['link']),
				'thumbnail'=>$this->grabThumbs($r['thumbnail']),
				'description'=>array_map('strip_tags',$r['info']),
				
			);
			$pages=false;
			unset($r);

		}elseif(MODE=="videos"){			
			preg_match_all(REGEX_VIDEOS,$page,$r);
			preg_match_all(REGEX_PAGES,$page,$p);

			$p=count($p[0]);
			$retour=array(
				'site'=>$r['link'],
				'titre'=>$this->highlight($r['title']),
				'link'=>array_map('urldecode',$r['link']),
				'description'=>$this->highlight($r['description']),
				'thumbnail'=>$this->grabThumbs($r['thumbnail'],$r['link']),
				'w'=>$r['w'],
				'nb_pages'=>$p-1,
				'current_page'=>START,
				'query'=>QUERY_RAW,
				'mode'=>MODE
			);
			$pages=false;
		}

		# rearrange data
		if (!empty($retour['link'])){
			foreach ($retour as $type => $items) {
				if (is_array($items)){
					foreach ($items as $nb => $data) {
						$arranged_array[$nb][$type]=$data;
					}
				}
			}
			$arranged_array['pages']=$pages;
			return $arranged_array;	
		}
		return false;
	}

	public function redirectIfBannished($force=false){
		if (BANNISHED || $force){
			header('Location: ?mod=bannished&request='.QUERY_RAW);
		}
	}

	public function getQueryData(){

		# get html page from query
		if (!QUERY_ENCODED){return;}
		$query=str_replace(' ','+',QUERY_ENCODED);
		if (MODE=='web'){
			$this->redirectIfBannished();
			$url=GOOGLE_ROOT.GOOGLE_WEB.$query.'&start='.START.'&num=100';
		}elseif (MODE=='news'){ 
			$this->redirectIfBannished();
			$url=GOOGLE_ROOT.GOOGLE_NEW.$query.'&start='.START.'&num=100';
		}elseif (MODE=='images'){			
			$f='&tbs='.implode(',',[SIZE,COLOR]);			
			$url=GOOGLE_ROOT.GOOGLE_IMG.$query.$f.'&start='.(START).'&num=100';
		}elseif (MODE=='videos'){ 
			$this->redirectIfBannished();
			$url=GOOGLE_ROOT.GOOGLE_VID.$query.'&start='.START;
		}
		$page=tools::curlContent($url,false);
		$page=preg_replace('#<!doctype html>|<html[^^]+?-->|<head>[^^]+?<\/head>|<body[^^]+?<div id="main">|<style>[^^]+?<\/style>|<script[^µ]+?<\/script>|<footer>[^µ]+?<\/body>#','',$page);

		# parse data from HTML
		$this->data=$this->parsePage($page);
		
		if (empty($this->data)){
			# no results -> bannished from google (bastards ! (ಠ_ಠ)  )
			file_put_contents(DATA.'Bannished','');
			# go to bannished page ... 
			$this->redirectIfBannished(true);
		}

		$this->page=!empty($data['pages'])?$data['pages']:false;
		unset($this->data['pages']);
	}

	public function isThereResults()
	{
		if ($this->data){ return 'results';}
		return 'noresults';
	}

	public function renderQuery(){
		$html='';
		# render proper HTML
		if ($this->data){
			$html = $this->context['tpl']->renderForEach('item_'.MODE,$this->data);
		}
		return $html;
	}

	public function renderPagination(){
		if (QUERY_RAW==''){return;}
		define('QUERY',$this->doQuery());
		
		if (MODE=='images'){
			define('NEXT',START+20);
		}else{
			define('NEXT',START+10);
		}
		return $this->context['tpl']->render('next_button');
	}


	public function doQuery(){
		$query=RACINE.'?q='.QUERY_RAW.'&mod='.MODE.'&lang='.LANGUAGE;
		if (COLOR){$query.='&couleur='.COLOR;}
		if (SIZE){$query.='&taille='.SIZE;}
		return $query;
	}

	public function grabThumbs($link_thumb,$link_item=null){
		if (empty($link_thumb)){return false;}
		if (is_string($link_thumb)){			
			if (strpos($link_item,'youtube')!==false){ # if youtube video, grab thumb from youtube
				$link_item=urldecode($link_item);
				$id=explode('watch?v=',$link_item);
				if (!empty($id[1])){
					$link_thumb='https://img.youtube.com/vi/'.$id[1].'/default.jpg';
				}
			}
			$local = DATA.'thumbs/'.md5($link_thumb).'.jpg';
			if(is_file($local)) return $local;
			if ($thumb = tools::curlContent($link_thumb)){
				file_put_contents($local, $thumb);
				return $local;
			}
			return $link_thumb;
		}elseif (is_array($link_thumb)){
			foreach ($link_thumb as $key => $value) {
				if (!empty($link_item[$key])){
					$temp=$link_item[$key];
				}else{$temp='';}
				$link_thumb[$key]=$this->grabThumbs($value,$temp);
			}
			return $link_thumb;
		}
	}

	public function setContext(&$context=null){			
		$this->context=&$context;
	}	
}
