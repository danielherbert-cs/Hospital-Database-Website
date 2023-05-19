<?php
  include "connectdb.php"
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="webpage.css">
</head>
<body>
<h1 align="center">View All Hospital Info For Selected Hospital</h1>
<?php
  //Query to get hoscodes from table using SQL query and display radio buttons
  $hospitals = array();
$query = "SELECT hoscode FROM hospital";
$result = mysqli_query($connection, $query);
if (!$result) {
die("databases query failed.");
}
while ($row = mysqli_fetch_array($result)) {
        array_push($hospitals, $row['hoscode']);
}
?>
<p>Please select the hospital you would like to display all information for: </p>
<form method = "POST" action = "displayhosinfo.php">
<?php
for ($i = 0; $i < count($hospitals); $i++) {
?>
  	<input type="radio" name="hos" value="<?php echo $hospitals[$i]; ?>"><?php echo $hospitals[$i]; ?><br>
<?php
}
mysqli_close($connection);
?>
<input type="submit" value="Submit">
</form>
</body>
</html>
