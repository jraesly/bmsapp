<?php
require 'boot.php';
Acl::isAllowed('articles.php');
$self='articles'. EXT;
if (isset($_POST['action'])&&$_POST['action']=='edit'){
   $title = _post('title'); 
   if ($title==''){
r2($self,'e','Title was Empty');
}
$trid = _post('trid');
$catid = _post('catid');
 if ($catid==''){
r2($self,'e','Please choose a Category');
}
$article = $_POST['article'];
if ($article==''){
r2($self,'e','Article was Empty');
}
$grp = ORM::for_table('knowledgebase')->find_one($trid);
$grp->title=$title;
$grp->catid=$catid;
$grp->article=$article;
$grp->save();  
  r2($self,'s','Article edited successfully');
}
elseif (isset($_POST['action'])&&$_POST['action']=='delete'){
    $trid = _post('trid');
  $tr = ORM::for_table('knowledgebase')->find_one($trid);
  
// now delete the transaction
 $tr->delete();
r2($self,'s','Article deleted successfully');    
    
}
elseif (isset($_POST['action'])&&$_POST['action']=='add'){
   $title = _post('title'); 
   if ($title==''){
r2($self,'e','Title was Empty');
}

$catid = _post('catid');
 if ($catid==''){
r2($self,'e','Please choose a Category');
}
$article = $_POST['article'];
if ($article==''){
r2($self,'e','Article was Empty');
}
$grp = ORM::for_table('knowledgebase')->create();
$grp->title=$title;
$grp->catid=$catid;
$grp->article=$article;
$grp->save();  
 r2($self,'s','Article Added successfully');  
    }
else {
  require ("views/$gat/articles.tpl.php"); 
}