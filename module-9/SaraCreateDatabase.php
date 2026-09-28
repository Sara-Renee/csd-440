<!--Sara White - CSD440 - Module 8-->
<!--This file is optional to execute - I created this since I did not have a baseball_01 database. It is also linked to in the index.-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Database</title>
</head>

<body>

<?php

$servername = "localhost";
$username = "student1";
$password = "pass";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

    // Connect to MySQL without selecting a database
    $conn = new mysqli($servername, $username, $password);

    $conn->query("CREATE DATABASE IF NOT EXISTS baseball_01");

    echo "Database baseball_01 was created successfully.";

    $conn->close();

} catch (mysqli_sql_exception $e) {

    echo "An error occurred:<br>";
    echo $e->getMessage();

}

?>

</body>
</html>