<!DOCTYPE HTML>
<html>
<head>
</head>
<body>

<?php
// define variables and set to empty values
//$noOfRails = $noOfPosts = $fenceLength = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $noOfRails = test_input($_POST["norails"]);
  $noOfPosts = test_input($_POST["noposts"]);
  $fenceLength = test_input($_POST["fencelength"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Posts and railings challenge</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Number of railings: <input type="text" name="norails">
  <br><br>
  Number of posts: <input type="text" name="noposts">
  <br><br>
  Length of fence: <input type="text" name="fencelength">
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>
<?php
echo "<h2>Results:</h2>";
echo $noOfRails;
echo "<br>";
echo $noOfPosts;
echo "<br>";
echo $fenceLength;
echo "<br>";


//function lengthOfFence($rails) {
//    return (1.6*$rails)+0.1;
//}

//echo lengthOfFence(3);


//
//lengthFromRail()
//
//if($noOfRails>2) {
//    return $noOfRails*1.6+0.1;
//} else {
//    return FALSE;
//    }

?>