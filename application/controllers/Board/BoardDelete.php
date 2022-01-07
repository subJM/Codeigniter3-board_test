<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardDelete extends CI_Controller {
	//$POST 변수를 전역변수처럼 사용하기 위해 먼저 선언

	public function __construct()
    {
		parent::__construct();

		$this->load->helper('url');

		$this->load->model('M_board');

		
		
	}
	
	public function index() {

		$no=$this->input->get('no');
		
		$this->M_board->dbDelete($no);

		header('Location: /Board/BoardList');
	}


}
