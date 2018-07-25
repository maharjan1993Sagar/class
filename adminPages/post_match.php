<?php

include "crud.php";
$homeTeam = $_POST['home_team'];
$awayTeam = $_POST['away_team'];

$sql="Select * from matches where home_team='".$homeTeam."' && away_team='".$awayTeam."'";
$result=selectData($sql);

if($result=="zero" || $result==null)
{
$resultMatch=insertMatch($homeTeam,$awayTeam);
if($resultMatch){
    header("location:matches.php");
   //echo "success";
}
else{
    echo "Error";

}
}

