<link rel="stylesheet" href="header.css"> 
<?php
    //현재 로그인정보 저장하는 헤더
    session_start(); 
    $id="";
    $name="";

    if(isset($_SESSION['id'])) $id= $_SESSION['id'];
    if(isset($_SESSION['name'])) $name= $_SESSION['name'];
?>
<!--로그인/비로그인 구별-->
<div id="top">
    <ul id="top_menu">
        <?php if(!$id){  ?>
            <div> 
            <a href="sign_up.html">회원가입</a>
            <a href="login.html">로그인</a>
            </div>
        <?php }else{ ?>
            <div>
            <a href="logout.php">로그아웃</a>
            <a href="memberMod.php">정보수정</a>
            <a href="deleteMem.php">회원탈퇴</a>
            </div>
        <?php }?>
    </ul>
</div>