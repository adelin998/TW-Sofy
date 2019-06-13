<?php
require('textbox.php');

Class dbObj{
/* Database connection start */
var $dbhost = "localhost";
var $username = "root";
var $password = "";
var $dbname = "sofy";
var $conn;
function getConnstring() {
$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
return $this->conn;
}
}

include_once('libs/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('home.png',10,-1,30);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Lista aplicatii',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$db = new dbObj();
$connString =  $db->getConnstring();

$display_heading = array( 'NUME'=> 'Name', 'ID_UPLOADER'=> 'Id_uploader', 'CATEGORIE'=> 'Categorie', 'S_O'=> 'Sitem operare', 'TAGS'=> 'Taguri', 'DESCRIERE'=> 'Descriere', 'COST'=> 'Cost', 'UPLOAD_DATE'=> 'Data_incarcare', 'RATING'=> 'Rating', 'NO_DOWNLOADS'=> 'Numar descarcari', 'SIZE'=> 'Dimensiune', 'ACCEPT_TAG'=> 'ACCEPT_TAG', 'APP_SRC'=> 'APP_SRC', 'LOGO_SRC'=> 'LOGO_SRC');

$titluri= array( "Nume:", "Id_uploader:", "Categorie:", "Sistem operare:", "Taguri:", "Cost:", "Data incarcare:", "Rating:", "Numar descarcari:", "Dimensiune:", "Descriere:");

$result = mysqli_query($connString, "SELECT  NUME, ID_UPLOADER, CATEGORIE, S_O, TAGS, COST, UPLOAD_DATE, RATING, NO_DOWNLOADS, SIZE, DESCRIERE FROM apps where ID='1'") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM apps");

$pdf = new PDF_TextBox();
//header
$pdf->AddPage();
    $pdf->Ln(5);
$pdf->Image('home.png',10,5,30);
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(60);
    $pdf->Cell(70,15,'Date aplicatie',1,0,'C');
    $pdf->Ln(20);

//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
//foreach($header as $heading) {
//$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
//}
$aux=50;
$index=0;
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column){
    $pdf->Ln();

$pdf->SetXY(80,$aux);
if($index==10){
    $pdf->drawTextBox($column, 100, 130, 'T', 'T');}
else{
    $pdf->drawTextBox($column, 100, 10, 'C', 'M');}

$pdf->SetXY(30,$aux);
$pdf->drawTextBox($titluri[$index], 50, 10, 'C', 'M');
$index=$index+1;
$aux=$aux+10;
}
}



$pdf->Output();

?>