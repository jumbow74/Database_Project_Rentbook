<ul data-role="listview" data-filter="true" data-filter-reveal="true" data-filter-placeholder="ค้นหารหัส ISBN หรือชื่อหนังสือ..." data-inset="true">


	<?php
		$query = "SELECT ISBN, BOOKNAME, REMAIN
		FROM AA_BOOK ";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		
		while($book = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)){
		echo '<li><label><input class="testt" name="selectBookForBooking" type="radio" value="'.$book['ISBN'].'">' .$book['ISBN'] .' , '.$book['BOOKNAME'] .' ,คงเหลือ  '.$book['REMAIN'] .' เล่ม</label></li>';
		}		
	?>
	
	
</ul>