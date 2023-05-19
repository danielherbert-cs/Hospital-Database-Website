<?php
$userSelect = $_POST["userChoice"];
if ($userSelect == "List")
{
	include "docinfo.php";
}

else if ($userSelect == "Specialty")
{
	include "specialty.php";
}

else if ($userSelect == "Insert") {
	include "insert.php";
}

else if ($userSelect == "Delete") {
	include "delete.php";
}

else if ($userSelect == "Assign"){
	include "assign.php";
}	

else if	($userSelect ==	"pInfo"){
        include	"viewpinfo.php";
}

else if	($userSelect ==	"hInfo"){
        include	"viewhinfo.php";
}

else if	($userSelect ==	"Beds"){
        include	"numbeds.php";
}
?>
