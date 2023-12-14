<?php

/**
 * This script should print 'Success'. Please keep the function invocations, modify only the function itself!
 */

function isTheLinkValid(string $link)
{
    $unacceptables = array('https:', '.doc', '.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {

        // change ==true to !==false to ensure that the condition is true when the substring is found in the link
        if (strpos($link, $unacceptable) !== false) {
            return false;
        }
    }
    return true;
}


echo isTheLinkValid('http://www.bildau.de/hack.pdf') === false
    && isTheLinkValid('https://bildau.de') === false
    && isTheLinkValid('http://bildau.de') === true
    && isTheLinkValid('http://bildau.de/test.txt') === true
    ? 'Success!' : 'Failure!';
