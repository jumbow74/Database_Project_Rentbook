<?php
session_start();
include("include/config.inc.php");



?>
	<?php
	if(isset($_GET['new'])){
	$Type = "หนังสือมาใหม่";
	$selected_Type_Navbar = "New";
	}else if(isset($_GET['hot'])){
	$Type = "หนังสือมาแรง!";
	$selected_Type_Navbar = "Hot";
	}else if(isset($_GET['type_id'])){
		$type_id = $_GET['type_id'];
		$query = 'SELECT NAME FROM  AA_TYPEBOOK where ID_TYPE = '.$type_id;
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
		if($row){
			$Type = $row['NAME'];
		}else{
			 header( "location: more.php?type_id=1" );
		}
		$selected_Type_Navbar = "Type";
	}else{
		$Type = "หนังสือมาใหม่";
		$selected_Type_Navbar = "New";
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
  

<title>ประเภท :  <?=$Type?></title>
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
	<div role="main" class="ui-content"><b><a href="index.php" data-ajax="false">Home</a> > <?php echo $Type; ?></b>
	<h3 class="ui-bar ui-bar-b ui-corner-all"><?php echo $Type; ?></h3>
	<div style="width:100%;">
	<div id="box_preview">
	<?php
	if(isset($_GET['new'])){
		$query = "SELECT * FROM (SELECT ISBN , BOOKNAME , WRITER , PRICERENT FROM AA_BOOK order by DATE_ADD desc) where ROWNUM <=20";
	}else if(isset($_GET['hot'])){
		$query = " SELECT ISBN , BOOKNAME , WRITER , PRICERENT FROM AA_BOOK B
where B.ISBN in (select * from ( select * from (select  ISBN from AA_EACHBOOK  group by ISBN order by MAX(STATISTICBOOK) desc) WHERE ROWNUM <= 20  )  ) ";
	}else if(isset($_GET['type_id'])){
		$query = 'SELECT ISBN , BOOKNAME , WRITER , PRICERENT  FROM  AA_BOOK where ID_TYPE = '.$type_id.' order by DATE_ADD ';
	}else{
		$query = "SELECT * FROM (SELECT ISBN , BOOKNAME , WRITER , PRICERENT FROM AA_BOOK order by DATE_ADD desc) where ROWNUM <=20";
	}
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		$i = 1;
		while($objResult = oci_fetch_array($parseRequest,OCI_BOTH)){
	?>
					
					<div id="box">
					<a href="book.php?id=<?=$objResult['ISBN']?>"  data-ajax="false"><img src="CoverBook/<?=$objResult['ISBN']?>.jpg" width="80%" height="auto"></a>
					<div id="details">
					<?=$objResult['BOOKNAME']?><br>
					<font size="2"><?=$objResult['WRITER']?><br>
					ราคายืม/วัน  <?=$objResult['PRICERENT']?> บาท</font>
					</div>
					</div>

					
		<?php
		
		if(($i%4)==0){
			echo '<div style="width:1px;height:50px;"></div>';
			$i = 1;
		}
		$i++;
		}
?>		
					
					
					
					
					
					
					</div>
		
	</div><!-- /content -->

	
</div><!-- End page -->

  
</body>
</html>