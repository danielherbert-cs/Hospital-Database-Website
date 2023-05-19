<?php
  include "connectdb.php"
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="webpage.css">
</head>
<body>
<h1 align="center">Insert A New Doctor Into The Database</h1>
<form  method="POST" action="inserting.php">
  <label for="licensenum">License Number:</label><br>
  <input type="text" id="licensenum" name="licensenum"><br><br>  

  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br><br>  

  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname"><br><br>

  <label for="ldate">License Date (YYYY-MM-DD):</label><br>
  <input type="text" id="ldate" name="ldate"><br><br>

  <label for="bdate">Birthdate (YYYY-MM-DD):</label><br>
  <input type="text" id="bdate" name="bdate"><br><br>
  
  <p>Select hospital: </p>
  <input type="radio" id="abc" name="hcode" value="ABC">
  <label for="abc">ABC</label><br>
  <input type="radio" id="bbc" name="hcode" value="BBC">
  <label for="bbc">BBC</label><br>
  <input type="radio" id="dde" name="hcode" value="DDE">
  <label for="dde">DDE</label><br>
  <input type="radio" id="efg" name="hcode" value="EFG">
  <label for="efg">EFG</label><br><br>

  <label for="specialty">Specialty:</label><br>
  <input type="text" id="specialty" name="specialty"><br><br>

  <input type="submit" value="Submit">
</form> 

</body>
</html>
