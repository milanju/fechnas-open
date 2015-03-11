<?php include("bracket/bracket_table.php"); ?>


<div id ="ebracket" class="content-module">
<div class=title>
  <div class="title-text">Bracket</div>
</div>
<div id="ebracket_div">
<?php


if(getSpecificValue($con, 'data', 'data', 'value', 'bracket')!='none'){
$bracket_size=getBracketSize(getSpecificValue($con, 'data', 'data', 'value', 'bracket'));
new bracket_table($con, $bracket_size);
}
?>
</div>
</div>
