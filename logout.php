<?php
    //로그아웃 눌렀을때 할당되었던 id name unset 후 문구 출력
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['name']);

    echo"
    <script>
        alert('로그아웃 되었습니다.');
        history.back();
    </script>
    ";
?>