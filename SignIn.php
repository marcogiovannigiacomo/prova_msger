<?php
    include("database.php");
?>
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
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <input type="text" name="full_name" placeholder="Nome Completo" require/>
                <input type="email" name="email" placeholder="Email" require/>
                <input type="text" name="username" placeholder="Username" require/>
                <input type="password" name="password" placeholder="Password" require/>
                <input type="password" name="confirm_password" placeholder="Conferma Password" require/>
                <div class="actions">
                    Hai già un account? <a href="LogIn.php">Accedi</a>
                    <button type="submit">Registrati</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $full_name = filter_input(INPUT_POST, "full_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $confirm_password = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($full_name)){
            echo "Completa il campo nome";
        }
        else if(empty($email)){
            echo "Completa il campo email";
        }
        else
        if(empty($username)){
            echo "Completa il campo username";
        }
        else if(empty($password)){
            echo "Completa i campo password";
        }
        else if(empty($confirm_password)){
            echo "Conferma la password";
        }else if($password != $confirm_password){
            echo "Le password non corrispondono";
        }else{

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (Name, username, email, password)
                    VALUES
                    ('$full_name','$username', '$email', '$hash')";
            
            header("Location: LogIn.php");

            try {
                mysqli_query($conn, $sql);
            } catch (mysqli_sql_exception) {
                echo "non è stato possibile registrare l'utente";
            }
        }
    

    }

    mysqli_close($conn);
?>