<?php

include("player.php");
include("score.php");

class match{
	function __construct($con, $top_position, $table_number, $spot){
		
		$table='bracket_ro'.$table_number;
		if($table_number!=1){
			echo '<div id="br_match" style="top:';
			echo $top_position;
			echo 'px">';
		} else{
			echo '<div id="br_match" style="width: 161px; height:17px; top:';
			echo $top_position+10;
			echo 'px">';
		}
		new player($con, true, getSpecificValue($con, $table, 'spot', 'name', $spot), $table_number);
		
		if($table_number!=1) new score($con, true, $table, $spot);
		//br_player_spacer
		if($table_number==2){
			echo '<div id="br_player_spacer" style="width: 241px"></div>';
		} elseif($table_number==1){
			
		}else{
			echo '<div id="br_player_spacer" style="width: 212px"></div>';
		}
		if($table_number!=1){
			new player($con, false, getSpecificValue($con, $table, 'spot', 'name', $spot+1), $table_number);
			new score($con, false, $table, $spot);
		}
		echo '</div>';
	}
}

?>