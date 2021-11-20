<?php

    include "dbconnect.php";

    $id= $_GET['id'];
    
    $restName=$_POST['restName'];
    $guName=$_POST['guName'];
    $date=date("Y-m-d H:i:s");
    $dongName=$_POST['dongName'];
    $restType=$_POST['restType']; 
    $reviewDetail=$_POST['review'];
    $starPoint=($_POST['star']/2);

    $sql= "INSERT INTO review(id, restName, reviewDetail, starPoint, date, guName, dongName, restType) VALUES('$id','$restName', '$reviewDetail', '$starPoint', '$date', '$guName','$dongName','$restType')";   
    $res=mysqli_query($mysqli,$sql);
    if(!$res===TRUE){
        echo "
            <script>
                alert('리뷰 작성에 실패하였습니다.');
                history.back(); 
            </script>
            ";
            exit();
    }
    mysqli_close($mysqli);


    echo "
        <script>
            alert('리뷰가 작성되었습니다.');
            history.go(-1);
        </script>
    ";
    
?>