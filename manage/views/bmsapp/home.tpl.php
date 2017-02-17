<?php
$xfooter ='
<!-- xcharts includes -->
    <script src="../assets/lib/charts/d3.v2.js"></script>
    <script src="../assets/lib/charts/assets/js/xcharts.min.js"></script>

    <!-- The daterange picker bootstrap plugin -->
    <script src="../assets/lib/charts/assets/js/sugar.min.js"></script>
    <script src="../assets/lib/charts/assets/js/daterangepicker.js"></script>

    <!-- Our main script file -->
    <script src="../assets/lib/charts/assets/js/script.js"></script>
    <script src="../assets/lib/flot/jquery.flot.js"></script>
<script src="../assets/lib/flot/jquery.flot.resize.min.js"></script>
<script src="../assets/lib/flot/jquery.flot.pie.js"></script>
<script>
$(".clickable").click(function() {
  window.location.href = $(this).find("a").attr("href");
});

var placeholder = $(\'#piechart-placeholder\').css({\'width\': \'90%\', \'min-height\': \'150px\'});
var data = [
    { label: "Paid", data: '.$ttip.', color: "#62aeef"},
    { label: "Unpaid", data: '.$tuip.', color: "#ff4444"},
    { label: "Cancelled", data: '.$tcip.', color: "#dd5600"}
]
var placeholder = $("#piechart-placeholder");
function drawPieChart(placeholder, data, position) {
    $.plot(placeholder, data, {
        series: {
        pie: {
            show: true,
                tilt: 0.8,
                highlight: {
                opacity: 0.25
                },
                stroke: {
                color: \'#fff\',
                    width: 2
                },
                startAngle: 2
            }
    },

        legend: {
        show: true,
            position: position || "ne",
            labelBoxBorderColor: null,
            margin: [-30, 15]
        },
        radius: 1,
        stroke: {
        width: 2
        },
        tooltip: true, //activate tooltip
        tooltipOpts: {
        content: "%s : %y.1"+"%",
            shifts: {
            x: -30,
                y: -50
            },
            defaultTheme: false
        },
        startAngle: 2,
        grid: {
        hoverable: true,
            clickable: true
        }
    })
}

drawPieChart(placeholder, data);
</script>

';

$xheader='

<link rel="stylesheet" type="text/css" href="../assets/css/mail-style.css">
<link href="../assets/lib/charts/xcharts.min.css" rel="stylesheet">
<link href="../assets/lib/charts/assets/css/daterangepicker.css" rel="stylesheet">
<link href="../assets/lib/charts/assets/css/style.css" rel="stylesheet">
<link href="../assets/css/font-awesome.min.css" rel="stylesheet">

';

 require ('sections/header.tpl.php');
  ?>
<div class="container">
<div class="page-header position-relative">
<h1><?php echo $_L['dashBoard']; ?></h1>
</div>
<div class="row-fluid">

            <div class="span6">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe09f;"></span> <?php echo $_L['quickAccess']; ?>
                  </div>
                </div>
                <div class="widget-body">
                  <a href="manage-accounts.php" class="speed-dial-btn span3">
                     
                    <p class="no-margin"><?php echo $_L['accounts']; ?></p>
                    <p class="no-margin"><img src="../assets/img/person-icon-64.png"/> </p>

                    <div class="label label-success"><?php echo $na; ?></div>
                  </a>
                  
                  <a href="invoices.php" class="speed-dial-btn span3">
                    
                    <p class="no-margin"><?php echo $_L['invoices']; ?></p>
                      <p class="no-margin"><img src="../assets/img/invoice-icon.png"/> </p>
                    <div class="label label-warning"><?php echo $ni; ?></div>
                  </a>
                   <a href="tickets.php" class="speed-dial-btn span3">
                    
                    <p class="no-margin"><?php echo $_L['tickets']; ?></p>
                       <p class="no-margin"><img src="../assets/img/tickets-icon.png"/> </p>
                    <div class="label label-important"><?php echo $nt; ?></div>
                  </a>
                  <a href="enquiries.php" class="speed-dial-btn span3">
                    
                    <p class="no-margin"><?php echo $_L['enquiries']; ?></p>
                      <p class="no-margin"><img src="../assets/img/comment-icon-64.png"/> </p>
                    <div class="label label-info"><?php echo $ne; ?></div>
                  </a>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
    <div class="span6">
        <div class="widget">
            <div class="widget-header color-3">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe09f;"></span> <?php echo $_L['invoiceStats']; ?>
                </div>
            </div>
            <div class="widget-body">
                <div id="piechart-placeholder"></div>
                <div class="hr hrdotted"></div>
                <div class="clearfix">
                    <div class="grid3"> <span class="grey"> <i class="icon-file-text-alt icon-2x blue"></i> &nbsp; <?php echo $ttip; ?>% </span>
                        <h6 class="pull-right"><a href="invoices.php?_filter=Paid"><?php echo $_L['paid']; ?></a></h6>
                    </div>
                    <div class="grid3"> <span class="grey"> <i class="icon-file-alt icon-2x red"></i> &nbsp; <?php echo $tuip; ?>% </span>
                        <h6 class="pull-right"><a href="invoices.php?_filter=Unpaid"><?php echo $_L['unPaid']; ?></a></h6>
                    </div>
                    <div class="grid3"> <span class="grey"> <i class="icon-undo icon-2x green"></i> &nbsp; <?php echo $tcip; ?>% </span>
                        <h6 class="pull-right"><a href="invoices.php?_filter=Cancelled"><?php echo $_L['cancelled']; ?></a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
          </div>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header color-2">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe09f;"></span><?php echo $_L['last5Tickets']; ?>
                  </div>
                </div>
                <div class="widget-body">
                  <table class="table table-striped mbzero tbl-mail">
                  <thead>
                    <tr>
                      <th class='tbl-checkbox'>
                        <input type="checkbox" id="select-all"><a href='#'></a>
                      </th>
                      
                      <th><?php echo $_L['customer']; ?></th>
                      <th><?php echo $_L['subject']; ?></th>
                      
                      <th class='tbl-date'><?php echo $_L['date']; ?></th>
                    </tr>
                  </thead>
                  <tbody>
                                    <?php
                
               $items = ORM::for_table('tickets')->select_many('id', 'userid', 'name', 'date', 'subject', 'aread')->order_by_desc('id')->limit(5)->find_many();   
                  
                  $i='0';
$ext = EXT;
foreach ($items as $item) {
  $i++;
  $id = $item['id'];
  $name = $item['name'];
  $date = $item['date'];

    $idate=strtotime($date);
    $date=date($sys_date,$idate);

  $subject = $item['subject'];
  $aread = $item['aread'];
  $trclass = 'act';
  if ($aread!='Yes'){
    $trclass =  'class="act"';
  }
  echo "
  <tr class='clickable'>
                      <td class='tbl-checkbox'>
                        <input type=\"checkbox\" name=\"tid[]\" value=\"$id\"><a href='view-ticket$ext?_xClick=$id'></a>
                      </td>
                      
                      <td class='tbl-lft'>
                        $name
                      </td>
                      <td>
                        
                        $subject
                      </td>
                      
                      <td class='tbl-date'>
                        $date
                      </td>
                    </tr>
  ";
}
                  
                  ?>
                    

                  </tbody>
                </table>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row-fluid">
          <div class="span4">
              <div class="widget">
                <div class="widget-header color-4">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe088;"></span> <?php echo $_L['recentSignUp'] ; ?> 
                  </div>
                </div>
                <div class="widget-body">
                  <div class="tab-widget">
                    <ul>
                      <?php
                
              $query = "SELECT id, name, datecreated, balance, acctype from accounts WHERE (acctype='Customer') AND (id>999) ORDER BY id DESC LIMIT 5";
$stmt = $dbh->prepare("$query");
$stmt->execute();
$result = $stmt->fetchAll();
if ($stmt->rowCount() > 0) {
    foreach($result as $value) {
   $id = $value['id'];
    $name = $value['name'];
    
    $datecreated = $value['datecreated'];


        $idate=strtotime($datecreated);
        $datecreated=date($sys_date,$idate);

    $balance = $value['balance'];
    $acctype=$value['acctype'];
  echo " <li class=\"rcnt\">
                        
                        <div>
                          <h5><a href=\"account-profile.php?__account=$id#account.profile/$id\">$name</a></h5>
                         
                          <small>Created On- $datecreated</small>
                        </div>
                      </li>";
  }
}
  
  ?>
                     
                      
                      
                      
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="span4">
              <div class="widget">
                <div class="widget-header color-5">
                  <div class="title">
<?php echo $_L['recentInvoices'] ; ?>                   </div>
                </div>
                <div class="widget-body">
                  <div class="tab-widget">
                    <ul>
                      <?php
                
              $query = "SELECT id, created, total, status from invoices ORDER BY id DESC LIMIT 5";
$stmt = $dbh->prepare("$query");
$stmt->execute();
$result = $stmt->fetchAll();
if ($stmt->rowCount() > 0) {
    foreach($result as $value) {
   $id = $value['id'];
    $created = $value['created'];


        $idate=strtotime($created);
        $created=date($sys_date,$idate);

    $total = $value['total'];
    
    $status = $value['status'];
    if ($status=='Paid'){
   $sttxt = "<span class=\"label label-success\">$status</span>" ;
}
else {
    $sttxt = "<span class=\"label label-warning\">$status</span>" ;
}
    
  echo " <li class=\"rcnt\">
                        
                        <div>
                          <h5><a href=\"invoice.php?_show=$id\">Invoice# $id (Amount: $total) $sttxt </a></h5>
                         
                          <small>Created On- $created</small>
                        </div>
                      </li>";
  }
}
  
  ?>
                     
                      
                      
                      
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="span4">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
<?php echo $_L['recentOrders'] ; ?>                   </div>
                </div>
                <div class="widget-body">
                  <div class="tab-widget">
                    <ul>
                      <?php
                
              $query = "SELECT id, ordernum, date, status, amount from orders ORDER BY id DESC LIMIT 5";
$stmt = $dbh->prepare("$query");
$stmt->execute();
$result = $stmt->fetchAll();
if ($stmt->rowCount() > 0) {
    foreach($result as $value) {
   $id = $value['id'];
    $ordernum = $value['ordernum'];
    
    $date = $value['date'];



        $idate=strtotime($date);
        $date=date($sys_date,$idate);

    $status = $value['status'];
    if ($status=='Active'){
   $sttxt = "<span class=\"label label-success\">$status</span>" ;
}
elseif ($status=='Pending'){
    $sttxt = "<span class=\"label label-important\">$status</span>" ; 
}
elseif ($status=='Processing'){
     $sttxt = "<span class=\"label label-warning\">$status</span>" ;
}
elseif ($status=='Fraud'){
     $sttxt = "<span class=\"label\">$status</span>" ;
}
else {
    $sttxt = "<span class=\"label\">$status</span>" ;
}
    $amount = $value['amount'];
  echo " <li class=\"rcnt\">
                        
                        <div>
                          <h5><a href=\"order.php?_show=$id\">Order# $ordernum $sttxt</a></h5>
                         
                          <small>Time- $date</small>
                        </div>
                      </li>";
  }
}
  
  ?>
                     
                      
                      
                      
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
<div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe09f;"></span> <?php echo $_L['revenueGraph'] ; ?> 
                  </div>
                </div>
                <div class="widget-body">
                  <form class="form-horizontal">
        <fieldset>
            <div class="input-prepend">
              <span class="add-on"><i class="icon-calendar"></i></span><input type="text" name="range" id="range" />
            </div>
        </fieldset>
      </form>
      
      <div id="placeholder">
        <figure id="chart"></figure>
      </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
  <div class="row-fluid">

<div class="span6 well">
<h4><?php echo $_L['netWorth']; ?>: <?php echo $abal; ?></h4>
</div>
<div class="span6">

<table class="table table-striped">
        <thead>
          <tr>
            <th colspan="2"><span class="pull-right"><h4><?php echo $_L['tbal'];?></h4></span></th>
          </tr>
          <tr>
            <th><h5><?php echo $_L['accountType'];?></h5></th>
            <th><h5><?php echo $_L['balance'];?></h5></th>
          </tr>
        </thead>
        <tbody>
         
  <tr>
    <td><strong><?php echo $_L['bankAndCash'];?></strong></td>
    <td><strong><?php echo $btbal; ?></strong></td>
  </tr>
  <tr>
    <td><strong><?php echo $_L['customerAccount'];?></strong></td>
    <td><strong><?php echo $ctbal; ?></strong></td>
  </tr>
  <tr>
    <td><strong><?php echo $_L['liabilities'];?></strong></td>
    <td><strong><?php echo $ltbal; ?></strong></td>
  </tr>
  
           <tr>
            <td><span class="pull-right"><h5><?php echo $_L['totalInAllAccount'];?></h5></span></td>
            <td><h5><strong><?php
                $bankbal= ORM::for_table('accounts')->where('acctype', 'Bank')->sum('balance');
                $ctbal = ORM::for_table('accounts')->where('acctype', 'Customer')->sum('balance');
                $ltbal = ORM::for_table('accounts')->where('acctype', 'Long-Term-Liability')->sum('balance');
                $tbalanace = $bankbal+$ctbal+$ltbal;
               $tbalanace=number_format($tbalanace,2);
               echo $tbalanace;
       
        ?></strong></h5></td>
          </tr>
        </tbody>
      </table>
</div>
</div>      
</div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
