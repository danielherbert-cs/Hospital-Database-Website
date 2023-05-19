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
<h1 align="center">Deleting Doctor From The Database</h1>
<?php
//Error checking for whether or not the selected doctor can be deleted
$doctor = $_POST["doc"];
$licensenums = array();
$querycheck = "SELECT licensenum FROM looksafter";
$result = mysqli_query($connection, $querycheck);
if(!$result){
	die("databases query failed.");
        }
while ($row = mysqli_fetch_array($result)) {
        array_push($licensenums, $row['licensenum']);
}

foreach($licensenums as $value){
    if ($doctor == $value) {
        echo "The doctor selected cannot be deleted as they treat patients." . "<br>";
	echo "Please go to the previous page and select another doctor to delete." . "<br>";
        exit();
        }
} 

$licensenums2 = array();
$querycheck2 = "SELECT headdoc FROM hospital";
$result = mysqli_query($connection, $querycheck2);
if(!$result){
	die("databases query failed.");
        }
while ($row = mysqli_fetch_array($result)) {
        array_push($licensenums2, $row['headdoc']);
}
foreach($licensenums2 as $value){
    if ($doctor == $value) {
        echo "The doctor selected cannot be deleted as they are the head doctor of a hospital." . "<br>";
        echo "Please go to the previous page and select another doctor to delete." . "<br>";
        exit();
        }
}



//Query and PHP code to delete the query and display the doctor table after deleting
echo "<p> The doctor has successfully been deleted </p>";
echo "<p>The remaining doctors in the doctor table after deleting the one you have chosen: </p>";

$query = "DELETE FROM doctor WHERE licensenum = '" . $doctor . "'";
$result = mysqli_query($connection, $query);
if(!$result){
	die("databases query failed.");
}

$query2 = "SELECT * FROM doctor";
$result = mysqli_query($connection, $query2);
if(!$result){
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
mysqli_close($connection);
?>
</body>
</html>
