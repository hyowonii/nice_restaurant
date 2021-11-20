<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='stylesheet' href="star.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Detail</title>
    <?php include "header.php";
        include "dbconnect.php";
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
        if(!$number_of_rows){
          $reviewDetail="리뷰를 등록해주세요.";
          $starPoint="";
          $date="";
          $star="";
        }else{
          $reviewDetail=$newArray['reviewDetail'];
          $starPoint=$newArray['starPoint'];
          $date=$newArray['date'];
          $starSum=0;
          $sql=$sql="SELECT * FROM review WHERE restName='$restName'";
          $res=mysqli_query($mysqli,$sql);
          if($res){
            while($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC)){
              $starSum+=$newArray['starPoint'];
            }
          }
          $star=number_format(($starSum/$number_of_rows), 1);
        }
       
    ?>
      <script>
        function resetDetail(){
          document.reviewForm.review.value="";
        }     
      </script>
</head>
<body>
    <div id="main"><h1>Restaurant: <?=$restName?> </h1>
    <h2>★: <?=$star?></h2>
    <h4>main menu: <?=$main?></h4> 
    <h4>tel: <?=$phone?></h4>
    <h4>address: <?=$road?> (도로명주소: <?=$addr?>)</h4>
    <h4>business: <?=$type?></h4>
    <h4>since: <?=$since?></h4>
    </div>
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
        <p><textarea readonly rows="7" cols="100">로그인 후 이용해주세요.
        </textarea></p>
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
    <div class="review">
      <div id="review">
        <h1>REVIEW</h1>
      </div>
      <?php
        $sql=$sql="SELECT * FROM review WHERE restName='$restName'";
        $res=mysqli_query($mysqli,$sql);
        if($res){
          while($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC)){
              echo "</br>".$newArray['id']."님의 리뷰</br> ";
              echo "상세리뷰: ".$newArray['reviewDetail']."&nbsp별점: ";
              echo $newArray['starPoint']."&nbsp작성시간: ";
              echo $newArray['date']."</br>";
          }
        }
        mysqli_free_result($res);
        mysqli_close($mysqli);   
      ?>
    </div>
    </body>
</html>