<?php include ("header.php");

$con=mysqli_connect("localhost","root","123","opendb");


if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {

}
 ?>



<div id="content">

<?php include ("modules/admincp.php"); ?>

<?php include ("modules/usercp.php"); ?>

<?php include ("modules/participants.php"); ?>

<?php include ("modules/ebracket.php"); ?>

<?php mysqli_close($con); ?>

</div>


<?php include ("footer.php"); ?>