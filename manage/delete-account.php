<?php
require 'boot.php';
$id= _get('_cmd');
require ('../lib/clients.class.php');
$deleteacc = new Clients;
$delete = $deleteacc->Delete($id);
if ($xstage=='Demo'){
r2('account-profile'.EXT.'?__account='.$id.'#account.edit/'.$id,'e','Deleting Account Profile is disabled in the demo mode');
}
if ($delete){
    _log('admin',"Account Deleted Successfully by Admin ID- ($aid), Account ID: $id",$aid);
    r2('manage-accounts'.EXT,'s','Account Deleted Successfully');
}
r2('manage-accounts'.EXT,'e','An Error Occured');


