 
 <?php
 include 'config.inc.php';


 
 $query = "SELECT * FROM AA_TYPEBOOK";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
	
?>
<li data-role="list-divider">ประเภทหนังสือ</li>
<?php
		
		while($objResult = oci_fetch_array($parseRequest,OCI_BOTH)){
		
 ?>
     
     <li><a href="more.php?type_id=<?=$objResult['ID_TYPE']?>" data-ajax="false"><?=$objResult['NAME']?></a></li>
	 
<?php
		}

?>
     