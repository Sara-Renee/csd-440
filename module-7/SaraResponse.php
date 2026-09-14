<!-- Sara White - CSD440 - Assignment 7.2 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Your Super Hero</title>

    <link rel="stylesheet" href="SaraForm.css">
</head>

<body>

<main class="form-container">

<?php

// initialize variables
$primaryAbility = "";
$secondaryAbility = "";
$originStory = "";
$characterFlaws = [];
$heroAdjective = "";
$heroNoun = "";
$primaryColor = "";
$secondaryColor = "";

// array to store validation errors
$errors = [];


// only process the form if it was submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // validate primary ability

    if (!empty($_POST["primaryAbility"])) {

        $primaryAbility = clean_input($_POST["primaryAbility"]);

    } else {

        $errors[] = "Please select a primary ability.";

    }


    // validate secondary ability

    if (!empty($_POST["secondaryAbility"])) {

        $secondaryAbility = clean_input($_POST["secondaryAbility"]);

    } else {

        $errors[] = "Please select a secondary ability.";

    }


    // validate origin story radio buttons

    if (!empty($_POST["originStory"])) {

        $originStory = clean_input($_POST["originStory"]);

    } else {

        $errors[] = "Please select an origin story.";

    }


    // validate character flaw checkboxes
    if (!empty($_POST["characterFlaws"])) {

        // character flaws are submitted as an array because
        // more than one checkbox can be selected
        foreach ($_POST["characterFlaws"] as $flaw) {

            $characterFlaws[] = clean_input($flaw);

        }

    } else {

        $errors[] = "Please select at least one character flaw.";

    }


    // validate superhero adjective

    if (!empty($_POST["heroAdjective"])) {

        $heroAdjective = clean_input($_POST["heroAdjective"]);

        // Allow letters, spaces, apostrophes, and hyphens
        if (!preg_match("/^[a-zA-Z '-]+$/", $heroAdjective)) {

            $errors[] = "The superhero adjective contains invalid characters.";

        }

    } else {

        $errors[] = "Please enter an adjective for your superhero name.";

    }

    // validate superhero noun

    if (!empty($_POST["heroNoun"])) {

        $heroNoun = clean_input($_POST["heroNoun"]);
        if (!preg_match("/^[a-zA-Z '-]+$/", $heroNoun)) {

            $errors[] = "The superhero noun contains invalid characters.";

        }

    } else {

        $errors[] = "Please enter a noun for your superhero name.";

    }

    // validate primary outfit color

    if (!empty($_POST["primaryColor"])) {

        $primaryColor = clean_input($_POST["primaryColor"]);

        // color inputs should return a six-digit hexadecimal color
        if (!preg_match("/^#[0-9A-Fa-f]{6}$/", $primaryColor)) {

            $errors[] = "The primary outfit color is invalid.";

        }

    } else {

        $errors[] = "Please select a primary outfit color.";

    }

    // validate secondary outfit color

    if (!empty($_POST["secondaryColor"])) {

        $secondaryColor = clean_input($_POST["secondaryColor"]);

        if (!preg_match("/^#[0-9A-Fa-f]{6}$/", $secondaryColor)) {

            $errors[] = "The secondary outfit color is invalid.";

        }

    } else {

        $errors[] = "Please select a secondary outfit color.";

    }

    // display results if no errors exist

    if (empty($errors)) {

        echo "<h1>Your Super Hero</h1>";

        echo "<h2>";
        echo htmlspecialchars($heroAdjective) . " ";
        echo htmlspecialchars($heroNoun);
        echo "</h2>";

        echo "<p><strong>Primary Ability:</strong> "
            . htmlspecialchars($primaryAbility)
            . "</p>";

        echo "<p><strong>Secondary Ability:</strong> "
            . htmlspecialchars($secondaryAbility)
            . "</p>";

        echo "<p><strong>Origin Story:</strong> "
            . htmlspecialchars($originStory)
            . "</p>";


        echo "<p><strong>Character Flaws:</strong></p>";

        echo "<ul>";

        foreach ($characterFlaws as $flaw) {

            echo "<li>" . htmlspecialchars($flaw) . "</li>";

        }

        echo "</ul>";


        echo "<p><strong>Primary Outfit Color:</strong> "
            . htmlspecialchars($primaryColor)
            . "</p>";

        echo "<div style='
            width: 100px;
            height: 40px;
            background-color: $primaryColor;
            border: 1px solid #000;
            margin-bottom: 15px;
        '></div>";


        echo "<p><strong>Secondary Outfit Color:</strong> "
            . htmlspecialchars($secondaryColor)
            . "</p>";

        echo "<div style='
            width: 100px;
            height: 40px;
            background-color: $secondaryColor;
            border: 1px solid #000;
            margin-bottom: 15px;
        '></div>";


    } else {

        // display validation errors

        echo "<h1>Unable to Create Super Hero</h1>";

        echo "<p>Please correct the following errors:</p>";

        echo "<ul>";

        foreach ($errors as $error) {

            echo "<li>" . htmlspecialchars($error) . "</li>";

        }

        echo "</ul>";

        echo "<p><a href='SaraForm.html'>Return to the form</a></p>";

    }

}


// removes unnecessary whitespace from text input
function clean_input($data) {

    return trim($data);

}

?>

</main>

</body>
</html>

<!--
References
W3 Schools. (n.d.). HTML Color Picker. https://www.w3schools.com/colors/colors_picker.asp

W3 Schools. (n.d.). PHP Form Validation. https://www.w3schools.com/php/php_form_complete.asp

-->