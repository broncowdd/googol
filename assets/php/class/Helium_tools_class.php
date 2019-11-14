<?php 
######################################
#                                    #
# ░░░░░░  ░░░░   ░░░░  ░░░░    ░░░░  #
# ░ ░░ ░ ░░  ░░ ░░  ░░  ░░    ░░  ░░ #
#   ░░   ░░  ░░ ░░  ░░  ░░     ░░    #
#   ░░   ░░  ░░ ░░  ░░  ░░      ░░   #
#   ░░   ░░  ░░ ░░  ░░  ░░       ░░  #
#   ░░   ░░  ░░ ░░  ░░  ░░ ░░ ░░  ░░ #
#  ░░░░   ░░░░   ░░░░  ░░░░░░  ░░░░  #
#                                    #
######################################

/**
 ****************************************
 * Description
 * @name        : BZN_tools_class.php
 * @Package     : BZN_
 * @Author      : Bronco
 * @Description : static methods usefull everywhere
 * @Version     : 1.0
 ****************************************
 **/



class tools{ 
    ###########################################################################
    #                                                                         #
    # ░     ░  ░░░░  ░     ░ ░░░░░░        ░░░░░░ ░░  ░░ ░░░░░  ░░░░░░  ░░░░  #
    # ░░   ░░   ░░   ░░   ░░ ░░            ░ ░░ ░ ░░  ░░ ░░  ░░ ░░     ░░  ░░ #
    # ░░░ ░░░   ░░   ░░░ ░░░ ░░              ░░   ░░  ░░ ░░  ░░ ░░      ░░    #
    # ░░░░░░░   ░░   ░░░░░░░ ░░░░░           ░░    ░░░░  ░░░░░  ░░░░░    ░░   #
    # ░░ ░ ░░   ░░   ░░ ░ ░░ ░░              ░░     ░░   ░░     ░░        ░░  #
    # ░░   ░░   ░░   ░░   ░░ ░░              ░░     ░░   ░░     ░░     ░░  ░░ #
    # ░░   ░░  ░░░░  ░░   ░░ ░░░░░░         ░░░░    ░░   ░░     ░░░░░░  ░░░░  #
    #                                                                         #
    ###########################################################################

    
    private static $mime_types = array(
                /*'txt' => 'text/plain',
                'md' => 'text/plain',
                'nfo' => 'text/plain',
                'htm' => 'text/html',
                'html' => 'text/html',
                'php' => 'text/html',
                'css' => 'text/css',
                'js' => 'application/javascript',
                'json' => 'application/json',
                'xml' => 'application/xml',
                'swf' => 'application/x-shockwave-flash',
                'flv' => 'video/x-flv',

                // images
                'png' => 'image/png',
                'jpe' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'jpg' => 'image/jpeg',
                'gif' => 'image/gif',
                'bmp' => 'image/bmp',
                'ico' => 'image/vnd.microsoft.icon',
                'tiff' => 'image/tiff',
                'tif' => 'image/tiff',
                'svg' => 'image/svg+xml',
                'svgz' => 'image/svg+xml',

                // archives
                'zip' => 'application/zip',
                'rar' => 'application/x-rar-compressed',
                'exe' => 'application/x-msdownload',
                'msi' => 'application/x-msdownload',
                'cab' => 'application/vnd.ms-cab-compressed',

                // audio/video
                'mp3' => 'audio/mpeg',
                'qt' => 'video/quicktime',
                'mov' => 'video/quicktime',
                'm3u' => 'audio/x-mpegurl',

                // adobe
                'pdf' => 'application/pdf',
                'psd' => 'image/vnd.adobe.photoshop',
                'ai' => 'application/postscript',
                'eps' => 'application/postscript',
                'ps' => 'application/postscript',

                // ms office
                'doc' => 'application/msword',
                'rtf' => 'application/rtf',
                'xls' => 'application/vnd.ms-excel',
                'ppt' => 'application/vnd.ms-powerpoint',
                'docx' => 'application/msword',
                'xlsx' => 'application/vnd.ms-excel',
                'pptx' => 'application/vnd.ms-powerpoint',


                // open office
                'odt' => 'application/vnd.oasis.opendocument.text',
                'ods' => 'application/vnd.oasis.opendocument.spreadsheet',*/

                '3dm'=>'x-world/x-3dmf',
                '3dmf'=>'x-world/x-3dmf',
                'a'=>'application/octet-stream',
                'aab'=>'application/x-authorware-bin',
                'aam'=>'application/x-authorware-map',
                'aas'=>'application/x-authorware-seg',
                'abc'=>'text/vnd.abc',
                'acgi'=>'text/html',
                'afl'=>'video/animaflex',
                'ai'=>'application/postscript',
                'aif'=>'audio/aiff',
                'aif'=>'audio/x-aiff',
                'aifc'=>'audio/aiff',
                'aifc'=>'audio/x-aiff',
                'aiff'=>'audio/aiff',
                'aiff'=>'audio/x-aiff',
                'aim'=>'application/x-aim',
                'aip'=>'text/x-audiosoft-intra',
                'ani'=>'application/x-navi-animation',
                'aos'=>'application/x-nokia-9000-communicator-add-on-software',
                'aps'=>'application/mime',
                'arc'=>'application/octet-stream',
                'arj'=>'application/arj',
                'arj'=>'application/octet-stream',
                'art'=>'image/x-jg',
                'asf'=>'video/x-ms-asf',
                'asm'=>'text/x-asm',
                'asp'=>'text/asp',
                'asx'=>'application/x-mplayer2',
                'asx'=>'video/x-ms-asf',
                'asx'=>'video/x-ms-asf-plugin',
                'au'=>'audio/basic',
                'au'=>'audio/x-au',
                'avi'=>'application/x-troff-msvideo',
                'avi'=>'video/avi',
                'avi'=>'video/msvideo',
                'avi'=>'video/x-msvideo',
                'avs'=>'video/avs-video',
                'bcpio'=>'application/x-bcpio',
                'bin'=>'application/mac-binary',
                'bin'=>'application/macbinary',
                'bin'=>'application/octet-stream',
                'bin'=>'application/x-binary',
                'bin'=>'application/x-macbinary',
                'bm'=>'image/bmp',
                'bmp'=>'image/bmp',
                'bmp'=>'image/x-windows-bmp',
                'boo'=>'application/book',
                'book'=>'application/book',
                'boz'=>'application/x-bzip2',
                'bsh'=>'application/x-bsh',
                'bz'=>'application/x-bzip',
                'bz2'=>'application/x-bzip2',
                'c'=>'text/plain',
                'c'=>'text/x-c',
                'c++'=>'text/plain',
                'cat'=>'application/vnd.ms-pki.seccat',
                'cc'=>'text/plain',
                'cc'=>'text/x-c',
                'ccad'=>'application/clariscad',
                'cco'=>'application/x-cocoa',
                'cdf'=>'application/cdf',
                'cdf'=>'application/x-cdf',
                'cdf'=>'application/x-netcdf',
                'cer'=>'application/pkix-cert',
                'cer'=>'application/x-x509-ca-cert',
                'cha'=>'application/x-chat',
                'chat'=>'application/x-chat',
                'class'=>'application/java',
                'class'=>'application/java-byte-code',
                'class'=>'application/x-java-class',
                'com'=>'application/octet-stream',
                'com'=>'text/plain',
                'conf'=>'text/plain',
                'cpio'=>'application/x-cpio',
                'cpp'=>'text/x-c',
                'cpt'=>'application/mac-compactpro',
                'cpt'=>'application/x-compactpro',
                'cpt'=>'application/x-cpt',
                'crl'=>'application/pkcs-crl',
                'crl'=>'application/pkix-crl',
                'crt'=>'application/pkix-cert',
                'crt'=>'application/x-x509-ca-cert',
                'crt'=>'application/x-x509-user-cert',
                'csh'=>'application/x-csh',
                'csh'=>'text/x-script.csh',
                'css'=>'application/x-pointplus',
                'css'=>'text/css',
                'cxx'=>'text/plain',
                'dcr'=>'application/x-director',
                'deepv'=>'application/x-deepv',
                'def'=>'text/plain',
                'der'=>'application/x-x509-ca-cert',
                'dif'=>'video/x-dv',
                'dir'=>'application/x-director',
                'dl'=>'video/dl',
                'dl'=>'video/x-dl',
                'doc'=>'application/msword',
                'dot'=>'application/msword',
                'dp'=>'application/commonground',
                'drw'=>'application/drafting',
                'dump'=>'application/octet-stream',
                'dv'=>'video/x-dv',
                'dvi'=>'application/x-dvi',
                'dwf'=>'model/vnd.dwf',
                'dwg'=>'application/acad',
                'dwg'=>'image/vnd.dwg',
                'dwg'=>'image/x-dwg',
                'dxf'=>'application/dxf',
                'dxf'=>'image/vnd.dwg',
                'dxf'=>'image/x-dwg',
                'dxr'=>'application/x-director',
                'el'=>'text/x-script.elisp',
                'elc'=>'application/x-elc',
                'env'=>'application/x-envoy',
                'eps'=>'application/postscript',
                'es'=>'application/x-esrehber',
                'etx'=>'text/x-setext',
                'evy'=>'application/envoy',
                'evy'=>'application/x-envoy',
                'exe'=>'application/octet-stream',
                'f'=>'text/plain',
                'f'=>'text/x-fortran',
                'f77'=>'text/x-fortran',
                'f90'=>'text/plain',
                'f90'=>'text/x-fortran',
                'fdf'=>'application/vnd.fdf',
                'fif'=>'application/fractals',
                'fif'=>'image/fif',
                'fli'=>'video/fli',
                'fli'=>'video/x-fli',
                'flo'=>'image/florian',
                'flx'=>'text/vnd.fmi.flexstor',
                'fmf'=>'video/x-atomic3d-feature',
                'for'=>'text/plain',
                'for'=>'text/x-fortran',
                'fpx'=>'image/vnd.fpx',
                'fpx'=>'image/vnd.net-fpx',
                'frl'=>'application/freeloader',
                'funk'=>'audio/make',
                'g'=>'text/plain',
                'g3'=>'image/g3fax',
                'gif'=>'image/gif',
                'gl'=>'video/gl',
                'gl'=>'video/x-gl',
                'gsd'=>'audio/x-gsm',
                'gsm'=>'audio/x-gsm',
                'gsp'=>'application/x-gsp',
                'gss'=>'application/x-gss',
                'gtar'=>'application/x-gtar',
                'gz'=>'application/x-compressed',
                'gz'=>'application/x-gzip',
                'gzip'=>'application/x-gzip',
                'gzip'=>'multipart/x-gzip',
                'h'=>'text/plain',
                'h'=>'text/x-h',
                'hdf'=>'application/x-hdf',
                'help'=>'application/x-helpfile',
                'hgl'=>'application/vnd.hp-hpgl',
                'hh'=>'text/plain',
                'hh'=>'text/x-h',
                'hlb'=>'text/x-script',
                'hlp'=>'application/hlp',
                'hlp'=>'application/x-helpfile',
                'hlp'=>'application/x-winhelp',
                'hpg'=>'application/vnd.hp-hpgl',
                'hpgl'=>'application/vnd.hp-hpgl',
                'hqx'=>'application/binhex',
                'hqx'=>'application/binhex4',
                'hqx'=>'application/mac-binhex',
                'hqx'=>'application/mac-binhex40',
                'hqx'=>'application/x-binhex40',
                'hqx'=>'application/x-mac-binhex40',
                'hta'=>'application/hta',
                'htc'=>'text/x-component',
                'htm'=>'text/html',
                'html'=>'text/html',
                'htmls'=>'text/html',
                'htt'=>'text/webviewhtml',
                'htx'=>'text/html',
                'ice'=>'x-conference/x-cooltalk',
                'ico'=>'image/x-icon',
                'idc'=>'text/plain',
                'ief'=>'image/ief',
                'iefs'=>'image/ief',
                'iges'=>'application/iges',
                'iges'=>'model/iges',
                'igs'=>'application/iges',
                'igs'=>'model/iges',
                'ima'=>'application/x-ima',
                'imap'=>'application/x-httpd-imap',
                'inf'=>'application/inf',
                'ins'=>'application/x-internett-signup',
                'ip'=>'application/x-ip2',
                'isu'=>'video/x-isvideo',
                'it'=>'audio/it',
                'iv'=>'application/x-inventor',
                'ivr'=>'i-world/i-vrml',
                'ivy'=>'application/x-livescreen',
                'jam'=>'audio/x-jam',
                'jav'=>'text/plain',
                'jav'=>'text/x-java-source',
                'java'=>'text/plain',
                'java'=>'text/x-java-source',
                'jcm'=>'application/x-java-commerce',
                'jfif'=>'image/jpeg',
                'jfif-tbnl'=>'image/jpeg',
                'jpe'=>'image/jpeg',
                'jpeg'=>'image/jpeg',
                'jpg'=>'image/jpeg',
                'jps'=>'image/x-jps',
                'js'=>'application/x-javascript',
                'js'=>'application/javascript',
                'js'=>'application/ecmascript',
                'js'=>'text/javascript',
                'js'=>'text/ecmascript',
                'jut'=>'image/jutvision',
                'kar'=>'audio/midi',
                'kar'=>'music/x-karaoke',
                'ksh'=>'application/x-ksh',
                'ksh'=>'text/x-script.ksh',
                'la'=>'audio/nspaudio',
                'la'=>'audio/x-nspaudio',
                'lam'=>'audio/x-liveaudio',
                'latex'=>'application/x-latex',
                'lha'=>'application/lha',
                'lha'=>'application/octet-stream',
                'lha'=>'application/x-lha',
                'lhx'=>'application/octet-stream',
                'list'=>'text/plain',
                'lma'=>'audio/nspaudio',
                'lma'=>'audio/x-nspaudio',
                'log'=>'text/plain',
                'lsp'=>'application/x-lisp',
                'lsp'=>'text/x-script.lisp',
                'lst'=>'text/plain',
                'lsx'=>'text/x-la-asf',
                'ltx'=>'application/x-latex',
                'lzh'=>'application/octet-stream',
                'lzh'=>'application/x-lzh',
                'lzx'=>'application/lzx',
                'lzx'=>'application/octet-stream',
                'lzx'=>'application/x-lzx',
                'm'=>'text/plain',
                'm'=>'text/x-m',
                'm1v'=>'video/mpeg',
                'm2a'=>'audio/mpeg',
                'm2v'=>'video/mpeg',
                'm3u'=>'audio/x-mpequrl',
                'man'=>'application/x-troff-man',
                'map'=>'application/x-navimap',
                'mar'=>'text/plain',
                'mbd'=>'application/mbedlet',
                'mc$'=>'application/x-magic-cap-package-1.0',
                'mcd'=>'application/mcad',
                'mcd'=>'application/x-mathcad',
                'mcf'=>'image/vasa',
                'mcf'=>'text/mcf',
                'mcp'=>'application/netmc',
                'me'=>'application/x-troff-me',
                'mht'=>'message/rfc822',
                'mhtml'=>'message/rfc822',
                'mid'=>'application/x-midi',
                'mid'=>'audio/midi',
                'mid'=>'audio/x-mid',
                'mid'=>'audio/x-midi',
                'mid'=>'music/crescendo',
                'mid'=>'x-music/x-midi',
                'midi'=>'application/x-midi',
                'midi'=>'audio/midi',
                'midi'=>'audio/x-mid',
                'midi'=>'audio/x-midi',
                'midi'=>'music/crescendo',
                'midi'=>'x-music/x-midi',
                'mif'=>'application/x-frame',
                'mif'=>'application/x-mif',
                'mime'=>'message/rfc822',
                'mime'=>'www/mime',
                'mjf'=>'audio/x-vnd.audioexplosion.mjuicemediafile',
                'mjpg'=>'video/x-motion-jpeg',
                'mm'=>'application/base64',
                'mm'=>'application/x-meme',
                'mme'=>'application/base64',
                'mod'=>'audio/mod',
                'mod'=>'audio/x-mod',
                'moov'=>'video/quicktime',
                'mov'=>'video/quicktime',
                'movie'=>'video/x-sgi-movie',
                'mp2'=>'audio/mpeg',
                'mp2'=>'audio/x-mpeg',
                'mp2'=>'video/mpeg',
                'mp2'=>'video/x-mpeg',
                'mp2'=>'video/x-mpeq2a',
                'mp3'=>'audio/mpeg3',
                'mp3'=>'audio/x-mpeg-3',
                'mp3'=>'video/mpeg',
                'mp3'=>'video/x-mpeg',
                'mpa'=>'audio/mpeg',
                'mpa'=>'video/mpeg',
                'mpc'=>'application/x-project',
                'mpe'=>'video/mpeg',
                'mpeg'=>'video/mpeg',
                'mpg'=>'audio/mpeg',
                'mpg'=>'video/mpeg',
                'mpga'=>'audio/mpeg',
                'mpp'=>'application/vnd.ms-project',
                'mpt'=>'application/x-project',
                'mpv'=>'application/x-project',
                'mpx'=>'application/x-project',
                'mrc'=>'application/marc',
                'ms'=>'application/x-troff-ms',
                'mv'=>'video/x-sgi-movie',
                'my'=>'audio/make',
                'mzz'=>'application/x-vnd.audioexplosion.mzz',
                'nap'=>'image/naplps',
                'naplps'=>'image/naplps',
                'nc'=>'application/x-netcdf',
                'ncm'=>'application/vnd.nokia.configuration-message',
                'nif'=>'image/x-niff',
                'niff'=>'image/x-niff',
                'nix'=>'application/x-mix-transfer',
                'nsc'=>'application/x-conference',
                'nvd'=>'application/x-navidoc',
                'o'=>'application/octet-stream',
                'oda'=>'application/oda',
                'omc'=>'application/x-omc',
                'omcd'=>'application/x-omcdatamaker',
                'omcr'=>'application/x-omcregerator',
                'p'=>'text/x-pascal',
                'p10'=>'application/pkcs10',
                'p12'=>'application/pkcs-12',
                'p7a'=>'application/x-pkcs7-signature',
                'p7c'=>'application/pkcs7-mime',
                'p7m'=>'application/pkcs7-mime',
                'p7r'=>'application/x-pkcs7-certreqresp',
                'p7s'=>'application/pkcs7-signature',
                'part'=>'application/pro_eng',
                'pas'=>'text/pascal',
                'pbm'=>'image/x-portable-bitmap',
                'pcl'=>'application/x-pcl',
                'pct'=>'image/x-pict',
                'pcx'=>'image/x-pcx',
                'pdb'=>'chemical/x-pdb',
                'pdf'=>'application/pdf',
                'pfunk'=>'audio/make',
                'pgm'=>'image/x-portable-greymap',
                'pic'=>'image/pict',
                'pict'=>'image/pict',
                'pkg'=>'application/x-newton-compatible-pkg',
                'pko'=>'application/vnd.ms-pki.pko',
                'pl'=>'text/plain',
                'plx'=>'application/x-pixclscript',
                'pm'=>'text/x-script.perl-module',
                'pm4'=>'application/x-pagemaker',
                'pm5'=>'application/x-pagemaker',
                'png'=>'image/png',
                'pnm'=>'image/x-portable-anymap',
                'pot'=>'application/mspowerpoint',
                'pot'=>'application/vnd.ms-powerpoint',
                'pov'=>'model/x-pov',
                'ppa'=>'application/vnd.ms-powerpoint',
                'ppm'=>'image/x-portable-pixmap',
                'pps'=>'application/mspowerpoint',
                'ppt'=>'application/powerpoint',
                'ppz'=>'application/mspowerpoint',
                'pre'=>'application/x-freelance',
                'prt'=>'application/pro_eng',
                'ps'=>'application/postscript',
                'psd'=>'application/octet-stream',
                'pvu'=>'paleovu/x-pv',
                'pwz'=>'application/vnd.ms-powerpoint',
                'py'=>'text/x-script.phyton',
                'pyc'=>'application/x-bytecode.python',
                'qcp'=>'audio/vnd.qcelp',
                'qd3'=>'x-world/x-3dmf',
                'qd3d'=>'x-world/x-3dmf',
                'qif'=>'image/x-quicktime',
                'qt'=>'video/quicktime',
                'qtc'=>'video/x-qtc',
                'qti'=>'image/x-quicktime',
                'qtif'=>'image/x-quicktime',
                'ra'=>'audio/x-realaudio',
                'ram'=>'audio/x-pn-realaudio',
                'rast'=>'image/cmu-raster',
                'rexx'=>'text/x-script.rexx',
                'rf'=>'image/vnd.rn-realflash',
                'rgb'=>'image/x-rgb',
                'rm'=>'application/vnd.rn-realmedia',
                'rmi'=>'audio/mid',
                'rmm'=>'audio/x-pn-realaudio',
                'rmp'=>'audio/x-pn-realaudio',
                'rng'=>'application/ringing-tones',
                'rnx'=>'application/vnd.rn-realplayer',
                'roff'=>'application/x-troff',
                'rp'=>'image/vnd.rn-realpix',
                'rpm'=>'audio/x-pn-realaudio-plugin',
                'rt'=>'text/richtext',      
                'rtf'=>'text/richtext',
                'rtx'=>'text/richtext',
                'rv'=>'video/vnd.rn-realvideo',
                's'=>'text/x-asm',
                's3m'=>'audio/s3m',
                'saveme'=>'application/octet-stream',
                'sbk'=>'application/x-tbook',               
                'scm'=>'video/x-scm',
                'sdml'=>'text/plain',
                'sdp'=>'application/sdp',
                'sdr'=>'application/sounder',
                'sea'=>'application/sea',
                'sea'=>'application/x-sea',
                'set'=>'application/set',
                'sgm'=>'text/sgml',
                'sgml'=>'text/sgml',
                'sh'=>'text/x-script.sh',
                'shar'=>'application/x-bsh',
                'shtml'=>'text/html',
                'shtml'=>'text/x-server-parsed-html',
                'sid'=>'audio/x-psid',
                'sit'=>'application/x-sit',
                'skd'=>'application/x-koan',
                'skm'=>'application/x-koan',
                'skp'=>'application/x-koan',
                'skt'=>'application/x-koan',
                'sl'=>'application/x-seelogo',
                'smi'=>'application/smil',
                'smil'=>'application/smil',
                'snd'=>'audio/basic',
                'sol'=>'application/solids',
                'spc'=>'text/x-speech',
                'spl'=>'application/futuresplash',
                'spr'=>'application/x-sprite',
                'sprite'=>'application/x-sprite',
                'src'=>'application/x-wais-source',
                'ssi'=>'text/x-server-parsed-html',
                'ssm'=>'application/streamingmedia',
                'sst'=>'application/vnd.ms-pki.certstore',
                'step'=>'application/step',
                'stl'=>'application/sla',
                'stp'=>'application/step',
                'sv4cpio'=>'application/x-sv4cpio',
                'sv4crc'=>'application/x-sv4crc',
                'svf'=>'image/vnd.dwg',
                'svr'=>'application/x-world',
                'swf'=>'application/x-shockwave-flash',
                't'=>'application/x-troff',
                'talk'=>'text/x-speech',
                'tar'=>'application/x-tar',
                'tbk'=>'application/toolbook',
                'tcl'=>'application/x-tcl',
                'tcsh'=>'text/x-script.tcsh',
                'tex'=>'application/x-tex',
                'texi'=>'application/x-texinfo',
                'texinfo'=>'application/x-texinfo',
                'text'=>'text/plain',
                'tgz'=>'application/gnutar',
                'tif'=>'image/tiff',
                'tiff'=>'image/tiff',
                'tr'=>'application/x-troff',
                'tsi'=>'audio/tsp-audio',
                'tsp'=>'application/dsptype',
                'tsp'=>'audio/tsplayer',
                'tsv'=>'text/tab-separated-values',
                'turbot'=>'image/florian',
                'txt'=>'text/plain',
                'uil'=>'text/x-uil',
                'uni'=>'text/uri-list',
                'unis'=>'text/uri-list',
                'unv'=>'application/i-deas',
                'uri'=>'text/uri-list',
                'uris'=>'text/uri-list',
                'ustar'=>'multipart/x-ustar',
                'uu'=>'application/octet-stream',
                'uu'=>'text/x-uuencode',
                'uue'=>'text/x-uuencode',
                'vcd'=>'application/x-cdlink',
                'vcs'=>'text/x-vcalendar',
                'vda'=>'application/vda',
                'vdo'=>'video/vdo',
                'vew'=>'application/groupwise',
                'viv'=>'video/vivo',
                'vivo'=>'video/vivo',
                'vmd'=>'application/vocaltec-media-desc',
                'vmf'=>'application/vocaltec-media-file',
                'voc'=>'audio/voc',
                'vox'=>'audio/voxware',
                'vqe'=>'audio/x-twinvq-plugin',
                'vqf'=>'audio/x-twinvq',
                'vql'=>'audio/x-twinvq-plugin',
                'vrml'=>'application/x-vrml',
                'vrt'=>'x-world/x-vrt',
                'vsd'=>'application/x-visio',
                'vst'=>'application/x-visio',
                'vsw'=>'application/x-visio',
                'w60'=>'application/wordperfect6.0',
                'w61'=>'application/wordperfect6.1',
                'w6w'=>'application/msword',
                'wav'=>'audio/wav',
                'wb1'=>'application/x-qpro',
                'wbmp'=>'image/vnd.wap.wbmp',
                'web'=>'application/vnd.xara',
                'wiz'=>'application/msword',
                'wk1'=>'application/x-123',
                'wmf'=>'windows/metafile',
                'wml'=>'text/vnd.wap.wml',
                'wmlc'=>'application/vnd.wap.wmlc',
                'wmls'=>'text/vnd.wap.wmlscript',
                'wmlsc'=>'application/vnd.wap.wmlscriptc',
                'word'=>'application/msword',
                'wp'=>'application/wordperfect',
                'wp5'=>'application/wordperfect',
                'wp5'=>'application/wordperfect6.0',
                'wp6'=>'application/wordperfect',
                'wpd'=>'application/wordperfect',
                'wq1'=>'application/x-lotus',
                'wri'=>'application/mswrite',
                'wrl'=>'application/x-world',
                'wrz'=>'model/vrml',
                'wsc'=>'text/scriplet',
                'wsrc'=>'application/x-wais-source',
                'wtk'=>'application/x-wintalk',
                'xbm'=>'image/x-xbitmap',
                'xdr'=>'video/x-amt-demorun',
                'xgz'=>'xgl/drawing',
                'xif'=>'image/vnd.xiff',
                'xl'=>'application/excel',
                'xla'=>'application/excel',
                'xlb'=>'application/excel',
                'xlc'=>'application/excel',
                'xld'=>'application/excel',
                'xlk'=>'application/excel',
                'xll'=>'application/excel',
                'xlm'=>'application/excel',
                'xls'=>'application/excel',
                'xlt'=>'application/excel',
                'xlv'=>'application/excel',
                'xlw'=>'application/excel',
                'xm'=>'audio/xm',
                'xml'=>'text/xml',
                'xmz'=>'xgl/movie',
                'xpix'=>'application/x-vnd.ls-xpix',
                'xpm'=>'image/xpm',
                'x-png'=>'image/png',
                'xsr'=>'video/x-amt-showrun',
                'xwd'=>'image/x-xwd',
                'xyz'=>'chemical/x-pdb',
                'z'=>'application/x-compressed',
                'zip'=>'application/zip',
                'zoo'=>'application/octet-stream',
                'zsh'=>'text/x-script.zsh',
            );


