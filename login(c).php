<?php
    include "dbconnect.php";
   
        $id= $_REQUEST['id'];
        $pass= $_REQUEST['pass'];      
        $sql= "SELECT * FROM member WHERE id='$id' and pass='$pass'";
        $res= mysqli_query($mysqli,$sql);
        $number_of_rows= mysqli_num_rows($res);

        if(!$number_of_rows){
            echo "
            <script>
                alert('아이디 또는 비밀번호가 일치하지 않습니다.');
    
            </script>
            ";
            exit();
        }
        $row=mysqli_fetch_array($res, MYSQLI_ASSOC);    
        session_start();
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        echo "
            <script>
                alert('환영합니다!');
                history.go(-2);
            </script>
            ";
    
?> 
