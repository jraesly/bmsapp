<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>BM</title>
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
       <a class="brand" href="<?php echo 'home'.EXT; ?>">BM</a>
       
       <div class="nav-collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list-alt icon-white"></i> Clients<b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="<?php echo 'manage-accounts'.EXT.'?_filter=Customer'; ?>">Manage Clients</a></li>
              <li><a href="<?php echo 'add-new-client'.EXT; ?>">Add New Client</a></li>
              <li><a href="<?php echo 'client-groups'.EXT; ?>">Client Groups</a></li>
              <li><a href="<?php echo 'bulk-email-wizard'.EXT; ?>">Send Bulk Email</a></li>
            
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-align-justify icon-white"></i> Payments<b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="<?php echo 'transactions'.EXT; ?>">Transactions</a></li>
              <li><a href="<?php echo 'invoices'.EXT; ?>">Invoices</a></li>
              <li><a href="<?php echo 'invoice-wizard'.EXT; ?>">Add Invoice</a></li>
              <li><a href="<?php echo 'invoice-recurring'.EXT; ?>">Recurring Invoice</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-tasks icon-white"></i> Orders<b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="<?php echo 'orders'.EXT; ?>">All Orders</a></li>
              <li><a href="<?php echo 'orders'.EXT; ?>?_filter=Pending">Pending Orders</a></li>
              <li><a href="<?php echo 'orders'.EXT; ?>?_filter=Active">Active Orders</a></li>
              <li><a href="<?php echo 'orders'.EXT; ?>?_filter=Fraud">Fraud Orders</a></li>
              <li><a href="<?php echo 'orders'.EXT; ?>?_filter=Cancelled">Cancelled Orders</a></li>
              
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-th-large icon-white"></i> Accounting<b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="<?php echo 'manage-accounts'.EXT; ?>">All Accounts</a></li>
               <li><a href="<?php echo 'income'.EXT; ?>">Income Entry</a></li>
               <li><a href="<?php echo 'expense'.EXT; ?>">Expenses Entry</a></li>
                <li><a href="<?php echo 'transfers'.EXT; ?>">Transfers</a></li>
              <li><a href="<?php echo 'transactions'.EXT; ?>">Transactions</a></li>
             
              <li><a href="<?php echo 'balance-sheet'.EXT; ?>">Balance Sheet</a></li>
               
                <li><a href="<?php echo 'chart-of-accounts'.EXT; ?>">COA Help</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-book icon-white"></i> Support<b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="<?php echo 'kb'.EXT; ?>">KB Categories</a></li>
              <li><a href="<?php echo 'articles'.EXT; ?>">KB Articles</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo 'tickets'.EXT; ?>">All Support Tickets</a></li>
              <li><a href="<?php echo 'tickets'.EXT; ?>?_filter=Active">All Active Tickets</a></li>
              <li><a href="<?php echo 'tickets'.EXT; ?>?_filter=CustomerReplied">Customer Replied Tickets</a></li>
              <li><a href="<?php echo 'tickets'.EXT; ?>?_filter=Answered">Answered Tickets</a></li>
              <li><a href="<?php echo 'tickets'.EXT; ?>?_filter=Closed">Closed Tickets</a></li>
              <li><a href="<?php echo 'create-new-ticket'.EXT; ?>">Create New Ticket</a></li>
              
              
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-wrench icon-white"></i> Setup<b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
            <li><a href="<?php echo 'products-and-services'.EXT; ?>">Products &amp; Services</a></li>
             <li><a href="<?php echo 'administrators'.EXT; ?>">Administrators</a></li>
             <li><a href="<?php echo 'settings'.EXT; ?>#business.profile">System Settings</a></li>
           
              
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-file icon-white"></i> Tools<b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="<?php echo 'system-logs'.EXT; ?>">System Logs</a></li>
              <li><a href="<?php echo 'sent-email-logs'.EXT; ?>">Sent Email Logs</a></li>
             
              <li><a href="<?php echo 'system-status'.EXT; ?>">System Status</a></li>
              <li><a href="<?php echo 'database-cleanup'.EXT; ?>">Database Cleanup</a></li>
              <li><a href="<?php echo 'dev-tools'.EXT; ?>">Developer Tools</a></li>
            </ul>
          </li>
          
        </ul>
         <form class="navbar-search pull-left" action="">
                      <input type="text" class="search-query span2" placeholder="Search Account...">
                    </form>
        <ul class="nav pull-right smd">
        
                     <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-folder-close icon-white"></i> Modules<b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="<?php echo 'todo'.EXT; ?>">To Do</a></li>
                <li><a href="<?php echo 'sticky-note'.EXT; ?>">Sticky Note</a></li>
              <li><a href="<?php echo 'notice-board'.EXT; ?>">Notice Board</a></li>
              <li><a href="<?php echo 'dms'.EXT; ?>">Document Management</a></li>
               <li><a href="<?php echo 'url-tracker'.EXT; ?>">URL Tracker</a></li>
            </ul>
            
          </li>
                      
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> My Account <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="my-profile<?php echo EXT; ?>">Manage account</a></li>
<li><a href="logout<?php echo EXT; ?>">Logout</a></li>
                        </ul>
                      </li>
                    </ul>
       </div>
     </div>
   </div>
 </div>