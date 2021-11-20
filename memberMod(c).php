<?php
    include "dbconnect.php";
    $id= $_GET['id'];
 
    $pass= $_POST['pass'];
    $name= $_POST['name'];
    $birth= $_POST['date'];
    $gender= $_POST['gender'];

    $sql= "UPDATE member SET pass='$pass', name='$name', birth='$birth', gender='$gender' WHERE id='$id'";
    mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);
 
    echo "
    <script>
        alert('회원정보가 수정되었습니다.');
        history.go(-2);
    </script>
    ";

?>