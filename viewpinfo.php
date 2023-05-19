<?php
  include "connectdb.php"
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="webpage.css">
</head>
<body>
<h1 align="center">View All Patient Info For Patient Treated By Certain Doctor</h1>

<?php
  //Using SQL query to display doctor first and last names as radio buttons
  $doctors = array();
$query = "SELECT concat(firstname,' ', lastname, '-', licensenum) as DoctorInfo FROM doctor";
$result = mysqli_query($connection, $query);
if (!$result) {
die("databases query failed.");
}
while ($row = mysqli_fetch_array($result)) {
        array_push($doctors, $row['DoctorInfo']);
}


?>
<p>Please select the doctor of the patients you would like to see the information of: </p>
<form method = "POST" action = "displaypatinfo.php">
<?php
for ($i = 0; $i < count($doctors); $i++) {
?>
  	<input type="radio" name="doc" value="<?php echo explode("-", $doctors[$i])[1]; ?>"><?php echo explode("-", $doctors[$i])[0]; ?><br>
<?php
}
mysqli_close($connection);
?>
<input type = 'submit' value = 'Submit'>
</form>
</body>
</html>
