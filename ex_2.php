<?php 

$max_int = PHP_INT_MAX;

echo $max_int; // 9223372036854775807

echo '<br/>';

$arr = [];

$arr[1] = 'last name'; 

$arr[ $max_int ] = 'this is max of array '; 

$arr[0] = 'first name'; 

$arr[]  = 'this may be at the last of array'; // Warning - the following index is 1 and its value is found

echo '<pre>';
print_r($arr);
echo '</pre>';


?>