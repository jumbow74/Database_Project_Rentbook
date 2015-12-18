<?php
session_start();
include("include/config.inc.php");
if($_SESSION['Account_Admin']== false){
		echo '<script>window.location = "index.php";</script>';
	}
	$query = "SELECT Username FROM AA_CUSTOMER WHERE ID='".$_GET['search_ID']."'";
	$parseRequest = oci_parse($conn, $query);
	oci_execute($parseRequest);
	$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);

	 if(!$row){
		 echo '<script>window.location = "index.php";</script>';
	 }
//.enhanceWithin() chang html to form jQuery
if(isset($_POST['submit'])){
$snacks = $_POST['selectBookForBooking'];
// Note that $snacks will be an array.
}
?>
<?PHP

				if(isset($_POST['edit'])){
					$id = $_POST['edit_id'];
					$query = "UPDATE AA_RENT SET END_RENT = sysdate where ID='".$id."'" ;
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					
					$id_customer=$_GET['search_ID'];
					$query = "SELECT B.REMAIN as BREMAIN ,B.ISBN as BISBN , R.ID_EBOOK as IDEACHBOOK , R.START_RENT as SRENT , B.PRICERENT as BPRICERENT
							FROM AA_CUSTOMER C,AA_RENT R,AA_BOOK B 
							WHERE C.ID = R.ID_CUSTOMER AND B.ISBN=R.ISBN and R.ID='".$id."' AND R.ID_CUSTOMER='".$id_customer."'";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					
					$sum_bath = 0;
					if($row_sta = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)){
						$sta = $row_sta['BREMAIN'] + 1;
						$Isbn = $row_sta['BISBN'];
						$IDEACHBOOK =  $row_sta['IDEACHBOOK'];
						
						
					$query = "select trunc(sysdate) - to_date('".$row_sta['SRENT']."', 'DD-MM-YY') as DAYS from dual ";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					$days = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
					if($days['DAYS']>0){
					$sum_bath = $row_sta['BPRICERENT'] * ($days['DAYS']+1);
					}else{
						$sum_bath = $row_sta['BPRICERENT'];
					}
					
						$upStatus = "UPDATE AA_EACHBOOK SET STATUSBOOK = '1' where ID = '".$IDEACHBOOK."' ";
					$parseRequest = oci_parse($conn, $upStatus);
					oci_execute($parseRequest);
					
						// echo '<script>alert("'.$sta.' และ  '.$Isbn.'"); </script>';
					}
					
					$upRemain = "UPDATE AA_BOOK SET REMAIN = '".$sta."' where ISBN = '".$Isbn."' ";
					$parseRequest = oci_parse($conn, $upRemain);
					oci_execute($parseRequest);
					
					
					
					
					
					
					 echo '<script>alert("คืนหนังสือสำเร็จ โดยมีจำนวนเงินที่ต้องจ่าย '.$sum_bath.' บาท"); window.location="booking.php?search_ID='.$_GET['search_ID'].'";</script>';
			}
				oci_close($conn);

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
  
<title>NANA SARA : ศูนย์รวมความรู้</title>
</head>

<body>
<!-- Start tag page --->
<div data-role="page" id="foo">
<?php include("include/loginform.php");
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
    
       <?php include('include/list_navbar.php'); ?>
   
</div><!-- /navbar -->
	</div><!-- /header -->

	<div role="main" class="ui-content">

