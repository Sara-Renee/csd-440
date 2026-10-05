<!--Sara White - CSD440 - Assignment 10.2-->

<?php
// create a class to contain properties for data gathered from the HTML page
class AboutMe {
    public string $firstName;
    public string $lastInitial;
    public string $favSubject;
    public string $favFood;
    public array $pastime;
    public string $movie;
    public string $album;
    
    // constructor method to store values in appropriate properties
    public function __construct($firstName, $lastInitial, $favSubject, $favFood, $pastime1, $pastime2, $movie, $album) {
        $this->firstName = $firstName;
        $this->lastInitial = $lastInitial;
        $this->favSubject = $favSubject;
        $this->favFood = $favFood;
        $this->pastime = [$pastime1, $pastime2];
        $this->movie = $movie;
        $this->album= $album;

    }
}

// initialize $jsonData
$jsonData = "";


// POST handling/error
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        !empty($_POST["firstName"]) &&
        !empty($_POST["lastInitial"]) &&
        !empty($_POST["favSubject"]) &&
        !empty($_POST["favFood"]) &&
        !empty($_POST["pastime1"]) &&
        !empty($_POST["pastime2"]) &&
        !empty($_POST["movie"]) &&
        !empty($_POST["album"])
    ) {

        $profile = new AboutMe(
            $_POST["firstName"],
            $_POST["lastInitial"],
            $_POST["favSubject"],
            $_POST["favFood"],
            $_POST["pastime1"],
            $_POST["pastime2"],
            $_POST["movie"],
            $_POST["album"]
        );

        // $jsonData variable assigned json_encode function 
        // and $profile object is passed into json_encode
        // JSON_PRETTY_PRINT formats the JSON for easier reading
        $jsonData = json_encode($profile, JSON_PRETTY_PRINT);

        if ($jsonData === false) {
            die("An error occurred while converting the profile to JSON.");
        }
    
    } else {
        die("An error has occurred. Please complete all required fields.");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About Me JSON Results</title>
    <link rel="stylesheet" href="SaraStyles.css">
</head>

<body>

    <header>
        <h1>About Me Profile</h1>
    </header>

    <main>
        <div class="card">
            <h2>JSON Results</h2>

            <pre>

                <?php 
                // display $jsonData
                echo htmlspecialchars($jsonData); 
                ?>
            </pre>

            <a href="SaraForm.html" class="back-button">Back to About Me Form</a>

        </div>
    </main>

</body>
</html>