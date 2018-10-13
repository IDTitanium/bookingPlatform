<?php 
require_once('index.php');
include_once('header.php');


$connect=mysqli_connect('localhost','superman','jFITUAP96OVsitKv','booking');
 
if(mysqli_connect_errno($connect))
{
 echo 'Failed to connect';
}

mysqli_select_db($connect, 'bookers');
$sql="SELECT * FROM bookers";
$records=mysqli_query($connect, $sql);


?>

<htmL>

<body>
	<div class="container">
<table class="table" width="900" border="1" cellpadding="1" cellspacing="1">
	<th>S/N</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email</th>
	<th>Date</th>
	<th>WhatsApp Number</th>
	<th>Reason for Booking</th>
	<th>Actions</th>
<tr>
	<?php
while($bookers=mysqli_fetch_assoc($records)){
	echo "<tr>";
	echo "<td>".$bookers['ID'];
	echo "</td>";
	echo "<td>".$bookers['fname'];
	echo "</td>";
	echo "<td>".$bookers['sname'];
	echo "</td>";
	echo "<td>".$bookers['Email'];
	echo "</td>";
	echo "<td>".$bookers['date'];
	echo "</td>";
	echo "<td>". "+234-" .$bookers['WhatsApp'];
	echo "</td>";
	echo "<td>".$bookers['Reason'];
	echo "</td>";
	echo "</tr>";
}
	?>
</tr>
</table>
</div>
	</body>
</htmL>
