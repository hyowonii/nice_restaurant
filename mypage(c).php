<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mypage</title>
    <?php include "header.php"?>
    <link rel="stylesheet" href="review.css?after5">
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
    //셀렉기준에 따라 리뷰 선택
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
    $newArray=mysqli_fetch_array($res);
    if($newArray){
        echo "<h2 id='search-word'>[ ID: ".$newArray['id']." ]님의 리뷰</h2>";
        while($newArray=mysqli_fetch_array($res)){
            echo "
            
            <div class='review'>
            <div id='reviewContent'>
            <b>".$newArray['restName']."</b><i>작성일자: ".$newArray['date']."</i>
            <br/>".$newArray['guName']."&nbsp".$newArray['dongName']."</br/>
            ".$newArray['restType']."</br/>★:".$newArray['starPoint']."</br/>".$newArray['reviewDetail']."
            <form action='restaurant_detail.php' method='post'>
            <x><input type='submit' value='go restaurant'></x>
            <input type ='hidden' name = 'restName' value = '".$newArray['restName']."'><br/>
            </form>
            </div>
            </div>
            ";
        }
    }else{
        echo "<br/>No Review";
    }

    mysqli_free_result($res);
    mysqli_close($mysqli);   
?>
</body>
</html>
