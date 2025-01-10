<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: LogIn.php");
}

$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="HomePage.css">
    <link rel="stylesheet" href="logout_btn.css">
</head>

<body>
    <!-- <h1>HomePage</h1> -->
    <!-- <form action="<?php //htmlspecialchars($_SERVER["PHP_SELF"]) 
                        ?>" method="post"></form> -->
    <div class="container">

        <div class="leftside-container">
            <h1><?php echo "Welcome {$username} <br>" ?></h1>

            <div class="chat-container">
                <!-- <form action="getChat.php" method="get"> -->
                <!-- <button type="submit">Chat</button> -->
                <!-- </form> -->

                <?php include("getChat.php");  ?>

            </div>
        </div>

        <div class="rightside-container">

            <div class="top-rightside-container">
                fjfjff
            </div>

            <div class="bottom-rightside-container ">
                <div class="chat-box">
                    ddd
                </div>
                <div class="message-send-box">
                    <form action="sendMessage.php" method="post">
                        <input type="input" class="input-container" name="message" placeholder="Type your message here">
                        <button type="submit" class="send">S</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["username"])) {
        header("Location: LogIn.php");
    } else {
        $username = $_SESSION["username"];
    }

    $sql = "SELECT 
        c.id AS chat_id,
        c.name AS chat_name,
        c.type AS chat_type
    FROM 
        partecipants p
    INNER JOIN 
        chats c 
    ON 
        p.chat_id = c.id
    WHERE 
        p.user_id = '{$_SESSION['user_id']}' 
        AND p.is_active = TRUE
    ";


    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["chat_id"] . "</td>";
            echo "<tr>";
        }
    } else {
        echo "No chats available";
    }
}
?>