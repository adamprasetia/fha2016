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
			'status_name'	=> 'Status'
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
				$r->sn.($r->audit==1?' <span class="label label-primary">Audit</span>':''),
				$r->name,
				$r->title,
				$r->company,
				$r->tlp,			
				$r->status_name,			
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
		);
		redirect('telemarketing'.get_query_string($data));		
	}	
	public function phone($id){
		$this->form_validation->set_rules('status','Status','trim');
		if($this->form_validation->run()===false){
			$xdata['candidate'] 	= $this->telemarketing_model->get_candidate($id);
			$xdata['breadcrumb']	= 'telemarketing'.get_query_string();
			$xdata['callhis']		= $this->telemarketing_model->get_call($id);
			$data['content'] = $this->load->view('telemarketing_form',$xdata,true);
			$this->load->view('template',$data);
		}else{

		}
	}
}