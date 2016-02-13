<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {
	public function status(){
		$this->db->select('
			B.name as event,
			sum(if(A.status=0,1,0)) as proses,
			sum(if(A.status=11,1,0)) as att,
			sum(if(A.status=12,1,0)) as con_att,
			sum(if(A.status=13,1,0)) as not_att,
			sum(if(A.status=14,1,0)) as wn,
			sum(if(A.status=15,1,0)) as cb,
			sum(if(A.status in (11,12,13,14,15),1,0)) as total_c,
			sum(if(A.status=21,1,0)) as na,
			sum(if(A.status=22,1,0)) as bus,
			sum(if(A.status=23,1,0)) as rej,
			sum(if(A.status=24,1,0)) as fn,
			sum(if(A.status in (21,22,23,24),1,0)) as total_n,
			sum(if(A.id is not null,1,0)) as total
		');
		$this->db->from('candidate A');		
		$this->db->join('event B','A.event=B.id');
		if($this->input->get('date_from') <> '' && $this->input->get('date_to') <> ''){
			$this->db->where('A.dist_date >=',format_ymd($this->input->get('date_from')));
			$this->db->where('A.dist_date <=',format_ymd($this->input->get('date_to')));
		}		
		$this->db->group_by('event');
		return $this->db->get()->result();
	}
}