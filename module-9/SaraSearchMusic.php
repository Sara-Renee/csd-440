<!--Sara White - CSD440 - Module 9-->

<?php

$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$selectedGenre = "";
$searchResults = null;
$errorMessage = "";

try {

    // connect to database
    $conn = new mysqli(
        $servername,
        $username,
        $password,
        $dbname
    );

    $conn->set_charset("utf8mb4");

    // get unique genres for the dropdown menu
    $genres = $conn->query("
        SELECT DISTINCT genre
        FROM SaraFavMusic
        ORDER BY genre
    ");

    // check whether the search form was submitted
    if (!empty($_GET["genre"])) {

        $selectedGenre = $_GET["genre"];

        // prepared statement protects user input
        $stmt = $conn->prepare("
            SELECT id,
                   userName,
                   musicActName,
                   genre,
                   favSong
            FROM SaraFavMusic
            WHERE genre = ?
            ORDER BY musicActName
        ");

        $stmt->bind_param("s", $selectedGenre);

        $stmt->execute();

        $searchResults = $stmt->get_result();
    }

} catch (mysqli_sql_exception $e) {

    $errorMessage = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search Favorite Music Records</title>

    <link rel="stylesheet" href="styles.css">
</head>

<body>

<header>
    <h1>Search the database by genre</h1>
</header>

<main>

    <section class="card">

        <h2>Choose a Genre</h2>

        <?php if (!empty($errorMessage)) { ?>

            <p class="error">
                <?php echo htmlspecialchars($errorMessage); ?>
            </p>

        <?php } ?>

        <form method="GET"
              action="SaraSearchMusic.php">

            <div class="form-group">

                <label for="genre">
                    Genre:
                </label>

                <select
                    id="genre"
                    name="genre"
                    required
                >

                    <option value="">
                        -- Select a Genre --
                    </option>

                    <?php
                    if (isset($genres)) {

                        while ($genreRow = $genres->fetch_assoc()) {

                            $genre = $genreRow["genre"];
                    ?>

                        <option
                            value="<?php echo htmlspecialchars($genre); ?>"
                            <?php
                            if ($selectedGenre === $genre) {
                                echo "selected";
                            }
                            ?>
                        >
                            <?php echo htmlspecialchars($genre); ?>
                        </option>

                    <?php
                        }
                    }
                    ?>

                </select>

            </div>

            <button type="submit">
                Search
            </button>

        </form>

    </section>


    <?php if ($searchResults !== null) { ?>

        <section class="card">

            <h2>
                Search Results:
                <?php echo htmlspecialchars($selectedGenre); ?>
            </h2>

            <?php if ($searchResults->num_rows > 0) { ?>

                <table>

                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Music Act</th>
                            <th>Genre</th>
                            <th>Favorite Song</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                    while ($row = $searchResults->fetch_assoc()) {
                    ?>

                        <tr>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $row["userName"]
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $row["musicActName"]
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $row["genre"]
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $row["favSong"] ?? ""
                                );
                                ?>
                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            <?php } else { ?>

                <p>
                    No records were found for this genre.
                </p>

            <?php } ?>

        </section>

    <?php } ?>


    <p class="back-link">
        <a href="SaraIndex.php">
            &larr; Return to Index
        </a>
    </p>

</main>

</body>
</html>

<?php

if (isset($stmt)) {
    $stmt->close();
}

if (isset($conn)) {
    $conn->close();
}

?>