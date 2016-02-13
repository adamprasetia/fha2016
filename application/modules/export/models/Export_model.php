<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export_model extends CI_Model {
	function export($event,$date_from,$date_to){
		$this->db->select('A.*,B.name as event_name,C.name as status_name');
		$this->db->from('candidate A');
		$this->db->join('event B','A.event = B.id','left');
		$this->db->join('candidate_status C','A.status = C.id','left');
		if($event <> ''){
			$this->db->where('A.event',$event);			
		}
		if($date_from <> '0000-00-00' && $date_to <> '0000-00-00'){
			$this->db->where('A.dist_date >=',$date_from);
			$this->db->where('A.dist_date <=',$date_to);
		}	
		return $this->db->get();
	}
}