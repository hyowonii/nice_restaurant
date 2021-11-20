<?php
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