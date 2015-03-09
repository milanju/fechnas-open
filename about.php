<?php
  include ("header.php");
  $con=mysqli_connect("localhost","root","123","opendb");
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>



<div id="content">
  <div class="content_module">
    <div class="title">
      <div class="title-text">~About~</div>
    </div>
      <center>
        Created by Fechnas & Milant as PHP learning Project.<br>
        <a href="https://github.com/milanju/fechnas-open" target="_blank">View Source Code on Github</a><br>
        <br>
        Login with u:admin pw:admin to test Admin CP functions.
      </center>
  </div>
</div>

<?php mysqli_close($con); ?>
<?php include ("footer.php"); ?>