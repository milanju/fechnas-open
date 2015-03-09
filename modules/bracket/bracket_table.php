<?php 
include("match.php"); 

class bracket_table {
	
function __construct($con, $bracket_size){
	$hline_modvar=0;
	$vline_height=52;
	$position_var=10;
	$mod_var=1;
	//create bracket_table
	echo '<table id="br_table" cellpadding="0" cellspacing="0">
		<tr>';
	//create Header-Row
	for($i=$bracket_size;$i>=1;$i=$i/2){
		echo '<th id="br_head_row" style="padding-right:60px;">';
		if($i==4) echo 'Semi Final';
		elseif($i==2) echo 'Grand Final';
		elseif($i==1) echo 'Winner!';
		else echo 'ro'.$i;
		echo'</th>';
	}
	echo '
	</tr>
	<tr>';
	//create Bracket-Row
	for($i=$bracket_size;$i>=1;$i=$i/2){
		$top_position=$position_var;
		//create Bracket column ro.$i
		echo '
		<td id="br_td" valign="top" style="height:';
		echo $bracket_size/2*50;
		echo 'px">';
		//create Match
		for($j=0;$j<$i;$j+=2){
			if($j==0 && $i>2){
				$top_position/=2;
				new match($con, $top_position, $i, $j+1);
			} else {
				if($i>2){
					new match($con, $top_position, $i, $j+1);
				} elseif($i==2) {
					new match($con, $top_position/2, $i, $j+1);
				} else{
					new match($con, $top_position/4-10, $i, $j+1);
				}
			}
			$top_position+=$position_var;
		}
		//Bracket Connectors START	
		if($i>2){
		echo '<div id="connector">';
		
		
		$hline_pos=49+$hline_modvar;
		$vline_pos=24+$hline_modvar;
		$vline_pos-=$hline_modvar/2;
		for($k=0;$k<$i/4;$k++){
			echo '<div id="vline" style="height:'. $vline_height .'px; top:'. $vline_pos .'px"></div><div id="hline" style="top:'. $hline_pos .'px;"></div>';
			$hline_pos+=100*$mod_var;
			$vline_pos+=100*$mod_var;
		}
		$vline_height+=50*$mod_var;
		$hline_pos+=76;
		$hline_modvar+=50*$mod_var;
		echo '</div>';
		}
		//Bracket Connectors END
		echo '</td>';
		$position_var+=50*$mod_var;
		$mod_var*=2;
		
	}
	echo '</tr>
		</table>';		
		
		}

	}


?>