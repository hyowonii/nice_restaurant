<?php
    include "dbconnect.php";
    $id= $_GET['id'];
    $pass= $_POST['pass'];

    $sql= "DELETE FROM member where id='$id'";  
    mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    echo "
    <script>
        alert('회원탈퇴가 완료되었습니다.');
        history.go(-2);
    </script>
    ";
?>