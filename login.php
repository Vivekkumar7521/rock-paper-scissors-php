<!DOCTYPE html>
<html>
<head>
  <title>fe275f01- Rock Paper Scissors</title>
</head>
<body>
<h1>Please Log In</h1>
<form method="post">
  <label for="who">User Name</label>
  <input type="text" name="who" id="who"><br>
  <label for="pass">Password</label>
  <input type="text" name="pass" id="pass"><br>
  <input type="submit" value="Log In">
  <input type="submit" name="cancel" value="Cancel">
</form>
<?php
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; // pw is php123

if ( isset($_POST['cancel']) ) {
    header("Location: index.php");
    return;
}

if ( isset($_POST['who']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
        echo("<p style='color:red'>User name and password are required</p>");
    } else {
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) {
            header("Location: game.php?name=".urlencode($_POST['who']));
            return;
        } else {
            echo("<p style='color:red'>Incorrect password</p>");
        }
    }
}
?>
</body>
</html>
