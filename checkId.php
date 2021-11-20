<?php
include "dbconnect.php";
    //현 입력한 id가 이미 멤버테이블에 존재하는지 확인
    $id=$_GET['userid'];
    $sql="SELECT * FROM member WHERE id='$id'";
    $res=mysqli_query($mysqli,$sql);
    $number_of_rows=mysqli_num_rows($res);
    if($number_of_rows){
        echo "
        <p align='center'>이미 사용 중인 아이디입니다.
        <p align='center'>다른 아이디를 입력하세요.
        <center><input type=button value=창닫기 onclick='self.close()'></center>" ;    
    }else{
        echo "
            <p align='center'>사용 가능한 아이디입니다.
            <center><input type=button value=창닫기 onclick='self.close()'></center>
            ";
    }
    mysqli_free_result($res);
    mysqli_close($mysqli);
?>
<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>중복</title>
</head>
</html>