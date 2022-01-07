<?php
class M_board extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    //게시글 입력
    public function _dbInsert($data) {
        $this->db->set('subject', $data['SUBJECT']);
        $this->db->set('content', $data['CONTENT']);
        $this->db->set('writer', $data['WRITER']);
        $this->db->set('date', "now()", false); //false라서 문자열이 아니고 함수
        $this->db->set('hit', 0);
        $this->db->insert('board');
    }

    //게시글 수정
    public function _dbUpdate($data) {
		var_dump($data);
		var_dump($data['subject']);
		var_dump($data['no']);
		var_dump($data['content']);
        //update board set title='title' where no='no'
		$this->db->set('subject', $data['subject']);
        $this->db->set('content', $data['content']);
        $this->db->set('date', "now()", false); //false라서 문자열이 아니고 함수
        $this->db->where('no',$data['no']);
        $this->db->update('board');
    }

    //게시글 내용 수정할 때 사용
    public function dbSelect($no) {
        $query = "SELECT 
                NO, 
                SUBJECT, 
                CONTENT, 
                WRITER, 
				DATE
            FROM board
            WHERE NO=?";

        $result=$this->db->query($query, array($no));
        return $result->row_array();
    }

   //view 누르면 조회수 증가시키기
   public function viewHit($no) {
       $query="UPDATE board 
            SET HIT = HIT+1
            WHERE NO=?";
        $this->db->query($query, array($no));
   }

   public function viewSelect($no) {
	$query = "SELECT
			no,
			subject,
			content,
			writer,
			date,
			hit
		FROM board 
		WHERE NO = ?";

	$result=$this->db->query($query, array($no));
	return $result->row_array();        
}

	// total (전체 게시글 수 카운트)
	public function total_entry($data) {
		$query="SELECT COUNT(*) AS CNT FROM board";
		$result = $this->db->query($query);
		$result=$result->row_array();
		return $result['CNT'];
	}

	// public function select_entry($data, $pageNum, $per_page) {
	// 	if($data['category']&&$data['keyword']){
	// 		$queryAdd="AND ".$data['category']." LIKE '%" .$this->db->escape_like_str($data['keyword'])."%'";
	// 	}        
	// 	$start_num = ($pageNum-1)*$per_page;
	// 	$query="SELECT 
	// 		NO, TITLE, WRITER, DATE, HIT, COMMENT_CNT
	// 		FROM board
	// 		WHERE YN != 0 OR YN IS NULL 
	// 		".$queryAdd."
	// 		ORDER BY DATE DESC
	// 		LIMIT ?, ?";
	// 	$result = $this->db->query($query, array(
	// 		(int)$start_num,
	// 		(int)$per_page
	// 	));
	// 	return $result;
	// }


	// select (페이지 자르고 리스트 출력) 페이징
    //YN필드가 0(삭제)인 경우는 제외
    public function select_entry($pageNum, $per_page) {
        $start_num = ($pageNum-1)* $per_page;
        $query="SELECT 
            no, subject, content , writer, date, hit 
            FROM board
            ORDER BY NO DESC
            LIMIT ?, ?";
        $result = $this->db->query($query, array(
            (int)$start_num,
            (int)$per_page
        ));
        return $result;
    }

	public function boardList() {
        $query="SELECT no, subject, writer, hit, date FROM board ORDER BY no DESC";
        $result = $this->db->query($query)->result_array();
        return $result;

    }

	public function dbDelete($no){
		$query = "DELETE FROM board where no = $no";
		$this->db->query($query);
	}
 

}
?>
