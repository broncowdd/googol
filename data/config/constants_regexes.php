<?php 
define('REGEX_WEB','#><a href="\/url\?q=(?<link>[^"]+)&sa=[^^]*?<div[^>]+>(?<title>[^^]*?)<\/div>[^^]*?<div[^>]+>(?<soustitre>[^^]*?)<\/div>[^^]+?<div[^>]+>(?<description>[^^]*?)\.\.\.[^^]*?<\/div>#s');
define('REGEX_NEWS','\/url\?q=(?<link>[^"]*?)&[^^]*?>(?<title>[^^]*?)<\/a>[^^]*?<span class="f">(?<date>[^^]*?)<\/span>[^^]*?<div class="st">(?<description>[^^]*?)<\/div>[^^]*?src="(?<thumbnail>[^"]*?)"#s');
define('REGEX_VIDEOS','#\/url\?q=(?<link>[^"]*?)&sa[^^]*?>(?<title>[^^]*?)<\/a>[^^]*?<img.*?src="(?<thumbnail>[^"]+)".*?style="width:(?<w>[0-9]+)[^^]*?<span class=[^^]*?>(?<description>[^^]*?)<\/div>#');
define('REGEX_VIDEOS_THUMBS','#<img.*?src="([^"]+)".*?style="width:([0-9]+)"#');
define('REGEX_IMG','#\/url\?q=(?<link>[^"]*?)&sa=[^^]*?height="(?<h>[0-9]*?)" src="(?<thumbnail>[^"]*?)" width="(?<w>[0-9]*?)"[^^]*?(?<info>[0-9]+ × [0-9]+ - [0-9]+.*?)<\/td>#');
define('REGEX_PAGES','#&start=([0-9]+)#');
