<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('export_model');
		$this->load->model('telemarketing/callhis_model');
	}
	public function index(){
		$data['content'] = $this->load->view('export','',true);
		$this->load->view('template',$data);
	}
	public function execute(){		
		$this->form_validation->set_rules('event','Event','trim');
		$this->form_validation->set_rules('date_from','Date From','trim');
		$this->form_validation->set_rules('date_to','Date To','trim');
		if($this->form_validation->run()===false){
			$this->session->set_flashdata('alert','<div class="alert alert-danger">'.validation_errors().'</div>');
			$data['content'] = $this->load->view('export','',true);
			$this->load->view('template',$data);			
		}else{
			ini_set('memory_limit','-1'); 
			
			require_once "../assets/phpexcel/PHPExcel.php";
			$excel = new PHPExcel();
			
			$excel->setActiveSheetIndex(0);
			$active_sheet = $excel->getActiveSheet();
			$active_sheet->setTitle('Candidate');
			
			//style
			$active_sheet->getStyle("A1:AC1")->getFont()->setBold(true);

			//header
			$active_sheet->setCellValue('A1', 'No');
			$active_sheet->setCellValue('B1', 'Event');
			$active_sheet->setCellValue('C1', 'Serial Number');
			$active_sheet->setCellValue('D1', 'Name of Contacts');
			$active_sheet->setCellValue('E1', 'Job Title');
			$active_sheet->setCellValue('F1', 'Departement');
			$active_sheet->setCellValue('G1', 'Company');
			$active_sheet->setCellValue('H1', 'Telephone');
			$active_sheet->setCellValue('I1', 'Mobile');
			$active_sheet->setCellValue('J1', 'Actcode');
			$active_sheet->setCellValue('K1', 'New Name');
			$active_sheet->setCellValue('L1', 'New Title');
			$active_sheet->setCellValue('M1', 'New Telephone');
			$active_sheet->setCellValue('N1', 'New Mobile');
			$active_sheet->setCellValue('O1', 'Email');
			$active_sheet->setCellValue('P1', 'Mobile Sms');
			$active_sheet->setCellValue('Q1', 'Distribution Date');
			$active_sheet->setCellValue('R1', 'Status');
			$active_sheet->setCellValue('S1', 'Call History');
			
			$event 			= $this->input->post('event');
			$date_from 	= format_ymd($this->input->post('date_from'));
			$date_to 		= format_ymd($this->input->post('date_to'));

			$result 		= $this->export_model->export($event,$date_from,$date_to)->result();
			$i=2;
			foreach($result as $r){
				$active_sheet->setCellValue('A'.$i, $i-1);
				$active_sheet->setCellValue('B'.$i, $r->event_name);
				$active_sheet->setCellValueExplicit('C'.$i, $r->sn);
				$active_sheet->setCellValue('D'.$i, $r->name);
				$active_sheet->setCellValue('E'.$i, $r->title);
				$active_sheet->setCellValue('F'.$i, $r->dept);
				$active_sheet->setCellValue('G'.$i, $r->company);
				$active_sheet->setCellValueExplicit('H'.$i, $r->tlp);
				$active_sheet->setCellValueExplicit('I'.$i, $r->mobile);
				$active_sheet->setCellValue('J'.$i, $r->actcode);
				$active_sheet->setCellValue('K'.$i, $r->name_new);
				$active_sheet->setCellValue('L'.$i, $r->title_new);
				$active_sheet->setCellValueExplicit('M'.$i, $r->tlp_new);
				$active_sheet->setCellValueExplicit('N'.$i, $r->mobile_new);
				$active_sheet->setCellValue('O'.$i, $r->email);
				$active_sheet->setCellValueExplicit('P'.$i, $r->mobile_sms);
				$active_sheet->setCellValue('Q'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->dist_date)));
				$active_sheet->getStyle('Q'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('R'.$i, $r->status_name);
				$active_sheet->setCellValue('S'.$i, $this->callhis_model->get_note($r->id));
				$i++;
			}

			$filename='Candidate_'.date('Ymd_His').'.xlsx';
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');
								 
			$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');  
			$objWriter->save('php://output');										
		}
	}
}
