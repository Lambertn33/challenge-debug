<?php
$arr = [];
for ($letter = 'a'; $letter <= 'z'; $letter++) {
    $arr[] = $letter;
}

print_r('Array (' . implode(', ', array_map(function ($key, $value) {
    return "[$key] => $value";
}, array_keys($arr), $arr)) . ')');
