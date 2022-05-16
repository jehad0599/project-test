<?php

    $call = mysqli_connect('localhost','root','','test2');
    $lang = array(
        PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES UTF8",
    );

    if( ! $call){
        die("Error : " . mysqli_connect_error());
    }else{
        echo "true";
    }

    mysqli_close($call);

    ?>