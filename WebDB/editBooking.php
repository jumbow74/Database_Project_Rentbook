<?php
session_start();
if($_SESSION['Account_Admin']== false){
		echo '<script>window.location = "index.php";</script>';
	}

include('/include/config.inc.php');

$selected_Type_Navbar = "Home";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="style.css" />
	<script src="jquery-2.1.4.min.js"></script>
	<script src="jquery.mobile-1.4.5.min.js"></script>
 <script src="jquery.bxslider.min.js"></script>
<link href="jquery.bxslider.css" rel="stylesheet" />
<script src="jquery.bxslider.min.js"></script>



<title>เพิ่มหนังสือ</title>
</head>

<body>
<?php
if(isset($_POST['Comfirm'])){
	echo "test";
	$query = "INSERT INTO AA_BOOK (ISBN, BOOKNAME, PRICERENT, TOTAL, REMAIN, ID_TYPE, ID_COMPANY, WRITER, NUM_PAGE, DETAIL) VALUES ('".$_POST['isbn_book']."', '".$_POST['name_book']."', '".$_POST['price_book']."', '".$_POST['number_book']."', '".$_POST['price_book']."', '".$_POST['type_book']."', '".$_POST['company_book']."', '".$_POST['name_create_book']."', '".$_POST['num_book']."' , '".$_POST['details_book']."')";
	$parseRequest = oci_parse($conn, $query);
	if(oci_execute($parseRequest)){
	$i=0;
	while($i<$_POST['number_book']){
	$query = "INSERT INTO AA_EACHBOOK (ID, STATUSBOOK, STATISTICBOOK, ISBN) VALUES (id_eachbook_seq.nextval, 'avaliable', '0', '".$_POST['isbn_book']."')"; 
	$parseRequest = oci_parse($conn, $query);
	oci_execute($parseRequest);
	$i++;
	}

		$target_dir = "CoverBook/";
		$target_file = $target_dir . $_POST['isbn_book'].".jpg";
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	 if (move_uploaded_file($_FILES["cover_book"]["tmp_name"], $target_file)) {
?>
<script language="JavaScript">
			alert('เพิ่มหนังสือเรียบร้อยแล้ว!!');

</script>
	 <?php

    } else {
		?>
		<script language="JavaScript">
			alert('ไม่สามารถเพิ่มหนังสือได้');
</script>
		<?php
       
    }
	
}else{
	?>
		<script language="JavaScript">
			alert('ไม่สามารถเพิ่มหนังสือได้ กรุณาเช็คข้อมูลอีกครั้ง');
</script>
		<?php
}
}

?>
<!-- Start tag page --->
<div data-role="page" id="foo">
<?php 
include("include/loginform.php");
include 'include/admin_mode.php' ;
?>
<!-- panel left -->
<div data-role="panel" id="panelType" data-position="left" data-display="push">
	
    <ul data-role="listview">
   <?php include('include/list_slidebar.php'); ?>
   	<li><button class="ui-btn ui-corner-all" data-rel="close" >ปิดแท็บ</button></li>
    </ul>
   

</div><!-- /panel -->

<!-- Header image --->
<div data-role="header">
<img src="images/logo.png" />
<div style="float:right; bottom:0px;  width:50%;"><div style="bottom:0;position: absolute;width:50%;" >
<div align="right" style="height:100%;"><?php include("include/login_status.php"); ?></div></div></div>
</div>
<!-- End header image -->

	<div data-role="header">
		<div data-role="navbar">
    
        <?php include 'include/list_navbar.php' ; ?>
    
</div><!-- /navbar -->
	</div><!-- /header -->

	<div role="main" class="ui-content" >

<form action='addBooking.php' method='POST' data-ajax='false' enctype="multipart/form-data" >
		<table border="0" width="100%" >
		<tr valign="top">
		<td width="20%" >
		</td>
		<td align="left" width="60%" class="ui-body ui-body-a ui-corner-all">
			<h2>เพิ่มหนังสือ</h2>
			<table border="0" width="100%">
			<tr>
			<td>
			
				รหัส ISBN
				<input type="date" data-clear-btn="true" name="isbn_book" id="isbn_book" value="" placeholder="xxx-x-xxxxx-xxx-x " required >
				ชื่อหนังสือ
				<input type="text" name="name_book" id="name_book" placeholder="ชื่อหนังสือ" value="" required data-clear-btn="true">
				ผู้แต่ง
				<input type="text" name="name_create_book" id="name_create_book" placeholder="ชื่อผู้แต่ง" value="" required data-clear-btn="true" >
				หมวดหนังสือ
				<fieldset data-role="controlgroup" data-type="horizontal">
	   			  
				 	<select name="type_book" id="select-native-11" >
				 <option >เลือกหมวดหนังสือ</option>
				<?php
				$query = "SELECT * FROM AA_TYPEBOOK ";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		
		while($objResult = oci_fetch_array($parseRequest,OCI_BOTH)){
				?>
				        <option value="<?=$objResult['ID_TYPE']?>"><?=$objResult['NAME']?></option>
				<?php
		}
				?>
				    </select>
				</fieldset>
				
				อัพโหลดปกหนังสือ
				<input name="cover_book" id="cover_book" value="" type="file" data-clear-btn="true">
				จำนวนเล่ม
				<input type="text" name="number_book" id="number_book" placeholder="ขั้นต่ำ 1  เล่ม" value="" required >
				ราต่อเล่ม
				<input type="text" name="price_book" id="price_book" placeholder="ขั้นต่ำ 1 บาท" value="" required >
				จำนวนหน้าทั้งหมด
				<input type="text" name="num_book" id="num_book" placeholder="จำนวนหน้า" value="" required >
				บริษัทที่จัดซื้อ
				<fieldset data-role="controlgroup" data-type="horizontal"  >
				 	<select name="company_book" id="select-native-11" >
				<option >เลือกบริษัทที่จัดซื้อ</option>
				        <?php
				$query = "SELECT * FROM AA_COMPANY ";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		
		while($objResult = oci_fetch_array($parseRequest,OCI_BOTH)){
				?>
				        <option value="<?=$objResult['ID_COMPANY']?>"><?=$objResult['NAME']?></option>
				<?php
		}
				?>
				    </select>
				</fieldset>
				รายละเอียดหนังสือ
				<textarea cols="40" rows="8" name="details_book" id="details_book"></textarea>
				
			</td>	
				
			</tr>
			<tr>
				<td colspan="2" align="center">
				
				<input name='Comfirm' type='submit' class="ui-btn ui-btn-inline" value='ยืนยัน' id='submitButton' onclick="return confirm('ยืนยันการเพิ่ม?');">
				
				</td>
			</tr>
			</table>
		</td></tr></table>
</form>
</div><!-- /content -->



  
</body>
</html>