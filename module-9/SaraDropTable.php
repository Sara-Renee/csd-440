<!--Sara White - CSD440 - Module 8-->


DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drop Favorite Music Table</title>
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

    $conn->query("DROP TABLE IF EXISTS SaraFavMusic");

    echo "Table <strong>SaraFavMusic</strong> was successfully dropped.";

    $conn->close();

} catch (mysqli_sql_exception $e) {

    echo "An error occurred. Please see the error message below:<br>";
    echo $e->getMessage();
}

?>

</body>
</html>