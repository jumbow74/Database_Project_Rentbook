<?php
if(isset($_GET['id']))
{
	 if (is_numeric($_GET['id'])) {

     include('config.inc.php');
	$query = "SELECT Username FROM AA_CUSTOMER WHERE ID='".$_GET['id']."'";
	$parseRequest = oci_parse($conn, $query);
	oci_execute($parseRequest);
	$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);

	 if($row){
        echo '1';
		
    }
	 }
}
?>