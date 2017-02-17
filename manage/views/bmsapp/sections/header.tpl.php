<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>BmsAPP Admin Portal</title>
     <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="../assets/css/adminstyle.css" rel="stylesheet">
    <link href="../assets/css/common.css" rel="stylesheet" type="text/css" />
<?php echo $xheader; ?>
  </head>

  <body>


  <!-- Navbar
    ================================================== -->
 

<div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="home.php"><?php echo $xbrand; ?></a>
       <div class="pull-right">
                <div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<i class="icon-user icon-white"></i> <?php echo $_L['my_account'];?> 
<span class="caret"></span></button>
<ul class="dropdown-menu  pull-right">
<li><a href="my-profile.php"><?php echo $_L['manageAccount']; ?></a></li>
<li><a href="logout.php"><?php echo $_L['logout']; ?></a></li>
</ul>
</div>

              </div>
       <div class="nav-collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list-alt icon-white"></i> <?php echo $_L['clients']; ?><b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="manage-accounts.php?_filter=Customer"><?php echo $_L['manageClient']; ?></a></li>
              <li><a href="add-new-client.php"><?php echo $_L['addNewClient']; ?></a></li>
              <li><a href="client-groups.php"><?php echo $_L['clientGroup']; ?></a></li>
              <li><a href="bulk-email-wizard.php"><?php echo $_L['sendBulkEmail']; ?></a></li>
            
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-align-justify icon-white"></i> <?php echo $_L['payments']; ?><b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="transactions.php"><?php echo $_L['transactions']; ?></a></li>
              <li><a href="invoices.php"><?php echo $_L['invoices']; ?></a></li>
              <li><a href="invoice-wizard.php"><?php echo $_L['addInvoices']; ?></a></li>
              <li><a href="invoice-recurring.php"><?php echo $_L['recurringInvoices']; ?></a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-tasks icon-white"></i> <?php echo $_L['orders']; ?><b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="orders.php"><?php echo $_L['allOrders']; ?></a></li>
               <li><a href="add-new-order.php"><?php echo $_L['addNewOrders']; ?></a></li>
              <li><a href="orders.php?_filter=Pending"><?php echo $_L['pendingOrders']; ?></a></li>
              <li><a href="orders.php?_filter=Active"><?php echo $_L['activeOrders']; ?></a></li>
              <li><a href="orders.php?_filter=Fraud"><?php echo $_L['fraudOrders']; ?></a></li>
              <li><a href="orders.php?_filter=Cancelled"><?php echo $_L['cancelledOrders']; ?></a></li>
              
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-th-large icon-white"></i> <?php echo $_L['finance']; ?><b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="manage-accounts.php"> <?php echo $_L['allAccount']; ?></a></li>
               <li><a href="income.php"> <?php echo $_L['incomeEntry']; ?></a></li>
               <li><a href="revenue-graph.php"> <?php echo $_L['revenueGraph']; ?></a></li>
               <li><a href="expense.php"> <?php echo $_L['expensesEntry']; ?></a></li>
                <li><a href="transfers.php"> <?php echo $_L['transfers']; ?></a></li>
              <li><a href="transactions.php"><?php echo $_L['transactions']; ?></a></li>
             
              <li><a href="balance-sheet.php"><?php echo $_L['balanceSheet']; ?></a></li>
               
                <li><a href="chart-of-accounts.php"><?php echo $_L['coaHelp']; ?></a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-book icon-white"></i> <?php echo $_L['support']; ?><b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="kb.php"><?php echo $_L['kbCategouries']; ?></a></li>
              <li><a href="articles.php"><?php echo $_L['kbArticles']; ?></a></li>
              <li class="divider"></li>
              <li><a href="tickets.php"><?php echo $_L['allSupportTickets']; ?></a></li>
              <li><a href="tickets.php?_filter=Active"><?php echo $_L['allActiveTickets']; ?></a></li>
              <li><a href="tickets.php?_filter=CustomerReplied"><?php echo $_L['custormerRepliedTickets']; ?></a></li>
              <li><a href="tickets.php?_filter=Answered"><?php echo $_L['answeredTickets']; ?></a></li>
              <li><a href="tickets.php?_filter=Closed"><?php echo $_L['closedTickets']; ?></a></li>
              <li><a href="create-new-ticket.php"><?php echo $_L['creatNewTickets']; ?></a></li>
              
              
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-wrench icon-white"></i> <?php echo $_L['setUp']; ?><b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
            <li><a href="products-and-services.php"><?php echo $_L['productsAndServices']; ?></a></li>
             <li><a href="administrators.php"><?php echo $_L['addministrators']; ?></a></li>
             <li><a href="administrator-roles.php"><?php echo $_L['addministratorsRole']; ?></a></li>
             <li><a href="payment-gateways.php"><?php echo $_L['paymentGatways']; ?></a></li>
             <li><a href="email-templates.php"><?php echo $_L['emailTemplates']; ?></a></li>
             <li><a href="support-departments.php"><?php echo $_L['supportDepartments']; ?></a></li>
             <li><a href="settings.php#business.profile"><?php echo $_L['systemSettings']; ?></a></li>
           
              
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-file icon-white"></i> <?php echo $_L['tools']; ?><b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="system-logs.php"><?php echo $_L['systemLogs']; ?></a></li>
              <li><a href="sent-email-logs.php"><?php echo $_L['sentEmailLogs']; ?></a></li>
              <li><a href="system-status.php"><?php echo $_L['systemStatus']; ?></a></li>
              <li><a href="database-cleanup.php"><?php echo $_L['databaseCleanUp']; ?></a></li>
              <li><a href="dev-tools.php"><?php echo $_L['developerTools']; ?></a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-folder-close icon-white"></i> <?php echo $_L['modules']; ?><b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
            
              <li><a href="todo.php"><?php echo $_L['toDo']; ?></a></li>
                <li><a href="sticky-note.php"><?php echo $_L['stickyNote']; ?></a></li>
              <li><a href="notice-board.php"><?php echo $_L['noticeBoard']; ?></a></li>
              <li><a href="cms.php"><?php echo $_L['cms']; ?></a></li>
            </ul>
            
          </li>
        </ul>
        
       </div>
     </div>
   </div>
 </div>