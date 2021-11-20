<?php 
    
    session_start(); //세션을 저장하든 읽어오든 사용하고자 하면 이 함수로 시작
 
    $id="";
    $name="";
    if( isset($_SESSION['id'])) $id= $_SESSION['id'];
    if( isset($_SESSION['name'])) $name= $_SESSION['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="main.js" defer></script>
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <style>
        form{
            display: inline-block;
        }
    </style>
    <link rel="stylesheet" href="main.css?after">
</head>
<body>
    <header>
        <h1><a href="/main.php"><i class="fas fa-utensils"></i> 모음</a></h1>
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
            $sql = "SELECT searchKeyword, cnt FROM searchkey ORDER BY cnt DESC LIMIT 5;";
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
                    $sql_dong = "SELECT * FROM donginfo AS d INNER JOIN guinfo AS g ON g.guName='강남구' AND d.guCode=g.guCode;";
                    $res_dong = mysqli_query($mysqli, $sql_dong);
                    if ($res_dong){
                        while ($newArray = mysqli_fetch_array($res_dong, MYSQLI_ASSOC)){
                            $dongName = $newArray['dongName'];
                            $guCode = $newArray['guCode'];
                            echo "<form action='searchlist.php' method='post'>";
                            echo "<input type = 'hidden' name = 'dong' value ='".$dongName."'>";
                            echo "<input type = 'submit' value = '".$dongName."' style = 'margin-right: 4px; margin-bottom: 4px;'></form>";
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
                    $sql_dong = "SELECT * FROM donginfo AS d INNER JOIN guinfo AS g ON g.guName='마포구' AND d.guCode=g.guCode;";
                    $res_dong = mysqli_query($mysqli, $sql_dong);
                    if ($res_dong){
                        while ($newArray = mysqli_fetch_array($res_dong, MYSQLI_ASSOC)){
                            $dongName = $newArray['dongName'];
                            $guCode = $newArray['guCode'];
                            echo "<form action='searchlist.php' method='post'>";
                            echo "<input type = 'hidden' name = 'dong' value ='".$dongName."'>";
                            echo "<input type = 'submit' value = '".$dongName."' style = 'margin-right: 4px; margin-bottom: 4px;'></form>";
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
                    $sql_dong = "SELECT * FROM donginfo AS d INNER JOIN guinfo AS g ON g.guName='용산구' AND d.guCode=g.guCode;";
                    $res_dong = mysqli_query($mysqli, $sql_dong);
                    if ($res_dong){
                        while ($newArray = mysqli_fetch_array($res_dong, MYSQLI_ASSOC)){
                            $dongName = $newArray['dongName'];
                            $guCode = $newArray['guCode'];
                            echo "<form action='searchlist.php' method='post'>";
                            echo "<input type = 'hidden' name = 'dong' value ='".$dongName."'>";
                            echo "<input type = 'submit' value = '".$dongName."' style = 'margin-right: 4px; margin-bottom: 4px;'></form>";
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
                    $sql_dong = "SELECT * FROM donginfo AS d INNER JOIN guinfo AS g ON g.guName='송파구' AND d.guCode=g.guCode;";
                    $res_dong = mysqli_query($mysqli, $sql_dong);
                    if ($res_dong){
                        while ($newArray = mysqli_fetch_array($res_dong, MYSQLI_ASSOC)){
                            $dongName = $newArray['dongName'];
                            $guCode = $newArray['guCode'];
                            echo "<form action='searchlist.php' method='post'>";
                            echo "<input type = 'hidden' name = 'dong' value ='".$dongName."'>";
                            echo "<input type = 'submit' value = '".$dongName."' style = 'margin-right: 4px; margin-bottom: 4px;'></form>";
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
                    $sql_dong = "SELECT * FROM donginfo AS d INNER JOIN guinfo AS g ON g.guName='종로구' AND d.guCode=g.guCode;";
                    $res_dong = mysqli_query($mysqli, $sql_dong);
                    if ($res_dong){
                        while ($newArray = mysqli_fetch_array($res_dong, MYSQLI_ASSOC)){
                            $dongName = $newArray['dongName'];
                            $guCode = $newArray['guCode'];
                            echo "<form action='searchlist.php' method='post'>";
                            echo "<input type = 'hidden' name = 'dong' value ='".$dongName."'>";
                            echo "<input type = 'submit' value = '".$dongName."' style = 'margin-right: 4px; margin-bottom: 4px;'></form>";
                        }
                    }
                ?>
            </div>
        </div>
        </section>
        <div id="line"></div>
    <aside>
        <!-- 헤더 영역의 로고와 회원가입/로그인 표시 영역 -->
<div id="top">
    <!-- 1. 로고영역 -->
    <!-- include되면 삽입된 문서의 위치를 기준으로 -->
    <!--<h3><a href="./index.php">PHP 프로그래밍 입문</a></h3> -->

    <!-- 2. 회원가입/로그인 버튼 표시 영역 -->
    <ul id="top_menu">
        <!-- 로그인 안되었을 때 -->
        <?php if(!$id){  ?>
            <div> 
            <a href="sign_up.html">회원가입</a>
            <a href="login.html">로그인</a>
            </div>
        <?php }else{ ?>
            <div>
            <l><a href="logout.php">로그아웃</a></l></br>
            <l><a href="memberMod.php">정보수정</a></l></br>
            <l><a href="deleteMem.php">회원탈퇴</a></l>
            </div>
        <?php }?>
    </ul>
</div>
    <form id="menu">
        <div class="mymenu">
            <input type="button" value="마이페이지" onclick="location.href='mypage.php'">
            <input type="button" value="리뷰" onclick="location.href='review2.php'">
            <input type="button" value="착한가격식당" onclick="location.href='kind_price2.php'">
            <input type="button" value="순위" onclick="location.href='ranking.php'">
        </div>
    </form>
    </aside>
</body>
</html>