<?php

require "fpdf.php";

class myPDF extends FPDF
{
	function header()
	{
		$this->SetFont('Arial', 'B', 14);
		$this->Cell(276,5,'ADOPTION REPORT', 0, 0, 'C');
		$this->Ln();
	}
	function footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial', '', 8);
		$this->Cell(0,10'Page '.$this->PageNo().'/{nb}', 0,0,'C');
	}
	function headerTable()
	{
		$this->SetFont('Times', 'B', 12);
		$this->Cell(20,10,'No:',1,0,'C');
		$this->Cell(40,10,'Name & Surname',1,0,'C');
		$this->Cell(40,10,'Race',1,0,'C');
		$this->Cell(36,10,'Age',1,0,'C');
		$this->Cell(60,10,'Date Of Birth',1,0,'C');
		$this->Cell(50,10,'Gender',1,0,'C');
		$this->Ln();
	}
	function viewTable($aData)
	{
		$this->SetFont('Times', 'B', 12);

		foreach ($aData as $key => $data) 
		{
			$this->Cell(20,10,$key++,1,0,'C');
			$this->Cell(40,10,$data['name'],1,0,'L');
			$this->Cell(40,10,$data['race'],1,0,'L');
			$this->Cell(36,10,$data['age'],1,0,'L');
			$this->Cell(60,10,$data['dob'],1,0,'L');
			$this->Cell(50,10,$data['gender'],1,0,'L');
			$this->Ln();
		}
	}
}