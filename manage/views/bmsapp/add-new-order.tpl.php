<?php
$xheader='
<link rel="stylesheet" href="../assets/lib/select2/select2.css" />
';
$xfooter='<script src="../assets/lib/select2/select2.min.js" type="text/javascript"></script>
<script src="../assets/js/orders.js" type="text/javascript"></script>
  ';
?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
    <?php notify(); ?>
<div class="row-fluid">
<div class="span12">
<div class="span7 well">
    <form method="post" action="add-new-order.php">
        <fieldset>
            <legend><?php echo $_L['addNewOrder'];?></legend>
            <label><?php echo $_L['orderForCustomer'];?></label>
            <select name="accounts" data-placeholder="Choose Customer Account" id="accounts" class="chzn-select input-large" tabindex="2">
                <option value="0"><?php echo $_L['chooseCustomer'];?> </option>
                <?php
                $query = "SELECT id, name, company from accounts WHERE (acctype='Customer') ORDER BY id ASC";
                $stmt = $dbh->prepare("$query");
                $stmt->execute();
                $result = $stmt->fetchAll();
                $i="0";
                $ext = EXT;
                if ($stmt->rowCount() > 0) {
                    foreach($result as $value) {
                        $i++;

                        $id = $value['id'];
                        $name = $value['name'];

                        $company = $value['company'];
                        if ($company!=''){
                            $company = '( '.$company.' )';
                        }

                        echo "<option value=\"$id\">$name $company</option>";
                    }
                }
                ?>
            </select>
            <hr>
            <div class="products">
                <div class="product" id="product">

                    <label>
                        <select name="product[]" data-placeholder="Choose A Product" class="chzn-select input-block-level" tabindex="2">
                            <option value="0"><?php echo $_L['Choose_Product'];?></option>
                            <?php
                            $accgroups = ORM::for_table('products')->select('id')->select('name')->select('price')->find_many();

                            foreach ($accgroups as $accgroup) {
                                $id = $accgroup['id'];
                                $name = $accgroup['name'];
                                $price = $accgroup['price'];
                                echo "<option value=\"$id\">$name [Price: $price]</option>";
                            }

                            ?>
                        </select>

                    </label>


                </div>
            </div>
            <hr>
            <a href="#" id="item-add" class="btn btn-warning">Add More Item</a>

<!--            <label>--><?php //echo $_L['generatInvoice'];?><!--</label>-->
<!---->
<!--            <label class="radio">-->
<!--                <input type="radio" name="invoice" id="optionsRadios1" value="option1" checked>-->
<!--                --><?php //echo $_L['yes'];?><!--</label>-->
<!--            <label class="radio">-->
<!--                <input type="radio" name="invoice" id="optionsRadios2" value="option2">-->
<!--                --><?php //echo $_L['no'];?><!--</label>-->
            <div class="form-actions">
                <input name="act" type="hidden" value="step2">
                <button type="submit" name="submit" class="btn btn-primary">Continue</button>

            </div>
        </fieldset>
    </form>
</div>

</div>
</div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>