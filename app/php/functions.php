<?php 
##################################################################
#                                                                #
# ██████ ██  ██ █   ██  ████  ██████  ████   ████  █   ██  ████  #
# ██     ██  ██ ██  ██ ██  ██ █ ██ █   ██   ██  ██ ██  ██ ██  ██ #
# ██     ██  ██ ███ ██ ██       ██     ██   ██  ██ ███ ██  ██    #
# █████  ██  ██ ██████ ██       ██     ██   ██  ██ ██████   ██   #
# ██     ██  ██ ██ ███ ██       ██     ██   ██  ██ ██ ███    ██  #
# ██     ██  ██ ██  ██ ██  ██   ██     ██   ██  ██ ██  ██ ██  ██ #
# ██      ████  ██   █  ████   ████   ████   ████  ██   █  ████  #
#                                                                #
##################################################################


/*

	function render_query($array){
		global $couleur,$taille,$q_txt,$config;
		if (
			!is_array($array)
			||empty($array)
			||( empty($array['urlimg'])  &&  empty($array['links']) )
		)
		{
			echo '<div class="noresult"> '.msg('no results for').' <em>'.strip_tags(QUERY_SANITIZED).'</em> </div>';
			return false;
		}
		$filtre='';
		if (MODE=='web'||MODE=='news'){
			echo '<ul start="'.START.'">';
			$nbresultsperpage=100;
			foreach ($array['links'] as $nb => $link){
				$r=str_replace('#link',urldecode($link),TPL);
				$r=str_replace('#higlightedlink',highlight($q_txt,urldecode($link)),$r);
				$r=str_replace('#title',highlight($q_txt,$array['titles'][$nb]),$r);
				$d=str_replace('<br>','',$array['descriptions'][$nb]);
				$d=str_replace('<br/>','',$d);
				$r=str_replace('#description',highlight($q_txt,$d),$r);
				if (preg_match('#http://(.*?)/#',$link,$domaine)){
					$domaine='<a class="wot-exclude wot" href="'.WOT_URL.$domaine[1].'" title="View scorecard"> </a>';
					$r=str_replace('#wot',$domaine,$r);
				}else{$r=str_replace('#wot','',$r);}

				echo $r;
			}
			echo '</ul>';
		}elseif (MODE=='images'){
			$nbresultsperpage=20;
			$filtre='&couleur='.$couleur.'&taille='.$taille;
			if (empty($_SESSION['common_height'])){
				$_SESSION['common_height']=(max($array['tw'])+min($array['tw']))/2;
			}
			
			
			foreach ($array['urlimg'] as $nb => $link){
				$r=str_replace('#link',$link,TPLIMG);
				$r=str_replace('#H',$array['h'][$nb],$r);
				$r=str_replace('#W',$array['w'][$nb],$r);
				$r=str_replace('#site',$array['site'][$nb],$r);				
				$r=str_replace('#url',$array['urlpage'][$nb],$r);
				
				
				
				if (!USE_DISTANT_THUMBS){
					if (!empty($array['urltmb'][$nb])){			
						$repl='<img src="'.grab_thumbs($array['urltmb'][$nb]).'"/>';
					}
					else{
						$repl='<img src="data:image/jpeg;base64'.str_replace('\\u003d','',$array['datatbm'][$nb]).'"/>';
					}
				}else if (USE_DISTANT_THUMBS){
					$repl='<img src="'.$array['urltmb'][$nb].'"/>';
				}				
				$r=str_replace('#thumbs',$repl,$r);
				echo $r;

			}	
		}elseif(MODE=='videos'){ 
			$nbresultsperpage=10;
			foreach ($array['links'] as $nb => $link){				
				$array['description'][$nb]=link2YoutubeUser($array['description'][$nb],$link);
				$r=str_replace('#link',$link,TPLVID);
				$r=str_replace('#titre',$array['titre'][$nb],$r);
				$r=str_replace('#description',$array['description'][$nb],$r);
				$r=str_replace('#site',$array['site'][$nb],$r);
				if (!USE_DISTANT_THUMBS){
					$repl='<img src="'.grab_thumbs($array['thumbs'][$nb]).'" width="'.$array['thumbs_w'][$nb].'" height="'.round($array['thumbs_w'][$nb]/1.33).'"/>';
				}else if (USE_DISTANT_THUMBS){
					$repl='<img src="'.$array['thumbs'][$nb].'" width="'.$array['thumbs_w'][$nb].'" height="'.round($array['thumbs_w'][$nb]/1.33).'"/>';
				}				
				$r=str_replace('#thumbs',$repl,$r);
				echo $r;
			}

		}
		if (MODE=='images'){echo '<div class="load_more" onClick="load_more(this,'.(START+1).')"><button>'.msg('load more').'</button></div>';}
		if(!empty($array['nb_pages'])){
			echo '<hr/><p class="footerlogo">'.LOGO1.str_repeat('<em class="o2">o</em>', $array['nb_pages']-1).LOGO2.'</p><div class="pagination">';
			if (START>0){echo '<a class="previous" title="'.msg('previous').'" href="?q='.urlencode($array['query']).'&mod='.MODE.'&start='.(START-$nbresultsperpage).'&lang='.LANGUAGE.$filtre.'">&#9668;</a>';}
			for ($i=0;$i<$array['nb_pages']-1;$i++){
				if ($i*$nbresultsperpage==$array['current_page']){echo '<em>'.($i+1).'</em>';}
				else{echo '<a href="?q='.urlencode($array['query']).'&mod='.MODE.'&start='.($i*$nbresultsperpage).'&lang='.LANGUAGE.$filtre.'">'.($i+1).'</a>';}
			}
			if (START<($array['nb_pages']-2)*$nbresultsperpage){echo '<a class="next" title="'.msg('next').'" href="?q='.urlencode($array['query']).'&mod='.MODE.'&start='.(START+$nbresultsperpage).'&lang='.LANGUAGE.$filtre.'">&#9658;</a>';}
			
			echo  '</div>';
		}
	}
*/


