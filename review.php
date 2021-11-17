<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="review.css">
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
</head>
<body>
<h1><a href="review.html"><i class="fas fa-arrow-left"></i></i> REVIEW</a></h1>
<?php
    $mysqli = mysqli_connect("localhost", "team08", "team08", "team08");

    // 검색창
    if(array_key_exists('submitBtn', $_POST)){
        $search_word = $_POST["search"];
        $sql = "SELECT * FROM review WHERE restName='$search_word'";
        $res = mysqli_query($mysqli, $sql);
        // 검색 결과가 존재
        if($res->num_rows > 0){
            // 결과에 해당하는 내용 출력
            echo "$search_word<br/>";
            reviewList($res);
            // 검색어 db에 등록
            $sql_i = "INSERT INTO searchkey (searchKeyword) VALUES ('$search_word')";
            $res_i = mysqli_query($mysqli, $sql_i); 
        } 
        // 검색 결과 존재X
        else {
            echo "검색 결과가 없습니다.";
        }
    };

    // 지역별/업태별 선택
    if(array_key_exists('gangnam', $_POST)){
        $sql="SELECT * FROM review WHERE guCode='3220000'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res);
    }else if(array_key_exists('mapo', $_POST)){
        $sql="SELECT * FROM review WHERE guCode='3130000'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res);
    }else if(array_key_exists('songpa', $_POST)){
        $sql="SELECT * FROM review WHERE guCode='3230000'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res);
    }else if(array_key_exists('yongsan', $_POST)){
        $sql="SELECT * FROM review WHERE guCode='3020000'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res);
    }else if(array_key_exists('jongro', $_POST)){
        $sql="SELECT * FROM review WHERE guCode='3000000'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res);
    }else if(array_key_exists('korean', $_POST)){
        $sql="SELECT * FROM review WHERE restType='한식'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res);
    }else if(array_key_exists('chinese', $_POST)){
        $sql="SELECT * FROM review WHERE restType='중식'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res);
    }else if(array_key_exists('japanese', $_POST)){
        $sql="SELECT * FROM review WHERE restType='경양식일식'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res);
    };
    
    // 리뷰 리스트 출력
    function reviewList($res) {
        while($newArray = mysqli_fetch_array($res)){
            echo "업소명: ".$newArray['restName']." / 별점: ".$newArray['star']." / 리뷰: ".$newArray['review']." / ID: ".$newArray['id']." / 나이대: ".$newArray['age']." / 작성일자: ".$newArray['date']."<br/>";
        }
    };
    //mysql_close($mysqli);
    ?>
</body>
</html>