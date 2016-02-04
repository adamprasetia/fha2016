<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distribution_model extends CI_Model {
	function distribution($telemarketer,$total){
		$this->filter();
		$this->db->where('A.telemarketer','0');
		$this->db->limit($total);
		$this->db->update('candidate A',array('A.telemarketer'=>$telemarketer));
		return $this->db->affected_rows();
	}	
	function get_telemarketer(){
		$this->db->where('level','3');
		$this->db->where('status','1');
		$this->db->from('user');
		return $this->db->get()->result();
	}
	function count_ready_distribution(){
		$this->filter();
		$this->db->where('A.telemarketer','0');
		$this->db->from('candidate A');
		return $this->db->get()->num_rows();
	}
	function count_by_telemarketer_new($id){
		$this->filter();
		$this->db->where('A.status','0');
		$this->db->from('candidate A');
		$this->db->join('call_history B','A.id = B.candidate','left');
		$this->db->where('A.telemarketer',$id);
		$this->db->where('B.id is null');
		$this->db->group_by('A.id');
		return $this->db->get()->num_rows();
	}
	function count_by_telemarketer_onproses($id){
		$this->filter();
		$this->db->where('A.status','0');
		$this->db->from('candidate A');
		$this->db->join('call_history B','A.id = B.candidate');
		$this->db->where('A.telemarketer',$id);
		$this->db->group_by('A.id');
		return $this->db->get()->num_rows();
	}
	function count_by_telemarketer_complete($id){
		$this->filter();
		$this->db->where('A.status <>','0');
		$this->db->where('A.telemarketer',$id);
		$this->db->from('candidate A');
		return $this->db->get()->num_rows();
	}
	function clear(){
		$this->filter();
		$this->db->where('A.status','0');
		$this->db->update('candidate A',array('A.telemarketer'=>'0'));
		return $this->db->affected_rows();
	}
	function clear_by_telemarketer($id){
		$this->filter();
		$this->db->where('A.status','0');
		$this->db->where('A.telemarketer',$id);
		$this->db->update('candidate A',array('A.telemarketer'=>'0'));
		return $this->db->affected_rows();
	}	
	function filter(){
		$event 			= $this->input->get('event');
		$date_from 		= format_ymd($this->input->get('date_from'));
		$date_to 		= format_ymd($this->input->get('date_to'));

		$data = array();
		if($event <> ''){
			$data[] = $this->db->where('A.event',$event);			
		}
		if($date_from <> '0000-00-00' && $date_to <> '0000-00-00'){
			$data[] = $this->db->where('A.date >=',$date_from);
			$data[] = $this->db->where('A.date <=',$date_to);
		}	
		return $data;
	}
}