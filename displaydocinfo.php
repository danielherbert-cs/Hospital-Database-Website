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

<h1 align="center">Displaying Doctor Information</h1>

<?php
 //Displays a message saying how they selected to display
 $orderBy = $_POST["orderby"];
 $aOrD = $_POST["aord"];
 echo "You chose to order by: " . $orderBy . " in " . $aOrD . " order." . "<br>\n";
 //If statements to display the information as selected using SQL query  
 if ($orderBy == "Last Name" && $aOrD == "Ascending") {
	$query = "SELECT * FROM doctor ORDER BY lastname";
	$result = mysqli_query($connection,$query);
	if(!$result) {
	die("databases query failed.");
	}
	echo '<table style="width:100%">';
 	echo '<tr>';
 	echo '   <th>licensenum</th>';
 	echo '   <th>firstname</th>';
 	echo '   <th>lastname</th>';
 	echo '   <th>licensedate</th>';
 	echo '   <th>birthdate</th>';
 	echo '   <th>hosworksat</th>';
 	echo '   <th>specialty</th>';
 	echo '</tr>';
	while ($row = mysqli_fetch_array($result)) {
 		echo '<tr><td>' .  $row['licensenum'] . '</td><td>' . $row['firstname'] . '</td><td>' .  $row['lastname'] . '</td><td>' . $row['licensedate'] . '</td><td>' . $row['birthdate'] . '</td><td>' . $row['hosworksat'] . '</td><td>'. $row['speciality'] . '</td></tr>';
	}
	echo '</table>';
 }

 
 
  if ($orderBy == "Last Name" && $aOrD == "Descending") {
        $query = "SELECT * FROM doctor ORDER BY lastname DESC";
        $result = mysqli_query($connection,$query);
        if(!$result) {
        die("databases query failed.");
        }
	echo '<table style="width:100%">';
        echo '<tr>';
        echo '   <th>licensenum</th>';
        echo '   <th>firstname</th>';
        echo '   <th>lastname</th>';
        echo '   <th>licensedate</th>';
        echo '   <th>birthdate</th>';
        echo '   <th>hosworksat</th>';
        echo '   <th>specialty</th>';
        echo '</tr>';
	while ($row = mysqli_fetch_array($result)) {
                echo '<tr><td>' .  $row['licensenum'] . '</td><td>' . $row['firstname'] . '</td><td>' .  $row['lastname'] . '</td><td>' . $row['licensedate'] . '</td><td>' . $row['birthdate'] . '</td><td>' . $row['hosworksat'] . '</td><td>'. $row['speciality'] . '</td></tr>';
        }
	echo '</table>';

 }

 
  if ($orderBy == "Birthdate" && $aOrD == "Ascending") {
        $query = "SELECT * FROM doctor ORDER BY birthdate";
        $result = mysqli_query($connection,$query);
        if(!$result) {
        die("databases query failed.");
        }
	echo '<table style="width:100%">';
        echo '<tr>';
        echo '   <th>licensenum</th>';
        echo '   <th>firstname</th>';
        echo '   <th>lastname</th>';
        echo '   <th>licensedate</th>';
        echo '   <th>birthdate</th>';
        echo '   <th>hosworksat</th>';
        echo '   <th>specialty</th>';
        echo '</tr>';
	while ($row = mysqli_fetch_array($result)) {
                echo '<tr><td>' .  $row['licensenum'] . '</td><td>' . $row['firstname'] . '</td><td>' .  $row['lastname'] . '</td><td>' . $row['licensedate'] . '</td><td>' . $row['birthdate'] . '</td><td>'. $row['hosworksat'] . '</td><td>'. $row['speciality'] . '</td></tr>';
        }
	echo '</table>';
 }
 
 

  if ($orderBy == "Birthdate" && $aOrD == "Descending") {
        $query = "SELECT * FROM doctor ORDER BY birthdate DESC";
        $result = mysqli_query($connection,$query);
        if(!$result) {
        die("databases query failed.");
        }
	echo '<table style="width:100%">';
        echo '<tr>';
        echo '   <th>licensenum</th>';
        echo '   <th>firstname</th>';
        echo '   <th>lastname</th>';
        echo '   <th>licensedate</th>';
        echo '   <th>birthdate</th>';
        echo '   <th>hosworksat</th>';
        echo '   <th>specialty</th>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($result)) {
		echo '<tr><td>' .  $row['licensenum'] . '</td><td>' . $row['firstname'] . '</td><td>' .  $row['lastname'] . '</td><td>' . $row['licensedate'] . '</td><td>' . $row['birthdate'] . '</td><td>'. $row['hosworksat'] . '</td><td>'. $row['speciality'] . '</td></tr>';
        }
	echo '</table>';
 }

mysqli_close($connection);
?>
</body>
</html>
