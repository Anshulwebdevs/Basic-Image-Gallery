<?php
require_once("app/config.php");
require_once("app/ImageAPI.php");

if(isset($_GET['thumbs']) && $_GET['thumbs']==-1){
    $data = scandir(DATA_DIR.THUMBNAIL_PATH);
    $outdata = ["data"=>[],"error"=>0,"message"=>""];
    foreach ($data as $key => $value) {
        if($value == "." || $value == ".."){
            unset($data[$key]);
        }else{
            $outdata["data"][] = DATA_DIR.THUMBNAIL_PATH.$value;
        }
    }
    echo json_encode($outdata);
    //$data = ["data" => $data, "error" => 0, "message" => ""];
    //return json_encode($outdata);
    //echo json_encode($data);
}
else if(isset($_GET['originals']) && $_GET['originals']==-1){
    $data = scandir(DATA_DIR.ORIGINAL_PATH);
    foreach ($data as $key => $value) {
        if($value == "." || $value == ".."){
            unset($data[$key]);
        }else{
            $data[$key] = DATA_DIR.ORIGINAL_PATH.$data[$key];
        }
    }
    $data = ["data" => $data, "error" => 0, "message" => ""];
    echo json_encode($data);
}






