<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="POST" action="home.php">
    Number of railings: <input title="username" type="text" name="posts"><br/>
    <input type="submit">
</form>
</body>
</html>
<?php

print_r($_POST('posts'));
