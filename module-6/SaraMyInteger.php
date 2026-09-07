<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sara MyInteger</title>
</head>

<body>

<?php

/*
    Sara White
    CSD-440
    Assignment 6.2
*/

class SaraMyInteger {

    private $integer;

    // constructor initializes integer upon new creation of object
    function __construct($integer) {
        $this->integer = $integer;
    }

    // if integer is even(divisible by 2 with no remainders), return true 
    function isEven(int $integer) {
        return $integer % 2 == 0;
    }

    // if integer is odd (remainder present after division by 2), return true
    function isOdd(int $integer) {
        return $integer % 2 != 0;
    }

    // if integer is prime, returns true
    function isPrime() {
        // a prime number cannot be 1 or less than 1
        if ($this->integer <= 1) {
            return false;
        }

        
        // this loop checks if the integer is divisible by $i.
        // increases $i by one as long as
        // $i is less than or equal to the square root
        // of the integer
        for ($i = 2; $i <= sqrt($this->integer); $i++) {

            if ($this->integer % $i == 0) {
                return false;
            }
        }

        return true;
    }

    // getter
    function getInteger() {
        return $this->integer;
    }

    // setter
    function setInteger($integer) {
        $this->integer = $integer;
    }
}


// two instances
$numberOne = new SaraMyInteger(12);
$numberTwo = new SaraMyInteger(17);


// test for first instance
echo "<h3>First Integer</h3>";

echo "Integer: " . $numberOne->getInteger() . "<br>";

echo "Even: ";
echo $numberOne->isEven($numberOne->getInteger()) ? "Yes" : "No";
echo "<br>";

echo "Odd: ";
echo $numberOne->isOdd($numberOne->getInteger()) ? "Yes" : "No";
echo "<br>";

echo "Prime: ";
echo $numberOne->isPrime() ? "Yes" : "No";
echo "<br><br>";


// test for second instance
echo "<h3>Second Integer</h3>";

echo "Integer: " . $numberTwo->getInteger() . "<br>";

echo "Even: ";
echo $numberTwo->isEven($numberTwo->getInteger()) ? "Yes" : "No";
echo "<br>";

echo "Odd: ";
echo $numberTwo->isOdd($numberTwo->getInteger()) ? "Yes" : "No";
echo "<br>";

echo "Prime: ";
echo $numberTwo->isPrime() ? "Yes" : "No";
echo "<br><br>";



?>

</body>
</html>

<!--
References

GeeksforGeeks. (2025, May 15). PHP | Check if a number is prime. https://www.geeksforgeeks.org/php/php-check-number-prime/

W3 Schools. PHP OOP - Constructor Method. https://www.w3schools.com/php/php_oop_constructor.asp

--!>