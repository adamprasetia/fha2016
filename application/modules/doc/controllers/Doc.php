<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doc extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index($id){
		$data['content'] = $this->load->view('doc_'.$id,'',true);
		$this->load->view('template',$data);
	}
}
