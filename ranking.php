<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="ranking.css?after">
        <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
        <?php include "header.php";?>
    </head>
    <body>
        <?php
        $mysqli = mysqli_connect("localhost", "team08", "team08", "team08");

        // 리뷰 개수 상위 10개
        $sql_r = "SELECT restName,COUNT(restName) as cnt FROM review GROUP BY restName ORDER BY cnt DESC limit 10";
        $res_r = mysqli_query($mysqli, $sql_r);

        while($reviewRank = mysqli_fetch_array($res_r)){
            $searchKeyword = $reviewRank['restName'];
            $cnt = $reviewRank['cnt'];
            // reviewrank table에 랭킹 등록
            $sql = "SELECT * FROM reviewrank WHERE searchKeyword='$searchKeyword'";
            $res = mysqli_query($mysqli, $sql);
            if($res->num_rows > 0){
                continue;
            } else {
                $sql_rank = "INSERT INTO reviewrank (searchKeyword, cnt) VALUES ('$searchKeyword', '$cnt')";
                mysqli_query($mysqli, $sql_rank);
            }

        };

        // reviewrank table에서 상위 10개만 남기고 delete
        $sql = "SELECT * FROM reviewrank ORDER BY cnt DESC";
        $res = mysqli_query($mysqli, $sql);
        $i = 0;
        while($newArray = mysqli_fetch_array($res)){
            if($i>9){
                $searchKeyword = $newArray['searchKeyword'];
                $sql_d = "DELETE FROM reviewrank WHERE searchKeyword='$searchKeyword'";
                mysqli_query($mysqli, $sql_d);
            }
            $i++;
        };

        
        
        

        // 별점 평균 점수 상위 10개
        $sql_s = "SELECT restName,AVG(starPoint) as avg FROM review GROUP BY restName ORDER BY avg DESC limit 10";
        $res_s = mysqli_query($mysqli, $sql_s);

        while($reviewRank = mysqli_fetch_array($res_s)){
            $restName = $reviewRank['restName'];
            $avg = $reviewRank['avg'];
            // starrank table에 랭킹 등록
            $sql = "SELECT * FROM starrank WHERE restName='$restName'";
            $res = mysqli_query($mysqli, $sql);
            if($res->num_rows > 0){
                continue;
            } else {
                $sql_rank = "INSERT INTO starrank (restName, avg) VALUES ('$restName', '$avg')";
                mysqli_query($mysqli, $sql_rank);
            }

        };

        // starrank table에서 상위 10개만 남기고 delete
        $sql = "SELECT * FROM starrank ORDER BY avg DESC";
        $res = mysqli_query($mysqli, $sql);
        $i = 0;
        while($newArray = mysqli_fetch_array($res)){
            if($i>9){
                $restName = $newArray['restName'];
                $sql_d = "DELETE FROM starrank WHERE restName='$restName'";
                mysqli_query($mysqli, $sql_d);
            }
            $i++;
        }
        

        ?>

        <div class="main_content">
            <h1><a href="main.php"><i class="fas fa-utensils"></i> 모음</a></h1>
            <h2>모범음식점 Ranking</h2>
            <div class="rank">
                <div id="res_cnt">
                    <h3>개수</h3>
                    <div class="hGraph">
                        <ul>
                            <li><span class="gTerm">강남구</span><span class="gBar" style="width:100%"><span>382</span></span></li>
                            <li><span class="gTerm">마포구</span><span class="gBar" style="width:30%"><span>115</span></span></li>
                            <li><span class="gTerm">송파구</span><span class="gBar" style="width:88%"><span>335</span></span></li>
                            <li><span class="gTerm">용산구</span><span class="gBar" style="width:35%"><span>131</span></span></li>
                            <li><span class="gTerm">종로구</span><span class="gBar" style="width:25%"><span>94</span></span></li>
                        </ul>
                    </div>
                </div>
                <div id='review'>
                    <h3>리뷰 개수</h3>
                    <ul>
                        <?php
                        $n=1;
                        $sql = "SELECT * FROM reviewrank ORDER BY cnt DESC";
                        $res = mysqli_query($mysqli, $sql);
                        while($newArray = mysqli_fetch_array($res)){
                            $searchKeyword = $newArray['searchKeyword'];
                            $cnt = $newArray['cnt'];
                            echo "<li>".$n++."위<br/>
                            <p>".$searchKeyword." (".$cnt."개)</p>
                            </li>";
                        }
                        ?>
                        
                    </ul>
                </div>
                <div id='star'>
                    <h3>별점순</h3>
                    <ul>
                    <?php
                        $n=1;
                        $sql = "SELECT * FROM starrank ORDER BY avg DESC";
                        $res = mysqli_query($mysqli, $sql);
                        while($newArray = mysqli_fetch_array($res)){
                            $restName = $newArray['restName'];
                            $avg = $newArray['avg'];
                            echo "<li>".$n++."위<br/>
                            <p>".$restName." (".$avg."점)</p>
                            </li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <div id="line"></div>

        <form>
            <div class="mymenu">
                <input type="button" value="마이페이지" onclick="location.href='mypage.php'">
                <input type="button" value="리뷰" onclick="location.href='review2.php'">
                <input type="button" value="착한가격식당" onclick="location.href='kind_price2.php'">
                <input type="button" value="순위" onclick="location.href='ranking.php'">
            </div>
        </form>
    </body>
</html>