<?php
    include "dbconnect.php";

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
    if(!$res===TRUE){
        echo "
            <script>
                alert('회원가입 에러 발생!');
                history.back(); 
            </script>
            ";
            exit();
    }
    mysqli_close($mysqli);

 
    // 데이터 저장이 완료된 후 index.php로 페이지 이동
    echo "
        <script>
            alert('회원가입이 완료되었습니다.');
            history.go(-2);
        </script>
    ";
?>
