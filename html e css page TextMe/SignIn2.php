<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati</title>
    <link rel="stylesheet" href="signin.css">
</head>
<body>
    <div class="container">
        <div class="register-container">
            <h1 id="title">Registrati</h1>
            <form action="SignIn2.php" method="post">
                <input type="text" name="full_name" placeholder="Nome Completo" require/>
                <input type="date" name="date" placeholder="Data di nascita" require/>
                <input type="text" name="username" placeholder="Username" require/>
                <input type="password" name="password" placeholder="Password" require/>
                <input type="password" name="confirm_password" placeholder="Conferma Password" require/>
                <div class="actions">
                    Hai già un account? <a href="LogIn.html">Accedi</a>
                    <button type="submit">Registrati</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $date = $_POST["date"];

    if(isset($_POST["submint"])){
        $full_name = filter_input(INPUT_POST, "full_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST. "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $confirm_password = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);

        if($password == $confirm_password){
            echo "Le password coincidono";
        } else {
            echo "Le password non coincidono";
        }
    }


    echo "Nome Completo: {$full_name} <br>";
    echo "Username: {$username} <br>";
    echo "Password: {$password} <br>";
    echo "Conferma Password: {$confirm_password} <br>";  
?>