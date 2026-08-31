

<!DOCTYPE html>

<!--
Sara White
CSD440
Assignment 4.2
-->

<html>

<head>
    <meta charset="UTF-8">
    <title>Assignment 4.2</title>
</head>
<body>

<?php

$string = "civic, level, radar, civil, bevel, laser";

$stringArray = explode(", ", $string);

foreach ($stringArray as $individualString) {

    $reversedString = strrev($individualString);
    
    if ($individualString == $reversedString) { 
        print(
        "String: " . $individualString .
        "<br>Reversed string: " . $reversedString . 
        "<br>" . ucfirst($individualString) . " is a palindrome. <br><br>");
    }
    else {
        print(
        "String: " . $individualString .
        "<br>Reversed string: " . $reversedString . 
        "<br>" . ucfirst($individualString) . " is not a palindrome. <br><br>");
    }

}

?>  

</body>


<!--
References

W3Schools. (n.d.). PHP Tutorial. https://www.w3schools.com/php/default.asp
-->