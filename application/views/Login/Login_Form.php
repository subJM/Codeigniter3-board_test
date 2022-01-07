<?php 
	$this->load->view('Head');
?>
<style>
  input {
  box-sizing: border-box;
  border: 0.5px solid lightgray;
  border-radius: 2px;
}
#loginform {
  width: auto;
  margin-top: 200px;
  margin-bottom: 200px;
}
#login_main_content {
  width: 225px;
  margin: 0 auto;
  vertical-align: middle;
}

#title_login {
  width: 225px;
  text-align: center;
  margin-top: 40px;
  margin-bottom: 20px;
}

#login_form input {
  width: 225px;
  height: 40px;
  margin-bottom: 10px;
  box-sizing: border-box;
}

#login_button {
  width: 225px;
  height: 40px;
  margin-bottom: 10px;
  box-sizing: border-box;
  background-color: #f23005;
  border-radius: 2px;
}

#login_button a {
  text-decoration: none;
  color: #ffffff;
}

#login_button a p {
  width: 225px;
  height: 38px;
  text-align: center;
  font-size: 14px;
  margin: 0px;
  padding: 9px 0px 0px 0px;
}

#find_info {
  width: auto;
  height: 50px;
  text-align: center;
  padding: 9px 0px 0px 20px;
}

#find_info a {
  text-decoration: underline;
  font-size: 20px;
  color: #1c1c1c;
}

#kakao-login-btn {
  width: 225px;
  height: 43px;
  margin-bottom: 10px;
  border-radius: 2px;
}

#naver_id_login img {
  width: 225px;
  margin-bottom: 10px;
}

#member_form {
  width: 225px;
  height: 45px;
  margin-bottom: 40px;
  box-sizing: border-box;
  border: 1px solid #f23005;
  border-radius: 2px;
  margin: 0px 0px 0px 10px;  
}

#member_form a {
  text-decoration: none;
  color: #f23005;
}

#member_form a p {
  width: 225px;
  height: 38px;
  text-align: center;
  font-size: 20px;
  margin: 0px;
  padding: 9px 0px 0px 0px;
}

</style>
  <script type="text/javascript">
  $(document).ready(function() {
    $("#id").keydown(function(key) {
      if (key.keyCode == 13) {
        check_input();
      }
    });
    $("#password").keydown(function(key) {
      if (key.keyCode == 13) {
        check_input();
      }
    });
  })

  function check_input() {
    if (!document.login_form.id.value) {
      alert("아이디를 입력하세요");
      document.login_form.id.focus();
      return;
    }

    if (!document.login_form.password.value) {
      alert("비밀번호를 입력하세요");
      document.login_form.password.focus();
      return;
    }
    document.login_form.submit();
  }
  </script>
  <!-- 네이버 로그인 -->
 
<body>
  <div class="container">
    <section id="loginform">
      <div id="login_main_content">
        <div id="title_login">
          <h1>로그인</h1>
        </div>
        <div class="container-sm" id="login_form">
          <form class="mb-3" name="login_form" action="login.php" method="post">
            <input autocomplete="off" type="text" id="id" name="id" placeholder=" 아이디 입력 "> <br>
            <input type="password" id="password" name="password" placeholder=" 비밀번호 입력 "> <br>
            <div id="login_button">
              <a href="#" onclick="check_input()">
                <p>로그인</p>
              </a>
            </div>
          </form>
        </div>
        <div id="find_info">
          <script type="text/javascript">
          // 팝업창을 화면 가운데에 띄워주기 위한 변수 선언
          var popup_x = ((screen.availWidth - 470) / 2);
          var popup_y = ((screen.availHeight - 400) / 2);

          function find_id_popup() {
            window.open('forgot_id_pw.php?page=id', '아이디찾기', 'width=470, height=400, top=' + popup_y +
              ', left=' + popup_x + ', menubar=no, status=no, toolbar=no');
          }

          function find_password_popup() {
            window.open('forgot_id_pw.php?page=password', '비밀번호찾기', 'width=470, height=400, top=' +
              popup_y + ', left=' + popup_x + ', menubar=no, status=no, toolbar=no');
          }
          </script>
          <a href="#" onclick="find_id_popup();" style="font-size: 16px;">아이디 찾기</a>
          <a href="#" onclick="find_password_popup();" style="font-size: 16px;">비밀번호 찾기</a>
        </div>
        <div id="member_form">
          <a href="/Login/member_form">
            <p>회원가입</p>
          </a>
        </div>
      </div>
  </div>
  </section>
<?php $this->load->view('Footer');?>
