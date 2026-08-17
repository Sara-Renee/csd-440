<!-- Sara White - CSD440 - Assignment 1.3 -->


<!DOCTYPE html>
<html lang="en">
<head>
    <title>...</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>PHP Test Program</h1>
    <?php
        $name = "Sara";
        echo("<p> This is $name's first PHP program.</p>");
    ?>
    <h2>Examples of variable output using var_dump</h2>
    <?php
        $x = true;
        $y = false;
        $name = "Sara";
        $integer = 547;

        var_dump($x);
        echo "<br>";
        var_dump($y);
        echo "<br>";
        var_dump($name);
        echo "<br>";
        var_dump($integer);
        
    ?>
</body>
</html>


<!--
References

W3 Schools. (n.d.). PHP Examples. https://www.w3schools.com/php/php_examples.asp

-->