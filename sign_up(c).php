<?php
    include "dbconnect.php";
    mysqli_autocommit($mysqli,FALSE);

    $id= $_POST['id'];
    $pass= $_POST['pass'];
    $name= $_POST['name'];
    $birth= $_POST['date'];
    $gender= $_POST['gender'];

    $sql= "SELECT * FROM member WHERE id='$id'";
    $res=mysqli_query($mysqli, $sql);
    $number_of_rows= mysqli_num_rows($res); 
    if($number_of_rows){
        echo("
            <script>
                alert('중복아이디가 존재합니다.');
                history.back(); 
            </script>
        ");
        exit();
    }
    $sql= "INSERT INTO member(id, pass, name, birth, gender) VALUES('$id','$pass','$name','$birth','$gender')";
    $res=mysqli_query($mysqli,$sql);
    
    if(!mysqli_commit($mysqli)){
        echo "
            <script>
                alert('회원가입에 실패하였습니다.'); 
            </script>
            ";
            exit();
    }
    mysqli_rollback($mysqli);   
  
    mysqli_close($mysqli);
   
    echo "
        <script>
            alert('회원가입이 완료되었습니다.');
            history.go(-2);
        </script>
    ";
?>