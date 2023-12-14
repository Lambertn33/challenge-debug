<?php

/**
 * 1) This script should print  "Here is the name: $name - $name2"
 * $name variables are decided as seen in the code, fix all the bugs whilst keeping the functionality!
 *
 * 2) The print_r should print 5 random names; Please modify only the functions themselves, not the way we invoke them.
 */

$arr = [];

// remove second parameter to avoid rendering multiple names
function combineNames($str = "")
{
    $params = [$str];
    //add & as a reference to the original element in the array.
    foreach ($params as &$param) {
        if ($param == "") {
            $param = randomHeroName();
        }
    }
    return implode(" - ", $params);
}

function randomGenerate(&$arr, $amount)
{
    for ($i = $amount; $i > 0; $i--) {
        array_push($arr, combineNames() . ",");
    }
    return $amount;
    // remove unnecessary return amount
}

function randomHeroName()
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil"];

    // making sure the first and last name get the same index
    $randomIndex = rand(0, count($hero_firstnames) - 1);

    $randomFirstName = $hero_firstnames[$randomIndex];
    $randomLastName = $hero_lastnames[$randomIndex];

    return $randomFirstName . " " . $randomLastName;
}

echo "Here are the names: ";

echo PHP_EOL . PHP_EOL;

$fiveHeroesHolder = [];
randomGenerate($fiveHeroesHolder, 5);
print_r($fiveHeroesHolder);
