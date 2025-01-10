<?php
include("database.php");

$username = "porco";
$password = "dio";
$hash = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO users (user, password)
            VALUES
            ('$username', '$hash')";

try {
    mysqli_query($conn, $sql);
} catch (mysqli_sql_exception) {
    echo "non è stato possibile registrare l'utente";
}

mysqli_close($conn);
