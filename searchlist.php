<?php
    $mysqli=mysqli_connect("localhost", "team08", "team08", "team08");
    $sql_search = "insert into searchkey (searchKey) values('".$_GET["search"]."')";
    $res = mysqli_query($mysqli, $sql_search);
    $res_row = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="searchlist.js" defer></script>
    <link rel="stylesheet" href="searchlist.css">
</head>
<body>
<header>
    <h1><a href="/index.html">웹사이트 이름</a></h1>
    <nav><h4>모범음식점 검색 결과입니다.</h4></nav>
</header>
<section>
    <div class="list_result">
    <div class="result_box">
        <a href="/restaurant_detail.html" class="info_name">식당이름</a>
        <span class="info_category">업태</span>
        <p class="info_address">주소</p>
    </div>
    </div>
</section>
<div id="line"></div>
<aside>
    <form id="menu">
        <div class="mymenu">
            <input type="button" value="마이페이지" onclick="location.href='mypage.html'">
            <input type="button" value="리뷰" onclick="location.href='reviewAll.html'">
            <input type="button" value="착한가격식당" onclick="location.href='kind_price.html'">
            <input type="button" value="순위" onclick="location.href='ranking.html'">
        </div>
    </form>
    </aside>
</body>
</html>