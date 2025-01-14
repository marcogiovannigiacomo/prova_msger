<?php
include("database.php");

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: LogIn.php");
} else {
    $username = $_SESSION["username"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $buttonName = 'chat-button';
    $buttonValue = $_POST[$buttonName];

    $sql2 = "SELECT
        u.username, m.content, m.created_at
        FROM users u inner join messages m ON u.id = m.user_id
        WHERE m.chat_id = '{$buttonValue}'
        ORDER BY created_at DESC";



    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='message-container'>";
            echo "<div class='message-username'>" . $row["username"] . ":  ".  $row["content"] ."</div>";
            echo "<div class='message-time'>" . $row["created_at"] . "</div>";
            echo "</div>";
        }
    } else {
        echo "No messages";
    }
}
