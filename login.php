<?php
    $mysqli=mysqli_connect("localhost","team08","team08","team08");
    if(mysqli_connect_errno())
        printf("Connect failed: %s\n",mysqli_connect_errno());
        exit();
    }
    else{
        $id= $_POST['id'];
        $pass= $_POST['pass'];      
        $sql= "SELECT * FROM member WHERE id='$id' and pass='$pass'";
        $result= mysqli_query($mysqli,$sql);
        $rowNum= mysqli_num_rows($result);

        if(!$rowNum){
            echo "
            <script>
                alert('아이디 또는 비밀번호를 확인하세요.');
                history.back();
            </script>
            ";
            exit();
        }
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);    
        session_start();
        $_SESSION['id']=$row['id'];
        $_SESSION['username']=$row['name'];
        echo "
            <script>
                alert('환영합니다!');
                history.go(-2);
            </script>
            ";
    } 
?> 
