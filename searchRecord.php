<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="searchlist.css">
    <style>
        input[type='submit']{
            font-size: 20px;
            background-color: white;
            border: none;
            cursor: pointer;
            font-weight: bolder;
        }
        input:hover{
            text-decoration: underline;
        }
    </style>
    <?php include "header.php";?>
</head>
<body>
<?php
    $keyword = $_POST['searchKey'];
    if (!$keyword){
        echo"
            <script>
            alert('검색어를 입력하세요');
            history.back();
            </script>
        ";
        exit();
    } else {
        $mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
        $sql_f = "SELECT * FROM searchkey WHERE searchKeyword='$keyword'";
            $res_f = mysqli_query($mysqli, $sql_f); 
            if($res_f->num_rows > 0){
                $sql_u = "UPDATE searchkey SET count=count+1 WHERE searchKeyword='$keyword'";
                $res_u = mysqli_query($mysqli, $sql_u); 
            } else {
                $sql_i = "INSERT INTO searchkey (searchKeyword) VALUES ('$keyword')";
                $res_i = mysqli_query($mysqli, $sql_i); 
            }
    }
?>
<header>
    <h1><a href="/main.php">웹사이트 이름</a></h1>
    <nav><h4><?php
    $sql_search = "SELECT restName, restType, restAddr FROM restaurant WHERE restMain='".$keyword."' OR restType='".$keyword."' OR restName='".$keyword."';";
    $res = mysqli_query($mysqli, $sql_search);
    $number_of_rows = mysqli_num_rows($res);
    echo "총 ".$number_of_rows."개의 모범음식점이 검색되었습니다.";
?></h4></nav>
</header>
<section>
    <div class="list_result">
    <div class="result_box">
        <?php
            $n=1;
            while($newArray=mysqli_fetch_array($res, MYSQLI_ASSOC)){
                $restName = $newArray['restName'];
                $restType = $newArray['restType'];
                $restAddr = $newArray['restAddr'];
                echo $n++.".";
                echo "<form action = 'restaurant_detail.php' method ='post'>";
                echo "<input type = 'hidden' name = 'restName' value = '".$restName."'>";
                echo "<p><input type = 'submit' class='info_name' value = '".$restName."'>";
                echo "<span class = 'info_category'>".$restType."</span></p>";
                echo "<p class='info_address'>".$restAddr."</p>";
            }
        ?>
    </div>
    </div>
</section>
<div id="line"></div>
<aside>
    <form id="menu">
        <div class="mymenu">
            <input type="button" value="마이페이지" onclick="location.href='mypage.php'">
            <input type="button" value="리뷰" onclick="location.href='review.html'">
            <input type="button" value="착한가격식당" onclick="location.href='kind_price.html'">
            <input type="button" value="순위" onclick="location.href='ranking.html'">
        </div>
    </form>
    </aside>
</body>
</html>