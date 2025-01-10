<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    echo "Username: {$username}<br>";
    echo "Password: {$password}<br>";
}


//TUTORIAL PHP 

//$_GET  = data in URL
//         NON SICURO
//         Bisogna usare htmlspecialchars per evitare attacchi XSS
//         Char limited
//         Bookmarkable
//         Cacheable
//         Usato per passare dati tra pagine

//$_POST = data in HTTP request body
//         SICURO
//         Puoi passare qualsiasi tipo di dato
//         Non bookmarkable
//         Non cacheable
//         Better for sensitive data (es. credenziali)

/*
$name = "Simone ";
$food = "Pizza";
$email = "suka@gmail.com";

$age = 18;
$users = 2;
$quantity = 3;

$gpa = 3.5; //grate point average
$price = 4.99;

echo " Hello {$name}!<br>";
echo "you like {$food}!<br>";
echo "your email is {$email}!<br>";

echo "you are {$age} years old!<br>";
echo "there are {$users} users online!<br>";

echo "your gpa is {$gpa}!<br>";
echo "your pizza is \${$price}!<br>";

$totale = null;

echo "you ordered {$quantity} x {$food}'s<br>";

$totale = $price * $quantity;

echo "your total is \${$totale}!<br>";

//per elevare a potenza si usa **
echo "2^3 = ".(2**3)."<br>";
//per ottenere il resto di una divisione si usa % (modulo)
//si usa per esempio per capire se un numero è pari o dispari
echo "5%2 = ".(5%2)."<br>";

//precedenze delle operazioni
//()
//**
// * / %
// + - 
*/
?>

