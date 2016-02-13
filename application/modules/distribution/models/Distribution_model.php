<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distribution_model extends CI_Model {
	function distribution($telemarketer,$total){
		$this->filter();
		$this->db->where('A.telemarketer','0');
		$this->db->limit($total);
		$this->db->update('candidate A',array('A.telemarketer'=>$telemarketer,'dist_date'=>date('Y-m-d')));
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
		$this->db->where('A.audit','0');
		$this->db->from('candidate A');
		$this->db->where('A.telemarketer',$id);
		return $this->db->get()->num_rows();
	}
	function count_by_telemarketer_onproses($id){
		$this->filter();
		$this->db->where('A.status <>','0');
		$this->db->where('A.audit','0');
		$this->db->from('candidate A');
		$this->db->where('A.telemarketer',$id);
		return $this->db->get()->num_rows();
	}
	function count_by_telemarketer_complete($id){
		$this->filter();
		$this->db->where('A.audit','1');
		$this->db->where('A.telemarketer',$id);
		$this->db->from('candidate A');
		return $this->db->get()->num_rows();
	}
	function clear(){
		$this->filter();
		$this->db->where('A.audit','0');
		$this->db->update('candidate A',array('A.telemarketer'=>'0'));
		return $this->db->affected_rows();
	}
	function clear_by_telemarketer($id){
		$this->filter();
		$this->db->where('A.audit','0');
		$this->db->where('A.telemarketer',$id);
		$this->db->update('candidate A',array('A.telemarketer'=>'0'));
		return $this->db->affected_rows();
	}	
	function filter(){
		$event 			= $this->input->get('event');

		$data = array();
		if($event <> ''){
			$data[] = $this->db->where('A.event',$event);			
		}
		return $data;
	}
}