<?php
	$conn = new mysqli('123.231.45.58', 'Argyle2020', 'newTomYCdC@1234$$', 'billingsys');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>