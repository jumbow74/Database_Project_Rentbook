<?php
session_start();
include("include/config.inc.php");
//.enhanceWithin() chang html to form jQuery
if(isset($_POST['submit'])){
$snacks = $_POST['selectBookForBooking'];
// Note that $snacks will be an array.
foreach ($snacks as $s) {
  echo "$s<br/>";
}
}
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

function checkIDBookAlready() {
		//$("#loaderIcon").show();
		jQuery.ajax({
				url: "check_id_book.php",
				data:'id='+$("#username").val(),
				type: "POST",
				success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
		error:function (){}
	});
}

 $(function(){
	 
            $("#button_add_input_BookID").click(function(event){
				jQuery.ajax({
				url: "list_book.php",
				data:'id='+$("#username").val(),
				type: "POST",
				success:function(data){
			$("#add-fields-booking").append(data).enhanceWithin();
		},
		error:function (){}
	});

                
        });	
});

</script>
 
<title>NANA SARA : ศูนย์รวมความรู้</title>
</head>

<body>
<!-- Start tag page --->
<div data-role="page" id="foo">
<?php include("include/loginform.php");
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
    <ul>
       <?php include('include/list_navbar.php'); ?>
    </ul>
</div><!-- /navbar -->
	</div><!-- /header -->

	<div role="main" class="ui-content">
	
<td width="80%" class="ui-body ui-body-b ui-corner-all" align="center">
    <form method="post"  data-ajax='false' >
		<legend><b><h2>เลือกหนังสือที่จะคืน</h2></b></legend> 
		<b>ID Customer
		<input type="text" name="ID_customer" id="textinput-5" placeholder="ID-customer" value="" required >
		<input type="hidden" value="submit" name="submit"/>
		<input value="ยืนยัน" type="submit" name="Submit" >
	</form>
	
	
</td>
	<table width="80%" border="1" cellspacing="2" cellpadding="2" align="center" class="ui-body-d ui-shadow table-stripe ui-responsive"  bgcolor="#ffffff" data-column-btn-theme="b"  data-column-popup-theme="a">
			<div style="width:100%;">
				<FONT COLOR=red align="center" size = 14><B>คืนหนังสือ</B></FONT><br><br>
				<thead>
						<tr class ="ui-bar-b">
						<td><div align="center"><h3>ID</h3></div></td>
						<td><div align="center"><h3>BOOKNAME</h3></div></td>
						<td><div align="center"><h3>ISBN</h3></div></td>
						<td><div align="center"><h3>START_RENT</h3></div></td>
						<td><div align="center"><h3>END_RENT</h3></div></td>
						<td><div align="center"><h3>ID_EBOOK</h3></div></td>
						<td><div align="center"><h3>ID_CUSTOMER</h3></div></td>
						<td><div align="center"><h3>Edit</h3></div></td>
					</tr>
				</thead>
				<ul id="list" class="touch" data-role="listview" data-icon="false" data-split-icon="delete">
				<?PHP
				if(isset($_POST['Submit'])){
					$id_customer=$_POST['ID_customer'];
					$query = "SELECT * FROM AA_RENT R,AA_BOOK B WHERE B.ISBN=R.ISBN AND END_RENT IS NULL AND ID_CUSTOMER='".$id_customer."'";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					while ($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)) {?>
						<tr>
							<td><?=$row['ID']?></td>
							<td><?=$row['BOOKNAME']?></td>
							<td><?=$row['ISBN']?></td>
							<td><?=$row['START_RENT']?></td>
							<td><?=$row['END_RENT']?></td>
							<td><?=$row['ID_EBOOK']?></td>
							<td><?=$row['ID_CUSTOMER']?></td>
							<td align="center"><form name='edit' action='Delete_rent.php' method='post' >
														<input name='edit' type='submit' value="ลงวันที่คืน" onclick="return confirm('ยืนยันการคืน?');">
														<input name="edit_id" type="hidden" id="edit_id" value="<?=$row['ID']?>" >
												</form>
							</td>
		

					</tr>
					
				<?PHP
					}
				}
				if(isset($_POST['edit'])){
					$id = $_POST['edit_id'];
					$query = "UPDATE AA_RENT SET END_RENT = sysdate where ID='".$id."'" ;
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					$id_customer=$_POST['ID_customer'];
					$query = "SELECT B.REMAIN ,B.ISBN
							FROM AA_CUSTOMER C,AA_RENT R,AA_BOOK B 
							WHERE C.ID = R.ID_CUSTOMER AND B.ISBN=R.ISBN AND END_RENT IS NULL AND R.ID_CUSTOMER='".$id_customer."'";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					
					if($row_sta = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)){
						$sta = $row_sta['REMAIN'] + 1;
						$Isbn = $row_sta['ISBN'];
					};
					
					$upRemain = "UPDATE AA_BOOK SET REMAIN = '".$sta."' where ISBN = '".$Isbn."' ";
					$parseRequest = oci_parse($conn, $upRemain);
					oci_execute($parseRequest);
			}
				oci_close($conn);
				?>
				
			</div>
		</table></br>
<table width="100%">
<tr>

</td>

<td width="10%">
</td>
</tr>
</table>
    
        
        
        
        
	</div><!-- /content -->
</div><!-- End page -->

  
</body>
</html>