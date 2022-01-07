<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardWrite extends CI_Controller {
	//$POST 변수를 전역변수처럼 사용하기 위해 먼저 선언

	public function __construct()
    {
		parent::__construct();

	}

	public function index() {
		//업데이트 시 no값을 받아서 add_board화면에 뿌려준다

		$this->load->view('Board/Board_write');
	}


}
