<?php
function _access($page){ 
    global $dbh;
    global $aid;
    $stmt = $dbh->prepare("SELECT COUNT(1) FROM access WHERE aid = '$aid' AND page=?");
    $stmt->execute(array($here));
    $result = $stmt->fetchColumn();
    $count=$result['count'];
    if ($count == 0) {
        r2('error.php','e','Sorry You do not have Permission to access this page');
    }
    return true;
}