<?php

require 'functions.php';

$input_railings = $_POST["norailings"];
$input_posts = $_POST["noposts"];
$input_length = $_POST["lengfence"];

dodgyData($input_railings, $input_posts, $input_railings);

switch (true) {

    case (
        (!empty($_POST["norailings"]) && (posIntCheck($_POST["norailings"]))) &&
        (!empty($_POST["noposts"]) && (posIntCheck($_POST["norailings"]))) &&
        (!empty($_POST["lengfence"]) && (posFloatCheck($_POST["lengfence"])))
    ):
        $postrailfinal = postRailCompare($_POST["noposts"], $_POST["norailings"]);
        echo "</br>" . 'The final length of the fence created is ' . calcLength($postrailfinal) . "m<br/>";
        leftoverEquip($input_posts, $input_railings);
        $calcnorailings = calcRailings($_POST["lengfence"]);
        echo 'You would require ' . $calcnorailings . ' railings and ' . ($calcnorailings + 1) . ' posts in order to build a ' . $_POST["lengfence"] . 'm long fence.';
        echo backButton('mainpage.php');
        break;

    case (
        (!empty($_POST["norailings"]) && (posIntCheck($_POST["norailings"]))) &&
        (!empty($_POST["noposts"]) && (posIntCheck($_POST["norailings"]))) &&
        empty($_POST["lengfence"])
    ):
        $postrailfinal = postRailCompare($_POST["noposts"], $_POST["norailings"]);
        echo "</br>" . 'The final length of the fence created is ' . calcLength($postrailfinal) . "m<br/>";
        leftoverEquip($input_posts, $input_railings);
        echo backButton('mainpage.php');
        break;

    case (
        empty($_POST["norailings"]) &&
        empty($_POST["noposts"]) &&
        (!empty($_POST["lengfence"]) && (posFloatCheck($_POST["lengfence"])))
    ):
        $calcnorailings = calcRailings($_POST["lengfence"]);
        echo 'You would require ' . $calcnorailings . ' railings and ' . ($calcnorailings + 1) . ' posts in order to build a ' . $_POST["lengfence"] . 'm long fence.';
        echo backButton('mainpage.php');
        break;

    case (
        is_array($_POST["norailings"]) ||
        is_array($_POST["noposts"]) ||
        is_array($_POST["lengfence"])
    ):
        echo backButton('mainpage.php');
        exit('Be serious, how can I build a fence with an array?');


    default:
        echo backButton('mainpage.php');
        exit("Please provide one of the following three options: 
        <ol>
            <li>A positive integer for both posts and railings</li>
            <li>A positive number for length of fence</li>
            <li>Both of the above</li>
       </ol>");


}