################################
#                              #
# █     █  ████   ████   ████  #
# ██   ██   ██   ██  ██ ██  ██ #
# ███ ███   ██    ██    ██     #
# ███████   ██     ██   ██     #
# ██ █ ██   ██      ██  ██     #
# ██   ██   ██   ██  ██ ██  ██ #
# ██   ██  ████   ████   ████  #
#                              #
################################
function filtresImage(){
	return '&tbs='.implode(',',[SIZE,COLOR]);
}
	function getGooglePage($query){
		$query=str_replace(' ','+',urlencode($query));
		if (MODE=='web'){ 
			$url=GOOGLE_ROOT.GOOGLE_WEB.$query.'&start='.START.'&num=100';
		}elseif (MODE=='news'){ 
			$url=GOOGLE_ROOT.GOOGLE_NEW.$query.'&start='.START.'&num=100';
		}elseif (MODE=='images'){ 
			
			$f=filtresImage();
			
			$url=GOOGLE_ROOT.GOOGLE_IMG.$query.$f.'&start='.(START).'&num=100';
		}elseif (MODE=='videos'){ 
			$url=GOOGLE_ROOT.GOOGLE_VID.$query.'&start='.START;
		}
		$url.='&ved='.$_SESSION['GOOGLE_VED'];
		$content=file_curl_contents($url,false);
		file_put_contents('gogimg.txt',$content);
		return $content;
	}

	function getGoogleVed(){
		$a=preg_match('#data-ved="(?P<VED>[^"]+)"#',file_curl_contents(GOOGLE_ROOT),$ved);
		if (!empty($ved['VED'])){return $ved['VED'];}
	}

	function isBannished($page){
		return (boolean)stripos($page,CAPCHA_DETECT);
	}
	function grab_thumbs($link){
		$local = 'thumbs/'.md5($link).'.jpg';

		if(is_file($local)) return $local;

		if($thumb = file_curl_contents($link))
		{
			file_put_contents($local, $thumb);
			return $local;
		}

		return $link;
	}
	function doQuery(){
		$query=RACINE.'?q='.QUERY_RAW.'&mod='.MODE.'&lang='.LANGUAGE;
		if (COLOR){$query.='&couleur='.COLOR;}
		if (SIZE){$query.='&taille='.SIZE;}
		return $query;
	}
	function pagination($pages){
		$previous=$next='';
		if ($pages){
			$nbpages=(count($pages)-1)*20;

			if (START>0){
				$previous='<a href="'.doQuery().'&start='.(START-20).'">'.msg('previous').'</a> ';
			}
			if (START<$nbpages){
				$next=' <a href="'.doQuery().'&start='.(START+20).'">'.msg('next').'</a>';
			}
			$echo='<div class="pagination box">'.$previous.'<a href="'.doQuery().'"><em class="g">G</em></a>';
			foreach ($pages as $start) {
				if ($start==START){$active=' class="active" ';}else{$active='';}
				$echo.='<a '.$active.' href="'.doQuery().'&start='.$start.'" title="'.$start.'"><em class="o1">o</em></a>';
			}
			$echo=$echo.LOGO2;
			echo $echo.$next.'</div>';
		}else{
			if (MODE=='images'){
				echo '<a class="button box" href="'.doQuery().'&start='.(START+20).'">'.msg('next').'</a>';
			}else{
				echo '<a class="button box" href="'.doQuery().'&start='.(START+10).'">'.msg('next').'</a>';
			}
			
		}
	}

	function alternatesMotors($query){
		global $config;
		foreach($config['alternatives'] as $name=>$url){
			echo '<li class="alternate"><a class="alternate_searchengine" href="'.$url.$query.'" title="'.msg('Redirect to').' '.$name.'">'.$name.'</a></li>';
		}
	}

	function link2YoutubeUser($desc,$link){
		if (stristr($link,'youtube.com')){
			$desc=preg_replace('#([Aa]jout[^ ]+ par )([^<]+)#','$1<a rel="noreferrer" href="http://www.youtube.com/user/$2?feature=watch">$2</a>',$desc);
		};
		return $desc;
	}
	function clear_cache($delay=180){
		$fs=glob('thumbs/*');
		if(!empty($fs)){
			foreach ($fs as $file){
				if (@date('U')-@date(filemtime($file))>$delay){
					unlink ($file);
				}
			}
		}
	}

	function is_active($first,$second){
		if ($first==$second){
			echo 'active';
		}else{
			echo '';
		}
	}
