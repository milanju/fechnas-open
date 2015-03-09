<?php include ("header.php"); ?>
<div id="content">


<?php

$con=mysqli_connect("localhost","root","123","opendb");

$users_array=getValueArray($con, 'users');
sort($users_array);
for($i=1;$i<=count(getValueArray($con, 'users'));$i++){
	
	echo "<br>";
	echo $users_array[$i-1];
}

mysqli_close($con);
?>

<form method="post" action="users.php">
<input type="text" name="user_name" style="width: 80px;color:#787878 ;border:solid 1px #787878 ;" onFocus="value=''; this.style.color = 'black';">
<input type="submit" name="admin_user" value="Admin" style="color:black;">
<input type="submit" name="deadmin_user" value="Deadmin" style="color:black;">
</form>
<?php include ("footer.php"); ?>