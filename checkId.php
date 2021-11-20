<?php
include "dbconnect.php";

    $id=$_GET['userid'];
    $sql="SELECT * FROM member WHERE id='".$id."'";
    $res=mysqli_query($mysqli,$sql);
    $number_of_rows=mysqli_num_rows($res);
    if($number_of_rows){
        echo "
        이미 사용 중인 아이디입니다.</br>
        다른 아이디를 입력하세요.</br>
        <center><input type=button value=창닫기 onclick='self.close()'></center>" ;    
    }else{
        echo "
            <p>사용 가능한 아이디입니다.</p>
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
    <title>중복확인</title>
</head>
</html>