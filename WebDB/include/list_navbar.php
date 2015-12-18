<?php
$type_select = array(0,0,0,0);

if(isset($selected_Type_Navbar)){
	
	if($selected_Type_Navbar=="Hot"){
		$type_select[3] = 1;
	}else if($selected_Type_Navbar=="Type"){
		$type_select[1] = 1;
	}else if($selected_Type_Navbar=="New"){
		$type_select[2] = 1;
	}else{
		$type_select[0] = 1;
	}
}
?>
 <ul >
        <li id='li_NavBar'><a href="index.php" <?php if($type_select[0]==1){echo " class=\"ui-btn-active\" "; } ?> data-ajax="false">Home</a></li>
        <li id='li_NavBar'><a href="#panelType" <?php if($type_select[1]==1){echo " class=\"ui-btn-active\" "; } ?> >ประเภทหนังสือ</a></li>
        <li id='li_NavBar'><a href="more.php?new" <?php if($type_select[2]==1){echo " class=\"ui-btn-active\" "; } ?> data-ajax="false">มาใหม่</a></li>
        <li id='li_NavBar'><a href="more.php?hot" <?php if($type_select[3]==1){echo " class=\"ui-btn-active\" "; } ?> data-ajax="false">Hot!</a></li>
		<?php  if(isset($_SESSION['Account_Admin'])){ if($_SESSION['Account_Admin']==true){ ?><li id='li_NavBar'><a href="#adminMode" data-ajax="false">Admin</a></li><?php } } ?>
        
 </ul>