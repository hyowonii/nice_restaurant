<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="review.css?after5">
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
</head>
<body>
<h1><a href="review2.php"><i class="fas fa-arrow-left"></i></i> REVIEW</a></h1>
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
            reviewList($res, $search_word);
            // 검색어 db에 등록
            $sql_f = "SELECT * FROM searchkey WHERE searchKeyword='$search_word'";
            $res_f = mysqli_query($mysqli, $sql_f); 
            if($res_f->num_rows > 0){
                $sql_u = "UPDATE searchkey SET cnt=cnt+1 WHERE searchKeyword='$search_word'";
                $res_u = mysqli_query($mysqli, $sql_u); 
            } else {
                $sql_i = "INSERT INTO searchkey (searchKeyword) VALUES ('$search_word')";
                $res_i = mysqli_query($mysqli, $sql_i); 
            }
        } 
        // 검색 결과 존재X
        else {
            echo "검색 결과가 없습니다.";
        }
    };

    // 지역별/업태별 선택
    if(array_key_exists('gangnam', $_POST)){
        $sql="SELECT * FROM review WHERE guName='강남구'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res, '강남구');
    }else if(array_key_exists('mapo', $_POST)){
        $sql="SELECT * FROM review WHERE guName='마포구'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res, '마포구');
    }else if(array_key_exists('songpa', $_POST)){
        $sql="SELECT * FROM review WHERE guName='송파구'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res, '송파구');
    }else if(array_key_exists('yongsan', $_POST)){
        $sql="SELECT * FROM review WHERE guName='용산구'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res, '용산구');
    }else if(array_key_exists('jongro', $_POST)){
        $sql="SELECT * FROM review WHERE guName='종로구'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res, '종로구');
    }else if(array_key_exists('korean', $_POST)){
        $sql="SELECT * FROM review WHERE restType='한식'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res, '한식');
    }else if(array_key_exists('chinese', $_POST)){
        $sql="SELECT * FROM review WHERE restType='중식'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res, '중식');
    }else if(array_key_exists('japanese', $_POST)){
        $sql="SELECT * FROM review WHERE restType='경양식일식'";
        $res = mysqli_query($mysqli, $sql);
        reviewList($res, '경양식일식');
    };

    
    // 리뷰 리스트 출력
    function reviewList($res, $search) {
        echo "<h2 id='search-word'>".$search."</h2>";
        if($res->num_rows > 0){
            while($newArray = mysqli_fetch_array($res)){
                echo "
                <div class='review'>
                <div id='reviewContent'>
                <b>".$newArray['restName']."</b> [ ID: ".$newArray['id']." <i>작성일자: ".$newArray['date']."</i>
                <br/>".$newArray['starPoint']."</br/>".$newArray['reviewDetail']."<br/>
                </div>
                </div>
                ";
            }
        } else {
            echo "<br/>No Review";
        }
    };
    //mysql_close($mysqli);
    ?>
</body>
</html>