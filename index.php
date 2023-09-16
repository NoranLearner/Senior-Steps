<?php

// Assign by value and by reference

$x = 1;
$y = &$x;
$x = 2;
echo $x; // 2
echo '<br>';
echo $y; // 2
echo '<br>';

// single Line Comment

# single Line Comment

/*
    Multi Line Comment
	Line1
	Line2
*/   

/**
* Docblock
*
*/

// Constant

define('PORT', 3306);

echo PORT; // 3306

// Case insensitive is deprecated

/* define('name', 'samy', true);

echo NAME; */

echo '<br>';

// Constant is global

function constant_global(){
    echo PORT;
}

constant_global(); // 3306

echo '<br>';

// Variable is local

/* function variable_local(){
    echo $x; //Error
}

variable_local(); */

// Use global for variable

function variable_local(){
    global $x, $y;
    echo $x;
    echo '<br>';
    echo $y;
}

variable_local(); // 2 2

echo '<br>';

// Variable is local

$x = 'ahmed';
function test(){
$x = 'yussef';
echo $x . '<br>';
}
echo $x . '<br>'; // ahmed
test(); // yussef
echo $x . '<br>'; // ahmed

// Variable Variable

$x = 'name';
$$x = 'ahmed';
echo "my result is :: {$$x}" . '<br>'; // my result is :: ahmed
echo "my result is :: " . $$x . '<br>'; // my result is :: ahmed

// Datatype

// For String
$userName = 'ahmed';
var_dump($userName); // string(5) "ahmed" 
echo '<br>';
print_r($userName); // ahmed
echo '<br>';
echo gettype($userName); // string
echo '<br>';

// For Integer
$age = 20 ;
var_dump($age); // int(20) 
echo '<br>';
print_r($age); // 20
echo '<br>';
echo gettype($age); // integer
echo '<br>';

// For Double
$salary = 20.50 ;
var_dump($salary); // float(20.5) 
echo '<br>';
print_r($salary); // 20.5
echo '<br>';
echo gettype($salary); // double
echo '<br>';

// For Boolean
$internet_connected = true ;
$is_admin = false ;
var_dump($internet_connected, $is_admin); // bool(true) bool(false) 
echo '<br>';
print_r($internet_connected, $is_admin); // 1
echo '<br>';
echo gettype($internet_connected); // boolean
echo '<br>';
echo gettype($is_admin); // boolean
echo '<br>';

// Example (Falsy - Truthy)

$x = false; // False

if($x) {

    echo "yaaala";

}

$x = true; // True

if($x) {

    echo "yaaala" ."<br>"; // yaaala

}

$x = ''; // False

if($x) {

    echo "yaaala";

}

$x = ' '; // True

if($x) {

    echo "yaaala" ."<br>"; // yaaala

}

$x = null; // False

if($x) {

    echo "yaaala";

}

$x = 0; // False

if($x) {

    echo "yaaala";

}

?>