/*
	function handle_bangs($q){
		global $config;
		foreach ($config['bangs'] as $bang=>$url){
			if ( strtolower( (substr($q,0,strlen($bang)))) ==strtolower($bang)){header('location: '.$url.str_replace($bang,'',$q));exit();}
		}
	}
*/
	function highlight($words='',$str=''){
		if (empty($str)){return;}
		if (empty($words)){return $str;}

		$words=explode(' ',$words);
		$regex = '#\\b(\\w*)(';
	    $sep = '';
	    foreach ($words as $word)
	    {
	        $regex .= $sep . preg_quote($word, '#');
	        $sep = '|';
	    }
	    $regex .= ')(\\w*)\\b#i';
	    return preg_replace($regex, '\\1<span class="highlighted">\\2</span>\\3', $str);
	}


	function my_htmlspecialchars($str) {
		return str_replace(
			array('&', '<', '>', '"'),
			array('&amp;', '&lt;', '&gt;', '&quot;'),
			$str
		);
	}

	function protocolIsHTTPS() {
	    return (!empty($_SERVER['HTTPS']) AND strtolower($_SERVER['HTTPS']) == 'on') ? true : ((!empty($_SERVER['HTTP_SSL']) AND strtolower($_SERVER['HTTP_SSL']) == 'on') ? true : false);
	}

	function checkSite(&$site, $reset=true) {
	    $site = preg_replace('#([\'"].*)#', '', $site);
	    # Méthode Jeffrey Friedl - http://mathiasbynens.be/demo/url-regex
	    # modifiée par Amaury Graillat pour prendre en compte la valeur localhost dans l'url
	    if(preg_match('@\b((ftp|https?)://([-\w]+(\.\w[-\w]*)+|localhost)|(?:[a-z0-9](?:[-a-z0-9]*[a-z0-9])?\.)+(?: com\b|edu\b|biz\b|gov\b|in(?:t|fo)\b|mil\b|net\b|org\b|[a-z][a-z]\b))(\:\d+)?(/[^.!,?;"\'<>()\[\]{}\s\x7F-\xFF]*(?:[.!,?]+[^.!,?;"\'<>()\[\]{}\s\x7F-\xFF]+)*)?@iS', $site))
	            return true;
	    else {
	        if($reset) $site='';
	        return false;
	    }
	}

	function getRacine($truncate=false) {
	    $protocol = protocolIsHTTPS() ? 'https://' : "http://";
	    $servername = $_SERVER['HTTP_HOST'];
	    $serverport = (preg_match('/:[0-9]+/', $servername) OR $_SERVER['SERVER_PORT'])=='80' ? '' : ':'.$_SERVER['SERVER_PORT'];
	    $dirname = preg_replace('/\/(core|plugins)\/(.*)/', '', dirname($_SERVER['SCRIPT_NAME']));
	    $racine = rtrim($protocol.$servername.$serverport.$dirname, '/').'/';
	    $racine = str_replace(array('webroot/','install/'), '', $racine);
	    if(!checkSite($racine, false))
	        die('Error: wrong or invalid url');
	    if ($truncate){ 
	        $root = substr($racine,strpos($racine, '://')+3,strpos($racine,basename($racine))+4);
	        $racine = substr($root,strpos($root,'/'));
	    }
	    return $racine;
	}
