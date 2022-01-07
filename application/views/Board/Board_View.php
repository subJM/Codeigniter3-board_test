<?php 
	$this->load->view('Head');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>board_test</title>
	<link rel="stylesheet" type="text/css" href="../../css/question.css">
</head>

<body>

	<section>
		<div id="board_box">
			<h3>
				문의게시판 > 내용
			</h3>
			<ul id="view_content">
				<li>
					<span class="col1"><b>제목 :</b><?= $subject ?></span>
					<span class="col2"><?= $writer ?>&nbsp;&nbsp;&nbsp;<?= $date ?></span>
				</li>
				<li class="li_content">
					<?= $content ?>
				</li>
			</ul>
			<ul class="buttons">
					<li><button type="button" onclick="location.href='/Board/BoardList?pageNum=1'">목록</button></li>
					<li><button type="button" onclick="location.href='/Board/BoardModifyForm?no=<?= $no ?>'">수정</button></li>
					<li><button type="button" onclick="location.href='/Board/BoardDelete?no=<?= $no ?>'">삭제</button></li>
					<li><button type="button" onclick="location.href='/Board/BoardWrite'">글쓰기</button></li>

			</ul>

		</div> <!-- board_box -->
	</section>
</body>

</html>
