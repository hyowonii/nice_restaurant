<?php

    include "dbconnect.php";

<<<<<<< HEAD
    mysqli_autocommit($mysqli,FALSE);

    $stmt=mysqli_prepare($mysqli,"INSERT INTO review(id, restName, reviewDetail, starPoint, date, guName, dongName, restType) VALUES(?,?,?,?,?,?,?,?)");
   
    mysqli_stmt_bind_param($stmt,'sssdssss',$id,$restName, $reviewDetail, $starPoint, $date, $guName,$dongName,$restType);   
    
=======
>>>>>>> f33f2c6183071a4270b0efb3aeed53dd0f610e50
    $id= $_GET['id'];
   
    $restName=$_POST['restName'];
    $guCode=$_POST['guCode'];
    $date=date("Y-m-d H:i:s");
    $dongName=$_POST['dongName'];
    $type=$_POST['restType']; 
    $reviewDetail=$_POST['review'];
    $starPoint=($_POST['star']/2);
    if($guCode=="3220000"){
        $guName="강남구";
       }else if($guCode=="3130000"){
        $guName="마포구";
       }else if($guCode=="3020000"){
        $guName="용산구";
       }else if($guCode=="3000000"){
        $guName="종로구";
       }else{
        $guName="송파구";
       }
<<<<<<< HEAD
=======

       if($type=="한식"){
         $restType="한식";
       }else if($type=="중국식"){
         $restType="중국식";
       }else if($type=="일식"){
         $restType="일식";
       }else if($type=="경양식"){
         $restType="경양식";
       }else{
         $restType="기타";
       }
>>>>>>> f33f2c6183071a4270b0efb3aeed53dd0f610e50

       if($type=="한식"){
         $restType="한식";
       }else if($type=="중국식"){
         $restType="중국식";
       }else if($type=="일식"){
         $restType="일식";
       }else if($type=="경양식"){
         $restType="경양식";
       }else{
         $restType="기타";
       }
    mysqli_stmt_execute($stmt);
    if(!mysqli_commit($mysqli)){
        echo "
            <script>
                alert('리뷰 작성에 실패하였습니다.'); 
            </script>
            ";
            exit();
    }
    mysqli_rollback($mysqli);   

    mysqli_stmt_close($stmt);
  
    mysqli_close($mysqli);

    echo "
        <script>
            alert('리뷰가 작성되었습니다.');
            history.go(-1);
        </script>
    ";
    
?>