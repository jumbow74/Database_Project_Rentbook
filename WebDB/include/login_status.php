 <?php
	include("include/config.inc.php");
	if(isset($_SESSION['ID'])){
		
 ?>
ยินดีต้อนรับ <a href="profile.php" data-ajax="false" ><?=$_SESSION['FNAME']?> <?=$_SESSION['LNAME']?></a> , <a data-ajax="false" href="include/logout.php">ออกจากระบบ</a>

<?php	
	
			}else{

?>


ยินดีต้อนรับ ผู้เยี่ยมชม, <a href="#popupLogin"  data-rel="popup"  data-position-to="window" data-transition="pop" >ล็อคอิน</a>

<?php

	}
?>