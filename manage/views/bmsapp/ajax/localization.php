<?php
$country = lc('defaultcountry');
$currency = lc('defaultcurrency');
$currencycode = lc('defaultcurrencysymbol');
$defaultclientlanguage = lc('defaultclientlanguage');
?>
<form action="update.settings.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <fieldset>
    <legend><?php echo $_L['localization'];?></legend>
    <label><?php echo $_L['defaultCountry'];?></label>
    <input name="country" type="text" value="<?php echo $country; ?>">
    <span class="help-block"><?php echo $_L['defaultCountryLoacton'];?></span>
    <label><?php echo $_L['defaultCurrency'];?></label>
    <input name="currency"  class="input-mini" type="text" id="currency" value="<?php echo $currency; ?>">
    <span class="help-block"><?php echo $_L['defaultCurrencyTransaction'];?></span>
     <label><?php echo $_L['defaultCurrencySymbol'];?></label>
    <input name="defaultcurrencysymbol"  class="input-mini" type="text" id="currencycode" value="<?php echo $currencycode; ?>">
    <span class="help-block"><?php echo $_L['dfcssb'];?></span>
     <label><?php echo $_L['language'];?></label>
    <input name="defaultclientlanguage"  type="text" id="defaultclientlanguage" value="<?php echo $defaultclientlanguage; ?>">
    <span class="help-block"><?php echo $_L['def'];?></span>
    <div class="form-actions">
    <input name="action" type="hidden" value="localization" />
  <button type="submit" class="btn btn-primary"><?php echo $_L['saveChanges'];?></button>
  <button type="reset" class="btn btn-warning"><?php echo $_L['cancel'];?></button>
</div>
  </fieldset>
</form>