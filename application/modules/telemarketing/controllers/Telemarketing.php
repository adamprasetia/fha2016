<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telemarketing extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('telemarketing_model');
		$this->load->model('callhis_model');
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
				$this->callhis_model->get_note($r->id),
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
			'telemarketer'=>$this->input->post('telemarketer'),
			'date_from'=>$this->input->post('date_from'),
			'date_to'=>$this->input->post('date_to')
		);
		redirect('telemarketing'.get_query_string($data));		
	}	
	public function phone($id){
		$this->form_validation->set_rules('status','Status','trim');
		if($this->form_validation->run()===false){
			$xdata['candidate'] 	= $this->telemarketing_model->get_candidate($id);
			$xdata['priority'] 	= $this->telemarketing_model->get_priority($xdata['candidate']->event,$xdata['candidate']->actcode);
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
				'tlp_new'=>$this->input->post('tlp_new'),
				'mobile_new'=>$this->input->post('mobile_new'),
				'mobile_sms'=>$this->input->post('mobile_sms'),
				'called'=>$this->input->post('called'),
				'fminute'=>$this->input->post('fminute'),
				'push'=>$this->input->post('push'),
				'eknow'=>$this->input->post('eknow'),
				'register'=>$this->input->post('register'),
				'email'=>$this->input->post('email'),
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
	public function send_email(){
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}	
		
		$this->form_validation->set_rules('id','ID','required');
		$this->form_validation->set_rules('to','Email','required|valid_email');
		$this->form_validation->set_error_delimiters('', '');
		if($this->form_validation->run()===false){
			$data = array('status'=>'0','result'=>validation_errors());
			echo json_encode($data);
		}else{
			$id = $this->input->post('id');
			$to = $this->input->post('to');

			/*$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'adam.prasetia@gmail.com', // change it to yours
				'smtp_pass' => 'azywjidpigwvkxeg', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);*/
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'mail.adirect.web.id',
				'smtp_port' => '25',
				'smtp_timeout' => '30',
				'newline' => "\r\n",
				'smtp_user' => 'no-reply@adirect.web.id', // change it to yours
				'smtp_pass' => 'n0-reply', // change it to yours
				'mailtype' => 'html',
				'charset' => 'utf-8'
			);
			$data['candidate'] = $this->telemarketing_model->get_candidate($id);
			$subject = '';
			if($data['candidate']->event==4){
				$subject = 'Invitation to visit Food&HotelAsia2016';
			}elseif($data['candidate']->event==5){
				$subject = 'Invitation to visit ProWine ASIA 2016';
			}elseif($data['candidate']->event==6){
				$subject = 'Invitation to visit FHA2016 and ProWine ASIA 2016';
			}

			$message = $this->load->view('email_'.$data['candidate']->event,$data,true);

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");

			if($data['candidate']->event==4){
				$from = 'Food&HotelAsia2016';
			}elseif($data['candidate']->event==5){
				$from = 'ProWine ASIA 2016';
			}elseif($data['candidate']->event==6){
				$from = 'FHA2016 and ProWine ASIA 2016';
			}
			$this->email->from('no-reply@adirect.web.id',$from); // change it to yours

			$this->email->to($to);// change it to yours
			$this->email->subject($subject);
			$this->email->message($message);
			if($this->email->send()){
				$data = array('status'=>'1','result'=>'Email successfully sent');
			}else{
				$data = array('status'=>'0','result'=>'Email fails to be sent');
			}
			echo json_encode($data);
		}
	}	
}