<?php
/*
 * sysfrm bootstrap pagination
 * author Razib Miah
 * http://www.sysfrm.com
 *
 */

function _paginate ($table,$condition='',$url='?',$per_page='50'){
    global $dbh;
    //$url = "manage-clients?";
    $adjacents = "2";

    $page = 1;
    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $pagination = "";
    $stmt = $dbh->prepare("SELECT COUNT(id) from $table $condition");
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

    if($lastpage >= 1)
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
                    $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
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
                        $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='disabled'><span>...</span></li>";
                $pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
            }
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='disabled'><span>...</span></li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<li class='active'><span>$counter</span></li>";
                    else
                        $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='disabled'><span>...</span></li>";
                $pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
            }
            else
            {
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<li class='disabled'><a class='disabled'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                }
            }
        }

        if ($page < $counter - 1){
            $pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";
            $pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";
        }else{
            $pagination.= "<li class='disabled'><a class='disabled'>Next</a></li>";
            $pagination.= "<li class='disabled'><a class='disabled'>Last</a></li>";
        }
        $pagination.= "</ul></div>\n";

        $gen=array("startpoint"=>$startpoint,"limit"=>$limit,"found"=>$totalReq,"page"=>$page,"lastpage"=>$lastpage,"contents"=>$pagination);

        return $gen;

        ////////////////////////////////////////////////////////////////////////////////////////////
    }

}
