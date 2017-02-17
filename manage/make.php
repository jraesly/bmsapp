<?php
require 'boot.php';
error_reporting(E_ALL);
require ('../lib/make.f.php');
$what = _get('_what');
$query = _get('__use__');
$query = _decode($query);
$query = "SELECT id, name, company, datecreated, balance, acctype from accounts limit 0,1000";
if ($what=='csv'){

    make_csv($query);
}
elseif ($what=='pdf'){
    $author = findOne('admins',$aid);
    $aadmin= $author['username'];
    // $filename= date('Y-m-d')._raid(4).'.pdf';
    $title = 'All-Accounts';
    $title = str_replace('-',' ',$title);
    $qtype = _get('_type');

    $stmt = $dbh->prepare("$query");
    $stmt->execute();
    $result = $stmt->fetchAll();
    $i="0";
    if ($stmt->rowCount() > 0) {
        $html = '<table>
<tr>
<th>Full Name</th>
<th>Company</th>
<th>Balance</th>
<th>Type</th>
</tr>';
        foreach($result as $value) {
            $i++;

            $id = $value['id'];
            $name = $value['name'];

            $company = $value['company'];

            $balance = $value['balance'];
            $acctype=$value['acctype'];



            $html .= "<tr>
<td>$name</td>
<td>$company</td>
<td>$balance</td>
<td>$acctype</td>
</tr>";
        }
        $html .= '</table>';
        //  exit ("$html");

    }

    require ('../lib/pnp/tcpdf/config/lang/eng.php');
    require ('../lib/pnp/tcpdf/tcpdf.php');

// create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor($aadmin);
    $pdf->SetTitle($title);
    $pdf->SetSubject($title );


// set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, '35', $title, "Generated on ".date('d/m/Y')." \nby ".$aadmin);

// set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
    $pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
    $pdf->SetFont('freesans', '', 10);

// add a page
    $pdf->AddPage();
    $style = '<style>
table
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
table td, #table th
{
font-size:1.2em;
border:1px solid #4a4e50;
padding:3px 7px 2px 7px;
}
table th
{
font-size:1.4em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#3585b7;
color:#fff;
}
table tr.alt td
{
color:#000;
background-color:#EAF2D3;
}

</style>
';

///////////////////////////////////////////////////html

    $nhtml = <<<EOF
$style
$html
EOF;
    //  exit ("$nhtml");

    $pdf->writeHTML($nhtml, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
    $pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
    $pdf->Output(date('Y-m-d')._raid(4).'.pdf', 'FD');




}


/*
 * blank page, as we do not know what to make
 */
else {
    return;
}