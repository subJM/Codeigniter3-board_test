<?php 

$select_result = $this->db->query("select * from board order by no desc");
			
//1. 현재페이지가 없다면 1페이지로 셋팅
$page = isset($_GET["page"]) ? $_GET["page"] : 1;

//2. 전체 레코드 수
$total_record = $select_result->num_rows();

//3. 페이지당 글 수 를 넣는다.
$scale = 5;

//4. 전체 페이지 수 ($total_page) 계산
$total_page=($total_record !== 0) ? ceil($total_record / $scale) : 0;

//4-1. 표시할 페이지($page)에 따라 $start 계산
$start = ($page - 1) * $scale;

//5. 현재 페이지 레코드 결과값을 저장하기위해서 배열선언
$list = array();

//6. 해당되는 페이지 레코드를 가져와서 배열에 넣고 회원번호 포함
$num_result = $this->db->query("select * from board order by no desc LIMIT {$start}, {$scale}");

echo $row= $this->num_rows($num_result);

for ($i=0; $i <$row= $this->num_rows($num_result); $i++){

  $list[$i] = $row;
  //회원번호
  $list_num = $total_record - ($page - 1) * $scale;
  $list[$i]['no'] = $list_num - $i;

}


function get_paging($write_pages, $cur_page, $total_page, $url){
			//memo_login&page123 => memo_login&page= 변환시켜달라 
			$url = preg_replace('#&amp;page=[0-9]*#', '', $url) . '&amp;page=';
		
			$str = '';
			//1. 현재페이지가 1페이지가 아니고 2페이지 이상이라면 처음가기를 등록한다.  
			if ($cur_page > 1) {
				$str .= '<a href="'.$url.'1" class="pg_page pg_start">처음</a>'.PHP_EOL;
			}
		
			//2 시작페이지와 끝페이지를 등록한다.(현재12page 시작페이지: 11 ~ 끝페이지 20) 
			// 끝페이지가 중요함.(총 56페이지일때 현재52페이지 시작페이지: 51 ~ 끝페이지 60)
			// 끝페이지 >= 총페이지보다 크거나 같으면 끝페이지 = 총페이지 시작: 51 ~ 끝페이지 56)
			$start_page = ( ( (int)( ($cur_page - 1 ) / $write_pages ) ) * $write_pages ) + 1;
			$end_page = $start_page + $write_pages - 1;
			if ($end_page >= $total_page) $end_page = $total_page;//마지막페이지에 해당된다.
		
			//3 시작페이지가 2페이지 이상이면 [이전]  시작페이지 -1
			//[처음][이전][11]스트롱[12]스트롱[13]...[19][20] => [처음][이전][1][2][3]...[9]스트롱[10]스트롱
			if ($start_page > 1) $str .= '<a href="'.$url.($start_page-1).'" class="pg_page pg_prev">이전</a>'.PHP_EOL;
		
			//4 전체페이지가 2이상 이고 시작페이지 11페이지 끝페이지 20페이지면 현재페이지 12페이지
			//[처음][이전][11]스트롱[12]스트롱[13]...[19][20]
			if ($total_page > 1) {
				for ($k=$start_page;$k<=$end_page;$k++) {
					if ($cur_page != $k)
						$str .= '<a href="'.$url.$k.'" class="pg_page">'.$k.'</a>'.PHP_EOL;
					else
						$str .= '<strong class="pg_current">'.$k.'</strong>'.PHP_EOL;
				}
			}
		
			//5 전체페이지 56 > 20페이지라면 [다음]
			//[처음][이전][11]스트롱[12]스트롱[13]...[19][20][다음] => [처음][이전]스트롱[21]스트롱[22][23]...[29][30]
			if ($total_page > $end_page) $str .= '<a href="'.$url.($end_page+1).'" class="pg_page pg_next">다음</a>'.PHP_EOL;
		
			//6 현재페이지가 전체페이지보다 작다면 [처음][이전][11]스트롱[12]스트롱[13]...[19][20][다음][끝]
			if ($cur_page < $total_page) {
				$str .= '<a href="'.$url.$total_page.'" class="pg_page pg_end">맨끝</a>'.PHP_EOL;
			}
		
			//7 $str 페이징 문자열이 만들어 졌다면 생성
			if ($str)
				return "<nav class=\"pg_wrap\"><span class=\"pg\">{$str}</span></nav>";
			else
				return "";
		}

		?>
