<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <?php include "header.php"?>
    <script>
    
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
    function submitForm(obj){
        var oForm = document.getElementById("subForm");
        if(!obj.value=="등록일"||!obj.value=="별점"||!obj.value=="지역"||!obj.value=="업태"){
            oForm.submit();
        }
    }
    </script>
</head>
<body>
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
    
</body>
</html>