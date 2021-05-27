<?php
    // Connection to SQL Database
    @require_once __DIR__ . '/databse.php';

    // Get room_id value from query strig
    $room_id = $_GET['id'];

    // SQL Query
    $sql = "SELECT * FROM `stanze` WHERE `id` = " . $room_id . ";";
    $result = $conn->query($sql);

    // Empty array to populate with room info
    $room = [];

    // If result exists and has at least 1 row
    if ($result && $result->num_rows > 0) {
        $room = $result->fetch_assoc();
    } elseif ($result) {
        echo "0 Results!";
    } else {
        echo "Query Error!"
    }

    // Close connection after use
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Info</title>
</head>
<body>
    
    <?php if(!empty($room)) { ?>
        <a href="index.php">Go back to Hotel Rooms</a>
        <h1>Room n°<?php echo $room['room_number'] ?> details:</h1>

        <ul>
            <li>Number of beds: <?php echo $room['beds']; ?></li>
            <li>Floor: <?php echo $room['floor']; ?></li>
        </ul>
    <?php } else { ?>
        <h2>Room not found!</h2>
    <?php } ?>

</body>
</html>