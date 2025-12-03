<?php
require_once __DIR__ . '/../../config/fpdf/tfpdf.php';

use App\Models\Order;

// Validate input
if (!isset($_SESSION['user_id'])) {
    die('Invalid request.');
}

$orders = Order::getFinishedOrders();

if (!$orders) {
    die('Order not found.');
}

// Create PDF
$pdf = new tFPDF();
$pdf->AddPage();

// Set Unicode Fonts for Cyrillic
$pdf->AddFont('DejaVu', '', 'DejaVuSans.ttf', true);
$pdf->AddFont('DejaVu', 'B', 'DejaVuSans-Bold.ttf', true);
$pdf->AddFont('DejaVu', 'I', 'DejaVuSans-Oblique.ttf', true);
$pdf->AddFont('DejaVu', 'BI', 'DejaVuSans-BoldOblique.ttf', true);

// Set page margins
$topMargin = 10;
$bottomMargin = 10;
$pdf->SetAutoPageBreak(true, $bottomMargin);

// Title
$pdf->SetFont('DejaVu', 'B', 16);
$pdf->Cell(0, 10, 'Готови Поръчки - PDF Доклад', 0, 1, 'C');
$pdf->Ln(5);

$lineHeight = 10; // row height

foreach ($orders as $o) {
    $car = $o['year'] . ' ' . $o['brand_name'] . ' ' . $o['model_name'];
    $numServices = count($o['service']);
    $numMaterials = count($o['materials']);

    // Estimate total height needed for this order
    $orderHeaderHeight = 30;
    $servicesHeaderHeight = 10;
    $materialsHeaderHeight = 10;
    $totalHeight = $orderHeaderHeight + $servicesHeaderHeight + ($numServices * $lineHeight)
        + $materialsHeaderHeight + ($numMaterials * $lineHeight) + 15;

    // Remaining space
    $currentY = $pdf->GetY();
    $pageHeight = 297; // A4 height in mm
    $topMargin = 10;   // your top margin
    $bottomMargin = 10; // your bottom margin

    $remainingSpace = $pageHeight - $pdf->GetY() - $bottomMargin;
    $remainingSpace = $pageHeight - $currentY - $bottomMargin;

    if ($totalHeight > $remainingSpace) {
        $pdf->AddPage();
    }

    // Order header
    $pdf->SetFont('DejaVu', 'B', 12);
    $pdf->Cell(0, 10, 'Order #' . $o['order_id'] . ' - ' . $car, 0, 1, 'L');

    $pdf->Cell(30, 10, 'Client: ', 0);
    $pdf->SetFont('DejaVu', '', 12);
    $pdf->Cell(0, 10, $o['client_name'], 0, 1);

    $pdf->SetFont('DejaVu', 'B', 12);
    $pdf->Cell(30, 10, 'Employee: ', 0);
    $pdf->SetFont('DejaVu', '', 12);
    $pdf->Cell(0, 10, $o['employee_name'], 0, 1);

    // Services table
    $pdf->SetFont('DejaVu', 'B', 12);
    $pdf->Cell(30, 10, 'Service ID', 1);
    $pdf->Cell(90, 10, 'Service', 1);
    $pdf->Cell(65, 10, 'Base Price', 1);
    $pdf->Ln();

    $pdf->SetFont('DejaVu', '', 12);
    foreach ($o['service'] as $service) {
        $pdf->Cell(30, 10, $service['service_id'], 1);
        $pdf->Cell(90, 10, $service['service_name'], 1);
        $pdf->Cell(65, 10, '€' . number_format($service['base_price'], 2), 1, 0, 'R');
        $pdf->Ln();
    }

    // Materials table
    $pdf->SetFont('DejaVu', 'B', 12);
    $pdf->Cell(30, 10, 'Material ID', 1);
    $pdf->Cell(90, 10, 'Material', 1);
    $pdf->Cell(25, 10, 'Quantity', 1);
    $pdf->Cell(40, 10, 'Price', 1);
    $pdf->Ln();

    $pdf->SetFont('DejaVu', '', 12);
    foreach ($o['materials'] as $material) {
        $pdf->Cell(30, 10, $material['material_id'], 1);
        $pdf->Cell(90, 10, $material['material_name'], 1);
        $pdf->Cell(25, 10, $material['quantity'], 1, 0, 'R');
        $pdf->Cell(40, 10, '€' . number_format($material['price'], 2), 1, 0, 'R');
        $pdf->Ln();
    }

    // Total price
    $pdf->SetFont('DejaVu', 'B', 12);
    $pdf->Cell(0, 10, 'Total Price: €' . number_format($o['full_price'], 2), 0, 1, 'R');

    $pdf->Ln(5); // space between orders
}

$pdf->Output('D', 'Finished_orders.pdf');
exit;
