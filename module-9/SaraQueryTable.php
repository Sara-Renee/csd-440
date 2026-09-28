<!--Sara White - CSD440 - Module 8-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Favorite Music Records</title>

    <link rel="stylesheet" href="styles.css">
</head>



<body>

<h1>Favorite Music</h1>

<?php

$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

    $conn = new mysqli($servername, $username, $password, $dbname);

    echo "Connection was successful.<br><br>";

    $result = $conn->query("
        SELECT id, userName, musicActName, genre, favSong FROM SaraFavMusic");

    echo "<table border='1'>";
    echo "
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Music Act</th>
            <th>Genre</th>
            <th>Favorite Song</th>
        </tr>
    ";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["userName"] . "</td>";
        echo "<td>" . $row["musicActName"] . "</td>";
        echo "<td>" . $row["genre"] . "</td>";
        echo "<td>" . $row["favSong"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    $conn->close();

} catch (mysqli_sql_exception $e) {

    echo "An error occurred. Please see the error message below:<br>";
    echo $e->getMessage();
}

?>

</body>
</html>