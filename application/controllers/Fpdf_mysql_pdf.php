<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fpdf_mysql_pdf extends CI_Controller {

	/**
	 * Example: FPDF
	 *
	 * Documentation:
	 * http://www.fpdf.org/ > Manual
	 *
	 */
	public function index() {

		$enquiries = array();
		$enquiries =  $this->enquiry_model->get_enquiries();


		//$headers = array('Enquiry Id', 'Customer name', 'Email', 'Phone number', 'message', 'Date of enquiry');

		$this->load->library('fpdf_gen');

		// column widths
		//$width = array('20', '40', '40', '30', '55', '30');

		// title
		 $this->fpdf->SetFont('Arial','B',16);
		 $this->fpdf->Cell('40', '10', 'Enquiries');
		 $this->fpdf->Ln(20);

		// header
		//$this->fpdf->SetFont('Arial','B',12);
		//for($i=0; $i < count($headers); $i++){
			//$this->fpdf->Cell($width[$i], 7, $headers[$i], 1, 0, 'C');
		//}
		//$this->fpdf->Ln();

		// data
		$this->fpdf->SetFont('Arial','',12);
		foreach($enquiries as $enquiry){
			$this->fpdf->Cell(0, 6, 'Enquiry ID - '.$enquiry['enquiry_id']);
			$this->fpdf->Ln();
			$this->fpdf->Cell(0, 6, 'Customer name - '.$enquiry['name']);
			$this->fpdf->Ln();
			$this->fpdf->Cell(0, 6, 'Email - '.$enquiry['email']);
			$this->fpdf->Ln();
			$this->fpdf->Cell(0, 6, 'Phone number - '.$enquiry['phone_number']);
			$this->fpdf->Ln();
			$this->fpdf->Cell(0, 6, 'message - '.$enquiry['message']);
			$this->fpdf->Ln();
			$this->fpdf->Cell(0, 6, 'Date of enquiry - '.$enquiry['date_of_enquiry']);
			$this->fpdf->Ln(20);
		}


		echo $this->fpdf->Output('enquiries.pdf','D');
	}
}
