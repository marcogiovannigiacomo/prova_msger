<?php

//hashing = criptare una password
//          serve per proteggere la password
//          da attacchi di hacker che possono rubare la password
//          e usarla per accedere al nostro account
//          password_hash() = funzione che cripta la password
//          password_verify() = funzione che verifica se la password è corretta

$password = "password";

$hash = password_hash($password, PASSWORD_DEFAULT);

if(password_verify("password", $hash)){
    echo "Password is correct";
}else{
    echo "Password is incorrect";
}
?>