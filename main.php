
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="main.js" defer></script>
    <style>
        form{
            display: inline-block;
        }
    </style>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1><a href="/main.php">웹사이트 이름</a></h1>
    <nav>
    <form class = "searchbar" action="searchRecord.php" method="post">
        <div>
            <input class="keyword" type="text" name="searchKey" placeholder="검색어를 입력하세요."/>
            <input class="searchbtn" type="submit" value="검색"/>
        </div>
    </form>
        <div>
        <dl class="hot_keyword">
            <dt><b>인기검색어:</b></dt>
            <?php
            $mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
            $sql = "SELECT searchKeyword, COUNT(*) AS cnt FROM searchkey GROUP BY searchKeyword ORDER BY cnt DESC LIMIT 5;";
            $res = mysqli_query($mysqli, $sql);
            if ($res)
             while($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                    $keyword = $newArray['searchKeyword'];
                    echo "<dd>".$keyword."</dd>";
                }
            ?>
        </dl>
        </div>
    </nav>
    </header>
    <section>
        <div class="gu">
            <h3>구</h3>
            <form action = "searchlist.php" method = "post">
            <input type="submit" id="all" name = "gu_all" value = "전체">
            </form>
            <button id="gangnam">강남구</button>
            <button id="mapo">마포구</button>
            <button id="songpa">송파구</button>
            <button id="yongsan">용산구</button>
            <button id="jongro">종로구</button>
        </div>
        <div class="dong">
            <div class="dong-gangnam">
                <h3>동</h3>
                <form action = "searchlist.php" method = "post">
                    <input type="submit" id="all" name = "gangnam_all" value = "전체">
                </form>
                <?php
                    $sql_dong = "SELECT * FROM donginfo AS d, guinfo AS g WHERE g.guName='강남구' AND d.guCode=g.guCode;";
                    $res_dong = mysqli_query($mysqli, $sql_dong);
                    if ($res_dong){
                        while ($newArray = mysqli_fetch_array($res_dong, MYSQLI_ASSOC)){
                            $dongName = $newArray['dongName'];
                            $guCode = $newArray['guCode'];
                            echo "<form action='searchlist.php' method='post'>";
                            echo "<input type = 'hidden' name = 'dong' value ='".$dongName."'>";
                            echo "<input type = 'submit' value = '".$dongName."' style = 'margin-right: 4px'></form>";
                        }
                    }
                ?>
            </div>
            <div class="dong-mapo">
                <h3>동</h3>
                <form action = "searchlist.php" method = "post">
            <input type="submit" id="all" name = "mapo_all" value = "전체">
            </form>
                <?php
                    $sql_dong = "SELECT * FROM donginfo AS d, guinfo AS g WHERE g.guName='마포구' AND d.guCode=g.guCode;";
                    $res_dong = mysqli_query($mysqli, $sql_dong);
                    if ($res_dong){
                        while ($newArray = mysqli_fetch_array($res_dong, MYSQLI_ASSOC)){
                            $dongName = $newArray['dongName'];
                            $guCode = $newArray['guCode'];
                            echo "<form action='searchlist.php' method='post'>";
                            echo "<input type = 'hidden' name = 'dong' value ='".$dongName."'>";
                            echo "<input type = 'submit' value = '".$dongName."'style = 'margin-right: 4px'></form>";
                        }
                    }
                ?>
            </div>
            <div class = "dong-yongsan">
                <h3>동</h3>
                <form action = "searchlist.php" method = "post">
            <input type="submit" id="all" name = "yongsan_all" value = "전체">
            </form>
                <?php
                    $sql_dong = "SELECT * FROM donginfo AS d, guinfo AS g WHERE g.guName='용산구' AND d.guCode=g.guCode;";
                    $res_dong = mysqli_query($mysqli, $sql_dong);
                    if ($res_dong){
                        while ($newArray = mysqli_fetch_array($res_dong, MYSQLI_ASSOC)){
                            $dongName = $newArray['dongName'];
                            $guCode = $newArray['guCode'];
                            echo "<form action='searchlist.php' method='post'>";
                            echo "<input type = 'hidden' name = 'dong' value ='".$dongName."'>";
                            echo "<input type = 'submit' value = '".$dongName."'style = 'margin-right: 4px'></form>";
                        }
                    }
                ?>
            </div>
            <div class = "dong-songpa">
                <h3>동</h3>
                <form action = "searchlist.php" method = "post">
            <input type="submit" id="all" name = "songpa_all" value = "전체">
            </form>
            <form action="searchlist.php" method="post">
                <?php
                    $sql_dong = "SELECT * FROM donginfo AS d, guinfo AS g WHERE g.guName='송파구' AND d.guCode=g.guCode;";
                    $res_dong = mysqli_query($mysqli, $sql_dong);
                    if ($res_dong){
                        while ($newArray = mysqli_fetch_array($res_dong, MYSQLI_ASSOC)){
                            $dongName = $newArray['dongName'];
                            $guCode = $newArray['guCode'];
                            echo "<form action='searchlist.php' method='post'>";
                            echo "<input type = 'hidden' name = 'dong' value ='".$dongName."'>";
                            echo "<input type = 'submit' value = '".$dongName."'style = 'margin-right: 4px'></form>";
                        }
                    }
                ?>
            </div>
            <div class = "dong-jongro">
                <h3>동</h3>
                <form action = "searchlist.php" method = "post">
            <input type="submit" id="all" name = "jongro_all" value = "전체">
            </form>
                <?php
                    $sql_dong = "SELECT * FROM donginfo AS d, guinfo AS g WHERE g.guName='송파구' AND d.guCode=g.guCode;";
                    $res_dong = mysqli_query($mysqli, $sql_dong);
                    if ($res_dong){
                        while ($newArray = mysqli_fetch_array($res_dong, MYSQLI_ASSOC)){
                            $dongName = $newArray['dongName'];
                            $guCode = $newArray['guCode'];
                            echo "<form action='searchlist.php' method='post'>";
                            echo "<input type = 'hidden' name = 'dong' value ='".$dongName."'>";
                            echo "<input type = 'submit' value = '".$dongName."'style = 'margin-right: 4px'></form>";
                        }
                    }
                ?>
            </div>
        </div>
        </section>
        <div id="line"></div>
    <aside>
    <form id="menu">
        <div class="mymenu">
            <input type="button" value="마이페이지" onclick="location.href='mypage.html'">
            <input type="button" value="리뷰" onclick="location.href='review.html'">
            <input type="button" value="착한가격식당" onclick="location.href='kind_price.html'">
            <input type="button" value="순위" onclick="location.href='ranking.html'">
        </div>
    </form>
    </aside>
</body>
</html>