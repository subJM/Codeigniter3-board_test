<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardModifyForm extends CI_Controller {
	//$POST 변수를 전역변수처럼 사용하기 위해 먼저 선언

	public function __construct()
    {
		parent::__construct();

		$this->load->helper('url');

		$this->load->model('M_board');

		$this->no =$this->input->get('no');
		
		
	}
	
	public function index() {
		$no =$this->input->get('no');
		//해당되는 공지사항 내용 가져오기
		$data['post'] = $this->db->get_where('board',array('no' => $no))->row_array();

		$this->load->view('Board/Board_modify_form',$data);
	}

	public function update(){

		$data= array( 
			'no' => $this->input->post('no'),
			'subject'=> $this->input->post('subject'),
			'content'=> $this->input->post('content')
		);
	
		$this->M_board->_dbUpdate($data);
		
		header('Location: /Board/BoardList');

	}


}
