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
        $sql_r = "SELECT searchKeyword,cnt FROM searchkey ORDER BY cnt DESC limit 10";
        $res_r = mysqli_query($mysqli, $sql_r);

        $reviewRank=[];
        $rank = 0;
        while($rank < 10){
            $reviewRank[$rank++] = mysqli_fetch_array($res_r);
        };

        // 업소명과 리뷰개수 출력
        function printReviewRank($rank){
            if(isset($rank)){
                echo $rank['searchKeyword']." (".$rank['cnt']."개)";
            } else {
                echo "X";
            }
        };

        // 별점 평균 점수 상위 10개
        $sql_s = "SELECT restName,AVG(starPoint) as avg FROM review GROUP BY restName ORDER BY avg DESC limit 10";
        $res_s = mysqli_query($mysqli, $sql_s);

        $starRank=[];
        $rank=0;
        while($rank < 10){
            $starRank[$rank++] = mysqli_fetch_array($res_s);
        };

        // 업소명과 별점평균 출력
        function printStarRank($rank){
            if(isset($rank)){
                echo $rank['restName']." (".$rank['avg']."점)";
            } else {
                echo "X";
            }
        };
        

        ?>

        <div class="main_content">
            <h1><a href="main.php"><i class="fas fa-utensils"></i> 웹페이지 이름</a></h1>
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
                        <li>
                            1위
                            <p id='1st'><?php printReviewRank($reviewRank[0]); ?></p>
                        </li>
                        <li>
                            2위
                            <p id='2nd'><?php printReviewRank($reviewRank[1]); ?></p>
                        </li>
                        <li>
                            3위
                            <p id='3rd'><?php printReviewRank($reviewRank[2]); ?></p>
                        </li>
                        <li>
                            4위
                            <p id='4th'><?php printReviewRank($reviewRank[3]); ?></p>
                        </li>
                        <li>
                            5위
                            <p id='5th'><?php printReviewRank($reviewRank[4]) ?></p>
                        </li>
                        <li>
                            6위
                            <p id='6th'><?php printReviewRank($reviewRank[5]); ?></p>
                        </li>
                        <li>
                            7위
                            <p id='7th'><?php printReviewRank($reviewRank[6]); ?></p>
                        </li>
                        <li>
                            8위
                            <p id='8th'><?php printReviewRank($reviewRank[7]); ?></p>
                        </li>
                        <li>
                            9위
                            <p id='9th'><?php printReviewRank($reviewRank[8]); ?></p>
                        </li>
                        <li>
                            10위
                            <p id='10th'><?php printReviewRank($reviewRank[9]); ?></p>
                        </li>
                        
                    </ul>
                </div>
                <div id='star'>
                    <h3>별점순</h3>
                    <ul>
                        <li>
                            1위
                            <p id='1st'><?php printStarRank($starRank[0]); ?></p>
                        </li>
                        <li>
                            2위
                            <p id='2nd'><?php printStarRank($starRank[1]);; ?></p>
                        </li>
                        <li>
                            3위
                            <p id='3rd'><?php printStarRank($starRank[2]);; ?></p>
                        </li>
                        <li>
                            4위
                            <p id='4th'><?php printStarRank($starRank[3]);; ?></p>
                        </li>
                        <li>
                            5위
                            <p id='5th'><?php printStarRank($starRank[4]);; ?></p>
                        </li>
                        <li>
                            6위
                            <p id='6th'><?php printStarRank($starRank[5]);; ?></p>
                        </li>
                        <li>
                            7위
                            <p id='7th'><?php printStarRank($starRank[6]);; ?></p>
                        </li>
                        <li>
                            8위
                            <p id='8th'><?php printStarRank($starRank[7]);; ?></p>
                        </li>
                        <li>
                            9위
                            <p id='9th'><?php printStarRank($starRank[8]);; ?></p>
                        </li>
                        <li>
                            10위
                            <p id='10th'><?php printStarRank($starRank[9]);; ?></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div id="line"></div>

        <form>
            <div class="mymenu">
                <input type="button" value="마이페이지" onclick="location.href='mypage.html'">
                <input type="button" value="리뷰" onclick="location.href='review2.php'">
                <input type="button" value="착한가격식당" onclick="location.href='kind_price2.php'">
                <input type="button" value="순위" onclick="location.href='ranking.php'">
            </div>
        </form>
    </body>
</html>