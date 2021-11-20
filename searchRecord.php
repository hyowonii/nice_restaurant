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
                $sql_u = "UPDATE searchkey SET cnt=cnt+1 WHERE searchKeyword='$keyword'";
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
            while($newArray=mysqli_fetch_array($res, MYSQLI_ASSOC)){
                $restName = $newArray['restName'];
                $restType = $newArray['restType'];
                $restAddr = $newArray['restAddr'];
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
            <input type="button" value="리뷰" onclick="location.href='review.html'">
            <input type="button" value="착한가격식당" onclick="location.href='kind_price.html'">
            <input type="button" value="순위" onclick="location.href='ranking.php'">
        </div>
    </form>
    </aside>
</body>
</html>