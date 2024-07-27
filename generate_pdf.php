<?php
require('fpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $phoneno = $_POST['phoneno'];
    $gender = $_POST['gender'];
    $doctor_name = $_POST['doctor_name'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $specification = $_POST['specification'];

    // Create PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    
    // Add hospital logo
    $pdf->Image('hospitallogo-removebg-preview.png', 10, 10, 30);

    // Set font
    $pdf->SetFont('Arial', 'B', 16);
    
   

    $pdf->Cell(0, 10, 'HEALTHCARE', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(0, 10, 'Contact Us:+915678945677', 0, 1, 'C');
    
    // Set font for section headings
    $pdf->SetFont('Arial', 'B', 14);

    $pdf->Ln(20);
    $pdf->Rect(10, $pdf->GetY(), 190, 60);
    $pdf->Cell(0, 10, 'Your Details:', 0, 1);
    
    // Set font for user details
  // Draw a box around user details
  $pdf->Rect(10, $pdf->GetY(), 190, 60);

  // Set font for user details
  $pdf->SetFont('Arial', '', 12);
  
  $pdf->Cell(50, 10, 'Full Name:', 0);
  $pdf->Cell(0, 10, $fullname, 0, 1);

  $pdf->Cell(50, 10, 'Phone Number:', 0);
  $pdf->Cell(0, 10, $phoneno, 0, 1);

  $pdf->Cell(50, 10, 'Gender:', 0);
  $pdf->Cell(0, 10, $gender, 0, 1);

  $pdf->SetFont('Arial', 'B', 14);

  // Add doctor details section
  $pdf->Ln(10);
  $pdf->Rect(10, $pdf->GetY(), 190, 60);
  $pdf->Cell(0, 10, 'Doctor Details:', 0, 1);

  // Draw a box around doctor details
  $pdf->Rect(10, $pdf->GetY(), 190, 60);

  // Set font for doctor details
  $pdf->SetFont('Arial', '', 12);

  $pdf->Cell(50, 10, 'Doctor Name:', 0);
  $pdf->Cell(0, 10, $doctor_name, 0, 1);

  $pdf->Cell(50, 10, 'Appointment Date:', 0);
  $pdf->Cell(0, 10, $appointment_date, 0, 1);

  $pdf->Cell(50, 10, 'Appointment Time:', 0);
  $pdf->Cell(0, 10, $appointment_time, 0, 1);

  $pdf->Cell(50, 10, 'Specification:', 0);
  $pdf->MultiCell(0, 10, $specification);

  $pdfContent = $pdf->Output("appointment.pdf", "D");


  echo 'PDF generated and data saved successfully.';
}
?>
