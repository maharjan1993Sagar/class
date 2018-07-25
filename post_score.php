<?php
session_start();
include "crud.php";
$userId = $_SESSION["id"];

$matchId = $_POST['match_id'];
$homeTeamScore = $_POST['home_score'];
$awayTeamScore = $_POST['away_score'];
$predictId=$_POST['predict_id'];

if($predictId==0) {
    $selectQuery = 'select  id from predictions where match_id="' . $matchId . '" and user_id="' . $userId . '"';
   $result=selectData($selectQuery);

    if($result!="zero" && $result!=null) {
        echo "Already Predicted for Selected Match";
    } else {
         $insertResult=insertprediction($homeTeamScore,$awayTeamScore,$matchId,$userId);

        if ($insertResult) {
            //$msg="Record Inserted Successfully!";
           // echo "success";
            header('Location: predictions.php');

        }
    }
}
else if($predictId>0)
{
    $result=updatePrediction($homeTeamScore,$awayTeamScore,$matchId,$userId,$predictId);

    if($result)
    {
        header("Location:predictions.php");
       // echo "success";
    }

}