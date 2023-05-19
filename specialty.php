<?php
 include "connectdb.php"
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="webpage.css">
<meta charset="utf-8">
<title>Specialty</title>
</head>
<body>
<h1 align="center">Get Doctor Information Based On Specialty</h1>
<?php
  $specialties = array();
$query = "SELECT DISTINCT speciality FROM doctor";
$result = mysqli_query($connection, $query);
if (!$result) {
die("databases query failed.");
}
while ($row = mysqli_fetch_array($result)) {
	array_push($specialties, $row['speciality']);
}
?>
<p>Please select what specialty you would like to display all doctor information of: </p>
<form method = "POST" action = "displayspecialty.php">
<?php
for ($i = 0; $i < count($specialties); $i++) {
?>
	<input type="radio" name="spec" value="<?php echo $specialties[$i]; ?>"><?php echo $specialties[$i]; ?><br>
<?php
}
mysqli_close($connection);
?>
<input type = 'submit' value = 'Go'>
</form>
</body>
</html>
