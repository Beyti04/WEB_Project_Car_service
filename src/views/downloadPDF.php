<?php
require_once __DIR__ . '/../../config/fpdf/tfpdf.php';
use App\Controllers\ClientController;

// Validate input
if (!isset($_GET['id']) || !isset($_SESSION['user_id'])) {
    die('Invalid request.');
}

$orderId = (int)$_GET['id'];
$userId = (int)$_SESSION['user_id'];

$order = ClientController::getOrderById($userId, $orderId);

if (!$order) {
    die('Order not found.');
}

// Create PDF
$pdf = new tFPDF();
$pdf->AddPage();

// Add fonts
$pdf->AddFont('DejaVu', '', 'DejaVuSans.ttf', true); // Regular
$pdf->AddFont('DejaVu', 'B', 'DejaVuSans-Bold.ttf', true); // Bold
$pdf->AddFont('DejaVu','I','DejaVuSans-Oblique.ttf', true);
$pdf->AddFont('DejaVu','BI','DejaVuSans-BoldOblique.ttf', true);
$pdf->SetFont('DejaVu','I',10);  // Italic
$pdf->SetFont('DejaVu','BI',12); // Bold Italic


$pdf->SetFont('DejaVu','B',16); // Bold
$pdf->SetFont('DejaVu','',12);  // Regular // Bold

// ===== HEADER =====
$pdf->SetFont('DejaVu','B',20);
$pdf->Cell(0,10,'AutoManager',0,1,'C');

$pdf->SetFont('DejaVu','',12);
$pdf->Cell(0,6,'Client Invoice',0,1,'C');
$pdf->Ln(5);

// ===== ORDER INFO =====
$pdf->SetFont('DejaVu','B',12);
$pdf->Cell(40,6,'Order #:',0,0);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(0,6,$order['order_id'],0,1);

$pdf->SetFont('DejaVu','B',12);
$pdf->Cell(40,6,'Completed:',0,0);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(0,6,$order['closed_at'],0,1);
$pdf->Ln(5);

// ===== VEHICLE & SERVICE =====
$pdf->SetFont('DejaVu','B',12);
$pdf->Cell(40,6,'Vehicle:',0,0);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(0,6,"{$order['car_year']} {$order['brand_name']} {$order['model_name']}",0,1);

$pdf->SetFont('DejaVu','B',12);
$pdf->Cell(40,6,'Service:',0,0);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(0,6,"{$order['service_name']} - €{$order['base_price']}",0,1);
$pdf->Ln(5);

// ===== MATERIALS TABLE =====
$pdf->SetFont('DejaVu','B',12);
$pdf->Cell(100,6,'Material',1,0,'C');
$pdf->Cell(40,6,'Quantity',1,0,'C');
$pdf->Cell(50,6,'Price (€)',1,1,'C');

$pdf->SetFont('DejaVu','',12);
foreach ($order['materials'] as $m) {
    $pdf->Cell(100,6,$m['name'],1,0);
    $pdf->Cell(40,6,$m['quantity'],1,0,'C');
    $pdf->Cell(50,6,number_format($m['price'],2),1,1,'R');
}

$pdf->Ln(5);

// ===== TOTAL =====
$pdf->SetFont('DejaVu','B',14);
$pdf->Cell(140,8,'Total:',0,0,'R');
$pdf->SetFont('DejaVu','',14);
$pdf->Cell(50,8,'€'.number_format($order['full_price'],2),0,1,'R');


// Output PDF
$pdf->Output("D","Invoice_Order_{$order['order_id']}.pdf");
exit;
