<?php
    include "dbconnect.php";
   
        $id= $_POST['id'];
        $pass= $_POST['pass'];      
        $sql= "SELECT * FROM member WHERE id='$id' and pass='$pass'";
        $res= mysqli_query($mysqli,$sql);
        $number_of_rows= mysqli_num_rows($res);
        //id pass로 접근했을 때 한 행도 존재하지 않으면 아이디 혹은 비밀번호 오류
        if(!$number_of_rows){
            echo "
            <script>
                alert('아이디 또는 비밀번호가 일치하지 않습니다.');
            </script>
            ";
            exit();
        }
        //로그인 성공시 id와 name을 session에 저장함
        $log=mysqli_fetch_array($res, MYSQLI_ASSOC);    
        session_start();
        $_SESSION['id']=$log['id'];
        $_SESSION['name']=$log['name'];

        echo "
            <script>
                alert('환영합니다!');
                history.go(-2);
            </script>
            ";
    
?> 
