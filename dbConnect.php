<?php
    define("hostName","localhost");
    define("userName","root");
    define("password","");
    define("database","crisis_connect");
    define("port","3306");

    $connect = mysqli_connect(hostName,userName,password,database,port);

    if(!$connect){
        echo "Connection Faild";
    }
?>