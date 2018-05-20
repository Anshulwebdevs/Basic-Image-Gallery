<?php

class ImageAPI{
    private $originaldir;
    private $thumbdir;
    public function __contruct(){
        if(defined('ORIGINAL_PATH') && defined('DATA_DIR')){
            $this->originaldir = DATA_DIR.ORIGINAL_PATH;
        }
        if(defined('THUMBNAIL_PATH') && defined('DATA_DIR')){
            $this->thumbdir = DATA_DIR.THUMBNAIL_PATH;
        }
    }
    public function get_thumbnails(){
        
    }
}