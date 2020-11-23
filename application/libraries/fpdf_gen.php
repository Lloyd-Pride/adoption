<?php //if(!define('BASEPATH')) exit ('No Access');

class fpdf_gen
{
	public function __construct()
	{
		require_once APPPATH.'third_party/fpdf/fpdf.php';
		$pdf = new FPDF();

		$CI = get_instance();
		$CI->fpdf = $pdf;
	}

	function viewTable($aData, $aPost)
	{
		$pdf = new FPDF();
		$pdf->SetFont('Times', 'B', 12);
		$pdf->AddPage('L', 'A4', 0);
		//header
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Cell(276,5,'ADOPTION REPORT', 0, 0, 'C');
		$pdf->Ln();

		if( $aPost['type'] == 'children' )
		{
			$pdf->Cell(276,5,'This report contains a list of Children', 0, 0, 'C');
		}
		else if( $aPost['type'] == 'foster' )
		{
			$pdf->Cell(276,5,'This report contains a list of Foster Applicants', 0, 0, 'C');
		}
		else
			$pdf->Cell(276,5,'This report contains a list of Biological parents of children', 0, 0, 'C');

		$pdf->Ln();
		$pdf->Ln();
		
		//Table header
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(20,10,'No:',1,0,'C');
		$pdf->Cell(60,10,'Name & Surname',1,0,'C');
		
		if( $aPost['type'] == 'children' )
		{
			$pdf->Cell(40,10,'Race',1,0,'C');
			$pdf->Cell(36,10,'Age',1,0,'C');
			$pdf->Cell(60,10,'Date Of Birth',1,0,'C');
			$pdf->Cell(50,10,'Gender',1,0,'C');
		}
		else
			$pdf->Cell(50,10,'Email',1,0,'C');

		$pdf->Ln();
		
		foreach ($aData as $key => $data) 
		{
			if( $aPost['type'] == 'children' )
			{
				$dob = date("Y/m/d", $data['dob']);
	            $today = date("Y/m/d");
	            $oAge = date_diff(date_create($dob), date_create($today));
	            
	            if($oAge->y == 1)
	                $age = $oAge->y.' year';
	            else if($oAge->y > 1)
	                $age = $oAge->y.' years';
	            else if($oAge->y == 0 && $oAge->m <= 1)
	            {
	                if($oAge->m == 1) 
	                    $age = $oAge->m.' month';
	                else if($oAge->d <= 1) 
	                    $age = $oAge->d.' day';
	                else
	                    $age = $oAge->d.' days';
	            }
	            else if($oAge->y == 0 && $oAge->m > 1)
	                $age = $oAge->m.' months';
			}
            

			$key = $key + 1;
			$pdf->Cell(20,10,$key++,1,0,'C');
			$pdf->Cell(60,10,$data['name'].' '.$data['surname'],1,0,'L');

			if( $aPost['type'] == 'children' )
			{
				$pdf->Cell(40,10,$data['race'],1,0,'L');
				$pdf->Cell(36,10,$age,1,0,'L');
				$pdf->Cell(60,10,$dob,1,0,'L');
				$pdf->Cell(50,10,$data['gender'],1,0,'L');
			}
			else
			{
				$pdf->Cell(50,10,$data['email'],1,0,'L');
			}

			$pdf->Ln();
		}

		$pdf->AliasNbPages();
		$pdf->output('report_download.pdf', 'D');
		return true;
	}

}