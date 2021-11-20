<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <title>My Page</title>
    <style>
        .main_content{
            float: left;
            width: 80%;
        }
        h1 a[href]{
            color: orange;
            text-decoration-line: none;
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

        #menu{
            float: right;
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
    <?php include "header.php"?>
    <script>
    //상위 카테고리 선택시 하위 카테고리 변경
    function categoryChange(obj) {
        var sub_region = ["지역","강남구", "용산구", "마포구", "송파구","종로구"];
        var sub_business = ["업태","한식", "중국식", "경양식","일식","기타"];
        var sub_date=["등록일","최신순","오래된순"];
        var sub_star=["별점","별점높은순","별점낮은순"];
        var target = document.getElementById("subSelect");
 
        if(obj.value == "region") var d = sub_region;
        else if(obj.value == "business") var d = sub_business;
        else if(obj.value == "date") var d=sub_date;
        else var d=sub_star;
        target.options.length = 0;
 
        for (x in d) {
            var opt = document.createElement("option");
            opt.value = d[x];
            opt.innerHTML = d[x];
            target.appendChild(opt);
        } 
    }

    </script>
</head>
<body>
<div class="main_content">
<h1><a href="main.php"><i class="fas fa-utensils"></i> 모음</a></h1>
    <?php if(!$id){  ?>
        <script> 
            alert("로그인하세요.");
            location.href='login.html';
        </script>
    <?php } ?>
    <div>
        <h1>My Review</h1>
        <h4>내가 작성한 리뷰</h4> 
    </div>
    <div>
    <form name="subForm" action="mypage(c).php?id=<?=$id?>" method="POST">
        <select name="main" onchange="categoryChange(this)">
            <option>Choose the category</option>
            <option value="date">date</option>
            <option value="region">region</option>
            <option value="business">business</option>
            <option value="star">starpoint</option>
        </select>
        <select id="subSelect" name="sub" onchange="this.form.submit()"></select>
    </form>
    </div>
    </div>
    <div id="line"></div>

    <form id='menu'>
        <div class="mymenu">
            <input type="button" value="마이페이지" onclick="location.href='mypage.php'">
            <input type="button" value="리뷰" onclick="location.href='review2.php'">
            <input type="button" value="착한가격식당" onclick="location.href='kind_price2.php'">
            <input type="button" value="순위" onclick="location.href='ranking.php'">
        </div>
    </form>
    
</body>
</html>