<div id="bracket_div" class="content_module">
<div class="title">
	<div class="title-text">Bracket</div>
</div>
<?php
	$bracket=getSpecificValue($con, 'data', 'data', 'value', 'bracket');
	$variable=1600;
	//get bracket_size
	switch($bracket){
		case 'bracket_ro64':
			$bracket_size=64;
			break;
		case 'bracket_ro32':
			$bracket_size=32;
			break;
		case 'bracket_ro16':
			$bracket_size=16;
			break;
		case 'bracket_ro8':
			$bracket_size=8;
			break;
		case 'bracket_ro4':
			$bracket_size=4;
			break;
		case 'bracket_ro2':
			$bracket_size=2;
			break;
		case 'bracket_ro1':
			$bracket_size=1;
			break;
		default:
			$bracket_size=0;
	}
	echo "<table class='bracket_table'>";
	echo "<tr>";


	$td_height=$bracket_size*25+10;
	for($i=$bracket_size;$i>=1;$i=$i/2){

		echo "<th class='bracket_th'>";
		echo "ro".$i ;
		echo "</th>";

	}
	echo "</tr>";
	echo "<tr>";

	$li_margin=10;

	$margin_counter=2;
	$li_margin2=0;
	$gangsta_var=1;
	for($i=$bracket_size;$i>=1;$i=$i/2){
		$top_position=0;
		$li_margin2+=50*$gangsta_var;

		echo "<td class = 'bracket_td' style='height:$td_height";
		echo "px'>";
		echo "<ul class='bracket_list'>";



		for($j=1;$j<=$i;$j=$j+2){
		if(($i != $bracket_size || $j != 1)){

		}
		if($j != 1) {
			$top_position+=$li_margin2;
			echo "<li class='bracket_match' style='top:";
			echo $top_position;
			echo "px'>";
			?>
			<?php
		} else{
			if($i!=1){
			$top_position+=($li_margin2/2)-15;
			echo "<li class='bracket_match' style='top:";
			echo $top_position;
			echo "px'>";
			}else{
				$top_position+=(($li_margin2/2)-15)/2;
				echo "<li class='bracket_match' style='top:";
				echo $top_position;
				echo "px'>";
			}
		}

			echo "<form action='' method='POST'>";
			echo "<input type='text' name='ro16_1' value=" .  getValue($con, $bracket, $j)  . " class='bracketfield' readonly>";

			if($bracket != bracket_ro1){
				if (getSpecificValue($con, 'users', 'name', 'rights', $_COOKIE["rememberUsername"])=='superadmin') {
				echo "<input class = 'submit_win_button' type='submit' name='$i*$j' value='W'>";
				} else{
				//Score
				echo "<input type='text' name='$i*$j*n' value='' class='score_field'>";
				}
			}
			echo "</form>";

			if($bracket != bracket_ro1){

				echo "<form action='' method='POST'>";
				echo "<input type='text' name='ro16_1' value=" .  getValue($con, $bracket, $j+1)  . " class='bracketfield' readonly>";
				$k=$j+1;
				if (getSpecificValue($con, 'users', 'name', 'rights', $_COOKIE["rememberUsername"])=='superadmin') {
				echo "<input class = 'submit_win_button' type='submit' name='$i*$k' value='W'>";
				} else{
				//Score

				echo "<input type='text' name='$i*$k*n' value='' class='score_field'>";

				}
			}
			echo "</form>";
			echo "</li>";



		}
		echo "</ul>";

		?>
		<?php

		$margin_top_bottom=10;
		$blc_height=($td_height-50*$gangsta_var*2)+30;
		$blc_margin=($td_height-$blc_height)/2;
		$blc_margin_top=$blc_margin-2;
		$blc_margin_bottom=$blc_margin+2;
		if($i==$bracket_size){
			$blc_height=$td_height-20;
			$blc_margin_top=8;
			$blc_margin_bottom=12;
		}

		if($i!=1){
		?>
		<div id="randomrectangle" style="height:<?php echo "$td_height"; ?>px;">
		<div id="bracket_line_container" style="height:<?php echo "$blc_height"; ?>px;
			margin-top:<?php echo "$blc_margin_top"; ?>px;
			margin-bottom:<?php echo "$blc_margin_bottom"; ?>px;">

			<?php for($k=0;$k<$i;$k+=4){
			echo "<div id='bracket_border'>";
			echo "<div id='bracket_line'>";
			echo "<div id='top_line'>";
			echo "</div>";
			echo "<div id='bottom_line'>";
			echo "</div>";

			echo "</div>";
			echo "<div id='first_border'>";
			echo "<div id='top_border'></div>";
			echo "<div id='right_border'></div>";
			echo "</div>";
			echo "</div>";

			 } ?>




		</div>
		</div>

		<?php
		}

		echo "</td>";
			//mod bracket ~~~
		switch($bracket){
			case 'bracket_ro64':
				$bracket='bracket_ro32';
				break;
			case 'bracket_ro32':
				$bracket='bracket_ro16';
				break;
			case 'bracket_ro16':
				$bracket='bracket_ro8';
				break;
			case 'bracket_ro8':
				$bracket='bracket_ro4';
				break;
			case 'bracket_ro4':
				$bracket='bracket_ro2';
				break;
			case 'bracket_ro2':
				$bracket='bracket_ro1';
				break;
			default:
				$bracket='none';
		}
		$li_margin=$li_margin*2+42;
		$margin_counter++;
		if($i != $bracket_size){
		$gangsta_var*=2;
		}

	}
	echo "</tr>";
	echo "</table>";
	?>
</div>
