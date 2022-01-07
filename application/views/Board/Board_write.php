<?php 
	$this->load->view('Head');
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/question.css">
   <title>No.1 가상자산 플랫폼, Solid</title>
	<link rel="stylesheet" href="">
   <script>
   //유효성 검사(공백(spacebar)에 대한 내용 추가)
   $(document).ready(function() {
      $('#addBtn').click(function() {
         $('#addBoard').submit(function(event) {
            var pwPattern = /^.*(?=.{6,20})(?=.*[0-9])(?=.*[a-zA-Z]).*$/;

            if ($.trim($('#title').val()).length < 1) {
               $('#title').attr('placeholder', '한 글자 이상 입력해 주세요.').val('').focus();
               return false;
            } else if ($.trim($('#contents').val()).length <
               1) { //에디터를 쓴 이후 공백일 경우 값(<p><br></p>)이 들어간다 
               $('#contents').attr('placeholder', '한 글자 이상 입력해 주세요.').val('').focus();
               return false;
            } else if (!pwPattern.test($('#pw').val())) {
               $('#pw').attr('placeholder', '비밀번호는 영문, 숫자 혼합하여 6~20자리 이내로 입력해 주세요.').val('').focus();
               return false;
            } else if ($.trim($('#writer').val()) == '') {
               $('#writer').attr('placeholder', '한 글자 이상 입력해 주세요.').val('').focus();
               return false;
            }
         });
      });
   });
   </script>
</head>

<body>
<section>
    <div id="board_box">
      <h3 id="board_title">
        문의게시판 > 게시물 작성
      </h3>
      <form name="board_form" method="post" action="/AddBoard" enctype="multipart/form-data">
        <ul id="board_form">
          <li>
            <span class="col1">이름 : </span>
            <span class="col2"><input name="writer" type="text" placeholder="이름을 작성해주세요."></span>
          </li>
          <li>
            <span class="col1">제목 : </span>
            <span class="col2"><input name="subject" type="text" placeholder="제목을 작성해주세요."></span>
          </li>
          <li id="text_area">
            <span class="col1">내용 : </span>
            <span class="col2">
              <textarea name="content" placeholder="내용을 작성해주세요."></textarea>
            </span>
          </li>
        </ul>
        <ul class="buttons">
          <li><button type="submit">등록</button></li>
          <li><button type="button" onclick="location.href='/Board/BoardList/1'">목록</button></li>
        </ul>
      </form>
    </div> <!-- board_box -->
  </section>
</body>

</html>
