<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telemarketing_model extends CI_Model {
	public function phone($id,$data){
		$this->db->where('id',$id);
		$this->db->update('reminder_candidate',$data);
	}
	public function get_priority($event,$code){
		$this->db->from('actcode A');
		$this->db->where('A.event',$event);
		$this->db->where('A.code',$code);
		return $this->db->get()->row();
	}
	public function get_candidate($id){
		$this->db->select('A.*,B.name as event_name,C.name as telemarketer');
		$this->db->from('reminder_candidate A');
		$this->db->join('event B','A.event=B.id');
		$this->db->join('user C','A.telemarketer = C.id','left');
		$this->db->where('A.id',$id);
		return $this->db->get()->row();
	}
	public function set_callhis($data){
		$this->db->insert('reminder_call_history',$data);		
	}
	public function get_call($id){
		$this->db->where('candidate',$id);
		$this->db->from('reminder_call_history');
		$this->db->order_by('date','acs');
		return $this->db->get()->result();		
	}
	public function count_call($id){
		$this->db->where('candidate',$id);
		$this->db->from('reminder_call_history');
		return $this->db->get()->num_rows();
	}
	public function get(){
		$this->filter();
		$this->db->select('A.*,B.name as status_name,C.name as telemarketer');
		$this->db->from('reminder_candidate A');
		$this->db->join('reminder_candidate_status B','A.status = B.id','left');
		$this->db->join('user C','A.telemarketer = C.id','left');
		if($this->user_login['level']==3){
			$this->db->where('A.telemarketer',$this->user_login['id']);
			$this->db->where('A.audit','0');			
		}
		$this->db->order_by($this->general->get_order_column('A.ID'),$this->general->get_order_type('desc'));
		$this->db->limit($this->general->get_limit());
		$this->db->offset($this->general->get_offset());
		return $this->db->get();
	}
	public function count_all(){
		$this->filter();
		$this->db->from('reminder_candidate A');
		if($this->user_login['level']==3){
			$this->db->where('A.telemarketer',$this->user_login['id']);
			$this->db->where('A.audit','0');			
		}
		return $this->db->get()->num_rows();		
	}
	private function filter(){
		$data = array();
		$status = $this->input->get('status');
		$search = $this->input->get('search');
		$event = $this->input->get('event');
		$date_from = $this->input->get('date_from');
		$date_to = $this->input->get('date_to');
		$valid = $this->input->get('valid');
		$audit = $this->input->get('audit');
		$proses = $this->input->get('proses');

		$telemarketer = $this->input->get('telemarketer');
		if($status <> ''){
			$data[] = $this->db->where('A.status',$status);
		}
		if($event <> ''){
			$data[] = $this->db->where('A.event',$event);
		}
		if($search <> ''){
			$data[] = $this->db->where('(
				A.sn like "%'.$search.'%" or
				A.name like "%'.$search.'%" or
				A.title like "%'.$search.'%" or
				A.company like "%'.$search.'%" or
				A.tlp like "%'.$search.'%")
			');
		}
		if($telemarketer <> ''){
			$data[] = $this->db->where('A.telemarketer',$telemarketer);
		}		
		if($date_from <> '' && $date_to <> ''){
			$data[] = $this->db->where('A.dist_date >=',format_ymd($date_from));
			$data[] = $this->db->where('A.dist_date <=',format_ymd($date_to));
		}		
		if($valid <> ''){
			$data[] = $this->db->where('A.valid',$valid);
		}		
		if($audit <> ''){
			$data[] = $this->db->where('A.audit',$audit);
		}		
		if($proses <> ''){
			$data[] = $this->db->where('A.audit',0);
			$data[] = $this->db->where('A.valid',0);
		}		

		return $data;
	}
	public function status_dropdown(){
		$result = $this->db->where('parent',0);
		$result = $this->db->get('reminder_candidate_status')->result();
		$data[''] = '- Status -';
		foreach($result as $r){
			$data[$r->name] = $this->status_detail($r->id);
		}
		return $data;
	}
	private function status_detail($parent){
		$this->db->where('parent',$parent);
		$result = $this->db->get('reminder_candidate_status')->result();
		$data = array();
		foreach($result as $r){
			$data[$r->id] = $r->name;
		}
		return $data;

	}
	public function telemarketer_dropdown(){
		$result = $this->db->where('level',3);
		$result = $this->db->get('user')->result();
		$data[''] = '- Telemarketer -';
		foreach($result as $r){
			$data[$r->id] = $r->name;
		}
		return $data;
	}	
}