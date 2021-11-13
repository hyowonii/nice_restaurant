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

    $sql="select * from review";
    $res = mysqli_query($mysqli, $sql);

    if(array_key_exists('all', $_POST)){
        while($newArray = mysqli_fetch_array($res)){
            echo "업소명: ".$newArray['restName']." / 별점: ".$newArray['star']." / 리뷰: ".$newArray['review']." / 나이대: ".$newArray['age']."<br/>";
        }
    }
    if(array_key_exists('gangnam', $_POST)){
        
    }

    ?>
</body>
</html>