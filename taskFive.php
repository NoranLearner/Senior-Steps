<?php

// Function to generate password from given string 
function get_password($str, $len = 0)
{

    // Variable $pass to store password 
    $pass = "";

    // Variable $str_length to store length of the given string 
    $str_length = strlen($str);

    // Iterate $len times so that the resulting string's length is equal to $len 
    for ($i = 0; $i < $len; $i++) {

        // Concatenate random character from $str with $pass 
        $pass .= $str[rand(0, $str_length)];
    }
    return $pass;
}

// Print password of length 5 from the given string 

$str = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

echo get_password($str, 5);

?>