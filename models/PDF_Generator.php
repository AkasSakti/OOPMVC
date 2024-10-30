<?php
require_once ROOT_DIR . '/libraries/fpdf/fpdf.php';
class PDF_Generator extends FPDF {
    function Header() {
        $this->SetFont('Arial','B',15);
        $this->Cell(60);
        $this->Cell(70,10,'Detail Informasi Pemakai',0,0,'C');
        $this->Ln(20);
    }

    function UserInfo($data) {
        $this->SetFont('Arial','B',14);
        $this->Cell(0,10,'INFORMASI DETAIL PEMAKAI',0,1,'C');
        $this->Ln(10);

        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,'Data Pribadi',0,1);
        $this->Line(10,$this->GetY(),200,$this->GetY());
        $this->Ln(5);

        $this->SetFont('Arial','',12);
        
        // Data Pribadi
        $this->Cell(40,8,'NIM',0,0);
        $this->Cell(5,8,':',0,0);
        $this->Cell(100,8,$data['nim'],0,1);
        
        $this->Cell(40,8,'Nama Lengkap',0,0);
        $this->Cell(5,8,':',0,0);
        $this->Cell(100,8,$data['nama'],0,1);
        
        $this->Cell(40,8,'Email',0,0);
        $this->Cell(5,8,':',0,0);
        $this->Cell(100,8,$data['email'],0,1);

        $this->Ln(10);
        
        $this->SetFont('Arial','',10);
        $this->Cell(0,10,'Dokumen ini digenerate pada: ' . date('d/m/Y H:i:s'),0,1,'R');
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
    }
}