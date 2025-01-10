<?php
include("database.php");
$classebottone = "singlechat-container";

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
        echo "<form method='post' action='chat.php'>";
        echo '<button type="submit" class= "' . $classebottone . '">' . $row["chat_name"] . '" ';
        $sql2 = "SELECT 
                        u.id AS user_id,
                        u.name AS user_name,
                        u.email AS user_email,
                        p.is_active AS partecipant_status
                    FROM 
                        partecipants p
                    INNER JOIN 
                        users u 
                    ON 
                        p.user_id = u.id
                    WHERE 
                        p.chat_id = '{$row['chat_id']}'";

        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                echo " - " . $row2["user_name"] . " ";
                
            }
            echo "</button> <br>";
            echo "</form>";
        }
    }
} else {
    echo "No chats available";
}
