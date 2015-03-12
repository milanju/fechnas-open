<?php
include ("functions.php");

$con=mysqli_connect("localhost","root","123","opendb");
setcookie("invalidLogin", "invalidLogin",time() - 3600);
setcookie("invalidScore", "invalidScore", time() - 3600);
// Check if Cookie should be deleted
if(isset($_COOKIE["rememberParticipant"]) && !(checkIfInBracket($con,
		'participants', $_COOKIE["rememberParticipant"]))) {
	setcookie("rememberParticipant",
			$_COOKIE["rememberParticipant"], time()-3600);
}

if (isset($_POST["logout"])) {
	setcookie("rememberUsername", $_COOKIE["rememberUsername"],
			time()- 365 * 24 * 3600);
	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// ACTION FOR addTestParticipants

if (isset($_POST["number_to_add"])) {
	for ($i = 0; $i < $_POST["number_to_add"]; $i++) {
		if (count(getValueArray($con, 'participants')) == 0) {
			$spot_var = 1;
		} else {
			$spot_var = count(getValueArray($con, 'participants')) + 1;
		}
		$participant = "Name" . "#" . $spot_var;
		insertInTable($con, 'participants', 'spot', 'name', $spot_var, $participant);
	}
	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

// Check if Register-Button in register.php
// has been pressed if true > run register User to Database
if (isset($_POST["register_user"])) {
	$name=$_POST['register_name'];
	$pw=$_POST['register_pw'];
	mysqli_query($con,"INSERT INTO users (name, password)"
					. "VALUES ('$name', '$pw')");
	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

// Check if Register-Button in header.php
// has been pressed if true > REDIRECT to register.php
if (isset($_POST["register"])) {
	header("Location: " . "register.php");
	exit();
}

// Checks Password and Username and informs if successful or not
if (isset($_POST["login_user"])) {

	if (getInformation_Users($con, 'users', 'name', $_POST["login_name"]) ===
		$_POST["login_name"] && getInformation_Users($con, 'users',
		'password', $_POST["login_pw"]) === $_POST["login_pw"]) {
		//IF DATA CORRECT
		setcookie("rememberUsername", $_POST["login_name"],
			time() + 365 * 24 * 3600);
	} else {
		//IF INVALID DATA DO THIS PL0X
		setcookie("invalidLogin","invalidLogin", time() + 3600);
	}
	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

// Check if User is made Admin in users.php
if (isset($_POST["admin_user"])) {
	updateTableSpecific($con, 'users', 1, 'name', 'admin', $_POST["user_name"]);
	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

if (isset($_POST["deadmin_user"])) {
	updateTableSpecific($con, 'users', 0, 'name', 'admin', $_POST["user_name"]);
	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

//Check if unsign button(Participants) has been pressed if true > delete Cookie
if (isset($_POST["unsign"])) {
	deleteTableElement($con, 'participants', 'name',
		$_COOKIE["rememberParticipant"]);
	setcookie("rememberParticipant", $_COOKIE["rememberParticipant"],
			time()-3600);
	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

// Check if WIPE button has been pressed if true > run resetBracket()
if (isset($_POST["wipe-participants"])) {
	$bracket_size=getBracketSize(getSpecificValue($con, 'data', 'data',
		'value', 'bracket'));
	$i = 2048;
	do {
		$tableToWipe='bracket_ro'.$i;
		wipeTable($con, $tableToWipe);
		$i /= 2;
	} while($i >= 1);
	wipeTable($con, 'participants');
	updateTableSpecific($con, 'data', 'none', 'data', 'value', 'bracket');

	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

// Check if create-bracket button has been pressed if true > run resetBracket()

if (isset($_POST["create-bracket"])) {
	$participantsArray = getValueArray($con, 'participants');
	shuffle($participantsArray);
	generateBracket($con, $participantsArray);

	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

// Check if Name has been entered if true > enter name to next empty slot

if (isset($_POST["enterParticipant"]) &&
	(isset($_POST["enterCharactercode"])) &&
	(isset($_POST["race"]))) {
	if (count(getValueArray($con, 'participants')) == 0) {
		$spot_var = 1;
	} else {
		$spot_var = count(getValueArray($con, 'participants')) + 1;
	}
	$participant = $_POST["enterParticipant"] . "#" . $_POST["enterCharactercode"];
	insertInTable($con, 'participants', 'spot', 'name', $spot_var, $participant);
	$_COOKIE["participant"] = $participant;
	$expire = time() + 3600;
	setcookie("rememberParticipant", $participant, $expire);

	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

if (isset($_POST["editParticipant"]) && (isset($_POST["editCharactercode"]))) {
	if (isset($_COOKIE["editBracket"])) {
		setcookie("editBracket", "editBracket", time() - 3600);
	} else {
		setcookie("editBracket", "editBracket", time() + 3600);
	}

	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

// Check if Name has been updated if true > update

if (isset($_POST["editParticipant"]) && (isset($_POST["editCharactercode"]))) {
	if (count(getValueArray($con, 'participants') == 0)) {
		$spot_var = 1;
	} else {
		$spot_var = count(getValueArray($con, 'participants') + 1);
	}
	$participant = $_POST["editParticipant"] . "#" . $_POST["editCharactercode"];
	updateTableSpecific($con, 'participants', $participant,
			'name', 'name', $_COOKIE["rememberParticipant"]);
	$_COOKIE["participant"] = $participant;
	$expire = time() + 3600;
	setcookie("rememberParticipant", $participant, $expire);

	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

//<!--Check if Matchscore has been submitted by User. IF YES update Winner.-->
if (isset($_POST["submit_score"])) {
	$bracket = getUserBracket($con, $_COOKIE["rememberParticipant"]);
	$bracket_size = getBracketSize($bracket);
	$bracket_extension = $bracket_size / 2;

	$spot = getSpecificValue($con, $bracket, 'name', 'spot',
		$_COOKIE["rememberParticipant"]);
	if (getUserBracket($con, $_COOKIE["rememberParticipant"]) != 'bracket_ro2') {

	//BEST OF 3

	//If WON 2-0
	if($_POST["game_1"] == "won" && $_POST["game_2"] == "won" && $_POST["game_3"] == "-"){
		if($spot%2 == 0 && getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', $spot/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, $_COOKIE["rememberParticipant"], 'spot', 'name', $spot/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 0, 'spot', 'score', $spot-1);
		}
		elseif (getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', ($spot+1)/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, $_COOKIE["rememberParticipant"], 'spot', 'name', ($spot+1)/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 0, 'spot', 'score', $spot+1);
		}
	}

	//If WON 2-1
	elseif(($_POST["game_1"] == "won" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "won") ||
	($_POST["game_1"] == "lost" && $_POST["game_2"] == "won" && $_POST["game_3"] == "won")){
		if($spot%2 == 0 && getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', $spot/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, $_COOKIE["rememberParticipant"], 'spot', 'name', $spot/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 1, 'spot', 'score', $spot-1);
		}
		elseif (getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', ($spot+1)/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, $_COOKIE["rememberParticipant"], 'spot', 'name', ($spot+1)/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 1, 'spot', 'score', $spot+1);
		}

	//IF LOST 0-2
	} elseif(($_POST["game_1"] == "lost" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "-")) {
		if($spot%2 == 0 && getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', $spotTT/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 0, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, getSpecificValue($con, 'bracket_ro'.$bracket_extension*2, 'spot', 'name', ($spot-1)), 'spot', 'name', $spot/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2, 'spot', 'score', $spot-1);
		}
		elseif (getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', ($spot+1)/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 0, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, getSpecificValue($con, 'bracket_ro'.$bracket_extension*2, 'spot', 'name', ($spot+1)), 'spot', 'name', ($spot+1)/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2, 'spot', 'score', $spot+1);
		}
	}

	//IF LOST 1-2
	elseif(($_POST["game_1"] == "lost" && $_POST["game_2"] == "won" && $_POST["game_3"] == "lost") ||
	($_POST["game_1"] == "won" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "lost")) {
		if($spot%2 == 0 && getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', $spot/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 1, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, getSpecificValue($con, 'bracket_ro'.$bracket_extension*2, 'spot', 'name', ($spot-1)), 'spot', 'name', $spot/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2, 'spot', 'score', $spot-1);
		}
		elseif (getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', ($spot+1)/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 1, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, getSpecificValue($con, 'bracket_ro'.$bracket_extension*2, 'spot', 'name', ($spot+1)), 'spot', 'name', ($spot+1)/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2, 'spot', 'score', $spot+1);
		}
	} else {
		setcookie("invalidScore", "invalidScore", time() + 3600);
	}

	//BEST OF 5

	} elseif ((getUserBracket($con, $_COOKIE["rememberParticipant"])) == 'bracket_ro2') {
	//If WON 3-0
	if($_POST["game_1"] == "won" && $_POST["game_2"] == "won" && $_POST["game_3"] == "won" && $_POST["game_4"] == "-" && $_POST["game_5"] == "-"){
		if($spot%2 == 0 && getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', $spot/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 3, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, $_COOKIE["rememberParticipant"], 'spot', 'name', $spot/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 0, 'spot', 'score', $spot-1);
		}
		elseif (getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', ($spot+1)/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 3, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, $_COOKIE["rememberParticipant"], 'spot', 'name', ($spot+1)/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 0, 'spot', 'score', $spot+1);
		}
	}

	//If WON 3-1
	elseif(($_POST["game_1"] == "won" && $_POST["game_2"] == "won" && $_POST["game_3"] == "lost" && $_POST["game_4"] == "won" && $_POST["game_5"] == "-") ||
	($_POST["game_1"] == "lost"&& $_POST["game_2"] == "won" && $_POST["game_3"] == "won" && $_POST["game_4"] == "won" && $_POST["game_5"] == "-") ||
	($_POST["game_1"] == "won" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "won" && $_POST["game_4"] == "won" && $_POST["game_5"] == "-")) {
		if($spot%2 == 0 && getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', $spot/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 3, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, $_COOKIE["rememberParticipant"], 'spot', 'name', $spot/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 1, 'spot', 'score', $spot-1);
		}
		elseif (getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', ($spot+1)/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 3, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, $_COOKIE["rememberParticipant"], 'spot', 'name', ($spot+1)/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 1, 'spot', 'score', $spot+1);
		}
	}
	//If WON 3-2
	elseif(($_POST["game_1"] == "won" && $_POST["game_2"] == "won" && $_POST["game_3"] == "lost" && $_POST["game_4"] == "lost" && $_POST["game_5"] == "won") ||
	($_POST["game_1"] == "won" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "won" && $_POST["game_4"] == "lost" && $_POST["game_5"] == "won") ||
	($_POST["game_1"] == "won" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "lost" && $_POST["game_4"] == "won" && $_POST["game_5"] == "won") ||
	($_POST["game_1"] == "lost" && $_POST["game_2"] == "won" && $_POST["game_3"] == "won" && $_POST["game_4"] == "lost" && $_POST["game_5"] == "won") ||
	($_POST["game_1"] == "lost" && $_POST["game_2"] == "won" &&$_POST["game_3"] == "lost" && $_POST["game_4"] == "won" && $_POST["game_5"] == "won") ||
	($_POST["game_1"] == "lost" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "won" && $_POST["game_4"] == "won" && $_POST["game_5"] == "won")){
		if($spot%2 == 0 && getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', $spot/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 3, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, $_COOKIE["rememberParticipant"], 'spot', 'name', $spot/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2, 'spot', 'score', $spot-1);
		}
		elseif (getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', ($spot+1)/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 3, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, $_COOKIE["rememberParticipant"], 'spot', 'name', ($spot+1)/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2, 'spot', 'score', $spot+1);
		}
	}
	//IF LOST 0-3
		elseif(($_POST["game_1"] == "lost" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "lost" && $_POST["game_4"] == "-" && $_POST["game_5"] == "-")) {
		if($spot%2 == 0 && getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', $spot/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 0, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, getSpecificValue($con, 'bracket_ro'.$bracket_extension*2, 'spot', 'name', ($spot-1)), 'spot', 'name', $spot/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 3, 'spot', 'score', $spot-1);
		}
		elseif (getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', ($spot+1)/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 0, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, getSpecificValue($con, 'bracket_ro'.$bracket_extension*2, 'spot', 'name', ($spot+1)), 'spot', 'name', ($spot+1)/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 3, 'spot', 'score', $spot+1);
		}
	}

	//IF LOST 1-3
	elseif(($_POST["game_1"] == "lost" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "won" && $_POST["game_4"] == "lost" && $_POST["game_5"] == "-") ||
	($_POST["game_1"] == "won" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "lost" && $_POST["game_4"] == "lost" && $_POST["game_5"] == "-") ||
	($_POST["game_1"] == "lost" && $_POST["game_2"] == "won" && $_POST["game_3"] == "lost" && $_POST["game_4"] == "lost" && $_POST["game_5"] == "-")) {
		if($spot%2 == 0 && getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', $spot/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 1, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, getSpecificValue($con, 'bracket_ro'.$bracket_extension*2, 'spot', 'name', ($spot-1)), 'spot', 'name', $spot/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 3, 'spot', 'score', $spot-1);
		}
		elseif (getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', ($spot+1)/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 1, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, getSpecificValue($con, 'bracket_ro'.$bracket_extension*2, 'spot', 'name', ($spot+1)), 'spot', 'name', ($spot+1)/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 3, 'spot', 'score', $spot+1);
		}
	}
	//IF LOST 2-3
	elseif(($_POST["game_1"] == "lost" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "won" && $_POST["game_4"] == "won" && $_POST["game_5"] == "lost") ||
	($_POST["game_1"] == "lost" && $_POST["game_2"] == "won" && $_POST["game_3"] == "lost" && $_POST["game_4"] == "won" && $_POST["game_5"] == "lost") ||
	($_POST["game_1"] == "lost" && $_POST["game_2"] == "won" && $_POST["game_3"] == "won" && $_POST["game_4"] == "lost" && $_POST["game_5"] == "lost") ||
	($_POST["game_1"] == "won" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "lost" && $_POST["game_4"] == "won" && $_POST["game_5"] == "lost") ||
	($_POST["game_1"] == "won" && $_POST["game_2"] == "lost" && $_POST["game_3"] == "won" && $_POST["game_4"] == "lost" && $_POST["game_5"] == "lost") ||
	($_POST["game_1"] == "won" && $_POST["game_2"] == "won" && $_POST["game_3"] == "lost" && $_POST["game_4"] == "lost" && $_POST["game_5"] == "lost")) {
		if($spot%2 == 0 && getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', $spot/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, getSpecificValue($con, 'bracket_ro'.$bracket_extension*2, 'spot', 'name', ($spot-1)), 'spot', 'name', $spot/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 3, 'spot', 'score', $spot-1);
		}
		elseif (getSpecificValue($con, 'bracket_ro'.$bracket_extension, 'spot', 'name', ($spot+1)/2) == '&nbsp;') {
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2, 'spot', 'score', $spot);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension, getSpecificValue($con, 'bracket_ro'.$bracket_extension*2, 'spot', 'name', ($spot+1)), 'spot', 'name', ($spot+1)/2);
			updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 3, 'spot', 'score', $spot+1);
		}
	} else {
		setcookie("invalidScore", "invalidScore", time() + 3600);
	}
	}

	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

//<!--Check if "Submit Winner Button[ro64]" has been pressed. IF YES will update winner.-->
	for($bracket_size=64;$bracket_size>1;$bracket_size/=2){
	$half_bracket_size_string=(string)$bracket_size/2;
	$bracket_size_string=(string)$bracket_size;
	$spot=1;

 for($i=1;$i<=$bracket_size/2;$i++){
	$spot_string=(string)$spot;
	if(!empty($_POST[$bracket_size_string.'*'.$spot_string])){
	updateTableSpecific($con, 'bracket_ro'.$half_bracket_size_string , getSpecificValue($con, 'bracket_ro'.$bracket_size_string , 'spot', 'name', $spot), 'spot', 'name', $i);
	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
	}
	$j=$spot+1;
	$j_string=(string)$j;
	if(!empty($_POST[$bracket_size_string.'*'.$j_string])){
	updateTableSpecific($con, 'bracket_ro'.$half_bracket_size_string , getSpecificValue($con, 'bracket_ro'.$bracket_size_string, 'spot', 'name', $j), 'spot', 'name', $i);
	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
	}
	$spot+=2;;
 }
	}


//<!--Check if RESET button has been pressed if true > run resetBracket()-->

if(!empty($_POST["reset_bracket"])){
resetBracket($con);

header("Location: " . $_SERVER['REQUEST_URI']);
exit();
}
mysqli_close($con);

?>
