<!--Sara White - CSD440 - Module 8-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Favorite Music Table</title>
</head>

<body>

<?php

$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

// request mySQLi errors as exceptions
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try { // try/catch clause to catch errors

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    echo "Connection was successful.<br>";

    // create table
    $conn->query("
        CREATE TABLE SaraFavMusic (
            id INT AUTO_INCREMENT PRIMARY KEY,
            userName VARCHAR(50) NOT NULL,
            musicActName VARCHAR(50) NOT NULL,
            genre VARCHAR(30) NOT NULL,
            favSong VARCHAR(50) NULL
        )
    ");

    echo "Table <strong>SaraFavMusic</strong> was created successfully.";

    // close connection
    $conn->close();

} catch (mysqli_sql_exception $e) {

    // cisplay specific error if one occurs
    echo "An error occurred. Please see the error message below:<br>";
    echo $e->getMessage();
}

?>

</body>
</html>