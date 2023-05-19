<?php
  include "connectdb.php"
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="webpage.css">
</head>
<body>
<h1 align="center">Update Number Of Beds For A Hospital</h1>
<?php
  //User selects which hospital they would like to update the number of beds
  //Array and SQL query to get all hospital codes from the hospital table
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
<p>Please select what hospital you would like to update the number of beds in: </p>
<form method = "POST" action = "updatebeds.php">
<?php
for ($i = 0; $i < count($hospitals); $i++) {
?>
  	<input type="radio" name="hos" value="<?php echo $hospitals[$i]; ?>"><?php echo $hospitals[$i]; ?><br>
<?php
}
mysqli_close($connection);
?>
<p>Please type in the number of beds at the hospital you have chosen: </p>
<label for="num">Number of Beds:</label> 
<input type="text" id="num" name="numbeds"><br><br>
<input type="submit" value="Submit">
</form>
</body>
</html>
