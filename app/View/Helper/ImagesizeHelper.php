<?php  
/* Helper to auto resize images, cache them and display them as called */ 

class ImagesizeHelper extends AppHelper 
{ 
    /* 
     * Array of all available image types 
     */ 
    var $type = array( 
        1 => 'gif', 
        2 => 'jpg', 
        3 => 'png' 
    ); 
     
    /* 
     * Tmp folder location for thumbs 
     */ 
    PUBLIC $tmpLocation = null; 
     
    /* Construct 
     * Link $tmpLocation to the appropriate location as well as check if folder exists and is writable, if not
     * create folder and change permissions 
     *  
     */ 
    function __construct(){  
         
        $dir = App::pluginPath('PageManager'). 'webroot'. DS . 'files' . DS . 'cache' . DS . 'thumbs' . DS; 
        if(!is_dir($dir)){ 
            mkdir(App::pluginPath('PageManager'). 'webroot'. DS . 'files' . DS . 'cache' . DS . 'thumbs' . DS, 0774, true); 
            chmod(App::pluginPath('PageManager'). 'webroot'. DS . 'files' . DS . 'cache' . DS . 'thumbs' . DS, 0777); 
        } 
         
        $this->tmpLocation = App::pluginPath('PageManager'). 'webroot'. DS . 'files' . DS . 'cache' . DS . 'thumbs' . DS; 
    } 
     
     
    /* Crop 
     * crop image passed through, if no image is passed return false  
     *  
     */ 
     
    function crop($obj = null, $width = 100, $height = 100)  
    { 
         
        $file = App::pluginPath('PageManager'). 'webroot'. DS . $obj; 
        $name = substr($obj, strrpos($obj, '/') + 1); 
             
        // assure that file exists 
        if(is_file($file)){ 
            list($w, $h, $type) = getimagesize($file); 
            // if the file is an image and not a swf or undetermined file 
            if($type){ 
                 
                $name = $width . 'x' . $height . '_' . $name; 
                // check that file does not exist, if it does return image otherwise proceed
                if($this->checkFile($name)){ 
                 
                    // get file ext for ease of use 
                    $fileType = $this->type[$type]; 
                    //loop through file type and prepare image for cropping 
                    switch($fileType) { 
                        case 'gif': 
                            $img = imagecreatefromgif($file); 
                            break; 
                        case 'jpg': 
                            $img = imagecreatefromjpeg($file); 
                            break; 
                        case 'png': 
                            $img = imagecreatefrompng($file); 
                            break; 
                    } 
                     
                    // determine larger side and size both appropriately 
                    if($w > $h){ 
                        if($width > $height){ 
                            $ratio = $h/$width; 
                        } else { 
                            $ratio = $h/$height; 
                        } 
                    } else { 
                        if($width > $height){ 
                            $ratio = $w/$width; 
                        } else { 
                            $ratio = $w/$height; 
                        } 
                    } 
                    $new_width = round($w/$ratio); 
                    $new_height = round($h/$ratio); 
                     
                    // determine how far in to middle the crop should begin 
                    $src_x = ($new_width - $width) / 2; 
                    $src_y = ($new_height - $height) / 2; 
                     
                    // create thumb placeholder and then create image 
                    $thumb = imagecreatetruecolor($width, $height); 
                    imagecopyresized($thumb, $img, 0, 0, $src_x, $src_y, $new_width, $new_height, $w, $h);
                     
                    imagejpeg($thumb, $this->tmpLocation . $name, 100); 
                     
                } 

                return '<img src="'.$this->webroot.'/files/cache/thumbs/' . $name . '" rel="notprocessed">';
                 
            } else { 
                $fileType = substr($file, strrpos($file, '.') + 1); 
                return 'There is no preview for file ' . $name; 
            } 
        } else { 
            return false; 
        } 
    } 
     
	 function resize_img($imgname, $size, $filename) {
	 if(!file_exists(App::pluginPath('PageManager'). 'webroot'. DS . 'img' . DS .$filename)){
                $filetype = $this->getFileExtension(App::pluginPath('PageManager'). 'webroot'. DS . 'img' . DS .$imgname);
                $filetype = strtolower($filetype);
 
                switch($filetype) {
                        case "jpeg":
                        case "jpg":
                        $img_src = ImageCreateFromjpeg (App::pluginPath('PageManager'). 'webroot'. DS . 'img' . DS .$imgname);
                        break;
                        case "gif":
                        $img_src = imagecreatefromgif (App::pluginPath('PageManager'). 'webroot'. DS . 'img' . DS .$imgname);
                        break;
                        case "png":
                        $img_src = imagecreatefrompng (App::pluginPath('PageManager'). 'webroot'. DS . 'img' . DS .$imgname);
                        break;
                }
 
                $true_width = imagesx($img_src);
                $true_height = imagesy($img_src);
 
                // if ($true_width>=$true_height)
                // {
                //         $width=$size;
                //         $height = ($width/$true_width)*$true_height;
                // }
                // else
                // {
                        $height=$size;
                        $width = ($height/$true_height)*$true_width;
                // }

                $img_des = ImageCreateTrueColor($width,$height);
                imagecopyresampled ($img_des, $img_src, 0, 0, 0, 0, $width, $height, $true_width, $true_height);
 
                // Save the resized image
                switch($filetype)
                {
                        case "jpeg":
                        case "jpg":
                         imagejpeg($img_des,App::pluginPath('PageManager'). 'webroot'. DS . 'img' . DS .$filename,80);
                         break;
                         case "gif":
                         imagegif($img_des,App::pluginPath('PageManager'). 'webroot'. DS . 'img' . DS .$filename,80);
                         break;
                         case "png":
                         imagepng($img_des,App::pluginPath('PageManager'). 'webroot'. DS . 'img' . DS .$filename,7);
                         break;
                }
				}
		if(file_exists(App::pluginPath('PageManager'). 'webroot'. DS . 'img' . DS .$filename)){
		return $filename;
		}
        }
    /* Check File 
     * Check if file exists, if it does NOT then return true, else, return false 
     *  
     */ 
	     function getFileExtension($str) {
 
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }
	
	
     
    function checkFile($name){ 
        if(is_file($this->tmpLocation . $name)){ 
            return false; 
        } else { 
            return true; 
        } 
    } 
     
} 
?>