<?php 

$array_one = ['A', 'B', 'C', 'D'];

$array_two = ['E', 'F', 'G'];

//*** Count - result the number of elements in each array ***/

echo count($array_one); // 4

echo '<br/>';

echo count($array_two); // 3

echo '<br/>';

//*** in_array - The Element Is In Array Or Not ***/

echo in_array('A', $array_one, true); // 1

echo '<br/>';

if (in_array('E',$array_two,true)) {
    echo 'The Element Is Found'; // The Element Is Found
} 

echo '<br/>';

//*** array_key_exists ***/

if (array_key_exists('0', $array_one)) {
    echo 'The Element is found and its value is ' . $array_one[0]; // The Element is found and its value is A
}

//*** array_keys ***/

echo '<pre>';
print_r(array_keys($array_one));
echo '</pre>';

/* 

Array
(
    [0] => 0
    [1] => 1
    [2] => 2
    [3] => 3
)

*/

//*** array_values ***/

echo '<pre>';
print_r(array_values($array_one));
echo '</pre>';

/* 

Array
(
    [0] => A
    [1] => B
    [2] => C
    [3] => D
)

*/

//*** array_sum - add integer values and ignore string values ***/

echo array_sum($array_one); // 0

echo '<br/>'; 

//*** end - get the last element ***/

echo end($array_one); // D

echo '<br/>';

//*** array_rand ***/

echo '<pre>';
print_r(array_rand($array_one, 3));
echo '</pre>';

/* 

Array
(
    [0] => 0
    [1] => 2
    [2] => 3
)

*/

echo $array_two[array_rand($array_two)]; // F

echo '<br/>';

//*** array_merge ***/

echo '<pre>';
print_r(array_merge($array_one, $array_two));
echo '</pre>';

/* 

Array
(
    [0] => A
    [1] => B
    [2] => C
    [3] => D
    [4] => E
    [5] => F
    [6] => G
)

*/

//*** array_replace - Replace the first three elements in the first array with the elements in the second array ***/

echo '<pre>';
print_r(array_replace($array_one, $array_two));
echo '</pre>';

/* 

Array
(
    [0] => E
    [1] => F
    [2] => G
    [3] => D
)

*/

//*** array_slice - start from index 1 and get two elements ***/

echo '<pre>';
print_r(array_slice($array_one, 1,2));
echo '</pre>';

/* 

Array
(
    [0] => B
    [1] => C
)

*/

//*** array_splice ***/

echo '<pre>';
print_r(array_splice($array_two, 0, -1));
echo '</pre>';

/* 

Array
(
    [0] => E
    [1] => F
)

*/

//*** array_shift ***/

$first = array_shift($array_one);

echo $first;

echo '<pre>';
print_r($array_one);
echo '</pre>';

/* 

A

Array
(
    [0] => B
    [1] => C
    [2] => D
)


*/

//*** array_unshift ***/

array_unshift($array_one, 'one', 'two');

echo '<pre>';
print_r($array_one);
echo '</pre>';

/* 

Array
(
    [0] => one
    [1] => two
    [2] => A
    [3] => B
    [4] => C
    [5] => D
)

*/

//*** array_push ***/

array_push($array_one, 'one', 'two');

echo '<pre>';
print_r($array_one);
echo '</pre>';

/* 

Array
(
    [0] => A
    [1] => B
    [2] => C
    [3] => D
    [4] => one
    [5] => two
)

*/

//*** array_pop ***/

$last = array_pop($array_one);

echo $last;

echo '<pre>';
print_r($array_one);
echo '</pre>';

/* 

D

Array
(
    [0] => A
    [1] => B
    [2] => C
)

*/

?>