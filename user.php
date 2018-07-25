<?php
$title="home";
include "layout/layoutHeader.php";
?>
    <?php

        $connection = mysqli_connect("127.0.0.1", 'root', '', 'world_cup');

        $query = 'select * from user';

        $result=mysqli_query($connection, $query);

        ?>


        <div class="container">
            <div class="row">
                <h1>User LIst</h1>
                <table class="table table-striped">

                    <tr>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                   <?php while($user = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $user['firstName']; ?></td>
                        <td><?php echo $user['lastName']; ?></td>
                        <td>jkrish97@yahoo.com<</td>]; ?></td>
                        <td>
                            <button class="btn btn-primary">Aceept</button>
                            <button class="btn btn-danger">Reject</button>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
<?php

include "layout/layoutFooter.php";
?>