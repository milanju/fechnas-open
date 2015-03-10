<div id="user_cp_div" class="content_module">
<div class="title">
	<div class="title-text">User CP</div>
</div>

<?php
if (!(empty($_COOKIE["rememberParticipant"]))) {

	if(getBracketSize(getUserBracket($con, $_COOKIE["rememberParticipant"]))!=1){

	echo "Hello " . $_COOKIE["rememberParticipant"] . ". ";
	if(getSpecificValue($con, 'data', 'data', 'value', 'bracket') != 'none'){
		echo 'You\'re currently playing in ro'.getBracketSize(getUserBracket($con, $_COOKIE["rememberParticipant"])).'.';
	}

	?>

	<br>

	<?php if(getSpecificValue($con, 'data', 'data', 'value', 'bracket')=='none'){?>
	<div style="position:absolute; right:10px; top:30px">
	<!--Form for User CP-->
	<button title="Click to edit Name#Code" style="width:190px;" class="button" type="button"
	onclick="if(document.getElementById('spoiler2') .style.display=='none') {
      document.getElementById('spoiler2') .style.display=''
    }
    else {
      document.getElementById('spoiler2') .style.display='none'
    }"
		>
	Edit Name#Code
	</button>

	<div id="spoiler2" style="display:none">
		<form action="" method="POST">
		<input type="text" name="editParticipant" class="bracketfield" > <br>
		<input type="text" name="editCharactercode" class="bracketfield" > <br>
		<input type="submit" value="submit" class="button">
		</form>
	</div>
	</div>

	<form action='' method='POST'>
	<input type='submit' name='unsign' value='Unsign from Tournament' class='button'>
	</form>
	<?php } else {?>

<?php

	if (((getSpecificValue($con, 'data', 'data', 'value', 'bracket') != 'none') && (getSpecificValue($con, 'data', 'data', 'value', 'bracket') != 'bracket_ro1'))) {

			$userSlot = getSpecificValue($con, getUserBracket($con, $_COOKIE["rememberParticipant"]), 'name', 'spot', $_COOKIE["rememberParticipant"]);
		if ($userSlot % 2 == 0) {
			$opponentSlot = $userSlot-1;
		}
		else {
			$opponentSlot = $userSlot+1;
		}
		$opponent = getSpecificValue($con, getUserBracket($con, $_COOKIE["rememberParticipant"]), 'spot', 'name', $opponentSlot);
		if ($opponent == '&nbsp;') {
			echo "Waiting for the next Opponent";
		} elseif (getSpecificValue($con, getUserBracket($con, $_COOKIE["rememberParticipant"]), 'spot', 'score', $opponentSlot) == 2 || getSpecificValue($con, getUserBracket($con, $_COOKIE["rememberParticipant"]), 'spot', 'score', $opponentSlot) == 3) {
			echo "You're out of the Tournament, try again next Week!";
		} else {
			echo "Your opponent is " . $opponent;
		?>
		<div class="content_module" style="width: 200px; margin:0;">
		<div class="title"> <div class="title-text">Submit your Score!</div></div>
		<?php
			if (!(empty($_COOKIE["invalidScore"]))) { ?>
				<div id="invalid_score_message"> Invalid Submit! Please Submit a valid Score! </div>
			<?php } ?>
		<div id="win_loss">

		</div>
		<form action="" method="POST">

		<table style="margin: 0 auto; font-size: 12px">
		<tr><td>Game 1:</td><td><label class="radio"><input type="radio" name="game_1" value="won" class="radio_win"><div>win</div></label></td><td><label class="radio"><input type="radio" name="game_1" value="lost" class="radio_win"><div>lose</div></label></td><td><label class="radio"><input type="radio" name="game_1" value="-" class="radio_win" checked><div>-</div></label></td></tr>
		<tr><td>Game 2:</td><td><label class="radio"><input type="radio" name="game_2" value="won" class="radio_win"><div>win</div></label></td><td><label class="radio"><input type="radio" name="game_2" value="lost" class="radio_win"><div>lose</div></label></td><td><label class="radio"><input type="radio" name="game_2" value="-" class="radio_win" checked><div>-</div></label></td></tr>
		<tr><td>Game 3:</td><td><label class="radio"><input type="radio" name="game_3" value="won" class="radio_win"><div>win</div></label></td><td><label class="radio"><input type="radio" name="game_3" value="lost" class="radio_win"><div>lose</div></label></td><td><label class="radio"><input type="radio" name="game_3" value="-" class="radio_win" checked><div>-</div></label></td></tr>
		<?php
		if (getUserBracket($con, $_COOKIE["rememberParticipant"]) == 'bracket_ro2') { ?>
			<tr><td>Game 4:</td><td><label class="radio"><input type="radio" name="game_4" value="won" class="radio_win"><div>win</div></label></td><td><label class="radio"><input type="radio" name="game_4" value="lost" class="radio_win"><div>lose</div></label></td><td><label class="radio"><input type="radio" name="game_4" value="-" class="radio_win" checked><div>-</div></label></td></tr>
			<tr><td>Game 5:</td><td><label class="radio"><input type="radio" name="game_5" value="won" class="radio_win"><div>win</div></label></td><td><label class="radio"><input type="radio" name="game_5" value="lost" class="radio_win"><div>lose</div></label></td><td><label class="radio"><input type="radio" name="game_5" value="-" class="radio_win" checked><div>-</div></label></td></tr>
		<?php }?>
		</table>
		<input type="submit" name="submit_score" value="Submit" class="submit-win-button" style="margin-left: 50px;">
		</form>
		</div>
		<?php
		}
	}
	}
}	else{
	//echo 'Gratz motherfucker ' . $_COOKIE["rememberParticipant"] . ', you just won this shit. Fuck FekniZ. Hueue';
}
}  elseif (getSpecificValue($con, 'data', 'data', 'value', 'bracket') == 'none') {
?>
  Select your Race and enter your Name and your Charactercode below to participate in the Tournament.

  <!--Form for Name input & submit Button-->
  <form action="" method="POST">
  <label class="radio"><input type="radio" name="race" value="Terran" class="radio_win"><div>Terran</div></label>
  <label class="radio"><input type="radio" name="race" value="Protoss" class="radio_win"><div>Protoss</div></label>
  <input type="text" name="enterParticipant" class="inputfield" value="Name" onFocus="value='';">#
  <input type="text" name="enterCharactercode" class="inputfield"; style="width:40px" value="Code" onFocus="value='';">
  <input type="submit" value="submit" class="button">
  </form>

<?php
} else {
	echo "The Tournament is already running, please come again next week!";
}
?>
<br>
</div>
