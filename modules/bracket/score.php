<?php
class score{
	function __construct($con, $first, $table, $spot){
		if($first){
		echo '<div id="br_score">
			<form action="" method="POST">
				<input type="text" name="score_field" class="br_score_field" value="'. getSpecificValue($con, $table, 'spot', 'score', $spot) .'" readonly style="top:1px">
			</form>
			</div>';
		} else{
		echo '<div id="br_score">
			<form action="" method="POST">
				<input type="text" name="score_field" class="br_score_field" value="'. getSpecificValue($con, $table, 'spot', 'score', $spot+1) .'" readonly style="bottom:1px" >
			</form>
			</div>';
		}
	}
}

?>