<table width="100%">
<tr>
<td width="20%">
<?php
    if(isset($_POST['selectBookForBooking'])&&isset($_POST['submit'])){
		$num = $_POST['num'];
		if(is_numeric($num)){
		$ISBN = $_POST['selectBookForBooking'];
		$query = "SELECT REMAIN, ID, STATISTICBOOK FROM AA_BOOK B, AA_EACHBOOK E WHERE E.STATUSBOOK='1' AND B.ISBN ='$ISBN' AND B.ISBN=E.ISBN";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
		if($row['REMAIN']>=$num){
		
		for($i=0;$i < $num;$i++){
			//Query each book
			$query = "SELECT  ID,STATISTICBOOK FROM AA_EACHBOOK WHERE STATUSBOOK='1' AND ISBN ='$ISBN'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		$eachbook = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
			
		//up date stat each book
			$sta = $eachbook['STATISTICBOOK'] + 1;
		$query = "UPDATE AA_EACHBOOK SET STATISTICBOOK='".$sta."',STATUSBOOK='0' where ID = ".$eachbook['ID']."";
			$parseRequest = oci_parse($conn, $query);
			oci_execute($parseRequest);
			
			
			$query = "INSERT INTO AA_RENT(ID, START_RENT, ISBN, ID_EBOOK, ID_CUSTOMER) VALUES(id_rent_seq.nextval, sysdate, '".$ISBN."', '".$eachbook['ID']."' ,'".$_GET['search_ID']."' ) ";
			
			$parseRequest = oci_parse($conn, $query);
			oci_execute($parseRequest);
			
			//Then update eachbook status to 0 , mean you can not reserved that book now
			
			
		}
		
			$sta = $row['REMAIN'] - $num;
			$query = "UPDATE AA_BOOK SET REMAIN='".$sta."'  where ISBN = ".$ISBN." ";
			$parseRequest = oci_parse($conn, $query);
			oci_execute($parseRequest);
			
			
			
			

		echo '<script>alert("จองสำเร็จ");</script>';
	}else{
		echo '<script>alert("จองไม่สำเร็จ");</script>';
	}
		}else{
			echo '<script>alert("กรุณาใส่จำนวนหนังสือที่ยืมเป็นตัวเลข");</script>';
		}
		
    }else if(isset($_POST['submit'])){
		echo '<script>alert("กรุณาเลือกหนังสือ");</script>';
	}
?>


</td>
<td width="80%" class="ui-body ui-body-a ui-corner-all" align="center">
    <form method="post"  data-ajax='false' action="booking.php?search_ID=<?=$_GET['search_ID']?>">
	<legend><b><h2>เลือกหนังสือที่จะยืม</h2></b></legend> 
	<?php include("include/list_book.php") ?>
	<label>จำนวนเล่ม : 
	<input type="input" name="num" placeholder="ใส่จำนวน"/ required></label> 
	<input type="hidden" value="submit" name="submit"/>
	
	<input value="ยืนยัน" type="submit" onclick="return confirm('ยืนยันการจอง?');" >
	</form>
</td>
<td width="10%">
</td>
</tr>
</table>
    <br>
	
        <!-- New added -->

	<table width="80%" border="1" cellspacing="2" cellpadding="2" align="center" class="ui-body-d ui-shadow table-stripe ui-responsive"  bgcolor="#ffffff" data-column-btn-theme="b"  data-column-popup-theme="a">
			<div style="width:100%;">
				<center><FONT COLOR=red align="center" size = 14><B>คืนหนังสือ</B></FONT></center><br><br>
				<thead>
						<tr class ="ui-bar-b">
						<td><div align="center"><h3>No. Book</h3></div></td>
						<td><div align="center"><h3>ISBN</h3></div></td>
						<td><div align="center"><h3>BOOKNAME</h3></div></td>
						<td><div align="center"><h3>START_RENT</h3></div></td>	
						<td><div align="center"><h3>Edit</h3></div></td>
					</tr>
				</thead>
				<ul id="list" class="touch" data-role="listview" data-icon="false" data-split-icon="delete">
				<?PHP
				
					$id_customer=$_GET['search_ID'];
					$query = "SELECT R.ID_EBOOK , B.BOOKNAME, B.ISBN ,R.START_RENT,R.ID as RID  FROM AA_RENT R,AA_EACHBOOK EB,AA_BOOK B WHERE EB.ID=R.ID_EBOOK AND R.END_RENT IS NULL AND R.ID_CUSTOMER='".$_GET['search_ID']."' and EB.ISBN = B.ISBN order by EB.ID desc";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					while ($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)) {?>
						<tr>
							<td><center><?=$row['ID_EBOOK']?></center></td>
							<td><center><?=$row['ISBN']?></center></td>
							<td><?=$row['BOOKNAME']?></td>
							<td><center><?=$row['START_RENT']?></center></td>
							<td align="center"><form name='edit' action='booking.php?search_ID=<?=$_GET['search_ID']?>' method='post' data-ajax="false" >
														<input name='edit' type='submit' value="ลงวันที่คืน" onclick="return confirm('ยืนยันการคืน?');">
														<input name="edit_id" type="hidden" id="edit_id" value="<?=$row['RID']?>" >
												</form>
							</td>
		

					</tr>
					
					<?php
					}
					
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