<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	// Title
	$this->Image('home.png',10,-1,30);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Lista aplicatii',1,0,'C');
    // Line break
    $this->Ln(20);
	parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','root','','sofy');

$pdf = new PDF();
$pdf->AddPage();

// First table: output all columns
$pdf->AddCol('NUME',40,'Nume','C');
$pdf->AddCol('RATING',20,'Rating','C');
$pdf->AddCol('NO_DOWNLOADS',30,'Nr. descarcari','C');
$pdf->AddCol('UPLOAD_DATE',40,'Data incarcare','C');
$pdf->AddCol('COST',20,'Cost','C');
$pdf->Table($link,'select NUME, RATING, NO_DOWNLOADS, UPLOAD_DATE, COST from apps');
$pdf->Output();
?>
