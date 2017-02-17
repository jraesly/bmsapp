<?php
require 'boot.php';
Acl::isAllowed('automatic-update.php');
$self='automatic-update.php';
$cmd = _get('_cmd');
$local_version=$config['SoftwareVersion'];
//checking for updates
$versioninfo= file_get_contents('http://www.bmsapp.com/bm/core/versioninfo.php');
$obj = json_decode($versioninfo);
$local_version=$config['SoftwareVersion'];
//checking for updates

$remote_version = $obj->{'version'};
$file= '../updates.zip';
if ($cmd=='Run'){
//download and extract
if(!class_exists('ZipArchive')) {
r2($self,'e','It seems that Zip extension support is not enabled in your hosting!');   

    }


$fromUrl='http://www.bmsapp.com/bm/core/'.$obj->{'version_files'};
$client = curl_init($fromUrl);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, TRUE);

    $fileData = curl_exec($client);
curl_close($client);
file_put_contents($file, $fileData);
$zip = new ZipArchive;
    if ($zip->open('../updates.zip') === TRUE) {
      $zip->extractTo('../');
    $zip->close();

        unlink($file);  
        
$conf = ORM::for_table('appconfig')->where('setting', 'SoftwareVersion')->find_one();
    $conf->set('value', $remote_version);
    $conf->save();  
r2($self,'s','Update is completed');


    } else {
            
            unlink($file);
      r2($self,'e','There was a problem. Please try again!');   
        
    }  

//r2($self,'e','There was a problem. Please try again!'); 

}

if ($local_version==$remote_version) {$updates='Your Software is Up To Date ! <br> Your Software Version: '.$local_version;
$submittxt = '<input type="submit" disabled="disabled" class="btn btn-primary" name="submit" id="submit" value="No Updates Available" />';
}
else {
$version_info = $obj->{'info'}; 
//
/**
 * $pieces = explode(".", $local_version);
 * $lv1= $pieces[0]; 
 * $lv2= $pieces[1]; 
 * $lv3= $pieces[2]; 
 * //
 * $pieces = explode(".", $remote_version);
 * $rv1= $pieces[0]; 
 * $rv2= $pieces[1]; 
 * $rv3= $pieces[2]; 
 */
$updates="A New Updates is Available. Your Current Version is <strong> $local_version </strong> and The New Version is <strong> $remote_version </strong> </br>
<strong>==Changelog==</strong></br>
$version_info </br>



";
$submittxt = '<input type="submit"  class="btn btn-danger" name="submit" id="submit" value="Click Here For Update" />';
}
require ("views/$gat/automatic-update.tpl.php");