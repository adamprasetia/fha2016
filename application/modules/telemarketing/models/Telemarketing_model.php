<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telemarketing_model extends CI_Model {
	public function get_candidate($id){
		$this->db->where('id',$id);
		$this->db->from('candidate');
		return $this->db->get()->row();
	}
	public function set_callhis($data){
		$this->db->insert('call_history',$data);		
	}
	public function get_call($id){
		$this->db->where('candidate',$id);
		$this->db->from('call_history');
		$this->db->order_by('date','acs');
		return $this->db->get()->result();		
	}
	public function count_call($id){
		$this->db->where('candidate',$id);
		$this->db->from('call_history');
		return $this->db->get()->num_rows();
	}
	public function get(){
		$this->filter();
		$this->db->select('A.*,B.name as status_name');
		$this->db->from('candidate A');
		$this->db->join('candidate_status B','A.status = B.id','left');
		$this->db->order_by($this->general->get_order_column('A.ID'),$this->general->get_order_type('desc'));
		$this->db->limit($this->general->get_limit());
		$this->db->offset($this->general->get_offset());
		return $this->db->get();
	}
	public function count_all(){
		$this->filter();
		$this->db->from('candidate A');
		return $this->db->get()->num_rows();		
	}
	private function filter(){
		$data = array();
		$status = $this->input->get('status');
		$search = $this->input->get('search');
		$event = $this->input->get('event');
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
		return $data;
	}
	public function status_dropdown($tbl_name = '',$caption = '', $parent){
		$tbl_name = ($tbl_name <> ''?$tbl_name:$this->tbl_name);
		$result = $this->db->where('parent',$parent);
		$result = $this->db->get($tbl_name)->result();
		$data[''] = '- '.$caption.' -';
		foreach($result as $r){
			$data[$r->id] = $r->name;
		}
		return $data;
	}			
}