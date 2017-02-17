<?php
require ('boot.php');
$self = 'settings'.EXT.'#business.profile';
if ($xstage=='Demo'){
r2($self,'e','Changing Settings is disabled in the Demo Mode');
}
$action = _post('action');
if ($action=='business-profile'){
    
   
    
$company = _post('company');

if($company!=''){
    $conf = ORM::for_table('appconfig')->where('setting', 'CompanyName')->find_one();
    $conf->set('value', $company);
    $conf->save();  
}
    
$email = _post('email');    
if($email!=''){
    $conf = ORM::for_table('appconfig')->where('setting', 'Email')->find_one();
    $conf->set('value', $email);
    $conf->save();  
} 
$caddress = $_POST['caddress'];
 if($caddress!=''){
    $conf = ORM::for_table('appconfig')->where('setting', 'caddress')->find_one();
    $conf->set('value', $caddress);
    $conf->save();  
} 

$appurl = _post('appurl');
if($appurl!=''){
    $conf = ORM::for_table('appconfig')->where('setting', 'sysUrl')->find_one();
    $conf->set('value', $appurl);
    $conf->save();  
} 
//file
if (!empty($_FILES["file"]["name"])) {

          $errors=0; 
 define ("MAX_SIZE","400");
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }


 
 	$image =$_FILES["file"]["name"];
	$uploadedfile = $_FILES['file']['tmp_name'];
     
 
 	if ($image) 
 	{
 	
 		$filename = stripslashes($_FILES['file']['name']);
 	
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
		
		
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		
 			$change='<div class="msgdiv">Unknown Image extension </div> ';
 			$errors=1;
 		}
 		else
 		{

 $size=filesize($_FILES['file']['tmp_name']);


if ($size > MAX_SIZE*1024)
{
	$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
	$errors=1;
}


if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);

}
else if($extension=="png")
{
$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);

}
else 
{
$src = imagecreatefromgif($uploadedfile);
}

list($width,$height)=getimagesize($uploadedfile);
 /////////////////////////////////////
 
 
 //////////////////////////////////////
 if ($width>128)  {
 $newwidth=128;
 }
 else {
  $newwidth=$width;  
 }
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);   



imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

//imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);


$filename = "../assets/uploads/logo.$extension";

//$filename1 = "uploads/small". $_FILES['file']['name'];



imagejpeg($tmp,$filename,100);

//imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
//imagedestroy($tmp1);
}}



//If no errors registred, print the success message
 if(!$errors) 
 {
 
 //exit ("image uploaded");
     r2($self,'s','Logo Uploaded successfully');
     //$change=' <div class="msgdiv">Image Uploaded Successfully!</div>';
 }
    else {
        r2($self,'e','An error occured when uploading the logo');
    }
}

//    
  
}

elseif($action=='localization'){

$country = _post('country');
  if($country!=''){
    $conf = ORM::for_table('appconfig')->where('setting', 'defaultcountry')->find_one();
    $conf->set('value', $country);
    $conf->save();  
}
$currency = _post('currency');
if($currency!=''){
    $conf = ORM::for_table('appconfig')->where('setting', 'defaultcurrency')->find_one();
    $conf->set('value', $currency);
    $conf->save();  
}
$defaultcurrencysymbol = _post('defaultcurrencysymbol');
if($defaultcurrencysymbol!=''){
    $conf = ORM::for_table('appconfig')->where('setting', 'defaultcurrencysymbol')->find_one();
    $conf->set('value', $defaultcurrencysymbol);
    $conf->save();  
}
$defaultclientlanguage = _post('defaultclientlanguage');
if($defaultclientlanguage!=''){
    $conf = ORM::for_table('appconfig')->where('setting', 'defaultclientlanguage')->find_one();
    $conf->set('value', $defaultclientlanguage);
    $conf->save();  
}


 r2($self,'s','Settings saved successfully');  
}

elseif($action=='websiteconfig'){

$websitetitle = _post('websitetitle');
  if($websitetitle!=''){
    $conf = ORM::for_table('appconfig')->where('setting', 'WebsiteTitle')->find_one();
    $conf->set('value', $websitetitle);
    $conf->save();  
}
$brandname = _post('brandname');
if($brandname!=''){
    $conf = ORM::for_table('appconfig')->where('setting', 'BrandName')->find_one();
    $conf->set('value', $brandname);
    $conf->save();  
}
$footerTxt = _post('footertxt');
if($footerTxt!=''){
    $conf = ORM::for_table('appconfig')->where('setting', 'footerTxt')->find_one();
    $conf->set('value', $footerTxt);
    $conf->save();  
}

    $system_date= _post('system_date');
        if($system_date!=''){
            $conf = ORM::for_table('appconfig')->where('setting', 'SystemDate')->find_one();
            $conf->set('value', $system_date);
            $conf->save();
        }





 r2($self,'s','Settings saved successfully');  
}

elseif($action=='theme'){
    
}

elseif($action=='tax-vat'){
$tname = _post('tname');
$trate = _post('trate');
$ttype = _post('ttype');
$taxacc = _post('taxacc');

$d = ORM::for_table('taxes')->find_one(1);
$d->name=$tname;
$d->rate = $trate;
$d->type = $ttype;
if ($taxacc!=''){
$d->taxacc = $taxacc;    
}
$d->save();
 r2($self,'s','Settings saved successfully');     
}

elseif($action=='paymentgw'){

$value = $_POST['value'];
$secret_key=$_POST['secret_key'];
$cmd = _post('id');
$status = _post('status');
if ($status == 'Active'){
$ss = 'Active';
}
else {
	$ss = 'Inactive';
}

if ($value!=''){
    $conf = ORM::for_table('paymentgateways')->find_one($cmd);
    $conf->set('value', $value);
    $conf->set('ins', $secret_key);
	$conf->set('status', $ss);
    $conf->save();
     
      
}

 r2('manage.pg.php?_xClick='.$cmd,'s','Settings saved successfully');    
}

#misc
elseif($action=='misc'){
$istart = _post('istart');
$max = ORM::for_table('invoices')->max('id');
$smax = $max+1; 
if ($smax<$istart)   {
//Make change
$query = 'ALTER TABLE invoices auto_increment = '.$istart;
# use native pdo for this
$stmt = $dbh->prepare($query);
$stmt->execute();
  //  exit ("$query");
r2($self,'s',"Settings Saved. Next Invoice Will Start from ID- $istart");
}
    else {
       // r2($self,'s',"Settings Saved. Next Invoice Will Start from ID- $istart");
    }
    
    }

else {
    r2($self,'e','Action is not defined');
}
r2($self,'s','Settings Saved Successfully');