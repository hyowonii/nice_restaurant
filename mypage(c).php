<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mypage</title>
    <?php include "header.php"?>
</head>
<body>
    <?php if(!$id){  ?>
        <script> 
            alert("로그인하세요.");
            location.href='login.html';
        </script>
    <?php } ?>
<div>
    <h1>My Review</h1> 
    <h4><a href="mypage.php">기준 재선택</a></h4>
</div>
<?php
    include "dbconnect.php";
    $id=$_GET['id'];
    $sel = $_REQUEST["sub"];
    $sel1=$_REQUEST["main"];
    
    if($sel1=="region"){
        $sql="SELECT * from review where guName='$sel' && id='$id'"; 
    }else if($sel=="최신순"){
        $sql="SELECT * from review where id='$id' order by date DESC"; 
    }else if($sel=="오래된순"){
        $sql="SELECT * from review where id='$id' order by date "; 
    }else if($sel=="별점높은순"){
        $sql="SELECT * from review where id='$id' order by starPoint DESC";
    }else if($sel=="별점낮은순"){
        $sql="SELECT * from review where id='$id' order by starPoint ";
    }else{
        $sql="SELECT * from review where restType='$sel'&& id='$id' ";
    }
   
    $res=mysqli_query($mysqli,$sql);
    if($res){
        while($newArray=mysqli_fetch_array($res)){
            echo "</br>".$newArray['id']."님의 리뷰</br> 가게명: ";
            echo $newArray['restName']."&nbsp구: ";
            echo $newArray['guName']."&nbsp상세리뷰: ";
            echo $newArray['reviewDetail']."&nbsp별점: ";
            echo $newArray['starPoint']."&nbsp작성시간: ";
            echo $newArray['date']."&nbsp동: ";
            echo $newArray['dongName']."&nbsp업태: ";
            echo $newArray['restType']."</br>";
        }
    }

    //mysqli_free_result($res);
    mysqli_close($mysqli);   
?>
</body>
</html>
