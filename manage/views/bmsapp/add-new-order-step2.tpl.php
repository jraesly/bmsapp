<?php
$xheader='
<link rel="stylesheet" href="../assets/lib/select2/select2.css" />
';
$xfooter='<script src="../assets/lib/select2/select2.min.js" type="text/javascript"></script>
<script src="../assets/js/orders.js" type="text/javascript"></script>
<script src="../assets/js/orders-2.js" type="text/javascript"></script>
  ';
?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
        <?php notify(); ?>
        <div class="row-fluid">
            <div class="span12">
                <div class="span12">
                    <form method="post" action="add-new-order.php">
                        <fieldset>
                            <legend><?php echo $_L['addNewOrder'];?></legend>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $items = $_POST['product'];
                                $tamount = '0.00';
                                $i = 0;
                                foreach($items as $id){

                                    $item = ORM::for_table('products')->find_one($id);
                                  $price = $item['price'];
                                    $tamount = $tamount + $price;

                                    echo "<tr>
                                    <td>1</td>
                                    <td><input type=\"text\" class=\"input-xlarge\" name=\"item[]\" value=\"".$item['name']."\"> </td>
                                    <td><input type=\"text\" class=\"input-mini p\" id=\"qty_item_$i\" name=\"qty[]\" value=\"1\"></td>
                                    <td><input type=\"text\" class=\"input-medium p\" id=\"price_item_$i\" name=\"uprice[]\" value=\"".$item['price']."\"></td>
                                    <td><input type=\"text\" class=\"input-medium p\" id=\"total_item_$i\" name=\"price[]\" value=\"".$item['price']."\"></td>
                                </tr>";
                                    $i++;
                                }



                                ?>


                                </tbody>
                            </table>
                            <h3>Item Total <span class="tamount" id="totalSum"><?php echo $tamount; ?></span> </h3>
                            <input name="act" type="hidden" value="add">
                            <input name="cid" type="hidden" value="<?php echo _post('accounts'); ?>">
                            <button type="submit" class="btn btn-primary">Submit Order</button> | Or <a href="add-new-order.php">Cancel</a>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>