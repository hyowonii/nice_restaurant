<?php 
    
    session_start(); //세션을 저장하든 읽어오든 사용하고자 하면 이 함수로 시작
 
    $id="";
    $name="";
    if( isset($_SESSION['id'])) $id= $_SESSION['id'];
    if( isset($_SESSION['name'])) $name= $_SESSION['name'];

?>
 
<!-- 헤더 영역의 로고와 회원가입/로그인 표시 영역 -->
        <div id="top">
            <!-- 1. 로고영역 -->
            <!-- include되면 삽입된 문서의 위치를 기준으로 -->
            <!--<h3><a href="./index.php">PHP 프로그래밍 입문</a></h3> -->
 
            <!-- 2. 회원가입/로그인 버튼 표시 영역 -->
            <ul id="top_menu">
                <!-- 로그인 안되었을 때 -->
                <?php if(!$id){  ?>
                   <div> 
                    <li><a href="sign_up.html">회원가입</a></li>
                    <li><a href="login.html">로그인</a></li>
                   </div>
                <?php }else{ ?>
                   <div>
                    <li><a href="logout.php">로그아웃</a></li>
                    <li><a href="memberMod.php">정보수정</a></li>
                    <li><a href="deleteMem.php">회원탈퇴</a></li>
                   </div>
                <?php }?>
        </div>