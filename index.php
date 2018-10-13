<?php
include_once('header.php');


$connect=mysqli_connect('localhost','superman','jFITUAP96OVsitKv','booking');
mysqli_select_db($connect, 'available_time');
$query="SELECT `date_time` FROM `available_time` WHERE `status`=1";

$result = mysqli_query($connect, $query);

		

?>
<html>


<h1><center>Welcome to Health Assur Doctors Booking Platform</center></h1>
<div class="container">
<div class="col-md-8" style="margin-top: 60px">
<form action="" method="post">
<div class="form-group">
<input class="form-control form-control-md" type="text" name="fname"  placeholder="Enter first name" required >
</div>
<div class="form-group">
<input class="form-control form-control-md" type="text" name="sname" placeholder="Enter last name" required >
</div>
<div class="form-group">
<input class="form-control form-control-md" type="text" name="email" placeholder="Enter Email" required>
</div>
<p>
<?php 
/*
$select= '<select name="select">';
while ($row = mysqli_fetch_array($result)) {
   		$select.='<option value="'.$row['date'].'">'.'</option>';
	} 
$select.='</select>';
echo $select;
*/

echo '<div class="input-group input-group-lg">';
echo '<div class="input-group-prepend"></div>';
$select= '<select class="custom-select" id="inputGroupSelect01" name="select">';
$select.='<option value="" disabled selected hidden>Select Date and time...</option>';
while ($row = mysqli_fetch_array($result)) {
		$select.='<option required>' . $row['date_time'] . '</option>';
	}
	$select.='</select>';
	echo '</div>';
	echo $select;

?>
</p>
<div class="form-group">
<input class="form-control form-control-md" type="text" name="WhatsApp" placeholder="Enter WhatsApp number" required>
</div>
<div class="form-group">
<textarea class="form-control form-control-md" id="exampleFormControlTextarea1" rows="3" name="Reason" placeholder="State your reason"></textarea>
</div>
<input class="btn btn-active" type="submit" name="sub" value="submit" >

</div>
</form>
</div>
</div>


</html>
<?php


 
if(mysqli_connect_errno($connect))
{
 echo 'Failed to connect';
}

 
	if(isset($_POST['sub'])){

	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	$email = $_POST['email'];
	$Whatsapp = $_POST['WhatsApp'];
	$Reason = $_POST['Reason'];
	$date_option = $_POST['select'];
	

	mysqli_query($connect, "INSERT INTO `all-booking` (`fname`,`sname`,`Email`,`date`,`WhatsApp`,`Reason`)
 VALUES ('$_POST[fname]', '$_POST[sname]', '$_POST[email]', '$_POST[select]', '$_POST[WhatsApp]', '$_POST[Reason]')");
	if(mysqli_affected_rows($connect) > 0){
		$pickup = $connect->query("SELECT `id` FROM `available_time` WHERE `status`=0");
		if($pickup->num_rows ==0){
			mysqli_query($connect, "UPDATE `available_time` SET `status`=0 WHERE `date_time`='$date_option'");
			echo '<script type="text/javascript"> window.location = "redirect.php" </script>';
		}else{
			echo '<script type="text/javascript"> window.location = "redirect2.php" </script>';
		}
		
		} else {
 			echo "Unsuccesful<br />";
 			echo mysqli_error($connect);
		}
		}




?>