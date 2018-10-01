<?php
$day = 'Monday';
$test = false;
$test2 = true;
$test3 = false;
$test4 = false;

switch (true) {

    case ($day == 'Monday'):
        echo 'Wish you a fresh start!';
        break;

    case ($day == 'Wednesday'):
        echo 'Keep going. Good luck!';
        break;

    case ($day == 'Friday' && !$test3 && $test2):
        echo 'Happy weekend!';
        break;

    default:
        echo 'Good day!';
        break;

}

function posIntCheck( $num) {
    return (is_int($num) && $num > 1);
}


echo posIntCheck("2");