<?php

class image {
	// upload image
	public function upload($filevar, $path, $fname){

		 $folder = $path;
       
         if(isset($_FILES[$filevar]['tmp_name'])){
            
                $_FILES[$filevar]['name'] = array( 0 => $_FILES[$filevar]['name']);
                $_FILES[$filevar]['tmp_name'] = array( 0 => $_FILES[$filevar]['tmp_name']);
                // valid exts
                $valid_formats = array("jpg", "jpeg", "JPG", "JPEG", "png", "PNG", "gif", "GIF");
                if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
                  
                   $uploaddir =  $folder; //Image upload directory
                    foreach ($_FILES[$filevar]['name'] as $name => $value){
                        $filename = stripslashes($_FILES[$filevar]['name'][$name]);
                        // get image ext
                        $ext = $this->getExtension($filename);
                        $ext = strtolower($ext);
                       
                        $newname = $folder.$fname.".".$ext;
                      
                        // validate ext
                        if(in_array($ext,$valid_formats)){
                                @move_uploaded_file($_FILES[$filevar]['tmp_name'][$name], $newname);
                                $this->thumbnails('./'.$newname, './'.$folder.$fname.".".$ext , 1 , 0, 100, 320, 0);
                                return $folder.$fname.".".$ext;
                        }else{
              
                           return -1;;
                        }
                        
                    }    
                }else{
                    return -2;
                }

            }
	}
	// Get file ext
 	private function getExtension($str){
	    $i = strrpos($str, ".");
	    if (!$i) { 
	        return ""; 
	    }
	    $l = strlen($str) - $i;
	    $ext = substr($str, $i+1, $l);
	    return strtolower($ext);
	}

	// resize image (by max width)
	public function thumbnails($f, $p, $t = 1, $s = 0, $q = 90, $w = 320, $h = 0) { 
 
        // f - filemane 
        // p - resultfilename
        // w - width 
        // q - quality

        // t - 1
         
        if (empty($p)) die("No thumbnail name in \$p"); 
         
        list($width, $height, $type, $attr) = @getimagesize($f); 
        if (!$type) $type = 1; 
  
         
        if (!file_exists($f)) 
        { 
        $src = @imagecreatefrompng("resize_error.png") or die ("Cannot Initialize new GD image stream"); 
        $s = 0; 
        } 
        else 
        { 
         switch ($type) 
         { 
             case 1: //header("Content-type: image/gif"); 
                     $src = imagecreatefromgif($f) or die ("Cannot Initialize new GD image stream"); 
                     break; 
             case 2: //header("Content-type: image/jpeg"); 
                     $src = imagecreatefromjpeg($f) or die ("Cannot Initialize new GD image stream"); 
                     break; 
             case 3: //header("Content-type: image/png"); 
                     $src = imagecreatefrompng($f) or die ("Cannot Initialize new GD image stream"); 
                     break; 
         } 
        } 
        
        $w_src = imagesx($src); 
        $h_src = imagesy($src); 
         
        if ($t == 1)   // resize by width
        { 
                   $ratio = $w_src/$w; 
                   $w_dest = round($w_src/$ratio); 
                   $h_dest = round($h_src/$ratio); 
                   // Create empty image
                   $dest = @imagecreatetruecolor($w_dest,$h_dest) or die("Cannot Initialize new GD image stream"); 
                   if($type==3){
                        imagecolortransparent($dest, imagecolorallocate($dest, 255, 255, 255));
                        imagecolortransparent($src, imagecolorallocate($dest, 255, 255, 255));
                        imagealphablending($src, false);
                        imagesavealpha($dest, true);
                        imagealphablending($dest, false);
                        imagesavealpha($dest, true);
                   }else{

                       $white = imagecolorallocate($dest, 255, 255, 255); 
                       imagefill($dest,1,1,$white); 
                    }
                   imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src); 
        } 

        if (!file_exists($f)) 
        { 
         header("Content-type: image/png"); 
         $black = imagecolorallocate($dest, 0, 0, 0); 
         imagerectangle($dest,0,0,$w-1,$w-1,$black); 
         imagepng($dest); 
         exit; 
        } 

         switch ($type) 
         { 
             case 1: imagegif($dest, $p); break; 
             case 2: imagejpeg($dest, $p, $q); break; 
             case 3: imagepng($dest, $p); break; 
         } 
        imagedestroy($dest); 
        imagedestroy($src); 
         
        return true; 
         
    }
    
   
}