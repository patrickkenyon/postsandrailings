<?php

function backButton($path) {
    return "</br><a href='$path'>Return to mainpage</a></br>";
}

function calcLength(int $posts) {
    return (1.6*$posts)+0.1;
}

function calcRailings(float $length) {
    return ceil(($length-0.1)/1.6);
}

function posIntCheck(int $num) {
    return (is_int($num) && $num>0);
}

function posFloatCheck(float $num) {
    return (is_float($num) && $num>0);
}

function dodgyData($data1, $data2, $data3) {
    if (
        is_array($data1) || is_string($data1) ||
        is_array($data2) || is_string($data2) ||
        is_array($data3) || is_string($data3)
    ) {
        echo backButton('mainpage.php');
        exit("Stop trying to use dodgy data! I accept: 
        <ol>
            <li>positive integers for posts and railings</li>
            <li>positive numbers for length of fence</li>
        
    }
}

/*
 * this function compares the number of posts and railings. It returns the lower of the two values, it takes 1 from the value of posts if posts are returned.
 *
 * @param int $posts is an integer defined by the user on the initial web-page. It defines the number of posts.
 * @param int $railings is an integer defined by the user on the initial web-page. It defines the number of railings.
 *
 * @return int $railings or $posts-1 is returned depending on the comparison.
 */
function postRailCompare(int $posts, int $railings) {
    if ($posts> $railings) {
        return $railings;
    } else {
        return $posts- 1;
    }
}

function leftoverEquip(int $posts, int $railings) {
    if(($posts - $railings) > 1) {
        echo "You have " . ($posts - ($railings+1)) . " leftover posts.</br>";
    } elseif (($railings - $posts) >= 0) {
        echo "You have " . ($railings - ($posts-1)) . " leftover railings.</br>";
    }
}