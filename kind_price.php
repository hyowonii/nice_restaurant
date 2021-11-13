<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $mysqli = mysql_connect("localhost", "team08", "team08", "team08");

    $sql="select * from kind_price";
    $res = mysqli_query($mysqli, $sql);

    if(array_key_exists('all', $_POST)){
        while($newArray = mysqli_fetch_array($res)){
            echo "업소명: ".$newArray['restName']." / 업태명: ".$newArray['restType']." / 상세주소: ".$newArray['restAddr']." / 전화번호: ".$newArray['call']." / 자랑거리: ".$newArray['comment']."<br/>";
        }
    }
    $btn = array_key_exists('choose', $_POST)
    if($btn){
        echo"
        <script language='javascript'>
        createList($btn);
        </script>
        "
    }

    
    
    ?>
    
</body>
</html>