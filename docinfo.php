<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Doctor Information</title>
<link rel="stylesheet" type="text/css" href="webpage.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1 align="center">All Doctor Information</h1>
<p>Please select how you would like to order the data:</p>
<form method="POST" action="displaydocinfo.php">
	<input type="radio" id="lname" name="orderby" value="Last Name">
	<label for="lname">Last Name</label><br>
	<input type="radio" id="bdate" name="orderby" value="Birthdate">
	<label for="bdate">Birthdate</label><br>
	
<p>Would you like to order the information in ascending or descending order?</p>

        <input type="radio" id="ascend" name="aord" value="Ascending">
        <label for="ascend">Ascending</label><br>
        <input type="radio" id="descend" name="aord" value="Descending">
        <label for="descend">Descending</label><br>
        <input type="submit" value="Submit">
</form>

<?php
mysqli_close($connection);
?>
</body>
</html>
