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
<h1 align="center">Displaying All Doctor Information For Specific Specialty</h1>
<?php
 //Displays all doctor information for the selected specialty using SQL query
 $specialty = $_POST["spec"];
 echo "The specialty you have chosen: ". $specialty. "<br>\n";

        $query = "SELECT * FROM doctor WHERE speciality = '$specialty'";
        $result = mysqli_query($connection, $query);
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


