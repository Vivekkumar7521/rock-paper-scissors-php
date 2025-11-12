<!DOCTYPE html>
<html>
<head>
  <title>fe275f01- Rock Paper Scissors</title>
</head>
<body>
<h1>Rock Paper Scissors</h1>
<?php
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}
if ( isset($_POST['logout']) ) {
    header('Location: logout.php');
    return;
}
?>
<p>Welcome: <?= htmlentities($_GET['name']); ?></p>
<form method="post">
<select name="human">
  <option value="-1">Select</option>
  <option value="0">Rock</option>
  <option value="1">Paper</option>
  <option value="2">Scissors</option>
</select>
<input type="submit" value="Play">
<input type="submit" name="logout" value="Logout">
</form>

<pre>
<?php
$names = array('Rock', 'Paper', 'Scissors');
if ( isset($_POST['human']) ) {
    $human = $_POST['human'];
    if ( $human == -1 ) {
        print "Please select a strategy and press Play.\n";
    } else {
        $computer = rand(0,2);
        print "Your Play=".$names[$human]." Computer Play=".$names[$computer]."\n";
        if ( $human == $computer ) {
            print "Result: Tie\n";
        } else if ( ($human == 0 && $computer == 2) ||
                    ($human == 1 && $computer == 0) ||
                    ($human == 2 && $computer == 1) ) {
            print "Result: You Win\n";
        } else {
            print "Result: You Lose\n";
        }
    }
}
?>
</pre>
<p><a href="index.php">Back to home</a></p>
</body>
</html>
