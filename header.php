<?php include ("actions.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">


<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
</head>

<body>
<div id="wrapper">

<!--Wrapper Auto Expand-->
<script>
$(document).ready(function() {
  $("#wrapper_t, #wrapper_b, #wrapper_l, #wrapper_r, #wrapper_tl, #wrapper_tr, #wrapper_bl, #wrapper_br").height( $( "#wrapper" ).height() );
}) ;
</script>



<div id="wrapper_t"></div>
<div id="wrapper_b"></div>
<div id="wrapper_l"></div>
<div id="wrapper_r"></div>
<div id="wrapper_tl"></div>
<div id="wrapper_tr"></div>
<div id="wrapper_bl"></div>
<div id="wrapper_br"></div>

<div id="content_body">
<div id="above_header">

<div id="login_form">
	<!--Form for Login-->
	<form action="" method="POST">
	<?php if ((empty($_COOKIE["rememberUsername"]))) { ?>
	<input type="text" name="login_name" class="login-input" style="width: 80px;color:#787878 ;border:solid 1px #787878;" value="User Name" onFocus="value=''; this.style.color = 'black';">
	<input type="password" name="login_pw" style="width: 80px;color:#787878 ;border:solid 1px #787878 ;" value="Password" onFocus="value=''; this.style.color = 'black';">
	<input type="submit" name="login_user" class="login-button" value="Login">
	<input type="submit" name="register" class="register-button" value="Register">
		<?php if (!(empty($_COOKIE["invalidLogin"]))) { ?>
			<div id="invalid_login_message">Invalid username or password.</div>
		<?php
		} ?>
	<?php } else { ?>
	<input type="submit" name="logout"  class="logout-button" value="Logout">
	<div id="welcome_message">Hello <?php echo $_COOKIE["rememberUsername"]; ?> ! </div><?php } ?>
	</form>
</div>


	<div id="above_header_clock">
		<script type="text/javascript">
tday  =new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;}
else if(nhour <= 11) {ap = " AM";}
else if(nhour == 12) {ap = " PM";}
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
</script>
<div id="clockbox"></div>

	</div>

</div>

<div id="header">

<?php
$rnd_var=rand(1, 30);
if($rnd_var==1){ ?>
<a href="index.php"><img src="images/banner_k.png" width="1100" height="140"  alt="Home"></a>
<?php } elseif($rnd_var==2){ ?>
<a href="index.php"><img src="images/banner_kc.png" width="1100" height="140"  alt="Home"></a>
<?php } elseif($rnd_var==3){ ?>
<a href="index.php"><img src="images/banner.png" width="1100" height="140"  alt="Home"></a>
<?php } else{ ?>
<a href="index.php"><img src="images/banner_c.png" width="1100" height="140"  alt="Home"></a>
<?php } ?>


</div>

<div id="navbar">
<ul class="navbar_menu">
  <li class="navbar_menu"><a class="navbar_menu" href="index.php">Home</a></li>
  <li class="navbar_menu"><a class="navbar_menu" href="about.php">About</a></li>
</ul>
</div>
