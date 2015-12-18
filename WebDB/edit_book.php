<?PHP
	session_start();
	if($_SESSION['Account_Admin']== false){
		echo '<script>window.location = "index.php";</script>';
	}
	include("include/config.inc.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="style.css" />
	<script src="jquery-2.1.4.min.js"></script>
	<script src="jquery.mobile-1.4.5.min.js"></script>
 <script src="jquery.bxslider.min.js"></script>
<link href="jquery.bxslider.css" rel="stylesheet" />
<script src="jquery.bxslider.min.js"></script>
  

<title>NANA SARA : ศูนย์รวมความรู้</title>
</head>

<body>
<!-- Start tag page --->
<div data-role="page" id="foo">
<?php 
	include("include/loginform.php"); 
	include("include/admin_mode.php");
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
				<?php include('include/list_navbar.php');?>
		</div><!-- /navbar -->
	</div><!-- /header -->
		<div role="main" class="ui-content"><b><a href="index.php">Home</a> > แก้ไขหนังสือ</b>
	<div role="main" class="ui-content" align="center">
	<?PHP
	if(isset($_POST['delete'])){
		$id = $_POST['delete_id'];
		$query = "DELETE FROM AA_RENT WHERE ISBN = '$id'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		
		
		$query = "DELETE FROM AA_EACHBOOK WHERE ISBN = '$id'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		
		
		$query = "DELETE FROM AA_BOOK WHERE ISBN = '$id'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		
		
		
	}
	if(isset($_POST['update'])){
		$id = $_POST['update_id'];
		$query = "UPDATE AA_BOOK set  BOOKNAME = '".$_POST['name_book']."', PRICERENT ='".$_POST['price_book']."',  WRITER = '".$_POST['name_create_book']."', NUM_PAGE='".$_POST['num_book']."', DETAIL = '".$_POST['details_book']."' WHERE ISBN = '$id'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		
	}
	
?>
		<table width="80%" border="1" cellspacing="2" cellpadding="2" align="center" class="ui-body-d ui-shadow table-stripe ui-responsive"  bgcolor="#ffffff" data-column-btn-theme="b"  data-column-popup-theme="a">
			<div style="width:100%;">
				<FONT COLOR=red align="center" size = 14><B>แก้ไขหนังสือ</B></FONT><br><br>
				<thead>
					<tr class ="ui-bar-b">
					<td><div align="center"><h3>ISBN</h3></div></td>
					<td><div align="center"><h3>NAME BOOK</h3></div></td>
					<td><div align="center"><h3>Edit</h3></div></td>
					<td><div align="center"><h3>Delete</h3></div></td>
					</tr>
				</thead>
				<ul id="list" class="touch" data-role="listview" data-icon="false" data-split-icon="delete">
				<?PHP
					$query = "select * from AA_BOOK ORDER BY DATE_ADD ASC";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					while ($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)) {?>
						<tr>
							<td><?=$row['ISBN']?></td>
							<td><?=$row['BOOKNAME']?></td>
							<td align="center"><a href="edit_book.php?update_id=<?=$row['ISBN']?>" data-ajax="false" class="ui-btn ui-btn-icon-notext ui-corner-all ui-icon-gear"></a></td>
							<td align="center"><form name='delete' action='edit_book.php' method='post' >
														<input name='delete' type='submit' value="Delete" onclick="return confirm('ยืนยันการลบ?');">
														<input name="delete_id" type="hidden" id="edit_id" value="<?=$row['ISBN']?>">
												</form>
							</td>
		

						</tr>
				<?PHP
				}
				?>
				
			</div>
		</table></br>
		<?php
		if(isset($_GET['update_id'])){
					$up= trim($_GET['update_id']);
					$query = "select * from AA_BOOK where ISBN ='$up'";

					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					$data_edit = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
				
		?>
<form action='edit_book.php' method='POST' data-ajax='false' enctype="multipart/form-data" >
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
				<input type="text" value="<?=$data_edit['ISBN']?>" disabled >
				ชื่อหนังสือ
				<input type="text" name="name_book" id="name_book" placeholder="ชื่อหนังสือ" value="<?=$data_edit['BOOKNAME']?>" required data-clear-btn="true">
				ผู้แต่ง
				<input type="text" name="name_create_book" id="name_create_book" placeholder="ชื่อผู้แต่ง" value="<?=$data_edit['WRITER']?>" data-clear-btn="true" >
				ราต่อเล่ม
				<input type="text" name="price_book" id="price_book" placeholder="ขั้นต่ำ 1 บาท" value="<?=$data_edit['PRICERENT']?>" required >
				จำนวนหน้าทั้งหมด
				<input type="text" name="num_book" id="num_book" placeholder="จำนวนหน้า" value="<?=$data_edit['NUM_PAGE']?>" required >
				
				รายละเอียดหนังสือ
				<textarea cols="40" rows="8" name="details_book" id="details_book"><?=$data_edit['DETAIL']?></textarea>
				
			</td>	
				
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="hidden" value="update" name="update" >
				<input type="hidden" value="<?=$data_edit['ISBN']?>" name="update_id" >
				<input name='Comfirm' type='submit' class="ui-btn ui-btn-inline" value='ยืนยัน' id='submitButton' onclick="return confirm('ยืนยันการอัพเดท?');">
				
				</td>
			</tr>
			</table>
		</td></tr></table>
</form>
<?php
	}
?>
		</div>
	
	  
	</body>
	</html>