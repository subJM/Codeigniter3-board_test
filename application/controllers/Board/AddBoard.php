<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddBoard extends CI_Controller {
	//$POST 변수를 전역변수처럼 사용하기 위해 먼저 선언
	protected $POST;
	public function __construct()
    {
		parent::__construct();

		$this->load->helper('url');

		//model 로드
		$this->load->model('M_board');

	//post방식으로 input에 입력한 값을 받아온다
	$this->POST['NO'] = $this->input->post("no");
	$this->POST['SUBJECT'] = $this->input->post("subject");
	$this->POST['CONTENT'] = $this->input->post("content");
	$this->POST['WRITER'] = $this->input->post("writer");
	$this->POST['DATE'] = $this->input->post("date");

	}

	public function index() {

		$this->_dbInsert();
		
		redirect('/Board/BoardList');

	}


	public function update()
	{

		//업데이트 시 no값을 받아서 add_board화면에 뿌려준다
		$no=$this->input->get('no');

		//no가 있을 땐 수정, 없을 땐 입력
		$result=$this->M_board->dbSelect($no);
		$data['SUBJECT'] = htmlspecialchars($result['SUBJECT']);
		$data['CONTENT'] = htmlspecialchars($result['CONTENT']);
		$data['WRITER'] = htmlspecialchars($result['WRITER']);

		$this->_dbUpdate();
		
		//리다이렉트하는 두 가지 방법
		//redirect('http://audtla.com/ListBoard');
		echo site_url('Board/BoardList');
		// echo "location.href='localhost/BoardList';</script>";
	}

	//DB에 값 입력
	private function _dbInsert() {
		//print_r($this->POST);
		$this->M_board->_dbInsert($this->POST);
	}

	//DB에 값 수정
		private function _dbUpdate() {
		$this->M_board->_dbUpdate($this->POST);
	}



}
