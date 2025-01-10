<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="submit" name="login" value="Log In">
    </form>
</body>
</html>
<?php

//$_SERVER = mostra quasi tutte le informazioni relative al server

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "ciao";
    }
?>