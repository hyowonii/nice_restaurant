<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>회원탈퇴</title>
    <?php include "header.php";?>
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <style>
    #main{width: 500px; height: 400px; margin: 0 auto; float: center;}
    #main h1{ float: center margin: 50px 0 0 0; padding-bottom: 5px; border-bottom: solid 2px #ffbe10; font-size: 30px; text-align: center; font-weight: bold;}
    h1 a[href]{
        color: orange;
        text-decoration-line: none;
    }</style>
    <script>
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
            if(document.form.pass.value != document.form.pass_confirm.value){
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요.");
                document.member_form.pass.focus();
                document.member_form.pass.select();
                return;
            }
            document.form.submit(); 
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
        <div id="main">
            <div id="탈퇴">
                <form action="deleteMem(c).php?id=<?=$id?>" method="post" name="form">
                    <h1>회원정보 탈퇴</h1>
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
