<?php
include('autoload.inc.php');
//echo $_POST['html'];
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

if(empty($_POST['page']))
{$page='A4';}else{$page=$_POST['page'];}

if(empty($_POST['orientation']))
{$orientation='portrait';}else{$orientation=$_POST['orientation'];}

$options = new Options();
$options->set('defaultFont', 'Helvetica');
$dompdf = new Dompdf($options);

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($_POST['html']);


// (Optional) Setup the paper size and orientation
$dompdf->setPaper($page, $orientation);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($_POST['filename']);


//---------- short code


// $dompdf = new DOMPDF();
// $dompdf->set_paper('A4', 'portrait');
// $dompdf->load_html($_POST['html']);
// $dompdf->render();
// $dompdf->stream();
?>