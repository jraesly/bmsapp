<?php
$cid=(int) $req_params['1'];

$page_num= $req_params['2'];

//exit ($page_num);
$cl=findOne('accounts',$cid);
$admin=findOne('admins',$aid);
$self= 'account-profile'.EXT;
$aself = 'account.transactions';
if ($cl==FALSE) exit ('Client Not Found');
?><div class="row-fluid"><div class="span12">
    <?php notify(); ?>
    <form action="send-email" method="post">

        <table class="footable">
            <thead>
            <tr>
                
                <th>
<?php echo $_L['sl'];?>
                </th>
                <th>
<?php echo $_L['date'];?>
                </th>
                <th>
<?php echo $_L['trId'];?>
                </th>
                <th>
<?php echo $_L['paymentFrom'];?>
                </th>

                <th><?php echo $_L['paymentTo'];?>
</th>
<th><?php echo $_L['amount'];?>
</th>
                <th>
<?php echo $_L['type'];?>
                </th>

                <th>
<?php echo $_L['memo'];?>
                </th>

            </tr>
            </thead>
            <tbody>
              <?php
            //require ('../lib/paginator.sysfrm.php');
            //$paginate = _paginate('email_log','client-profile'.EXT.'?__account='.$cid.'&');
            /*
             * We will have to create custom pagination here as we will handle request with ajax way
             */
            //custom pagination start
    $url = "account-profile".EXT."?";
    $adjacents = "2";

    //$page = 1;
    //$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $per_page='5';
    $page=$page_num;
    $pagination = "";
    $stmt = $dbh->prepare("SELECT COUNT(id) from transactions where tfrom='$cid'");
    $stmt->execute();
    $result = $stmt->fetch();
    $totalReq = $result[0];
    $i=0;
    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;

    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($totalReq/$per_page);
    $lpm1 = $lastpage - 1;
    $limit = $per_page;
    $startpoint = ($page * $limit) - $limit;
    if($lastpage > 1)
    {
        $pagination .= "<div class=\"pagination  pagination-right\"><ul>";
        // $pagination .= "<li class='disabled'>Page $page of $lastpage</li>";
        if ($lastpage < 7 + ($adjacents * 2))
        {
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><span>$counter</span></li>";
                else
                   // $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/$counter'>$counter</a></li>";
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<li class='active'><span>$counter</span></li>";
                    else
                        $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='disabled'><span>...</span></li>";
                $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/$lastpage'>$lastpage</a></li>";
            }
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/1'>1</a></li>";
                $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/2'>2</a></li>";
                $pagination.= "<li class='disabled'><span>...</span></li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<li class='active'><span>$counter</span></li>";
                    else
                        $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='disabled'><span>...</span></li>";
                $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/$lastpage'>$lastpage</a></li>";
            }
            else
            {
                $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/page=1'>1</a></li>";
                $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/page=2'>2</a></li>";
                $pagination.= "<li>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<li class='disabled'><a class='disabled'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/page=$counter'>$counter</a></li>";
                }
            }
        }

        if ($page < $counter - 1){
            $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/$next'>Next</a></li>";
            $pagination.= "<li><a href='$self?__account=$cid#$aself/$cid/$lastpage'>Last</a></li>";
        }else{
            $pagination.= "<li class='disabled'><a class='disabled'>Next</a></li>";
            $pagination.= "<li class='disabled'><a class='disabled'>Last</a></li>";
        }
        $pagination.= "</ul></div>\n";
        //$gen=array("startpoint"=>$startpoint,"limit"=>$limit,"contents"=>$pagination);

    }


            $query = "SELECT * from transactions where (tfrom=$cid OR tto=$cid) ORDER BY id DESC LIMIT {$startpoint} , {$limit}";
            $stmt = $dbh->prepare("$query");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $i="0";
            $ext = EXT;
            if ($stmt->rowCount() > 0) {
                foreach($result as $value) {
                    $i++;
                    $i= str_pad($i,5,'0',STR_PAD_LEFT);
                    $id = $value['id'];
                    $amount = $value['amount'];
	       $tfromacc = $value['tfromacc'];
	       $ttoacc= $value['ttoacc'];
                    $memo = $value['memo'];
                    $date = $value['date'];

                    $idate=strtotime($date);
                    $date=date($sys_date,$idate);

                    $trtype = $value['ttype'];

                    echo "<tr>
                                  <td>$i</td>
                                  <td>$date</td>
                                  <td>$id</td>
                                  <td>$tfromacc</td>
                                  <td>$ttoacc</td>
                                  <td>$amount</td>
                                  <td>$trtype</td>
                                  <td>$memo</td>
                          </tr>";
                }
            }
            else {
echo "<tr>
        <td colspan='6'>No Transaction Found For this Client</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </form>
    <?php
    echo  $pagination;
    ?>
    </div></div>