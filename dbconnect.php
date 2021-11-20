<?php
    $mysqli=mysqli_connect("localhost","team08","team08","team08");
    if(mysqli_connect_errno()){
        printf("Connect failed: %s\n",mysqli_connect_errno());
        exit();
    }
?>