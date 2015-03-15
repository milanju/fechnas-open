<?php include ("header.php"); ?>
<div id="content">
  <form action="milantowns.php" method="POST">
    <input type="text" name="register_name"
        style="width: 80px; color:#787878; border:solid 1px #787878"
        value="User Name" onFocus="value=''; this.style.color = 'black';">
    (Max. 20 Letters)
    <br>
    <input type="password" name="register_pw"
        style="width: 80px; color:#787878; border:solid 1px #787878;"
        value="Password" onFocus="value=''; this.style.color = 'black';">
    (Max. 20 Letters)
    <br>
    <input type="submit" name="register_user"
        value="Register" style="color:black;">
  </form>
</div>
<?php include ("footer.php"); ?>
