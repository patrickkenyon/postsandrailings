<html>
<body>

<form action="results.php" method="post">
    Number of railings: <input type="text" value="" name="norailings"><br>
    Number of posts: <input type="text" value="" name="noposts"><br>
    Length of fence required: <input type="text" value="" name="lengfence"><br>
    <input type="submit" name="submit">
</form>

</body>
</html>
<?php

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
        echo '<a href="mainpage.php">Back</a>';
        exit('Stop trying to use dodgy data I accept positive integers for posts and railings and positive floats for length of fence.');
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

$input_railings = $_POST["norailings"];
$input_posts = $_POST["noposts"];
$input_length = $_POST["lengfence"];

switch (true) {

    case (
        (!empty($_POST["norailings"]) && (posIntCheck($_POST["norailings"]))) &&
        (!empty($_POST["noposts"]) && (posIntCheck($_POST["norailings"]))) &&
        (!empty($_POST["lengfence"]) && (posFloatCheck($_POST["lengfence"])))
    ):
        $postrailfinal = postRailCompare($_POST["noposts"],$_POST["norailings"]);
        echo "</br>" . 'The final length of the fence created is ' . calcLength($postrailfinal) . "m<br/>";
        leftoverEquip($input_posts, $input_railings);
        $calcnorailings = calcRailings($_POST["lengfence"]);
        echo 'You would require ' . $calcnorailings . ' railings and ' . ($calcnorailings+1) . ' posts in order to build a ' . $_POST["lengfence"] . 'm long fence.';
        break;

    case (
        (!empty($_POST["norailings"]) && (posIntCheck($_POST["norailings"]))) &&
        (!empty($_POST["noposts"]) && (posIntCheck($_POST["norailings"]))) &&
        empty($_POST["lengfence"])
    ):
        $postrailfinal = postRailCompare($_POST["noposts"],$_POST["norailings"]);
        echo "</br>" . 'The final length of the fence created is ' . calcLength($postrailfinal) . "m<br/>";
        leftoverEquip($input_posts, $input_railings);
        break;

    case (
        empty($_POST["norailings"]) &&
        empty($_POST["noposts"]) &&
        (!empty($_POST["lengfence"]) && (posFloatCheck($_POST["lengfence"])))
    ):
        $calcnorailings = calcRailings($_POST["lengfence"]);
        echo 'You would require ' . $calcnorailings . ' railings and ' . ($calcnorailings+1) . ' posts in order to build a ' . $_POST["lengfence"] . 'm long fence.';
        break;

    case (
        is_array($_POST["norailings"]) ||
        is_array($_POST["noposts"]) ||
        is_array($_POST["lengfence"])
    ):
        echo "Be serious, how can I build a fence with an array?";
        break;

    default:
        echo "Please provide either: two numbers greater than one to see the possible length of fence, a length of fence that you require or both.";
}


