<?php
Class Upload {
   public static function getExtension($file=array()) {
       $filename = basename($file['name']);
        $i = strrpos($filename,".");
        if (!$i) { return ""; }
        $l = strlen($filename) - $i;
        $ext = substr($filename,$i+1,$l);
       $ext = strtolower($ext);
        return $ext;
    }
public static function img($file=array(),$ext,$name=''){
    global $self;
    $filename = basename($file['name']);
    $filename= str_replace(" ", "-", $filename);
    $tname=time();
    $newname="$name"."_"."_"."$tname"."$filename";
        $uploadto="../assets/uploads/$newname";
    if ((move_uploaded_file($file['tmp_name'],$uploadto))) {
        return $newname;

    }
    else {
        r2($self,'e','An Error Occured');
    }

    if (($ext== "jpg") OR ($ext=="jpeg") OR ($ext== "png") OR ($ext== "gif")) {

    }
    else {
        r2($self,'e','File Type Not Supported');
    }
}

}