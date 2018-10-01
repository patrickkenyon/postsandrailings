<html>
<body>

<form action="mainpage.php" method="post">
    Number of railings: <input type="text" name="norailings"><br>
Number of posts: <input type="text" name="noposts"><br>
Number of posts: <input type="text" name="lengfence"><br>
    <input type="submit">
</form>

</body>
</html>
<?php

function calcLength($r) {
    return (1.6*$r)+0.1;
}

function calcRailings($d) {
    return round((($d-0.1)/1.6), 0, PHP_ROUND_HALF_UP);
}

function calcPosts($e) {
    return (($e-0.1)/1.6)+1;
}

function posIntCheck($num) {
    return (is_int($num) && $num>0);
}

function dataOverload($b) {

}

/*
 * this function compares the number of posts and railings. It returns the lower of the two values, it takes 1 from the value of posts if posts are returned.
 *
 * @param int $x is an integer defined by the user on the initial web-page. It defines the number of posts.
 * @param int $y is an integer defined by the user on the initial web-page. It defines the number of railings.
 *
 * @return int $y or $x-1 is returned depending on the comparison.
 */
function postRailCompare($x, $y) {
    if ($x >= $y) {
        return $y;
    } else {
        return $x - 1;
    }
}

//function badDataRedirect($a) {
//    if (posIntCheck($a))  {
//        break;
//    } else {
//        header('Location: mainpage.php?error=1');
//    }
//}

//function redirect($c) {
//    if (posIntCheck($c)) {
//        return $c;
//    } else {
//        header('Location: mainpage.php?error=1');
//    }
//}

//$noofrailingschecked = redirect($_POST["norailings"]);

$postrailfinal = postRailCompare($_POST["norailings"],$_POST["noposts"]);
echo 'The final length of the fence created is ' . calcLength($postrailfinal) . "m<br/>";

$calcnorailings = calcRailings($_POST["lengfence"]);
echo 'You would require ' . $calcnorailings . ' railings and ' . ($calcnorailings+1) . ' posts in order to build a ' . $_POST["lengfence"] . 'm long fence.';
?>