    ########################
    #                      #
    # ██  ██ █████  ████   #
    # ██  ██ ██  ██  ██    #
    # ██  ██ ██  ██  ██    #
    # ██  ██ █████   ██    #
    # ██  ██ ██  ██  ██    #
    # ██  ██ ██  ██  ██ ██ #
    #  ████  ██  ██ ██████ #
    #                      #
    ########################    
    # getURL
    ###########################
    # return the current url
    ## Return : string
    public static function getURL(){
        $url = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] : 'https://'.$_SERVER["SERVER_NAME"];
        $url .= $_SERVER["SCRIPT_NAME"];
        return $url;
    }
    public static function getRoot($truncate=false) {
        $protocol = tools::isHTTPS() ? 'https://' : "http://";
        $servername = $_SERVER['HTTP_HOST'];
        $serverport = (preg_match('/:[0-9]+/', $servername) OR $_SERVER['SERVER_PORT'])=='80' ? '' : ':'.$_SERVER['SERVER_PORT'];
        $dirname = preg_replace('/\/(core|plugins)\/(.*)/', '', dirname($_SERVER['SCRIPT_NAME']));
        $racine = rtrim($protocol.$servername.$serverport.$dirname, '/').'/';
        $racine = str_replace(array('webroot/','install/'), '', $racine);
        if(!tools::checkSite($racine, false))
            die('Error: wrong or invalid url');
        if ($truncate){ 
            $root = substr($racine,strpos($racine, '://')+3,strpos($racine,basename($racine))+4);
            $racine = substr($root,strpos($root,'/'));
        }
        return $racine;
    }

    # getJsonFromURL
    ###########################
    # return the data form json recieved form url
    ## Return : string
    public static function getJsonFromURL($url=null){
        if ($url){
            return json_decode(tools::curlContent($url), JSON_OBJECT_AS_ARRAY);
        }
    }

    # curlContent
    ###########################
    ## $url as string
    ## Return : string
    public static function curlContent($url,$pretend=true){
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

    # rewriteUrl
    ###########################
    # rewrite url if needed
    ## $string as string
    ## Return : string
    public static function rewriteUrl($string){
        if (REWRITE_ENGINE){
            return str_replace(['index.php?f=','?f='],'f/',$string);
        }
        return $string;
    }

    # writeHtaccess
    ###########################
    # write or delete htaccess file for url rewriting
    ## $write as boolean
    public static function writeHtaccess($write=true){
        $rules='
            RewriteEngine On
            RewriteRule "f/([a-f0-9]{14})$" index.php?f=$1
        ';
        $htaccess=file_get_contents('.htaccess');
        if ($write){
            $htaccess.="\n$rules";
        }else{
            $htaccess=str_replace("\n$rules",'',$htaccess);
        }
        file_put_contents('.htaccess',$htaccess);
    }

    ########################
    #                      #
    # █████   ████  █████  #
    # ██  ██   ██   ██  ██ #
    # ██  ██   ██   ██  ██ #
    # ██  ██   ██   █████  #
    # ██  ██   ██   ██  ██ #
    # ██  ██   ██   ██  ██ #
    # █████   ████  ██  ██ #
    #                      #
    ########################
    
    # normalizeFileName
    ###########################
    ## $string as string
    ## Return : Null
    public static function normalizeFileName($string){return preg_replace('/[\"*\/\:<>\?|]/','',$string);}

    # deleteDir
    ###########################
    # delete directory & content
    ## $dir as string
    ## Return : null
    public static function deleteDir($dir){
        # delete a folder and its content
        if (is_dir($dir)) { 
            $objects = scandir($dir); 
            foreach ($objects as $object) { 
                if ($object != "." && $object != "..") { 
                    if (filetype($dir."/".$object) == "dir") self::deleteDir($dir."/".$object); else unlink($dir."/".$object); 
                } 
            } 
            reset($objects); 
            rmdir($dir); 
        }       
    }

    # addSlash
    ###########################
    # add a slash if needed
    ## $string as string
    ## Return : string
    public static function addSlash($string){
        if (substr($string,strlen($string)-1,1)!='/'&&!empty($string)){return $string.'/';}else{return $string;}
    }

    # baseName
    ###########################
    # basename without accent bug
    ## $file as string
    ## Return : string
    public static function baseName($file=''){
        $array=explode('/',$file);
        if (is_array($array)){return end($array);}else{return $file;}
    }

    # load
    ###########################
    # global load function (secured data save)
    public static function load($file=null){
        if (empty($file)){return false;}
        return (file_exists($file) ? unserialize(gzinflate(base64_decode(substr(file_get_contents($file),9,-strlen(6))))) : array() );
    }

    # save
    ###########################
    # global save function
    ## $file as string
    ## $data as array
    ## Return : boolean
    public static function save($file=null,$data=null){
        if (empty($file)){return false;}
        if (empty($data)){$data=array();}
        return file_put_contents($file, '<?php /* '.base64_encode(gzdeflate(serialize($data))).' */ ?>');
    }

    # dirContent
    ###########################
    # return the files & folders in a directory
    ## $path as string
    ## $patttern as string
    ## Return : array
    public static function dirContent($path=null){
        if (empty($path)){return false;}
        $list=glob($path);
        natcasesort($list);
        return $list;
    }

    # dirFolders
    ###########################
    # return the folders in a directory
    ## $path as string
    ## Return : array
    public static function dirFolders($path=null){
        if (empty($path)){return false;}
        if (empty($path)){return false;}
        if($path=='/'){$path='';}
        $liste = array();
        $pattern=str_replace('*','',$pattern);
        if ($handle = opendir($path)) {
            while (false !== ($file = readdir($handle))) {
                if(is_dir($file) && $file!='.' && $file!='..') {
                    $liste[] = $path.$file;
                }
            }
            closedir($handle);
        }
        natcasesort($liste);
        return $liste;
    }

    # recursiveDirContent
    ###########################
    # return the files & folders in a directory & all subdirectories
    # http://stackoverflow.com/questions/14304935/php-listing-all-directories-and-sub-directories-recursively-in-drop-down-menu
    ## $path as string
    ## Return : array
    public static function recursiveDirContent($root=null){
        if (empty($root)){return false;}
        if (!is_dir($root)){return array($root);}
        $iter = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($root, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST,
            \RecursiveIteratorIterator::CATCH_GET_CHILD # Ignore "Permission denied"
        );

        $paths = array($root);
        foreach ($iter as $path => $dir) {      
            $paths[] = $path; 
        }

        return $paths;
    }

    # recursiveDirFolders
    ###########################
    # return the folders in a directory & all subdirectories
    ## $path as string
    ## Return : array
    public static function recursiveDirFolders($path=null){
        if (empty($path)){return false;}
        if (!isset($folders[0]) || $folders[0]!=$path){$folders[0]=$path;}
        $list=dirContent($path);         
        foreach ($list as $folder) {
            if (is_dir($folder)){
                $folders=array_merge($folders,recursiveDirFolders($folder));
                $structured[$folder]=recursiveDirFolders($folder);
            }
        }
        return $folders;
    }
    # extension
    ###########################
    # return file extension
    ## $src as string
    ## Return : boolean
    public static function extension($file=null){
        if (is_array($file)){$file=$file[0];}
        $ext= strtolower(pathinfo($file,PATHINFO_EXTENSION));

        return $ext;
    }

    # getMime()
    ###########################
    ## return mime type
    ## Return : Null
    public static function getMime($file=null){
        if (!$file){return false;}
        
        $ext=self::extension($file);
        if (array_key_exists($ext, self::$mime_types)) {
            return self::$mime_types[$ext];
        }elseif(function_exists('mime_content_type')){
            return mime_content_type($file);
        }else{
            return 'application/octet-stream';
        }
        
    }


    ###########################################################
    #                                                         #
    #  ████  ██████  ████  ██  ██ █████   ████  ██████ ██  ██ #
    # ██  ██ ██     ██  ██ ██  ██ ██  ██   ██   █ ██ █ ██  ██ #
    #  ██    ██     ██     ██  ██ ██  ██   ██     ██   ██  ██ #
    #   ██   █████  ██     ██  ██ █████    ██     ██    ████  #
    #    ██  ██     ██     ██  ██ ██  ██   ██     ██     ██   #
    # ██  ██ ██     ██  ██ ██  ██ ██  ██   ██     ██     ██   #
    #  ████  ██████  ████   ████  ██  ██  ████   ████    ██   #
    #                                                         #
    ###########################################################
    # sanitizeData
    ###########################
    # secure all $data 
    ## $data
    ## Return : $data
    public static function sanitizeData($data=null){
        if (is_string($data)){
            return str_replace(["\0",'\\','[',']','{','}',';',':','$','='],'',htmlentities(strip_tags($data), ENT_QUOTES));
        }else if (is_array($data)){
            return array_map('self::sanitizeData',$data);
        }
        return $data;
    }

    # sanitizePaths
    ###########################
    # secure all path $data 
    ## $data
    ## Return : $data
    public static function sanitizePaths($data=null){
        if (is_string($data)){
            return strip_tags(str_replace("\0",'',$data));
        }else if (is_array($data)){
            return array_map('self::sanitizePaths',$data);
        }
        return $data;
    }


    # isHttps
    ###########################
    # detects https
    ## Return : boolean
    public static function isHttps(){
        return (!empty($_SERVER['HTTPS']) AND $_SERVER['HTTPS'] == 'on') ? true : false;
    }


    # checkSite
    ###########################
    # check the url
    ## $site as string
    ## Return : boolean
    public static function checkSite($site=null, $reset=true){ 
        if (!$site){return false;}  
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

    # generateSalt
    ###########################
    ## $length as integer [optional]
    ## Return : Null
    public static function generateSalt($length=512){
        $salt='';
        $chars='abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ@-!_';
        $count=strlen($chars)-1;
        for($i=1;$i<=$length;$i++){
            $salt.=$chars[mt_rand(0,$count)];
        }
        return $salt;
    }

    # hash
    ###########################
    ## $string as string [optional]
    ## $salt as string [optional]
    ## Return : string
    ## can be used to generate a long random string
    public static function hash(string $string=null,string $salt=null){
        if (empty($salt)&&!empty(SYSTEM_SALT)){$salt=SYSTEM_SALT;}
        if (empty($string)||empty($salt)){$string=uniqid('',true);}
        return hash('sha512', $salt.$string);
    }

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
  
    # set all contextes in instances
    public static function setInstancesContext(&$context=[]){
        foreach ($context as $name => $object) {
            if (method_exists($object,'setContext')){
                $object->setContext($context);
            }
        }
    }    
    public static function handlePostInstances(&$context=[]){
        foreach ($context as $name => $object) {
            if (method_exists($object,'handlePost')){
                $object->handlePost();
            }
            if (method_exists($object,'handleGet')){
                $object->handleGet();
            }
        }
    }    

    # get the classe's instance name from the given context
    public static function getClassInstance(&$context=[],$searched_class='@'){
        $return_value=false;
        $searched_class=strtolower($searched_class);
        foreach ($context as $name => $object) {
            if (!is_object($object)){continue;}
            if (strtolower(get_class($object))==$searched_class){
                $return_value=$object;
                break;
            }
        }
        return $return_value;
    }
 
    # return default language
    public static function lang($default='fr-fr'){
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
            return strtolower(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']));
        }else{return $default;}
    }

    # detect if request is from ajax or not
    public static function isAjax()
    {
        return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }
  
    # define a constant if it's not defined
    public static function defineIfUndefined($constant,$value)
    {
        if (!defined($constant)) {
            define($constant,$value);
        }
    }

    # detect mobile (maybe obsolete)
    public static function isMobile(){
      if(preg_match('#android|webos|iphone|ipad|ipod|blackberry|windows phone#i', $_SERVER ['HTTP_USER_AGENT'])){
        return 'mobile';
      }
      return 'desktop';
    }
    
    # toOctet
    ###########################
    # convert to octet
    public static function toOctet($size=null,$default_unit=null){
        if (!$size){return;}
        $nb=intval($size);
        if (
               stripos($size, 'k')===false
            && stripos($size, 'm')===false
            && stripos($size, 'g')===false
        ){
            if ($default_unit){$size.=$default_unit;}
            else{return $nb;}
        }
        if (empty($nb)){return 0;}
        if (stripos($size, 'k')!==false){return $nb*(1024);}
        if (stripos($size, 'm')!==false){return $nb*(1024*1024);}
        if (stripos($size, 'g')!==false){return $nb*(1024*1024*1024);}
    }

    # mkIndexFile()
    ###########################
    ## create an index.html file in the path
    public static function mkIndexFile($path=null){     
        if (!$path||!is_dir($path)){return;}
        return file_put_contents($path, '<html><head><meta http-equiv="refresh" content="0; url='.$this->getURL().'" /></head></html>');
    }
        
    public static function getImageSize($img=null){
        if(!$img){return false;}
        $size=getImageSize($img);
        
        if (!empty($size)){
            return $size=$size[0].'x'.$size[1];
        }
        return false;
    }

    # unsetFirstElement
    ###########################
    ## Return : string
    public static function unsetFirstElement($array=null){
        if (!$array){return false;}
        $first=array_keys($array);$first=$first[0];
        unset($array[$first]);
        return $array;  
    }

    public static function makeRSSdate($date=NULL){// format DD-MM-YY HH:MM => rfc2822 (rss compatible)
        if ($date){
            date_default_timezone_set('Europe/Paris');
            $time = strtotime($date);
            return date("r", $time);
        }
    }
    public static function no_nl($string){$tab = array( CHR(13) => " ", CHR(10) => " " ); return strtr($string,$tab); }
    
    public static function hex2rgba($color,$transparency=1){
        $color=str_replace('#','',$color);
        if (strlen($color)==3){
            $color=$color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
        }
        $RGB=array();
        $RGB['r']=hexdec(substr($color, 0,2));
        $RGB['g']=hexdec(substr($color, 2,2));
        $RGB['b']=hexdec(substr($color, 4,2)); 
        return 'rgba('.$RGB['r'].','.$RGB['g'].','.$RGB['b'].','.$transparency.')';

    }    

    ######################################
    #                                    #
    # █████  ██████ █████  ██  ██  ████  #
    # ██  ██ ██     ██  ██ ██  ██ ██  ██ #
    # ██  ██ ██     ██  ██ ██  ██ ██     #
    # ██  ██ █████  █████  ██  ██ ██ ███ #
    # ██  ██ ██     ██  ██ ██  ██ ██  ██ #
    # ██  ██ ██     ██  ██ ██  ██ ██  ██ #
    # █████  ██████ █████   ████   ████  #
    #                                    #
    ######################################
    public static function log($txt='',$var=null){
        $report='<h2>'.date('D d y, H:i:s').'</h2>';
        $report.='<h3>'.$txt.'</h3>';
        if ($var){$txt.="\n<pre>".var_dump($var)."</pre>\n";}
        $dat=debug_backtrace();
        
        foreach ($dat as $num=>$data){
            
            if (!empty($data['line'])){
                $dir=dirname($data['file']).'/';
                $fil=basename($data['file']);
                $report.='<br/>             
                        <span style="color:grey">'.$num.' - </span>
                        <em style="color:#888">'.$dir.'</em>                
                        <em style="color:black;font-weight:bold">'.$fil.'</em>
                        <em style="color:blue;font-weight:bold">l. '.$data['line'].'</em> 
                        <em style="color:orange;font-weight:bold"> -> '.$data['function'].'()</em>                  
                        
                    ';
            }
        }
        $report.='<hr/>';
        file_put_contents('logfile.html', $report, FILE_APPEND);
    }
    public static function dump(){       
            $dat=debug_backtrace();
            $vars=func_get_args();
            $origin='';
            foreach ($vars as $name=>$val){
                ob_start();
                var_dump($vars[$name]);
                $var_dump = ob_get_contents();
                ob_end_clean();
                $var_dump=nl2br($var_dump);
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
                echo '<div style="background-color:rgba(0,0,0,0.6);color:red;padding:5px"><h2>dump à la ligne <em><strong style="color:white;font-weight:bold">'.$dat[0]['line'].'</strong></em> dans le fichier <em style="color:white;font-weight:bold">'.$dat[0]['file'].'</em></h2>';
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
            echo '<div style="background-color:rgba(0,0,0,0.6);color:#aaa;padding:10px"><h3> Pile d\'appels </h3>'.$origin.'</div></div>';
            
        }
        
    public static function aff($stop=true){       
            $dat=debug_backtrace();
            $vars=func_get_args();
            $origin='';
            foreach ($vars as $name=>$val){
                ob_start();
                var_dump($vars[$name]);
                $var_dump = ob_get_contents();
                ob_end_clean();
                $var_dump=nl2br($var_dump);
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
        
        public static function t($chrono_name=''){

            if ($chrono_name===''){
                echo '<h1> Total:</h1>';
                foreach($_SESSION['total'] as $name=>$nb){
                    echo '<li>'.$name.': '.round($nb,4).'</li>';
                }
                return;
            }

            if ($chrono_name===false){
                if(!empty($_SESSION['total'])){unset($_SESSION['total']);}
                if(!empty($_SESSION['chrono'])){unset($_SESSION['chrono']);}
                return;
            }

            $t=round(microtime(true),5);
            if (empty($_SESSION['chrono'][$chrono_name])){
                $_SESSION['chrono'][$chrono_name]=$t;
            }else{
                $r=round(($t-$_SESSION['chrono'][$chrono_name]),4);
                echo $chrono_name.': '.$r.' s<br/>';

                if (empty($_SESSION['total'][$chrono_name])){
                    $_SESSION['total'][$chrono_name]=$r;
                }else{
                    $_SESSION['total'][$chrono_name]+=$r;
                }

                unset($_SESSION['chrono'][$chrono_name]);
            }
        }



}