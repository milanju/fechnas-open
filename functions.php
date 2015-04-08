<?php

// <-------------------------BRACKET FUNCTIONS START--------------------------->

// function: generateBracket

function generateBracket($con, $shuffledParticipantsArray)
{

    $bracket = selectTable(count($shuffledParticipantsArray));
    // mysqli_query($con, "TRUNCATE $bracket");
    // get bracket_size
    $bracket_size=getBracketSize($bracket);
    $byeCount = $bracket_size-count($shuffledParticipantsArray);
    $byeCount2 = $byeCount;
    $slot = 1;
    $array_pos = 0;
    for ($i = 0; $i < $bracket_size; $i++) {
        if($byeCount > 0){
            insertInTable($con, $bracket, 'spot', 'name', $slot, '*BYE*');
            $slot += 2;
            $byeCount--;
        } else {
            if ($array_pos == 0){
                $slot = 2;
            }
            //insertInTable($con, $bracket, 'spot', 'name',
            //    $slot, $shuffledParticipantsArray[$array_pos]);
            $name = $shuffledParticipantsArray[$array_pos];
            $con->query("INSERT INTO $bracket (spot, name, race)
                VALUES ($slot, '$name', 'Terran')");
            $array_pos++;
            $slot += 2;
            if($slot == $bracket_size + 2){
                $slot = $byeCount2 * 2 + 1;
            }
        }
    }



    // update data with root table info
    updateTableSpecific($con, 'data', $bracket, 'data', 'value', 'bracket');
    // Table is now generated. Will generate empty child Tables.

    for ($i = $bracket_size; $i >= 2; $i = $i / 2) {
        //mod bracket ~~~
        switch ($bracket) {
            case 'bracket_ro2048':
                $bracket='bracket_ro1024';
                break;
            case 'bracket_ro1024':
                $bracket='bracket_ro512';
                break;
            case 'bracket_ro512':
                $bracket='bracket_ro256';
                break;
            case 'bracket_ro256':
                $bracket='bracket_ro128';
                break;
            case 'bracket_ro128':
                $bracket='bracket_ro64';
                break;
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

        $bracket_size=getBracketSize($bracket);
        // insert placeholders in child brackets
        for ($j = 1; $j <= $bracket_size; $j++) {
            insertInTable($con, $bracket, 'spot', 'name', $j, '&nbsp;');
        }



    }


    $bracket = selectTable(count($shuffledParticipantsArray));
    $bracket_size = getBracketSize($bracket);
    $bracket_extension = $bracket_size/2;


    for ($i = 0; $i < $bracket_size; $i++) {

        if (getSpecificValue($con, $bracket, 'spot', 'name', $i) == '*BYE*') {
            $byespot = $i;
        }
        if ($byespot % 2 == 0) {
            $opponentSlot = $byespot-1;
        }
        else {
            $opponentSlot = $byespot+1;
        }
        $bye = getSpecificValue($con, $bracket, 'spot', 'name', $byespot);

        $advance = getSpecificValue($con, $bracket,
                'spot', 'name', $opponentSlot);

        if ($bye == "*BYE*") {
            updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2, 2,
                'spot', 'score', $opponentSlot);
            updateTableSpecific($con, 'bracket_ro'.$bracket_extension, $advance,
                'spot', 'name', $opponentSlot/2);
            updateTableSpecific($con, 'bracket_ro'.$bracket_extension*2,
                0, 'spot', 'score', $byespot);

        }
    }

}

function getBracketSize($bracket)
{
    if ($bracket == "none") return "none";
    else return explode("o", $bracket)[1];
}

// function: selectTable, returns correct Table according to number of participants
function selectTable($counter)
{
    for ($i = 2; $i < 4096; $i = $i * 2) {
        if ($counter <= $i) {
            return 'bracket_ro' . "$i";
        }
    }
}

// function: getUserBracket
function getUserBracket($con, $user)
{
    for ($i = 1; $i < 4096; $i = $i * 2) {
        if (checkIfInBracket($con, "bracket_ro" . "$i", $user)) {
            return "bracket_ro" . "$i";
        }
    }
    return "none";
}

// function: checkIfInBracket
function checkIfInBracket($con, $bracket, $user)
{
    for ($i = 1; $i <= count(getValueArray($con, $bracket)); $i++) {
        if (getSpecificValue($con, $bracket, 'spot', 'name', $i) == $user) {
            return true;
        }
    }
    return false;
}

// function: insertInTable
function insertInTable($con, $table, $column1, $column2, $value1, $value2)
{
    mysqli_query($con,"INSERT INTO $table ($column1, $column2)
        VALUES ($value1, '$value2')");
}

// function: updateTableSpecific
function updateTableSpecific($con, $table, $SET, $column1, $column2, $value1)
{
    mysqli_query($con,"UPDATE $table "
                    . "SET $column2 = '$SET' "
                    . "WHERE $column1='$value1'");
}

// function: deleteTableElement
function deleteTableElement($con, $table, $column, $value)
{
    mysqli_query($con,"DELETE FROM $table "
                    . "WHERE $column='$value'");
}

// function: updateBracket, enter <VALUE>, <SPOT>,
// updates <VALUE> @[WHERE] <SPOT>
function updateBracket($con, $input, $spot)
{
    mysqli_query($con,"UPDATE ro16 "
                    . "SET name = '$input' "
                    . "WHERE spot='$spot'");
}

// function: updateBracket8
function updateBracket8($con, $input, $spot)
{
    mysqli_query($con,"UPDATE ro8 "
                    . "SET name = '$input' "
                    . "WHERE spot='$spot'");
}

// function: wipeTable
function wipeTable($con, $table)
{
    mysqli_query($con,"TRUNCATE $table");
}

// function: getEmptySlotV2 - revision

function getEmptySlotV2($con, $bracket)
{
    $valueArray = getValueArray($con, $bracket);
    $emptySlot= count($valueArray);

    for ($i = count($valueArray) - 1; $i >= 0; $i--) {
        if ($valueArray[$i] == '&nbsp;') {
            $emptySlot=$i+1;
        }
    }
    return $emptySlot;
}

/* function: getValue returns specific Value. Enter <TABLE ID>, <SPOT>.
 * Value=<NAME> WHERE <SPOT> */
function getValue($con, $bracket, $i)
{
    $result = mysqli_query($con, "SELECT name "
                               . "FROM $bracket "
                               . "WHERE spot='$i'");
    $valueArray = mysqli_fetch_array($result);
    return $valueArray[0];
}

// function: getValue with specified columns
function getSpecificValue($con, $table, $column1, $column2, $value1)
{
    $result = mysqli_query($con, "SELECT $column2 "
                               . "FROM $table "
                               . "WHERE $column1='$value1'");
    $valueArray = mysqli_fetch_array($result);

    return $valueArray[0];
}

function getValueArray($con, $bracket)
{
    $result = mysqli_query($con, "SELECT name "
                               . "FROM $bracket");
    $valueArray = array();
    while($row = mysqli_fetch_array($result)){
        $valueArray[] = $row['name'];
    }
    return $valueArray;
}


// <------------------------BRACKET FUNCTIONS END------------------------------>

// <------------------------USER FUNCTIONS START------------------------------->

function insertInTable_Users ($con, $table, $column1, $column2, $column3,
    $value1, $value2, $value3)
{
    mysqli_query($con,"INSERT INTO $table ($column1, $column2, $column3) "
                    . "VALUES ('$value1', '$value2', $value3) ");
}

function getInformation_Users($con, $table, $column, $value)
{
    $result = mysqli_query($con, "SELECT $column "
                               . "FROM $table "
                               . "WHERE $column='$value'");
    $valueArray = mysqli_fetch_array($result);

    return $valueArray[0];
}

function getInformation_Users2($con, $table, $column1, $column2, $value)
{
    $result = mysqli_query($con, "SELECT $column1 "
                               . "FROM $table "
                               . "WHERE $column2='$value'");
    $valueArray = mysqli_fetch_array($result);

    return $valueArray[0];
}

// <------------------------USER FUNCTIONS END--------------------------------->
?>
