<?PHP
	session_start();
	// Create connection to Oracle
	$conn = oci_connect("system", "570323Nuch", "//localhost/XE", "UTF8");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		echo "No";
		exit;
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />

	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
 <script src="jquery.bxslider.min.js"></script>
<link href="jquery.bxslider.css" rel="stylesheet" />
<script src="jquery.bxslider.min.js"></script>
  

<script>
<!-- http://bxslider.com -->
$(document).ready(function(){
  $('.bxslider').bxSlider({
	  minSlides: 3,
  maxSlides: 4,
  slideWidth: 450,
  slideMargin: 10  ,
  captions: true,
  auto: true
  });
});
</script>
 
<title>Untitled Document</title>
</head>

<body>
<!-- Start tag page --->
<div data-role="page" id="foo">
<!-- panel left -->
<div data-role="panel" id="panelType" data-position="left" data-display="push">
    <ul data-role="listview">
    <li><a href="#test">Test</a></li>
    <button class="ui-btn ui-corner-all" data-rel="close" >Close</button>
    </ul>
   

</div><!-- /panel -->

<!-- Header image --->
<div data-role="header">
<img src="http://demos.jquerymobile.com/1.4.5/_assets/img/jquery-logo.png" />
<div style="float:right; bottom:0px;  width:50%;"><div style="bottom:0;position: absolute;width:50%;" >
<div align="right" style="height:100%;">ยินดีต้อนรับ xxxxxxxx</div></div></div>
</div>
<!-- End header image -->

	<div data-role="header">
		<div data-role="navbar">
    <ul>
        <li><a href="#" class="ui-btn-active">Home</a></li>
        <li><a href="#panelType">ประเภทหนังสือ</a></li>
        <li><a href="#">มาใหม่</a></li>
        <li><a href="#">Hot!</a></li>
        <li></li>
    </ul>
</div><!-- /navbar -->
	</div><!-- /header -->

<div role="main" class="ui-content">
    <div style="width:100%;" >
		<table width="100%" border="0">
				<tr>
				<td width="40%" align="center"><img src="images/p3.jpg" title="Name" width="250" height="300" /><br/><br/>ID : 560610xxx</td>
				<td width="90%" class="ui-body ui-body-a ui-corner-all"><FONT COLOR=red><h2>Profile</h2></FONT>
				<?PHP
							$query = "SELECT * FROM AA_CUSTOMER WHERE username='Nuchy' and password='123456'";
							$parseRequest = oci_parse($conn, $query);
							oci_execute($parseRequest);
							// Fetch each row in an associative array
							$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);?>
							
					<p>Name : <?=$row['FNAME']?> <?=$row['LNAME']?> <br/><br/>
					Address : <?=$row['ADDRESS']?><br/><br/>
					Phone : <?=$row['TEL']?> <br/><br/>
					 Birthday : <?=$row['BIRTHDAY']?><br/><br/>
					 Gender : <?=$row['GENDER']?><br/><br/>
					 E-mail : <?=$row['E_MAIL']?><br/><br/><br/>
					</p>
				<?	
					oci_close($conn);
				?>
				</td>
				</tr>
		</table>
			<!-- /content -->
		<table width="80%" border="1" cellspacing="2" cellpadding="2" align="center" class="ui-body-d ui-shadow table-stripe ui-responsive" data-column-btn-theme="b"  data-column-popup-theme="a">
			<div style="width:100%;">
				<FONT COLOR=red align="center" size = 14><B>COMPANY</B></FONT><br><br>
				<thead>
					<tr class ="ui-bar-b">
					<td><div align="center"><h3>No.</h3></div></td>
					<td><div align="center"><h3>Book Title</h3></div></td>
					<td><div align="center"><h3>Start Rent</h3></div></td>
					<td><div align="center"><h3>End Rent</h3></div></td>
					<td><div align="center"><h3>Status Book</h3></div></td>
					</tr>
				</thead>
				<ul id="list" class="touch" data-role="listview" data-icon="false" data-split-icon="delete">
				<?PHP
					$query = "SELECT R.ID,B.BOOKNAME,R.START_RENT,R.END_RENT,EB.STATUSBOOK
							from AA_RENT R,AA_BOOK B,AA_EACHBOOK EB,AA_CUSTOMER C 
							WHERE R.ID_CUSTOMER = '100' AND R.ID_CUSTOMER = C.ID AND R.ID_EBOOK = EB.ID AND R.ISBN = B.ISBN
							ORDER BY R.ID ASC";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					while ($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)) {?>
						<tr>
							<td><?=$row['ID']?></td>
							<td><?=$row['BOOKNAME']?></td>
							<td><?=$row['START_RENT']?></td>
							<td><?=$row['END_RENT']?></td>
							<td><?=$row['STATUSBOOK']?></td>
						</tr>
				<?PHP
					}
					oci_close($conn);
				?>
					
			</div>
		</table></br>
		<form action='index.php' method='post'>
			<table width="100%">
				<tr align="center">
					<td width="20%">
					</td>
					<td width="60%" class="ui-body ui-body-a ui-corner-all" align="left" >

						<input name='Back' type='submit' value='Back'>
						
					</td>
					<td width="20%">
					</td>
					</tr>
				</table>
			</form>
		<div data-role="footer">
			<h4>Page Footer</h4>
		</div><!-- /footer -->
	</div><!-- End page -->
</div>
</body>
</html>