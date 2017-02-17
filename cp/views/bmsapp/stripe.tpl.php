<?php
 include ('sections/header.tpl.php'); 
 
$stripeamount = $amount * 100;

?>
   <div class="span8">


<?php notify(); ?>

  <form action="stripe-notification.php" method="POST">
    <fieldset>
      <legend>Pay With Credit Card</legend>
         <h5>Item Name: <?php echo $item_id; ?></h5>
        <h5>Invoice ID: <?php echo $invoiceid; ?></h5>
       <h5>Amount: <?php echo lc('defaultcurrencysymbol'). ' '. $amount; ?></h5>
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $skey; ?>"
    data-amount="<?php echo $stripeamount; ?>"
    data-currency="<?php echo lc('defaultcurrency'); ?>"
    data-name="<?php echo $item_id; ?>"
    data-description="Invoice: <?php echo $invoiceid; ?>"
    data-image="../assets/uploads/logo.png">
  </script>
  </fieldset>
      <input type="hidden" value="<?php echo $amount; ?>" name="amount">
      <input type="hidden" value="<?php echo  lc('defaultcurrency'); ?>" name="currency">
</form>
  </div>
    <?php include ('sections/footer.tpl.php'); ?>
