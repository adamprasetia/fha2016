<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('export_model');
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
			$active_sheet->setCellValue('B1', 'Serial Number');
			$active_sheet->setCellValue('C1', 'Name of Contacts');
			$active_sheet->setCellValue('D1', 'Job Title');
			$active_sheet->setCellValue('E1', 'Company');
			$active_sheet->setCellValue('F1', 'Telephone');
			$active_sheet->setCellValue('G1', 'Date');
			$active_sheet->setCellValue('H1', 'Event');
			
			$event 			= $this->input->post('event');
			$date_from 	= format_ymd($this->input->post('date_from'));
			$date_to 		= format_ymd($this->input->post('date_to'));

			$result 		= $this->export_model->export($event,$date_from,$date_to)->result();
			$i=2;
			foreach($result as $r){
				$active_sheet->setCellValue('A'.$i, $i-1);
				$active_sheet->setCellValueExplicit('B'.$i, $r->sn);
				$active_sheet->setCellValue('C'.$i, $r->name);
				$active_sheet->setCellValue('D'.$i, $r->title);
				$active_sheet->setCellValue('E'.$i, $r->company);
				$active_sheet->setCellValueExplicit('F'.$i, $r->tlp);
				$active_sheet->setCellValue('G'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->date)));
				$active_sheet->getStyle('G'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('H'.$i, $r->event_name);
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
