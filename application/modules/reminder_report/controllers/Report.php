<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('reminder_report/report_model');
	}
	public function index(){
		$xdata['action'] = 'reminder_report/report/search'.get_query_string();
		$xdata['report_status'] = $this->report_model->status();
		$data['content'] = $this->load->view('reminder_report/report',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'event'=>$this->input->post('event'),
			'date_from'=>$this->input->post('date_from'),
			'date_to'=>$this->input->post('date_to')
		);
		redirect('reminder_report/report'.get_query_string($data));		
	}	
}