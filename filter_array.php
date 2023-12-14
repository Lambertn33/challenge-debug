<?php

/**
 * The expected output is "apple, banana, cherry, tomato"
 * Please modify only the function itself, nothing else
 */

function filterArray($validOptions, $input) {
	$result = array_intersect($input, $validOptions);
    echo implode(', ', $result);
}

$input = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validOptions = ['apple', 'pear', 'banana', 'cherry', 'tomato'];


filterArray($validOptions, $input);