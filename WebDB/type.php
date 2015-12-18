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
		<div role="main" class="ui-content"><b><a href="index.php">Home</a> > เพิ่มหรือแก้ไขประเภทหนังสือ</b>
	<div role="main" class="ui-content" align="center">
	<?PHP
	if(isset($_POST['ADD_TYPE'])){
		$NAME = trim($_POST['NAME']);
		if("$NAME" == ""){
			echo '<script language="JavaScript">
					alert(\'กรุณากรอกฟิลด์ให้ครบ\');
				</script>';
		}
		else{
				
					$query = "INSERT INTO AA_TYPEBOOK VALUES(type_book_seq.nextval, '$NAME')";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
				
		}
	};
	if(isset($_POST['delete'])){
		$id = $_POST['delete_id'];
		echo $id;
		$query = "DELETE FROM AA_TYPEBOOK WHERE ID_TYPE = '$id'";;
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		echo '<script language="JavaScript">
					alert(\'ลบประเภทสำเร็จ\');
				</script>';
		
	}
?>
		<table width="80%" border="1" cellspacing="2" cellpadding="2" align="center" class="ui-body-d ui-shadow table-stripe ui-responsive"  bgcolor="#ffffff" data-column-btn-theme="b"  data-column-popup-theme="a">
			<div style="width:100%;">
				<FONT COLOR=red align="center" size = 14><B>ประเภทหนังสือ</B></FONT><br><br>
				<thead>
					<tr class ="ui-bar-b">
					<td><div align="center"><h3>ID</h3></div></td>
					<td><div align="center"><h3>NAME TYPE</h3></div></td>
					<td><div align="center"><h3>Edit</h3></div></td>
					<td><div align="center"><h3>Delete</h3></div></td>
					</tr>
				</thead>
				<ul id="list" class="touch" data-role="listview" data-icon="false" data-split-icon="delete">
				<?PHP
					$query = "select * from AA_TYPEBOOK ORDER BY ID_TYPE desc";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					while ($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)) {?>
						<tr>
							<td><?=$row['ID_TYPE']?></td>
							<td><?=$row['NAME']?></td>

							<td align="center"><a href="Edit_type.php?edit_id=<?=$row['ID_TYPE']?>" data-ajax="false" class="ui-btn ui-btn-icon-notext ui-corner-all ui-icon-gear"></a></td>
							<td align="center"><form name='delete' action='type.php' method='post' data-ajax="false">
														<input name='delete' type='submit' value="Delete" onclick="return confirm('ยืนยันการลบ?');">
														<input name="delete_id" type="hidden" id="edit_id" value="<?=$row['ID_TYPE']?>">
												</form>
							</td>
		

						</tr>
				<?PHP
				}
				oci_close($conn);
				?>
				
			</div>
		</table></br>
		<form action='type.php' method='post' data-ajax='false'>
			<table width="100%">
				<tr align="center">
					<td width="20%">
					</td>
					<td width="60%" class="ui-body ui-body-a ui-corner-all" align="left" >
							<b>ชื่อประเภท
							<input type="text" name="NAME" id="textinput-5" placeholder="ชื่อประเภท" value="" required >
							
						<input name='ADD_TYPE' type='submit' value='ADD Company'>
					</td>
					<td width="20%">
					</td>
				</tr>
			</table>
		</form>
		</div>
	
	  
	</body>
	</html>