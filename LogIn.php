<?php
    include("database.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accedi</title>
    <link rel="stylesheet" href="login.css" />
</head>

<body>
    <div class="container">
        <div class="login-container">
            <h1 id="title">Accedi</h1>
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <div class="actions">
                    Non hai un account? <a href="SignIn.php">Registrati</a>
                    <button type="submit">Accedi</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($username)){
            echo "Completa il campo username";
        }
        else if(empty($password)){
            echo "Completa il campo password";
        }else{
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);

            if(mysqli_num_rows($result) > 0){
                if(password_verify($password, $row["password"])){
                    $_SESSION["username"] = $username;
                    $_SESSION["user_id"] = $row["id"];
                    header("Location: HomePage.php");
                }else{
                    echo "Password errata";
                }
            }else{
                echo "Username non trovato";
            }
        }
    }

?>