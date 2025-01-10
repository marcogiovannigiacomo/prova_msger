<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";

    $db_business = "textme";
    $conn = "";


    try{
        //vuole 4 argomenti che sono il server, l'utente, la password e il nome del database
        $conn = mysqli_connect($db_server, $db_user, $db_password, $db_business);
    }catch(mysqli_sql_exception ){
        echo "Connection failed";
    }
?>