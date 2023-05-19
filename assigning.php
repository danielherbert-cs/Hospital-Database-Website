<?php
  include "connectdb.php"
?>

<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<head>
<link rel="stylesheet" type="text/css" href="webpage.css">
</head>
<body>
<h1 align="center">Assigning Patient To Doctor</h1>
<?php
//Getting submitted doctor and patient
$doctor = $_POST["doc"];
$patient = $_POST["pat"];
//Creating an array to get the patients currently treated by selected doctor
$currpat = array();
$querycheck = "SELECT ohipnum FROM looksafter WHERE licensenum = '" . $doctor . "'";
$result = mysqli_query($connection, $querycheck);
if(!$result){
	die("databases query failed.");
        }
while ($row = mysqli_fetch_array($result)) {
        array_push($currpat, $row['ohipnum']);
}
//Message if selected patient is already assigned to selected doctor
if (in_array($patient, $currpat)) {
	echo "The selected patient is already assigned to the selected doctor. Please go to the previous page and select a different doctor and patient.";
	exit();
}
//Query to insert into looksafter table and assign patient to doctor
$query = "INSERT INTO looksafter VALUES ('" . $doctor . "', '" . $patient . "')";

$result = mysqli_query($connection, $query);
if(!$result){
	die("databases query failed.");
        }
else {
	echo "Patient successfully assigned to doctor</br>";
}
mysqli_close($connection);
?>
</body>
</html>
