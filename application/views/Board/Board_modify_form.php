<?php 
	$this->load->view('Head');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Solid</title>
	<link rel="stylesheet" type="text/css" href="../../css/question.css">
</head>

<body>
	<section>
		<div id="board_box">
			<h3 id="board_title">
				공지사항 > 내용
			</h3>
			<?php
			// var_dump($post);
			// print_r($row);
			?>
			<form name="board_form" method="post" action="/Board/BoardModifyForm/update" enctype="multipart/form-data">
				<ul id="board_form">
					<li>
						<span class="col1">이름 : </span>
						<span class="col2" name="writer"><?=  $post['writer'] ?></span>
					</li>
					<li>
						<span class="col1">제목 : </span>
						<span>
						<input name="subject" style="resize: none;" value="<?= $post['subject'] ?>">
						</span>
					</li>
					<li id="text_area">
						<span class="col1">내용 : </span>
						<span class="col2">
							<textarea name="content" style="resize: none;"><?=  $post['content'] ?></textarea>
						</span>
					</li>
			</ul>
			<ul class="buttons">
					<input type="hidden" name="no" value="<?= $post['no'] ?>"> 
					<li><button type="button" onclick="location.href='Board/BoardList/1'">목록</button></li>
					<li><button type="button" onclick="location.href='Board/BoardDelete?no=<?= $post['no']?>'">삭제</button></li>
					<li><button type="submit" >완료</button></li>
			</ul>
			</form>
		</div> <!-- board_box -->
	</section>

</body>

</html>
