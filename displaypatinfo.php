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
<h1 align="center">Displaying All Patient Information For Specific Doctor</h1>
<?php
 //Displaying all patient information for selected doctor using SQL query
 $doctor = $_POST["doc"];
 echo "The patients for the doctor you have chosen are: <br>\n";

        $query = "SELECT patient.firstname, patient.lastname, patient.ohipnum FROM patient, looksafter WHERE patient.ohipnum = looksafter.ohipnum AND looksafter.licensenum = '" . $doctor . "'";
	$result = mysqli_query($connection, $query);
        if(!$result){
        die("databases query failed.");
        }
	echo '<table style="width:100%">';
        echo '<tr>';
        echo '   <th>firstname</th>';
        echo '   <th>lastname</th>';
        echo '   <th>ohipnum</th>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($result)) {
                echo '<tr><td>' .  $row['firstname'] . '</td><td>' . $row['lastname'] . '</td><td>' .  $row['ohipnum'] . '</td></tr>';
        }
	echo '</table>';
mysqli_close($connection);
?>

</body>
</html>
