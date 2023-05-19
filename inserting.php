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
<h1 align="center">Inserting New Doctor Into The Database</h1>
<?php
//DIsplaying all information for the doctor the user is trying to insert
$licensenum = $_POST['licensenum'];
$first = $_POST['fname'];
$last = $_POST['lname'];
$licensedate = $_POST['ldate'];
$birthday = $_POST['bdate'];
$hospital = $_POST['hcode'];
$specialty = $_POST['specialty'];
echo "You are going to insert " . $first . " " . $last . " into the database with the following information: ". "<br>";
echo "Birthdate: " . $birthday . "<br>";
echo "License Date: " . $licensedate . "<br>";
echo "License Number: " . $licensenum . "<br>";
echo "Specialty: " . $specialty . "<br>";
echo "Hospital: " . $hospital . "<br>";

//Displaying an error message if the license number entered is license number of an already existing doctor
$licensenums = array();
$querycheck = "SELECT licensenum FROM doctor";
$result = mysqli_query($connection, $querycheck);
if(!$result){
        die("databases query failed.");
        }
while ($row = mysqli_fetch_array($result)) {
	array_push($licensenums, $row['licensenum']);
}

foreach($licensenums as $value){
    if ($licensenum == $value) {
	echo "License Number provided is the License Number of an already existing doctor. Please go to the previous page and try again." . "<br>";
    	exit();
	}
}




//Insert new doctor into doctor table
$query = "INSERT INTO doctor VALUES ('". $licensenum . "', '" . $first ."', '" . $last . "', '" . $licensedate . "', '" . $birthday . "', '" . $hospital . "', '" . $specialty . "')";
$result = mysqli_query($connection, $query);
if(!$result){
	echo "Incorrect information provided. Please go to the previous page and try again." . "<br>";
        die("databases query failed.");
        }
?>

<?php
//Display doctor table after the insert
echo "Here is the Doctor table after your insert: ";
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
