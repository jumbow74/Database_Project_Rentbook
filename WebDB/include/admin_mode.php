<?php
if(isset($_SESSION['Account_Admin'])){
 if($_SESSION['Account_Admin']==true){
	
 ?>
<!-- panel right -->
<script type="text/javascript">

	$(document).ready(function() {
		$('#bt_status_booking').closest('.ui-btn').hide();
		var x_timer;    
		$("#search_ID").keyup(function (e){
			
			clearTimeout(x_timer);
			var user_name = $(this).val();
			x_timer = setTimeout(function(){
				check_id_ajax(user_name);
			}, 500);
		}); 

	function check_id_ajax(username){
		$.get('include/id-checker.php', {'id':username}, function(data) {
		if(username!=''){
			if(data.length==0){
				$('#bt_status_booking').hide();
				$('#status_booking').closest('.ui-btn').hide();
			}else{
				$('#bt_status_booking').closest('.ui-btn').show();
				$('#status_booking').show();				 
			}
		}else{

				$('#bt_status_booking').hide();
				 $('#status_booking').closest('.ui-btn').hide();
			}
		 });
}
});
</script>
<div data-role="panel" id="adminMode" data-position="right" data-display="push">
	
    <ul data-role="listview">
     <li data-role="list-divider">Admin Mode</li>
    <li><form methode="get" action="booking.php?search_ID=<?=$_SESSION['ID']?>" data-ajax="false"><input type="text" name="search_ID" id="search_ID" placeholder="ค้นหาไอดี" /><div id="status_booking"><button class="ui-btn ui-shadow ui-corner-all ui-icon-search" id="bt_status_booking">จอง</button></div></form></li>
    
    <li><a href="addBooking.php" data-ajax='false'>เพิ่มหนังสือใหม่</a></li>
<li><a href="register.php" data-ajax='false'>เพิ่มผู้ใช้ใหม่</a></li>
	<li><a href="edit_book.php" data-ajax='false'>แก้ไขหนังสือ</a></li>
    <li><a href="type.php" data-ajax="false">เพิ่มหรือแก้ไขประเภทหนังสือ</a></li>
	<li><a href="company.php" data-ajax="false">เพิ่มหรือแก้ไขบริษัทที่จัดซื้อ</a></li>
	<li><a href="chart.php" data-ajax="false">สถิติของเดือนนี้</a></li>
     
   	<li><button class="ui-btn ui-corner-all" data-rel="close" >ปิดแท็บ</button></li>
    </ul>
   

</div><!-- /panel -->
<?php
 }
}
 
?>