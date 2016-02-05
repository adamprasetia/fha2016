<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telemarketing extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('telemarketing_model');
	}
	public function index(){
		$offset = $this->general->get_offset();
		$limit 	= $this->general->get_limit();
		$total 	= $this->telemarketing_model->count_all();

		$xdata['action'] = 'telemarketing/search'.get_query_string();

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'sn'			=> 'Serial Number',
			'name'			=> 'Name of Contact',
			'title'			=> 'Job Title',
			'company'		=> 'Company Name',
			'tlp'			=> 'Phone',
			'status_name'	=> 'Status',
			'telemarketer'	=> 'Telemarketer',
			'note'			=> 'Note'
		);
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor('telemarketing'.get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = 'Action';
		$this->table->set_heading($heading);
		$result = $this->telemarketing_model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$count_call = $this->telemarketing_model->count_call($r->id);
			$this->table->add_row(
				$i++,
				anchor('telemarketing/phone/'.$r->id.get_query_string(),$r->sn).($r->audit==1?' <span class="label label-primary">Audit</span>':''),
				$r->name,
				$r->title,
				$r->company,
				$r->tlp,			
				$r->status_name,			
				$r->telemarketer,			
				$r->note,			
				anchor('telemarketing/phone/'.$r->id.get_query_string(),'Phone'.($count_call > 0?' <span class="label label-success">'.$count_call.' <span class="glyphicon glyphicon-earphone"></span></span>':''))
			);
		}
		$xdata['table'] = $this->table->generate();
		$xdata['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = "telemarketing".get_query_string(null,'offset');
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$xdata['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view('telemarketing_list',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'status'=>$this->input->post('status'),
			'event'=>$this->input->post('event'),
			'telemarketer'=>$this->input->post('telemarketer')
		);
		redirect('telemarketing'.get_query_string($data));		
	}	
	public function phone($id){
		$this->form_validation->set_rules('status','Status','trim');
		if($this->form_validation->run()===false){
			$xdata['candidate'] 	= $this->telemarketing_model->get_candidate($id);
			$xdata['breadcrumb']	= 'telemarketing'.get_query_string();
			$xdata['callhis']		= $this->telemarketing_model->get_call($id);
			$xdata['action']		= 'telemarketing/phone/'.$id.get_query_string();
			$data['content'] = $this->load->view('telemarketing_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = array(
				'status'=>$this->input->post('status'),
				'new_contact'=>$this->input->post('new_contact'),
				'name_new'=>$this->input->post('name_new'),
				'title_new'=>$this->input->post('title_new'),
				'company_new'=>$this->input->post('company_new'),
				'tlp_new'=>$this->input->post('tlp_new'),
				'note'=>$this->input->post('note'),
				'called'=>$this->input->post('called'),
				'fminute'=>$this->input->post('fminute'),
				'push'=>$this->input->post('push'),
				'eknow'=>$this->input->post('eknow'),
				'register'=>$this->input->post('register'),
				'email'=>$this->input->post('email'),
				'mobile'=>$this->input->post('mobile'),
				'sendemail'=>$this->input->post('sendemail'),
				'sendsms'=>$this->input->post('sendsms'),
				'attend'=>$this->input->post('attend'),
				'audit'=>$this->input->post('audit')
			);
			$this->telemarketing_model->phone($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Data has been saved</div>');
			redirect('telemarketing/phone/'.$id.get_query_string());			
		}
	}
}