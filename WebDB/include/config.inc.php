<?php
	// Create connection to Oracle
	$conn = oci_connect("system", "570323Nuch", "//localhost/XE" , "AL32UTF8");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;                                                                                                                                                                                                                
	}
?>