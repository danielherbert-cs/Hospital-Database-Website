<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Hospital Database Webpage</title>
<link rel="stylesheet" type="text/css" href="webpage.css">
</head>
<body>

<?php
include "connectdb.php";
?> 


<h1 align="center">Welcome to the Hospital Database Webpage</h1>

<h2 align="center">CS 3319 Assignment 3 Programmer Name: 28</h2>

<p align="center">Welcome to the Hospital Database Webpage! On this webpage, you will be able to update and view information from the Hospital database. This includes: </p>

<ul>
  <li>Listing all information about all the doctors</li>
  <li>Inserting a new doctor into the database</li>
  <li>Deleting an existing doctor</li>
  <li>Assign a doctor to a patient</li>
  <li>Select a hospital and display all its information</li> 
</ul>

<p align="center"> and much more!</p> 
Select what you would like to do: 
<form method = "POST" action="userselect.php">
  <input type="radio" id="list" name="userChoice" value="List">
  <label for="list">List all doctor information</label>
  <input type="radio" id="specialty" name="userChoice" value="Specialty">
  <label for="specialty">List all doctor information for specific specialty</label>
  <input type="radio" id="insert" name="userChoice" value="Insert">
  <label for="insert">Insert a new doctor</label>
  <input type="radio" id="delete" name="userChoice" value="Delete">
  <label for="insert">Delete an existing doctor</label>
  <input type="radio" id="assign" name="userChoice" value="Assign">
  <label for="insert">Assign a doctor to a patient</label><br><br>
  <input type="radio" id="pinfo" name="userChoice" value="pInfo">
  <label for="insert">View patient info for all patients treated by certain doctor</label>
  <input type="radio" id="hinfo" name="userChoice" value="hInfo">
  <label for="insert">View all hospital information for selected hospital</label>
  <input type="radio" id="beds" name="userChoice" value="Beds">
  <label for="insert">Update number of beds at a hospital</label><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
