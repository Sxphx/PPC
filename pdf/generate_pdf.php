<?php
require_once "../config/db.php";
require_once "../../vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

// Create a Dompdf instance
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

$req_ids = $_POST['checkbox'];
$data = array();

foreach ($req_ids as $req_id) {
    $sql = "SELECT * FROM req WHERE req_id = '$req_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
}

// Load HTML content from details_pdf.php
ob_start();
require('details_pdf.php');
$html = ob_get_clean();

// Load HTML content into Dompdf
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render PDF (generates the PDF)
$dompdf->render();

// Output the generated PDF to the browser
$dompdf->stream('print-detail.pdf', ['Attachment' => false]);
