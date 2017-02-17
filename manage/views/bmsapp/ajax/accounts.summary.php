<?php
$accid=(int) $req_params['1'];
$acc=findOne('coa',$accid);
$admin=findOne('admins',$aid);
$dc = lc('defaultcurrency');
if ($acc==FALSE) exit ('Account Not Found');
?><div class="span12">
      <h4><?php echo $_L['accountId']; ?> # <?php echo $accid; ?> <?php echo $_L['account_number']; ?> # <?php echo $acc['accnumber']; ?></h4>
      <p><strong><?php echo $_L['accountType']; ?>: <?php echo $acc['type']; ?></strong><br>
        <strong><?php echo $_L['description']; ?>: </strong> <?php echo $acc['description']; ?>
        <br>
        <strong><?php echo $_L['balance']; ?>: </strong> <?php echo $dc. ' ' .$acc['balance']; ?><br>

      </p>
 </div>