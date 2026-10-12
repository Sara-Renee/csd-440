<!--Sara White - CSD440 - Module 8-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Populate Favorite Music Table</title>
</head>

<body>

<?php

$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

    $conn = new mysqli($servername, $username, $password, $dbname);

    echo "Connection was successful.<br>";

    // prepare INSERT statement
    $stmt = $conn->prepare("
        INSERT INTO SaraFavMusic
            (userName, musicActName, genre, favSong)
        VALUES (?, ?, ?, ?)
    ");

    // music records to add
    $music = [
        ["Sara", "Pixies", "Alternative/Indie Rock", "Caribou"],
        ["Sara", "Mitski", "Alternative/Indie Rock", "I Bet on Losing Dogs"],
        ["Sara", "Mark Mulcahy", "Alternative/Indie Rock", "Where's the Rabbit?"],
        ["Sara", "Magdalena Bay", "Indie Pop", "You Lose!"],
        ["Sara", "Renata Zeiguer", "Alternative/Indie Rock", "Sunset Boulevard"]
    ];

    foreach ($music as $record) {

        $stmt->bind_param( // binds variables (as paramaters) to prepared statement
            "ssss", // s=string
            $record[0],
            $record[1],
            $record[2],
            $record[3]
        );

        $stmt->execute();
    }

    echo "Favorite music records were added successfully.";

    $stmt->close();
    $conn->close();

} catch (mysqli_sql_exception $e) {

    echo "An error occurred. Please see the error message below:<br>";
    echo $e->getMessage();
}

?>

</body>
</html>