<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	// Title
	$this->Image('home.png',20,5,30);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(60,15,'Lista aplicatii',1,0,'C');
    // Line break
    $this->Ln(30);
	// Ensure table header is printed
	parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','root','','sofy');

$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns
$pdf->AddCol('NUME',40,'Nume','C');
$pdf->AddCol('CATEGORIE',40,'Categorie','C');
$pdf->AddCol('RATING',20,'Rating','C');
$pdf->AddCol('NO_DOWNLOADS',30,'Nr. descarcari','C');
$pdf->AddCol('UPLOAD_DATE',40,'Data incarcare','C');
$pdf->AddCol('COST',20,'Cost','C');
$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,'select NUME, CATEGORIE, RATING, NO_DOWNLOADS, UPLOAD_DATE, COST from apps',$prop);
$pdf->Output();
?>
