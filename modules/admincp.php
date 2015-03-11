<?php if (isset($_COOKIE["rememberUsername"]) &&
                getSpecificValue($con, 'users', 'name', 'rights',
                $_COOKIE["rememberUsername"]) =='superadmin') { ?>
<div id="admin-cp-div" class="content-module">
  <div class="title">
    <div class="title-text">Admin CP</div>
  </div>

  <!--Form for wipe Button(Participants)-->
  <form action="" method="POST">
    <input type="submit" name="wipe-participants"
           value="Wipe" class="admin-button">
  </form>

  <!--Form for create_bracket Button(Participants)-->
  <form action="" method="POST">
    <input type="submit" name="create-bracket"
           value="Create Bracket" class="admin-button">
  </form>

  <!--Form for addTestParticipants-->
  <form action="" method="POST">
    <input type="number" name="number_to_add" value=""
           class="bracketfield participant-number " style="width: 50px;">
    <input type="submit" name="addTestParticipants" value="Add Test Participants"
           class="admin-button">
  </form>

  <!--Form for editBracket Button-->
  <form action="" method="POST">
    <input type="submit" name="editBracket" value="Edit Bracket"
           class="admin-button">
  </form>

</div>
<?php } ?>
