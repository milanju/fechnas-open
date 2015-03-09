<div id="participants" class="content_module">
<div class=title>
  <div class="title-text">~Participants~</div>
</div>



<br>

<?php 



/*
 *Create list of participants, extracted from 'participants' SQL table 
 *and sorted by alphabet, participants seperated by comma.
 */
$participants_array=getValueArray($con, 'participants');
sort($participants_array);
for($i=1;$i<=count(getValueArray($con, 'participants'));$i++){
	
	if($i!=1)echo ", ".$participants_array[$i-1];
	else echo $participants_array[$i-1];
}



?>


<br>




</div>