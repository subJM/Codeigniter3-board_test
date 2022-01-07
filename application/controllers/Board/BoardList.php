<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardList extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();

		 //pagination 로드하기
		$this->load->library('pagination');
		 //모델 로드하기
	   $this->load->model('M_board');
		$this->load->helper('url');

  }

	public function index()
	{	
		//전체 url
		$config['base_url']= '/Board/BoardList/index';        
		//uri가 3부분 ex)ListBoard/index/1
		$config['uri_segment'] = 4; 
		//숫자가 양 옆으로 2개씩 ex)12,3,45
		$config['num_links'] = 2;
		//uri에 페이지 숫자 추가
		$config['use_page_numbers'] = TRUE;
		//true인 경우 uri가 audtla.com/ListBoard?index=1 형식으로 바뀜
		$config['page_query_string']=FALSE;
		//페이지 당 열 개수
		$data['per_page']=$config['per_page']= 10;
		$config['per_page']= 10;
		//현재페이지, uri에서 3번째 segment에서 값을 가져온다(1을 추가하면 값이 없을 때 1을 대신 넣어준다)
		$data['pageNum']=$pageNum = $this->uri->segment(4,1);
		$pageNum = $this->uri->segment(4,1);    

		//전체 열 개수 total_entry메서드 실행
		$config['total_rows'] = $this->M_board->total_entry($_GET);

		//select_entry메서드 실행
		$result=$this->M_board->select_entry($pageNum, $data['per_page']);
			
		//pagination설정
		$this->pagination->initialize($config);

			//링크 생성
		$data['pagenav'] = $this->pagination->create_links();
			

		foreach ($result->result_array() as $row) {
			$LOOP[]=array(
				'no'=>$row['no'],
				'subject'=>$row['subject'],
				'content'=>$row['content'],
				'writer'=>$row['writer'],
				'date'=>$row['date'],
				'hit'=>$row['hit'],
			);
		}

		$data['LOOP'] = $LOOP;
		
      $this->load->view('Head');
		$this->load->view('Board/Board_list', $data);
		$this->load->view('footer');
		// $this->load->view('Test', $data);

	}

	



}
