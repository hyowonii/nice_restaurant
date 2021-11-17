<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kind_price.css">
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <title>Document</title>
</head>
<body>
<h1><a href="kind_price.html"><i class="fas fa-arrow-left"></i></i> 착한 가격 식당</a></h1>
<?php
    $mysqli = mysqli_connect("localhost", "team08", "team08", "team08");

    // 지역별/업태별 선택
    if(array_key_exists('all', $_POST)){
        $sql="SELECT * FROM kind_price";
        $res = mysqli_query($mysqli, $sql);
        echo "ALL <br/>";
        restList($res);
    }else if(array_key_exists('gangnam', $_POST)){
        $sql="SELECT * FROM kind_price WHERE guName='강남구'";
        $res = mysqli_query($mysqli, $sql);
        echo "강남구 <br/>";
        restList($res);
    }else if(array_key_exists('mapo', $_POST)){
        $sql="SELECT * FROM kind_price WHERE guName='마포구'";
        $res = mysqli_query($mysqli, $sql);
        echo "마포구 <br/>";
        restList($res);
    }else if(array_key_exists('songpa', $_POST)){
        $sql="SELECT * FROM kind_price WHERE guName='송파구'";
        $res = mysqli_query($mysqli, $sql);
        echo "송파구 <br/>";
        restList($res);
    }else if(array_key_exists('yongsan', $_POST)){
        $sql="SELECT * FROM kind_price WHERE guName='용산구'";
        $res = mysqli_query($mysqli, $sql);
        echo "용산구 <br/>";
        restList($res);
    }else if(array_key_exists('jongro', $_POST)){
        $sql="SELECT * FROM kind_price WHERE guName='종로구'";
        $res = mysqli_query($mysqli, $sql);
        echo "종로구 <br/>";
        restList($res);
    }else if(array_key_exists('korean', $_POST)){
        $sql="SELECT * FROM kind_price WHERE restType='한식'";
        $res = mysqli_query($mysqli, $sql);
        echo "한식 <br/>";
        restList($res);
    }else if(array_key_exists('chinese', $_POST)){
        $sql="SELECT * FROM kind_price WHERE restType='중식'";
        $res = mysqli_query($mysqli, $sql);
        echo "중식 <br/>";
        restList($res);
    }else if(array_key_exists('japanese', $_POST)){
        $sql="SELECT * FROM kind_price WHERE restType='경양식일식'";
        $res = mysqli_query($mysqli, $sql);
        echo "경양식일식 <br/>";
        restList($res);
    };
    
    // 음식점 리스트 출력
    function restList($res){
        while($newArray = mysqli_fetch_array($res)){
            echo "업소명: ".$newArray['restName']." / 업태명: ".$newArray['restType']." / 상세주소: ".$newArray['restAddr']." / 전화번호: ".$newArray['call']." / 자랑거리: ".$newArray['comment']."<br/>";
        }
    };
    
    
    ?>
    
</body>
</html>