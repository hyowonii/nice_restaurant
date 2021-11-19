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
</head>
<body>
<header>
    <h1><a href="/main.php">웹사이트 이름</a></h1>
    <nav><h4>
        <?php
    $mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
    if (array_key_exists('gu_all',$_POST)){
        $sql_search = "SELECT restName, restType, restAddr FROM restaurant;";
    } else if (array_key_exists('gangnam_all',$_POST)){
        $sql_search = "SELECT restName, restType, restAddr FROM restaurant AS r, guinfo AS g WHERE g.guName='강남구' AND r.guCode=g.guCode";
    } else if (array_key_exists('mapo_all',$_POST)){
        $sql_search = "SELECT restName, restType, restAddr FROM restaurant AS r, guinfo AS g WHERE g.guName='마포구' AND r.guCode=g.guCode";
    } else if (array_key_exists('songpa_all',$_POST)){
        $sql_search = "SELECT restName, restType, restAddr FROM restaurant AS r, guinfo AS g WHERE g.guName='송파구' AND r.guCode=g.guCode";
    } else if (array_key_exists('yongsan_all',$_POST)){
        $sql_search = "SELECT restName, restType, restAddr FROM restaurant AS r, guinfo AS g WHERE g.guName='용산구' AND r.guCode=g.guCode";
    } else if (array_key_exists('jongro_all',$_POST)){
        $sql_search = "SELECT restName, restType, restAddr FROM restaurant AS r, guinfo AS g WHERE g.guName='종로구' AND r.guCode=g.guCode";
    } else {
        $local = $_POST['dong'];
        $sql_search = "SELECT restName, restType, restAddr FROM restaurant WHERE dongName='".$local."';";
    }
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
                echo "<input type = 'hidden' name = 'Rname' value = '".$restName."'>";
                echo "<p><input type = 'submit' class='info_name' value = '".$restName."'>";
                echo "<span class = 'info_category'>".$restType."</span></p></form>";
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
            <input type="button" value="마이페이지" onclick="location.href='login.html'">
            <input type="button" value="리뷰" onclick="location.href='reviewAll.html'">
            <input type="button" value="착한가격식당" onclick="location.href='kind_price.html'">
            <input type="button" value="순위" onclick="location.href='ranking.html'">
        </div>
    </form>
    </aside>
</body>
</html>