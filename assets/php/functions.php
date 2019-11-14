<?php 
# A TRANSFERER DANS TOOLS SI UTILE



######################################
#                                    #
# ██████  ████  ████   ██████  ████  #
# ██       ██    ██    ██     ██  ██ #
# ██       ██    ██    ██      ██    #
# █████    ██    ██    █████    ██   #
# ██       ██    ██    ██        ██  #
# ██       ██    ██ ██ ██     ██  ██ #
# ██      ████  ██████ ██████  ████  #
#                                    #
######################################

function upload($tmp_name,$file_name){
    $img=strip_tags($file_name);
    $tmp=strip_tags($tmp_name);
    if (checkMime($tmp)){
        rename($tmp, $img );
        chmod($img,0644);
        resizeImg($img);
    }
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
function str_replace_first($search, $replace, $subject) {
    $pos = strpos($subject, $search);
    if ($pos !== false) {
        return substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}

function resizeImg($path){
      $motif='#\.(jpe?g|png|gif)#i'; 
      
      if (!file_exists($path)){return false;}

      $size = getimagesize($path);
      $src_width=$size[0];
      $src_height=$size[1];
      if ($src_width>IMG_MAX_WIDTH){
            $width=IMG_MAX_WIDTH;    
            $ratio=$src_width/$src_height;
            $height=round($width/$ratio);

            $file = pathinfo($path);
            $extension=str_ireplace('jpg','jpeg',$file['extension']);            
            
            $function='imagecreatefrom'.$extension;
            $src  = $function($path); 

            $resized = imagecreatetruecolor($width,$height);

            if( $extension=='png' ){imagealphablending($resized,false);imagesavealpha($resized,true);}
            if( $extension=='gif'  && @imagecolortransparent($path)>=0 ){
                  $transparent_index = @imagecolortransparent($path);
                  $transparent_color = @imagecolorsforindex($path, $transparent_index);
                  $transparent_index = imagecolorallocate($resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
                  imagefill($resized, 0, 0, $transparent_index);
                  imagecolortransparent($resized, $transparent_index);
            }
            
            imagecopyresampled($resized,$src,0,0,0,0,$width,$height,$src_width,$src_height);
            $function='image'.$extension;
            $function($resized, $path);
            imagedestroy($resized);
            return true;
      }
}