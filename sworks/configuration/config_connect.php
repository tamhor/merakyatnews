<?php

error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "localhost";
$username = "karyanto_all";
$password = "wasalam123X";
$dbname="karyanto_rentalin";

      $koneksi = mysql_connect('localhost', 'karyanto_all', 'wasalam123X');
        $db = mysql_select_db('karyanto_rentalin');

	// Create connection
	global $conn;
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>
