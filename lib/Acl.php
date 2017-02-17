<?php
$perms = array(
1 => 'home.php',
2 => 'manage-accounts.php',
3 => 'add-new-client.php',
4 => 'client-groups.php',
5 => 'bulk-email-wizard.php',
6 => 'transactions.php',
7 => 'invoices.php',
8 => 'invoice-wizard.php',
9 => 'invoice-recurring.php',
10 => 'orders.php',
11 => 'add-new-order.php',
12 => 'income.php',
13 => 'expense.php',
14 => 'transfers.php',
15 => 'balance-sheet.php',
16 => 'kb.php',
17 => 'articles.php', 
18 => 'tickets.php',
19 => 'create-new-ticket.php',
20 => 'products-and-services.php',
21 => 'administrators.php',
22 => 'administrator-roles.php',
23 => 'payment-gateways.php',
24 => 'email-templates.php',
25 => 'support-departments.php',
26 => 'settings.php',
27 => 'system-logs.php',
28 => 'sent-email-logs.php',
29 => 'system-status.php',
30 => 'database-cleanup.php',
31 => 'automatic-update.php',
32 => 'dev-tools.php',
33 => 'todo.php',
34 => 'sticky-note.php', 
35 => 'notice-board.php',
36 => 'dms.php',
37 => 'url-tracker.php',
38 => 'enquiries.php',
39 => 'revenue-graph.php',
40 => 'cms.php'
                
);

Class Acl {
    public static function isAllowed ($page) {
            global $perms;
            global $aid;
            $key = array_search($page, $perms);
            
            $d = ORM::for_table('admins')->find_one($aid);
            $role = $d['roleid'];
            $pcheck = ORM::for_table('adminperms')->where('roleid', $role)->where('permid', $key)->find_one();
            if (!$pcheck['permid']>0){
              r2('access.php','e','You do not have permission to view this page');
            }
            
           
    }
    
}