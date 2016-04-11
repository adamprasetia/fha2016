<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribution extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('reminder_distribution/distribution_model');
	}
	public function index(){
		$xdata['telemarketer'] 	= $this->distribution_model->get_telemarketer();
		$xdata['total'] 		= $this->distribution_model->count_ready_distribution();
		$data['content'] 		= $this->load->view('reminder_distribution/distribution',$xdata,true);
		$this->load->view('template',$data);
	}
	public function execute(){		
		$telemarketer_list = $this->distribution_model->get_telemarketer();
		$i = 0;
		foreach($telemarketer_list as $row){
			$telemarketer 	= $row->id;
			$total 			= $this->input->post('telemarketer_'.$row->id);
			if($total <> '' && $total <> 0){
				$r = $this->distribution_model->distribution($telemarketer,$total);
				$i += $r;
			}
		}
		if($i == 0){
			$this->session->set_flashdata('alert','<div class="alert alert-warning">Warning : None of the data is distributed</div>');
		}else{
			$this->session->set_flashdata('alert','<div class="alert alert-success">Success : '.$i.' data has been distributed</div>');
		}
		redirect('reminder_distribution/distribution'.get_query_string());	
	}
	public function clear($id = ''){
		$i = 0;
		if($id <> ''){
			$i = $this->distribution_model->clear_by_telemarketer($id);
		}else{
			$i = $this->distribution_model->clear();
		}
		if($i == 0){
			$this->session->set_flashdata('alert','<div class="alert alert-warning">Warning : None of the data is cleared</div>');
		}else{
			$this->session->set_flashdata('alert','<div class="alert alert-success">Success : '.$i.' data has been cleared</div>');
		}
		redirect('reminder_distribution/distribution'.get_query_string());	
	}
	public function clear_noans_busy(){
		$i = $this->distribution_model->clear_noans_busy();
		if($i == 0){
			$this->session->set_flashdata('alert','<div class="alert alert-warning">Warning : None of the data is cleared</div>');
		}else{
			$this->session->set_flashdata('alert','<div class="alert alert-success">Success : '.$i.' data has been cleared</div>');
		}
		redirect('reminder_distribution/distribution'.get_query_string());			
	}
	public function clear_callback(){
		$i = $this->distribution_model->clear_callback();
		if($i == 0){
			$this->session->set_flashdata('alert','<div class="alert alert-warning">Warning : None of the data is cleared</div>');
		}else{
			$this->session->set_flashdata('alert','<div class="alert alert-success">Success : '.$i.' data has been cleared</div>');
		}
		redirect('reminder_distribution/distribution'.get_query_string());			
	}
}
