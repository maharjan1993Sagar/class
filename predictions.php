<?php
session_start();
$title="home";
include "layout/layoutHeader.php";
?>
<?php
if($_SESSION["id"]===null)
{
    echo "<script>
        alert('Log in Required.');
        window.location.href='login.php';
        </script>";

}
include "crud.php";
$id=$_SESSION["id"];
$sql = 'select p.id ,u.first_name,u.last_name,m.home_team,m.away_team,p.home_team_score,p.away_team_score from users as u inner join predictions as p on u.id=p.user_id inner join matches as m on m.id=p.match_id';
$result=selectData($sql);

?>
<?php
$msg=null;
?>
    <div class="container">
        <div class="row">

            <div clss="col-md-12">

                <h2>Prediction List</h2>
                <table class="table table-responsive table-bordered table-striped">
                    <tr>
                        <th>Home Team</th>
                        <th>Away Team</th>
                        <th>User</th>
                        <th>Edit</th>
                    </tr>
                    <?php

                    if($result!="zero" && $result!=null){
                        $prediction=$result->fetch_assoc();
                            while ($prediction) {
                                ?>
                                <tr>
                                    <td><?php echo $prediction["home_team"] . "-" . $prediction["home_team_score"] ?></td>
                                    <td><?php echo $prediction["away_team"] . "-" . $prediction["away_team_score"] ?></td>
                                    <td><?php echo $prediction["first_name"] . " " . $prediction["last_name"] ?></td>
                                    <td><a class="text-primary"
                                           href=<?php echo 'prediction.php?predict_id=' . $prediction["id"] . '&match_id=0' ?>><i
                                                    class="fa fa-pencil"></i></a></td>
                                    <!--| <a class="text-danger" href=<?php #echo 'prediction.php?predict_id='. $prediction["id"].'&match_id=0'?>><i class="fa fa-minus-circle"></i></a></td>-->
                                </tr>
                            <?php
                            }
                        }
                        else{
                        ?>
                            <tr><td colspan="4">No Record Found.</td></tr>
                        <?php
                    }
                    ?>
                </table>
            </div>

        </div>

    </div>
<?php

include "layout/layoutFooter.php";
?>