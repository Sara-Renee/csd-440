<!--Sara White - CSD440 - Module 9-->

<?php

$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$message = "";
$errorMessage = "";

$userName = "";
$musicActName = "";
$genre = "";
$favSong = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $userName = trim($_POST["userName"] ?? "");
    $musicActName = trim($_POST["musicActName"] ?? "");
    $genre = trim($_POST["genre"] ?? "");
    $favSong = trim($_POST["favSong"] ?? "");

    if (
        empty($userName) ||
        empty($musicActName) ||
        empty($genre)
    ) {

        $errorMessage =
            "Please fill out required fields.";

    } else {

        try {

            $conn = new mysqli(
                $servername,
                $username,
                $password,
                $dbname
            );

            $conn->set_charset("utf8mb4");

            $stmt = $conn->prepare("
                INSERT INTO SaraFavMusic
                    (
                        userName,
                        musicActName,
                        genre,
                        favSong
                    )
                VALUES (?, ?, ?, ?)
            ");

            $stmt->bind_param(
                "ssss",
                $userName,
                $musicActName,
                $genre,
                $favSong
            );

            $stmt->execute();

            $message =
                "Your record was added successfully!";

            // clear form after successful insert
            $userName = "";
            $musicActName = "";
            $genre = "";
            $favSong = "";

            $stmt->close();
            $conn->close();

        } catch (mysqli_sql_exception $e) {

            $errorMessage =
                "An error occurred: " .
                $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Favorite Music</title>

    <link rel="stylesheet"
          href="styles.css">
</head>

<body>

<header>
    <h1>Add Favorite Music Record</h1>

    <p>
        Add your own favorite music!
    </p>
</header>

<main>

    <section class="card">

        <h2>Music Info</h2>


        <?php if (!empty($message)) { ?>

            <p class="success">
                <?php echo htmlspecialchars($message); ?>
            </p>

        <?php } ?>


        <?php if (!empty($errorMessage)) { ?>

            <p class="error">
                <?php echo htmlspecialchars($errorMessage); ?>
            </p>

        <?php } ?>


        <form
            method="POST"
            action="SaraAddMusic.php"
        >

            <div class="form-group">

                <label for="userName">
                    Your Name:
                </label>

                <input
                    type="text"
                    id="userName"
                    name="userName"
                    maxlength="50"
                    value="<?php
                        echo htmlspecialchars($userName);
                    ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label for="musicActName">
                    Music Act:
                </label>

                <input
                    type="text"
                    id="musicActName"
                    name="musicActName"
                    maxlength="50"
                    value="<?php
                        echo htmlspecialchars($musicActName);
                    ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label for="genre">
                    Genre:
                </label>

                <input
                    type="text"
                    id="genre"
                    name="genre"
                    maxlength="30"
                    value="<?php
                        echo htmlspecialchars($genre);
                    ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label for="favSong">
                    Favorite Song:
                </label>

                <input
                    type="text"
                    id="favSong"
                    name="favSong"
                    maxlength="50"
                    value="<?php
                        echo htmlspecialchars($favSong);
                    ?>"
                >

            </div>


            <button type="submit">
                Add Record
            </button>

        </form>

    </section>


    <p class="back-link">

        <a href="SaraIndex.php">
            &larr; Return to Index
        </a>

    </p>

</main>

</body>
</html>