<?php
//-----------Database Connection--------
session_start();
$count = 0;
// connecto database

$title = "Index";
require_once "./template/header.php";
require_once "./functions/database_functions.php";
$conn = db_connect();

if(isset($_GET["map"])) {
	$m = $_GET["m"];
	$terms = explode(" ",$m);
	$i = 0;
	$queryMap = "SELECT * FROM map WHERE";

	foreach($terms as $each) {
		if($i==0) {
		 	$queryMap .= " keywords LIKE '%$each%'";
			$i++;
		}

		if($i > 0) {
			$queryMap .= " OR keywords LIKE '%$each%' ";
		}
	}//-------for loop-------

	$resultMap = mysqli_query($conn,$queryMap);
	if($resultMap) {
		while($row = mysqli_fetch_assoc($resultMap)) {
			$lat = $row["lat"];
			$long = $row["lng"];
			$bookstore = $row["title"];
		}
	}
}//---if(isset($_GET["map"]))---------

else {
	$lat = 23.8152;
	$long = 90.4255;
	$bookstore = "NSU Book Shop";
}
?>
