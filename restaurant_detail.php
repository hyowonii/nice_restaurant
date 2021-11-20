<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="review.css?after5">  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <title>Restaurant Detail</title>
    <style>
      .main_content{
    float: left;
    width: 80%;
}
      h1 a[href]{
    color: orange;
    text-decoration-line: none;
}
    h2{
      color:red;
    }    

    h4{
      color:black;
      font-family: 'Jeju Gothic', sans-serif;
    }
#line{
    display: block;
    width:1px;
    background-color: gray;
    position:absolute;
    top:0;
    bottom:0;
    right: 20%;
}

.mymenu{
    float: right;
    width: 200px;
    
}

.mymenu input{
    width: 100px;
    margin: 10px;
}

    </style>
    
    <?php include "header.php";
        include "dbconnect.php";
        //선택한 음식점명 가져와서 테이블에서 셀렉함
        $restName=$_POST['restName'];
        $sql="SELECT * FROM restaurant WHERE restName='$restName'";
        $res=mysqli_query($mysqli,$sql);
        $newArray=mysqli_fetch_array($res,MYSQLI_ASSOC);
        $since=$newArray['since'];
        $road=$newArray['restRoad'];
        $addr=$newArray['restAddr'];
        $type=$newArray['restType'];
        $main=$newArray['restMain'];
        $phone=$newArray['restPhone'];
        $guCode=$newArray['guCode'];
        $dong=$newArray['dongName'];
        
        $sql="SELECT * FROM review WHERE restName='$restName'";
        $res=mysqli_query($mysqli,$sql);
        $newArray=mysqli_fetch_array($res,MYSQLI_ASSOC);
        $number_of_rows= mysqli_num_rows($res);
        //만약 리뷰가 존재하지 않을 시
        if(!$number_of_rows){
          $starPoint="";
          $star="리뷰가 존재하지 않습니다.";
        }else{
          $reviewDetail=$newArray['reviewDetail'];
          $starPoint=$newArray['starPoint'];
          $date=$newArray['date'];
          //별점 평균 구하기
          $sql="SELECT AVG(starPoint) as avg FROM review WHERE restName='$restName'";
          $res=mysqli_query($mysqli,$sql);
          $starArr=mysqli_fetch_array($res);
          $star=number_format($starArr['avg'],1);
          
        }
    ?>
      <script>
        function resetDetail(){
          document.reviewForm.review.value="";
        }     
      </script>
</head>
<body>
<div class="main_content">
<h1><a href="main.php"><i class="fas fa-utensils"></i> 모음</a></h1>
    <div id="main"><h1>Restaurant: <?=$restName?> </h1>
    <h2>★: <?=$star?></h2>
    <h4>메인메뉴:  <?=$main?></h4>
    <h4>전화번호: <?=$phone?></h4>
    <h4>주소: <?=$road?> (도로명주소: <?=$addr?>)</h4>
    <h4>업태: <?=$type?></h4>
    <h4>Since: <?=$since?></h4>
    </div>
    
    <div class="reviewM">
      <div id="reviewM">
        <h1>REVIEW</h1>
      </div>
      <!--비로그인시 리뷰 입력 불가-->
      <?php if(!$id){  ?>
      <div>
        <label for="forReview">Write your review:</label><br>
        <span class="star">
            ★★★★★
            <span>★★★★★</span>
            <input type="range" name="star"  value="1" step="1" min="0" max="10">
        </span>
            <script>const drawStar = (target) => {
                document.querySelector(`.star span`).style.width = `${target.value * 10}%`;
            }</script>
        <p><textarea readonly rows="7" cols="100">로그인 후 이용해주세요.</textarea></p>
      </div>
    <?php }else{ ?>
      <div>
        <form action="restaurant_detail(c).php?id=<?=$id?>" method="post" id="reviewForm" name="reviewForm">
            <label>Write your review:</label><br>
            <span class="star">
                ★★★★★
                <span>★★★★★</span>
                <input type="range" name="star" oninput="drawStar(this)" value="1" step="1" min="0" max="10">
            </span>
            <script>const drawStar = (target) => {
                document.querySelector(`.star span`).style.width = `${target.value * 10}%`;
            }</script>
            <div>
            <textarea name="review" rows="7" cols="100">욕설 및 비방 등 악의적인 의도를 가지고 작성된 리뷰는 삭제됩니다.</textarea>
            </div>
            <?php
            //레스토랑 정보를 전송하기 위한 히든인풋
             echo "<input type = 'hidden' name = 'restName' value = '".$restName."'>";
             echo "<input type = 'hidden' name = 'dongName' value = '".$dong."'>";
             echo "<input type = 'hidden' name = 'guCode' value = '".$guCode."'>";
             echo "<input type = 'hidden' name = 'restType' value = '".$type."'>";
            ?>
            <div class="submit">
              <input type="submit" value="작성하기" >
              <input type="button" value="초기화" onclick="resetDetail()">
            </div>
        </form>
    </div>
    <?php }?> 
      <?php
        //레스토랑 리뷰 출력
        $sql="SELECT * FROM review WHERE restName='$restName'";
        $res=mysqli_query($mysqli,$sql);
        if($res){
          while($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC)){
              echo "
                <div class='review2'>
                <div id='reviewContent'>
                <b>".$newArray['restName']."</b> [ ID: ".$newArray['id']." ] <i>작성일자: ".$newArray['date']."</i>
                <br/>"."★:".$newArray['starPoint']."</br/>".$newArray['reviewDetail']."<br/>
                </div>
                </div>
              ";
            }
        }else echo "<br>리뷰를 작성하세요.";
        mysqli_free_result($res);
        mysqli_close($mysqli);   
      ?>
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