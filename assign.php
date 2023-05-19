
<?php
  include "connectdb.php"
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="webpage.css">
</head>
<body>
<h1 align="center">Assign A Doctor To A Patient</h1>
<p>Please select the doctor you would like the patient to be assigned to: </p>
<?php
  //Creating arrays to store all doctors and patients
  $doctors = array();
  $patients = array();

//Getting doctors and patients and storing into array for radio buttons
$query = "SELECT concat(firstname,' ', lastname, '-', licensenum) as DoctorInfo FROM doctor";
$result = mysqli_query($connection, $query);
if (!$result) {
die("databases query failed.");
}
while ($row = mysqli_fetch_array($result)) {
        array_push($doctors, $row['DoctorInfo']);
}




$query2 = "SELECT concat(firstname,' ', lastname, '-', ohipnum) as PatientInfo FROM patient";
$result = mysqli_query($connection, $query2);
if (!$result) {
die("databases query failed.");
}
while ($row = mysqli_fetch_array($result)) {
        array_push($patients, $row['PatientInfo']);
}


?>

<form method = "POST" action = "assigning.php">
<?php
//For loops to display doctors and patients as radio buttons, only displaying the names through the explode function
for ($i = 0; $i < count($doctors); $i++) {
?>
  	<input type="radio" name="doc" value="<?php echo explode("-", $doctors[$i])[1]; ?>"><?php echo explode("-", $doctors[$i])[0]; ?><br>
<?php
}
echo "<br>";
echo "Please select the patient you would like to assign to the doctor: <br><br>";
for ($i = 0; $i < count($patients); $i++) {
?>
  	<input type="radio" name="pat" value="<?php echo explode("-", $patients[$i])[1]; ?>"><?php echo explode("-", $patients[$i])[0]; ?><br>
<?php
}
echo "<br>";
mysqli_close($connection);
?>
<input type = 'submit' value = 'Submit'>
</form>

</body>
</html>
