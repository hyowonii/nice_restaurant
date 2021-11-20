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
        //$restName=$_REQUEST['restName'];
        $restName="독도참치";
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
        
        $sql=$sql="SELECT * FROM review WHERE restName='$restName'";
        $res=mysqli_query($mysqli,$sql);
        $newArray=mysqli_fetch_array($res,MYSQLI_ASSOC);
        $reviewDetail=$newArray['reviewDetail'];
        $starPoint=$newArray['starPoint'];
        $date=$newArray['date'];
        $number_of_rows= mysqli_num_rows($res);
     
        $starSum=0;
        $sql=$sql="SELECT * FROM review WHERE restName='$restName'";
        $res=mysqli_query($mysqli,$sql);
        if($res){
          while($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC)){
            $starSum+=$newArray['starPoint'];
          }
        }
        $star=number_format(($starSum/$number_of_rows), 1);  
    ?>
    <script>
        function submitForm(){
          
          var guName;
          var restType;
          if(<?=$guCode?>=="3220000"){
           guName="강남구";
          }if(<?=$guCode?>=="3130000"){
           guName="마포구";
          }if(<?=$guCode?>=="3020000"){
           guName="용산구";
          }if(<?=$guCode?>=="3000000"){
           guName="종로구";
          }else{
            guName="송파구";
          }
  
          if(<?=$type?>=="한식"){
            restType="한식";
          }if(<?=$type?>=="중국식"){
            restType="중국식";
          }if(<?=$type?>=="일식"){
            restType="일식";
          }if(<?=$type?>=="경양식"){
            restType="경양식";
          }else{
            restType="기타";
          }
          
          $('input[name=restName]').attr('value',<?=$restName?>);
          $('input[name=guName]').attr('value',guName);
          $('input[name=restName]').attr('value',<?=$dong?>);
          $('input[name=restType]').attr('value',restType);
      
          document.reviewForm.submit();
        }
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
              <input type="hidden" name="restName" id="restName" value = "독도참치">
              <input type="hidden" name="guName" id="guName" value="용산구">
              <input type="hidden" name="dongName" id="dongName" value="한남동">
              <input type="hidden" name="restType" id="restType" value="한식">
            </div>
            <div class="submit">
              <input type="submit" value="작성하기" onclick="submitForm()" >
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