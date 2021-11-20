<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SIGN_UP</title>
    <?php include "header.php";?>
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <style>h1 a[href]{
        color: orange;
        text-decoration-line: none;
    }</style>
    <script>
        // 서밋 버튼 이미지 클릭시
        function delmem(){
 
            if(!document.form.pass.value){
                alert("비밀번호를 입력하세요.");
                document.form.pass.focus();
                return;
            }
 
             if(!document.form.pass_confirm.value){
                alert("비밀번호 확인은 필수입니다.");
                document.form.pass_confirm.focus();
                return;
            }
            // 비밀번호와 비밀번호 확인 칸의 입력값이 같은지 비교
            if(document.form.pass.value != document.form.pass_confirm.value){
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요.");
                document.member_form.pass.focus();
                // 커서가 이동하고 그곳에 써있는 글씨가 선택되어 있음.
                document.member_form.pass.select();
                return;
            }
            // form요소를 직접 submit하는 메소드
            document.form.submit(); //겟 엘리먼트 안하고 폼, 인풋을 name속성이 document 배열로 찾을 수 있음.
        }
    </script>
 
</head>
<body>
<h1 id="b"><a href="main.php"><i class="fas fa-utensils"></i> 모음</a></h1>
    <?php if(!$id){  ?>
        <script> 
            alert("로그인하세요.");
            location.href='login.html';
        </script>
    <?php } ?>
    <?php
        include "dbconnect.php";
        $sql="SELECT * FROM member WHERE id='$id'";
        $res=mysqli_query($mysqli,$sql);
        $newArray=mysqli_fetch_array($res,MYSQLI_ASSOC);
        $pass=$newArray['pass'];
        $name=$newArray['name'];

        mysqli_free_result($res);
        mysqli_close($mysqli);
    ?>

    <section>
        <div id="main_content">
            <div id="join_box">
                <!-- DB의 member테이블에 저장하는 member_insert.php에 입력값들 전달하도록 -->
                <form action="deleteMem(c).php?id=<?=$id?>" method="post" name="form">
                    <h2>회원정보 탈퇴</h2>
                    <!-- 각 줄마다 라벨, 인풋요소 영역으로 나누어 지므로 col1, col2 클래스지정으로 스타일링 -->
                    <div class="form">
                        <div class="col1">이름</div>
                        <div class="col2"><?=$name?></div>
                    </div>
                    <div class="form id">
                        <div class="col1">아이디</div>
                        <div class="col2"><?=$id?></div>                       
                    </div>
                    <div class="form">
                        <div class="col1">비밀번호</div>
                        <div class="col2"><input type="password" name="pass" value=""></div>
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">비밀번호 확인</div>
                        <div class="col2"><input type="password" name="pass_confirm" value=""></div>
                    </div>
                    <div class="clear"></div>
                    <div class="join">
                        <input type="button" value="탈퇴" onclick="delmem()">
                    </div>
                </form>
            </div>
        </div>
    </section>
   
</body>
</html>
