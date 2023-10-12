<?php

// https://www.geeksforgeeks.org/php-factorial-number/

// PHP code to get the factorial of a number 
// function to get factorial in iterative way 

declare(strict_types=1);
function Factorial(int $number)
{

    $factorial = 1;

    for ($i = 1; $i <= $number; $i++) {
        $factorial = $factorial * $i;
    }

    return $factorial;

}

// Driver Code 
$number = 10;

if ($number>0) {
    
    $fact = Factorial($number);

    echo "Factorial = $fact";

} else {
    
    echo 'Number must be a non-negative integer';

}


?>