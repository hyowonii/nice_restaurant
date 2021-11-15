<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="main.js" defer></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1><a href="/index.html">웹사이트 이름</a></h1>
    <nav>
    <?php
            $mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
            $add_keyword = $_POST['search'];
            if (isset ($add_keyword)){
                $sql_addKeyword = "INSERT INTO searchkey VALUES ('$add_keyword');";
                mysqli_query($mysqli, $add_keyword);
            }
            ?>
    <form class = "searchbar" action="searchlist.php" method="post">
        <div>
            <input class="keyword" type="text" name="search" placeholder="검색어를 입력하세요."/>
            <input class="searchbtn" type="submit" value="검색"/>
        </div>
        <div>
        <dl class="hot_keyword">
            <dt>인기검색어</dt>
            <?php
            $sql_key = "SELECT searchKey COUNT(*) as cnt FROM searchkey GROUP BY searchKey ORDER BY cnt DESC;";
            $sql_res = mysqli_query($mysqli, $sql_key);
            while ($sql_row = mysqli_fetch_array($sql_res)){
                echo '<dd><input type="submit" value="'.$sql_row['searchKey'].'"></dd>"';
            }
            ?>
        </dl>
        </div>
    </form>
    </nav>
    </header>
    <section>
        <div class="gu">
            <h3>구</h3>
            <button id="all">전체</button>
            <button id="gangnam">강남구</button>
            <button id="mapo">마포구</button>
            <button id="songpa">송파구</button>
            <button id="yongsan">용산구</button>
            <button id="jongro">종로구</button>
        </div>
        <form action="searchlist.html" method="post">
        <div class="dong">
            <div class="dong-gangnam">
                <h3>동</h3>
                <input type="submit" id="a" value="전체">
                <input type="submit" id="b" value="개포1동">
                <input type="submit" id="c" value="개포2동">
                <input type="submit" id="d" value="개포4동">
                <input type="submit" id="e" value="논현1동">
                <input type="submit" id="f" value="논현2동">
                <input type="submit" id="g" value="대치1동">
                <input type="submit" id="h" value="대치2동">
                <input type="submit" id="i" value="대치3동">
                <input type="submit" id="j" value="도곡1동">
                <input type="submit" id="k" value="도곡2동">
                <input type="submit" id="l" value="삼성1동">
                <input type="submit" id="m" value="삼성2동">
                <input type="submit" id="n" value="세곡동">
                <input type="submit" id="o" value="수서동">
                <input type="submit" id="p" value="신사동">
                <input type="submit" id="q" value="압구정동">
                <input type="submit" id="r" value="역삼1동">
                <input type="submit" id="s" value="역삼2동">
                <input type="submit" id="t" value="일원1동">
                <input type="submit" id="u" value="일원2동">
                <input type="submit" id="v" value="일원본동">
                <input type="submit" id="w" value="청담동">
            </div>
            <div class="dong-mapo">
                <h3>동</h3>
                <input type="submit" id="a" value="전체">
                <input type="submit" id="b" value="공덕동">
                <input type="submit" id="c" value="대흥동">
                <input type="submit" id="d" value="도화동">
                <input type="submit" id="e" value="망원제1동">
                <input type="submit" id="f" value="망원제2동">
                <input type="submit" id="g" value="상암동">
                <input type="submit" id="h" value="서강동">
                <input type="submit" id="i" value="서교동">
                <input type="submit" id="j" value="성산제1동">
                <input type="submit" id="k" value="성산제2동">
                <input type="submit" id="l" value="신수동">
                <input type="submit" id="m" value="아현동">
                <input type="submit" id="n" value="연남동">
                <input type="submit" id="o" value="염리동">
                <input type="submit" id="p" value="용강동">
                <input type="submit" id="q" value="합정동">
            </div>
            <div class = "dong-yongsan">
                <h3>동</h3>
                <input type="submit" id="a" value="전체">
                <input type="submit" id="b" value="남영동">
                <input type="submit" id="c" value="보광동">
                <input type="submit" id="d" value="서빙고동">
                <input type="submit" id="e" value="용문동">
                <input type="submit" id="f" value="용산2가동">
                <input type="submit" id="g" value="원효로제1동">
                <input type="submit" id="h" value="원효로제2동">
                <input type="submit" id="i" value="이촌제1동">
                <input type="submit" id="j" value="이태원제1동">
                <input type="submit" id="k" value="이태원제2동">
                <input type="submit" id="l" value="청파동">
                <input type="submit" id="m" value="한강로동">
                <input type="submit" id="n" value="한남동">
                <input type="submit" id="o" value="효창동">
                <input type="submit" id="p" value="후암동">
            </div>
            <div class = "dong-songpa">
                <h3>동</h3>
                <input type="submit" id="a" value="전체">
                <input type="submit" id="b" value="가락1동">
                <input type="submit" id="c" value="가락2동">
                <input type="submit" id="d" value="가락본동">
                <input type="submit" id="e" value="거여1동">
                <input type="submit" id="f" value="거여2동">
                <input type="submit" id="g" value="마천1동">
                <input type="submit" id="h" value="문정1동">
                <input type="submit" id="i" value="문정2동">
                <input type="submit" id="j" value="방이1동">
                <input type="submit" id="k" value="방이2동">
                <input type="submit" id="l" value="삼전동">
                <input type="submit" id="m" value="석촌동">
                <input type="submit" id="n" value="송파1동">
                <input type="submit" id="o" value="송파2동">
                <input type="submit" id="p" value="오금동">
                <input type="submit" id="q" value="오륜동">
                <input type="submit" id="r" value="잠실2동">
                <input type="submit" id="s" value="잠실3동">
                <input type="submit" id="t" value="잠실4동">
                <input type="submit" id="u" value="잠실6동">
                <input type="submit" id="v" value="잠실본동">
                <input type="submit" id="w" value="장지동">
                <input type="submit" id="x" value="풍납1동">
                <input type="submit" id="y" value="풍납2동">
            </div>
            <div class = "dong-jongro">
                <h3>동</h3>
                <input type="submit" id="a" value="전체">
                <input type="submit" id="b" value="가회동">
                <input type="submit" id="c" value="교남동">
                <input type="submit" id="d" value="무악동">
                <input type="submit" id="e" value="부암동">
                <input type="submit" id="f" value="사직동">
                <input type="submit" id="g" value="삼청동">
                <input type="submit" id="h" value="숭인제1동">
                <input type="submit" id="i" value="숭인제2동">
                <input type="submit" id="j" value="종로1.2.3.4가동">
                <input type="submit" id="k" value="종로5.6가동">
                <input type="submit" id="l" value="창신제2동">
                <input type="submit" id="m" value="청운효자동">
                <input type="submit" id="n" value="평창동">
                <input type="submit" id="o" value="혜화동">
            </div>
        </div>
        </form>
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