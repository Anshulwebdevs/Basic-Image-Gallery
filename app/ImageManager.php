<?php

class ImageManager{
    private $originaldir = null;
    private $thumbdir = null;
    private $datadir = null;
    public function __construct(){
        if(defined('ORIGINAL_PATH') && defined('DATA_DIR')){
            $this->originaldir = DATA_DIR.ORIGINAL_PATH;
        }
        if(defined('THUMBNAIL_PATH') && defined('DATA_DIR')){
            $this->thumbdir = DATA_DIR.THUMBNAIL_PATH;
        }
    }

    /**
     * this function saves uploaded images and their thumbnails
     * takes $_FILES array as argument
    */
    public function saveimage($file){
        $rand = md5(rand(1,9999)*rand(1,9999));
        $thumbname = $this->thumbdir.$rand."_thumb.jpg";
        $name = $this->originaldir.$rand.".jpg";
        if($file["type"] == 'image/jpeg'){
            move_uploaded_file($file["tmp_name"],$name);
            $file = imagecreatefromjpeg($name);
            $percent = 0.5;
            $width = imagesx($file);
            $height = imagesy($file);
            $newwidth = $width * $percent;
            $newheight = $height * $percent;
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresized($thumb, $file, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            imagejpeg($thumb,$thumbname);
            imagedestroy($thumb);
            imagedestroy($file);
        }
    }


}