<?php
    // Connection to SQL Database
    @require_once __DIR__ . '/database.php';

    // SQL Query
    $sql = "SELECT * FROM `stanze`;";

    // Saving result returned from Query to DB
    $result = $conn->query($sql);

    // Empty array to populate with room info
    $rooms = [];

    // If result exists and has at least 1 row
    if ($result && $result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {

            // Populate array with DB info
            $rooms[] = $row;
        }
    } elseif ($result) {
        echo "0 Results!";
    } else {
        echo "Query Error!";
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
    <title>Hotel Rooms</title>
</head>
<body>
    
    <h1>Lista Stanze</h1>

    <ul>
        <?php foreach($rooms as $room) { ?>
            
            <li>
                <div>Room number: <?php echo $room['room_number']; ?></div>
                <div>Piano: <?php echo $room['floor']; ?></div>
                <div><a href="room_info.php?id=<?php echo $room['id']; ?>">Room details</a></div>
            </li>

        <?php } ?>
    </ul>

</body>
</html>