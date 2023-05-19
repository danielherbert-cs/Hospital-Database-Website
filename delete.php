<?php
  include "connectdb.php"
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="webpage.css">
</head>
<body>
<h1 align="center">Delete A Doctor From The Database</h1>

<?php
  include "connectdb.php"
?>

<?php
//Storing all doctors in array for radio buttons
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
<p>Please select the doctor you would like to delete: </p>
<form method = "POST" action="deleting.php">
<?php
//For loop displaying radio buttons
for ($i = 0; $i < count($doctors); $i++) {
?>
  	<input type="radio" name="doc" value="<?php echo explode("-", $doctors[$i])[1]; ?>"><?php echo explode("-", $doctors[$i])[0]; ?><br>
<?php
}
mysqli_close($connection);
?>
<input type = 'submit' value = 'Submit' onclick = "return confirm('Are you sure you want to delete? Press OK to confirm.')">
</form>


</body>
</html>
