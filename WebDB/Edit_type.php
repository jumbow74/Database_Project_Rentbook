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
	<img src="http://demos.jquerymobile.com/1.4.5/_assets/img/jquery-logo.png" />
	<div style="float:right; bottom:0px;  width:50%;"><div style="bottom:0;position: absolute;width:50%;" >
<div align="right" style="height:100%;"><?php include("include/login_status.php"); ?></div></div></div>
	</div>
	<!-- End header image -->
	
	<div data-role="header">
		<div data-role="navbar">
				<?php include('include/list_navbar.php');?>
		</div><!-- /navbar -->
	</div><!-- /header -->
<div role="main" class="ui-content" align="center">
	<?PHP		
	if(isset($_POST['Edit']))
	{ 
		$name = trim($_POST['NAME_type']);
		$id = $_REQUEST['edit_id'];
		// แก้ไขข้อมูล
		$sql_edit = "UPDATE AA_TYPEBOOK SET NAME = '$name'  WHERE ID_TYPE = '$id'";
		$parseRequest = oci_parse($conn,$sql_edit);
		oci_execute($parseRequest);
		echo '<script>window.location = "type.php";</script>';
		
	//-->
	}
	if(isset($_POST['Back']))
	{ 
		echo '<script>window.location = "type.php";</script>';
	}

	//เรียกข้อมูลจาก รหัส มาแสดงใน textbox

	if($_REQUEST['edit_id'] != "")
	{
		$id = $_REQUEST['edit_id'];
		$sql_show = "select * from AA_TYPEBOOK where ID_TYPE = '$id'";
		$parseRequest = oci_parse($conn, $sql_show);
		oci_execute($parseRequest);
		$row_show = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
		echo '<script language="JavaScript">
					alert(\แก้ไขเสร็จสิ้น\');
				</script>';
	}
	?>
			
	<form action='Edit_type.php' method='post'>
		<table width="100%" >
			<tr align="center">
				<td width="20%">
				</td>
				<td width="60%" class="ui-body ui-body-a ui-corner-all" align="left" >
				<FONT align="center"><h1><B>EDIT TYPE</B></h1></FONT>
					<b>NAME TYPE
					<input type="text" name="NAME_type" id="textinput-5" placeholder="ชื่อประเภท" value="<?=$row_show['NAME']?>">
					<input name='Edit' type='submit' value='Edit Type'>
					<input name='Back' type='submit' value='Back'>
					<input name="edit_id" type="hidden" id="edit_id" value="<?=$_REQUEST['edit_id']?>">
					</td>
				<td width="20%">
				</td>
			</tr>
		</table>
	</form>
</div>
		
</div><!-- End page -->

	  
	</body>
	</html>