<?php
class player{
	function __construct($con, $first, $name, $table_number){
		if($first){
			echo '<div id="br_player">
				<form action="" method="POST">
					<input type="text" name="player" class="br_player_field" readonly value="';
					echo $name;
					echo '"';
					if($table_number==1) echo 'style="margin-right:1px;"';
					echo '>
				</form>
				</div>';
		}else{
			echo '<div id="br_player">
				<form action="" method="POST">
					<input type="text" name="player" class="br_player_field" readonly value="';
					echo $name;
					echo '" style="top:1px;">
				</form>
				</div>';
		}
	}
}

?>