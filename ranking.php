<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="ranking.css">
        <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    </head>
    <body>
        <?php
        $mysqli = mysqli_connect("localhost", "team08", "team08", "team08");

        // 리뷰 개수 상위 10개
        $sql_r = "SELECT restName,COUNT(restName) AS cnt FROM review GROUP BY restName ORDER BY cnt DESC limit 10";
        $res_r = mysqli_query($mysqli, $sql_r);

        $reviewRank=[];
        $rank = 0;
        while($rank < 10){
            $reviewRank[$rank++] = mysqli_fetch_array($res_r);
        };

        // 별점 평균 점수 상위 10개
        $sql_s = "SELECT restName,AVG(star) as avg FROM review GROUP BY restName ORDER BY avg DESC limit 10";
        $res_s = mysqli_query($mysqli, $sql_s);

        $starRank=[];
        $rank=0;
        while($rank < 10){
            $starRank[$rank++] = mysqli_fetch_array($res_s);
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
                            <p id='1st'><?php echo $reviewRank[0]['restName']; ?></p>
                        </li>
                        <li>
                            2위
                            <p id='2nd'><?php echo $reviewRank[1]['restName']; ?></p>
                        </li>
                        <li>
                            3위
                            <p id='3rd'><?php echo $reviewRank[2]['restName']; ?></p>
                        </li>
                        <li>
                            4위
                            <p id='4th'><?php echo $reviewRank[3]['restName']; ?></p>
                        </li>
                        <li>
                            5위
                            <p id='5th'><?php echo $reviewRank[4]['restName']; ?></p>
                        </li>
                        <li>
                            6위
                            <p id='6th'><?php echo $reviewRank[5]['restName']; ?></p>
                        </li>
                        <li>
                            7위
                            <p id='7th'><?php echo $reviewRank[6]['restName']; ?></p>
                        </li>
                        <li>
                            8위
                            <p id='8th'><?php echo $reviewRank[7]['restName']; ?></p>
                        </li>
                        <li>
                            9위
                            <p id='9th'><?php echo $reviewRank[8]['restName']; ?></p>
                        </li>
                        <li>
                            10위
                            <p id='10th'><?php echo $reviewRank[9]['restName']; ?></p>
                        </li>
                        
                    </ul>
                </div>
                <div id='star'>
                    <h3>별점순</h3>
                    <ul>
                        <li>
                            1위
                            <p id='1st'><?php echo $starRank[0]['restName']; ?></p>
                        </li>
                        <li>
                            2위
                            <p id='2nd'><?php echo $starRank[1]['restName']; ?></p>
                        </li>
                        <li>
                            3위
                            <p id='3rd'><?php echo $starRank[2]['restName']; ?></p>
                        </li>
                        <li>
                            4위
                            <p id='4th'><?php echo $starRank[3]['restName']; ?></p>
                        </li>
                        <li>
                            5위
                            <p id='5th'><?php echo $starRank[4]['restName']; ?></p>
                        </li>
                        <li>
                            6위
                            <p id='6th'><?php echo $starRank[5]['restName']; ?></p>
                        </li>
                        <li>
                            7위
                            <p id='7th'><?php echo $starRank[6]['restName']; ?></p>
                        </li>
                        <li>
                            8위
                            <p id='8th'><?php echo $starRank[7]['restName']; ?></p>
                        </li>
                        <li>
                            9위
                            <p id='9th'><?php echo $starRank[8]['restName']; ?></p>
                        </li>
                        <li>
                            10위
                            <p id='10th'><?php echo $starRank[9]['restName']; ?></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div id="line"></div>

        <form>
            <div class="mymenu">
                <input type="button" value="마이페이지" onclick="location.href='mypage.html'">
                <input type="button" value="리뷰" onclick="location.href='review.html'">
                <input type="button" value="착한가격식당" onclick="location.href='kind_price.html'">
                <input type="button" value="순위" onclick="location.href='ranking.php'">
            </div>
        </form>
    </body>
</html>