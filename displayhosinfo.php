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
<h1 align="center">Displaying Hospital Info For Selected Hospital</h1>
<?php
//Displays hospital information of the selected hospital using SQL query
$hospital = $_POST["hos"];
echo "You have chosen to display all information for the following hospital: " . $hospital . ".";
$query = "SELECT hosname, city, prov, numofbed, firstname, lastname FROM hospital, doctor WHERE hospital.headdoc = doctor.licensenum AND hospital.hoscode = '" . $hospital . "'";
$result = mysqli_query($connection, $query);
if(!$result){
die("databases query failed.");
}
echo '<table style="width:100%">';
echo '<tr>';
echo '   <th>Hospital Name</th>';
echo '   <th>City</th>';
echo '   <th>Province</th>';
echo '   <th>Number of Beds</th>';
echo '   <th>First Name</th>';
echo '   <th>Last Name</th>';
echo '</tr>';
while ($row = mysqli_fetch_array($result)) {
      echo '<tr><td>' .  $row['hosname'] . '</td><td>' . $row['city'] . '</td><td>' .  $row['prov'] . '</td><td>' . $row['numofbed'] . '</td><td>' . $row['firstname'] . '</td><td>' . $row['lastname'] . '</td></tr>';
}
echo '</table><br>';

echo "The list of all doctors that work at the selected hospital :";
$query2 = "SELECT firstname, lastname FROM doctor WHERE hosworksat = '" . $hospital . "'";
$result = mysqli_query($connection, $query2);
if(!$result){
die("databases query failed.");
}
echo '<table style="width:100%">';
echo '<tr>';
echo '   <th>First Name</th>';
echo '   <th>Last Name</th>';
echo '</tr>';

while ($row = mysqli_fetch_array($result)) {
	echo '<tr><td>' .  $row['firstname'] . '</td><td>' . $row['lastname'] . '</td></tr>';
}
mysqli_close($connection);
?>

</body>
</html>
