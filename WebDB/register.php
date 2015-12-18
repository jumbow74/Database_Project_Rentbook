<?php
session_start();
include("/include/config.inc.php");

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
<!-- ajax uesrname-->
<script type="text/javascript">

	$(document).ready(function() {
		$('#submitButton').closest('.ui-btn').hide();
		var x_timer;    
		$("#textinput-7").keyup(function (e){
			
			clearTimeout(x_timer);
			var user_name = $(this).val();
			x_timer = setTimeout(function(){
				check_username_ajax(user_name);
			}, 1000);
		}); 

	function check_username_ajax(username){
    $("#user-result").html('<img src="images/ajax-loader.gif" />');
		$.post('include/username-checker.php', {'username':username}, function(data) {
		if(username!=''){
			if(data.length==0){
				$("#user-result").html('<img src="images/not-available.png" />');
				$('#ButtonSubmited').hide();
				$('#submitButton').closest('.ui-btn').hide();
			}else{
				$('#submitButton').closest('.ui-btn').show();
				$('#ButtonSubmited').show();
				 $("#user-result").html('<img src="images/available.png" />');
				 
			}
		}else{
				$("#user-result").html('<img src="images/not-available.png" />');
				$('#ButtonSubmited').hide();
				 $('#submitButton').closest('.ui-btn').hide();
			}
		 });
}
});
</script>
  

<script>
<!-- http://bxslider.com -->
$(document).ready(function(){
  $('.bxslider').bxSlider({
	  minSlides: 3,
  maxSlides: 5,
  slideWidth:350,
  slideMargin: 2  ,
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
<img src="images/logo.gif" />
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
	<?PHP
	if(isset($_POST['Comfirm'])){
		$FNAME = trim($_POST['FNAME']);
		$LNAME = trim($_POST['LNAME']);
		$Gender = trim($_POST['Gender']);
		$Birthday = trim($_POST['Birthday']);
		$EMAIL = trim($_POST['EMAIL']);
		$PHONE = trim($_POST['PHONE']);
		$ADDRESS = trim($_POST['ADDRESS']);
		$USERNAME = trim($_POST['USERNAME']);
		$PASSWORD = trim($_POST['PASSWORD']);
		$COMPass = trim($_POST['COMPass']);
		$SSN = trim($_POST['SSN']);
		if("$FNAME" == "" ||"$LNAME" == "" || "$ADDRESS" == "" ||"$PHONE" == "" ||"$Birthday" == "" ||"$Gender" == "" ||"$EMAIL" == "" ||"$USERNAME" == "" ||"$PASSWORD" == "" ||"$COMPass" == ""){
			echo "***DATA INCOMPLETE";
		}
		else{
			if($PASSWORD == $COMPass){
				
					$query = "INSERT INTO AA_customer(ID, FNAME,LNAME,ADDRESS,TEL,BIRTHDAY,GENDER,E_MAIL,USERNAME,PASSWORD,ACCOUNT_ADMIN) 
						VALUES('$SSN', '$FNAME', '$LNAME', '$ADDRESS', '$PHONE', TO_DATE ('".$Birthday."', 'YYYY-MM-DD'), '$Gender', '$EMAIL', '$USERNAME', '$PASSWORD', '0')";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
				
			}
			else{
				echo "***Comfirm PASSWORD not match!!";
			}
		}
	};
	oci_close($conn);
?>
<form action='register.php' method='POST' data-ajax='false' >
		<table border="0" width="100%" >
		<tr valign="top">
		<td width="20%" >
		</td>
		<td align="left" width="60%" class="ui-body ui-body-a ui-corner-all">
			<h2>REGISTER</h2>
			<table border="0" width="100%">
			<tr>
				<td>FirstName
				<input type="text" name="FNAME" id="textinput-1" placeholder="FirstName" value="">
				</td>
				<td>LastName
				<input type="text" name="LNAME" id="textinput-2" placeholder="LastName" value="">
				</td>
			</tr>
			<tr>
			<td>
			เลขบัตรประชาชน
				<input type="text" name="SSN" id="date-2" value="" required >
			Gender
				<fieldset data-role="controlgroup" data-type="horizontal">
	   			 	<label for="select-native-11">Select A</label>   
				 	<select name="Gender" id="select-native-11">
				        <option value="Male">Male</option>
				        <option value="Female">Female</option>
				    </select>
				</fieldset>
				Birthday
				<input type="date" data-clear-btn="true" name="Birthday" id="date-2" value="" placeholder="ปี-เดือน-วัน">
				E-mail
				<input type="text" name="EMAIL" id="textinput-4" placeholder="E-mail" value="">
				Phone
				<input type="text" name="PHONE" id="textinput-5" placeholder="08x-xxxxxxx" value="">
				Address
				<input type="text" name="ADDRESS" id="textinput-6" placeholder="Address" value="">
				Username
				<div width="100%"><input type="text" name="USERNAME" id="textinput-7" placeholder="Username" value="">
				
				Password
				<input type="password" name="PASSWORD" id="textinput-8" placeholder="Password" value="">
				Comfirm Password
				<input type="password" name="COMPass" id="textinput-9" placeholder="Comfirm Password" value="">
			</td>	
				<td><br><br><br><br><br><br><br><br><br><br><br><br><div id="user-result" ></div></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<div id='ButtonSubmited'>
				<input name='Comfirm' type='submit' class="ui-btn ui-btn-inline" value='ยืนยัน' id='submitButton'>
				</div>
				</td>
			</tr>
			</table>
		</td></tr></table>
</form>
</div><!-- /content -->



  
</body>
</html>