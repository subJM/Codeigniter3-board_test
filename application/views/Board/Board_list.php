</head>
<style>
body {
   border: solid 1px black;
}

.container {
   border: solid 1px black;
   width: 1800px;
}

nav {
	position: center;
	margin: auto;
   width: 80%;
}

#menu {
   background-color: rgb(50, 50, 50);
	position: relative;
}
</style>

<body>
<?php 
	$this->load->view('Head');
?>
   <link rel="stylesheet" type="text/css" href="../../../css/question.css">
  
   <div class="container">
      <div id="board_box">
         <br><br><br>
         <h3>
            문의게시판 > 목록
         </h3>

         <ul id="board_list">
            <li>
               <span class="col1">번호</span>
               <span class="col2">제목</span>
               <span class="col3">글쓴이</span>
               <span class="col5">조회</span>
               <span class="col6">등록일</span>
            </li>

            <?php if(count($LOOP)>0):?>
            <?php foreach($LOOP as $post ) : ?>
            <li>
               <span class="col1" class="text-reset" href="#"> <?=$post['no'] ?></span>
               <!-- 작성자, 작성일, 조회수 -->
               <span class="col2"><a href="/Board/BoardView?no=<?=$post['no']?>"><?=$post['subject']?></a></span>
               <span class="col3"><?=$post['writer'] ?></span>
               <span class="col5"><?=$post['hit'] ?></span>
               <span class="col6"><?=$post['date'] ?></span>
            </li>
            <?php endforeach; ?>
            <?php endif;?>
         </ul>


         <!-- page  -->
         <ul id="page_num">
            <li><?=$pagenav?></li>
         </ul>
         <ul class="buttons">

            <li><button type="button" onclick="location.href='/Board/BoardWrite'">글쓰기</button></li>

         </ul>
      </div>
