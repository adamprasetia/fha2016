<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Callhis_model extends CI_Model {
	public function create($data){
		$this->db->insert('reminder_call_history',$data);		
	}
	public function update($id,$data){
		$this->db->where('id',$id);		
		$this->db->update('reminder_call_history',$data);
	}
	public function delete($id){
		$this->db->where('id',$id);		
		$this->db->delete('reminder_call_history');
	}
	public function get($id){
		$this->db->where('candidate',$id);		
		$this->db->order_by('date','asc');		
		return $this->db->get('reminder_call_history')->result();
	}
	public function get_note($id){
		$this->db->where('candidate',$id);		
		$this->db->order_by('date','asc');		
		$result = $this->db->get('reminder_call_history')->result();
		$str = '';
		foreach($result as $r){
			$str .= $r->status.', ';
		}
		return $str;
	}
}