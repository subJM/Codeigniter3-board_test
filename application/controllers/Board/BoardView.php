<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardView extends CI_Controller {

    public function __construct() {
		parent::__construct();
		
		//get방식으로 no글번호 받아오기
		$this->no=$this->input->get('no');
        //모델 로드하기
		$this->load->model('M_board');

    }
    
	public function index() {
		//뷰 셀렉트 하기
        $result=$this->M_board->viewSelect($this->no);
		//뷰 누르면 조회수 증가시키기
		$this->M_board->viewHit($this->no);
		
		$data['no'] = htmlspecialchars($result['no']);
		$data['subject'] =  htmlspecialchars($result['subject']);
		$data['content'] =  htmlspecialchars($result['content']);
		$data['writer'] =  htmlspecialchars($result['writer']);
		$data['date'] =  htmlspecialchars($result['date']);
		$data['hit'] =  htmlspecialchars($result['hit']);
		
		$this->load->view('/Board/Board_view', $data);
	}

	public function viewUpdate(){

		
	}

	
}