/*
	function start_pause(){file_put_contents('INACTIVE.ini',date('U'));}
	function still_pause(){//return true;// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if (is_file('INACTIVE.ini')){
			$since=intval(file_get_contents('INACTIVE.ini'));
		}else{$since=0;}
		//echo 'depuis '.$since.'// pendant '.PAUSE_DURATION.' min// il est '.date('U').'// jusqua '.($since+(PAUSE_DURATION*60));
		return $since+(PAUSE_DURATION*60)>date('U');
	}
*/
	function msg($m){global $lang;if(isset($lang[$m])){return $lang[$m];}else{return $m;}}
	
	function return_safe_search_level(){
		if (SAFESEARCH_LEVEL==SAFESEARCH_ON){return '<b class="ss_on">'.msg('Filter on').'</b>';}
		if (SAFESEARCH_LEVEL==SAFESEARCH_OFF){return '<b class="ss_off">'.msg('Filter off').'</b>';}
		if (SAFESEARCH_LEVEL==SAFESEARCH_IMAGESONLY){return '<b class="ss_images">'.msg('Filter images only').'</b>';}
	}

	function file_curl_contents($url,$pretend=true){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Charset: UTF-8'));
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,  FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		if (!ini_get("safe_mode") && !ini_get('open_basedir') ) {curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);}
		curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
		if ($pretend){curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 4.4.2; Che2-L11 Build/HonorChe2-L11) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36');}
		curl_setopt($ch, CURLOPT_REFERER, 'https://www.google.com');
		$data = curl_exec($ch);
		$response_headers = curl_getinfo($ch);
		// Google seems to be sending ISO encoded page + htmlentities, why??
		if($response_headers['content_type'] == 'text/html; charset=ISO-8859-1') $data = html_entity_decode(iconv('ISO-8859-1', 'UTF-8//TRANSLIT', $data)); 
		curl_close($ch);

		return $data;
	}

	function add_search_engine(){
		if(!is_file('googol.xml')){
			file_put_contents('googol.xml', '<OpenSearchDescription xmlns="http://a9.com/-/spec/opensearch/1.1/"
			  xmlns:moz="http://www.mozilla.org/2006/browser/search/">
			  <ShortName>Googol</ShortName>
			  <Description>'.msg('Googol - google without lies').'</Description>
			  <InputEncoding>UTF-8</InputEncoding>
			  <Image width="32" height="32">data:image/png;base64,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</Image>
			  <Url type="text/html" method="get" template="'.RACINE.'">
			  <Param name="q" value="{searchTerms}"/>
			  </Url>
			  <moz:SearchForm>'.RACINE.'</moz:SearchForm> 
			</OpenSearchDescription>');
		}
	}


function aff($stop=true){       
            $dat=debug_backtrace();
            $vars=func_get_args();
            $origin='';
            foreach ($vars as $name=>$val){
                ob_start();
                var_dump($vars[$name]);
                $var_dump = ob_get_contents();
                ob_end_clean();
                $var_dump=nl2br(htmlentities($var_dump));
                $var_dump=preg_replace('#(array|string|integer|int|object|float)(\([^\)]*?\))#','<em style="color:#0BF">$1</em> <em style="color:#0EF">$2</em>',$var_dump);
                $var_dump=preg_replace('#(bool)\((true)\)#','<em style="color:#0BF">$1</em> (<em style="color:#4F0">$2</em>)',$var_dump);
                $var_dump=preg_replace('#(bool)\((false)\)#','<em style="color:#0BF">$1</em> (<em style="color:#F40">$2</em>)',$var_dump);
                $var_dump=preg_replace('#\[([^\)]*?)\]#','<em style="color:#Fda">$1</em>',$var_dump);
                $var_dump=preg_replace('#( "([^"]+)")#','<em style="color:#Fb0">$1</em>',$var_dump);
                $var_dump=preg_replace('#(\{)#','<ul>',$var_dump);
                $var_dump=preg_replace('#\=\>\<br ?\/\>#','&nbsp;&nbsp;&nbsp;<span style="color:white">=></span>&nbsp;&nbsp;&nbsp;',$var_dump);
                $var_dump=preg_replace('#(\})#','</ul>',$var_dump);
                $var_dump=preg_replace('#(NULL)#','<em style="color:#F00">$1</em>',$var_dump);

                $origin='<table>';
                echo '<div style="background-color:rgba(0,0,0,0.8);color:red;padding:5px"><h2>Arret ligne <em><strong style="color:white;font-weight:bold">'.$dat[0]['line'].'</strong></em> dans le fichier <em style="color:white;font-weight:bold">'.$dat[0]['file'].'</em></h2>';
                echo '<h3>Variable <strong>N°'.($name+1).'</strong></h3>';
                echo '<div style="background-color:rgba(0,0,0,0.8);color:#fff;padding:10px">'.$var_dump.'</div>';

            }
            foreach ($dat as $num=>$data){
                $dir=dirname($data['file']).'/';
                $fil=basename($data['file']);
                $origin.='
                <tr>
                    <td style="width:50%">
                        <span style="color:white">'.$num.' - </span>
                        <em style="color:#888">'.$dir.'</em>
                    </td>
                    <td style="max-width:10%">
                        <em style="color:white;font-weight:bold">'.$fil.'</em>
                    </td>
                    <td style="max-width:10%"> 
                        <em style="color:lightblue;font-weight:bold">l. '.$data['line'].'</em> 
                    </td>
                    <td style="max-width:10%">
                        <em style="color:yellow;font-weight:bold">'.$data['function'].'()</em>
                    </td>
                    
                </tr>';
            }
            $origin.='</table>';
            echo '<div style="background-color:rgba(0,0,0,0.8);color:#aaa;padding:10px"><h3> Pile d\'appels </h3>'.$origin.'</div></div>';
            exit();
        }