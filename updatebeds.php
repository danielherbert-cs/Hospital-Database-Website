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
<h1 align="center">Updating Number Of Beds</h1>
<?php
//Message displaying the chosen hospital and the number of beds they want to update to
//Query used to update number of beds and then hospital table is displayed to confirm
$hospital = $_POST["hos"];
$numBeds = $_POST["numbeds"];
echo "You have chosen to update the number of beds at hospital : " . $hospital . " to " . $numBeds . "." . "<br>";
$query = "Update hospital SET numofbed = $numBeds WHERE hoscode = '" . $hospital . "'";
$result = mysqli_query($connection, $query);
if(!$result){
die("databases query failed.");
}
echo "Number of beds updated successfully.";
$query2 = "SELECT * FROM hospital";
$result = mysqli_query($connection, $query2);
if(!$result){
	die("databases query failed.");
}
        echo '<table style="width:100%">';
        echo '<tr>';
        echo '   <th>hoscode</th>';
        echo '   <th>hosname</th>';
        echo '   <th>city</th>';
        echo '   <th>prov</th>';
        echo '   <th>numofbed</th>';
        echo '   <th>headdoc</th>';
        echo '   <th>headdocstartdate</th>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($result)) {
                echo '<tr><td>' .  $row['hoscode'] . '</td><td>' . $row['hosname'] . '</td><td>' .  $row['city'] . '</td><td>' . $row['prov'] . '</td><td>' . $row['numofbed'] . '</td><td>' . $row['headdoc'] . '</td><td>'. $row['headdocstartdate'] . '</td></tr>';
        }
	echo '</table>';

mysqli_close($connection);
?>

</body>
</html>
