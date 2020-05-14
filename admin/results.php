<?php
$title = "Results";
session_start();
require_once "../include/connection.php";
require_once "includes/auth.php";
$query = mysqli_query($connect, 'SELECT * FROM positions ORDER BY name ASC');
include "includes/header.php";
?>
<div class="container">
    <div class="top-header">
        Welcome <?php echo $_SESSION['fullname']; ?>
    </div>
    <div class="content">
        <b>Votes</b>
    </div>
    <div class="content cf">
        <?php while ($row = mysqli_fetch_array($query)) { ?>
            <div style="border: 1px solid #000; padding: 20px; margin-bottom: 50px">
                <b><?php echo $row['name']; ?></b>
                <hr>
                <!-- select nominees -->
                <table class="table" style="margin: 30px 0">
                    <tr>
                        <td><b> Name </b> </td>
                        <td><b> Results </b> </td>
                    </tr>

                    <?php
                    $data = [];
                    $position_id = $row['id'];
                    $nominees = mysqli_query($connect, "SELECT * FROM nominees WHERE position = '$position_id'");
                    while ($rows = mysqli_fetch_array($nominees)) {
                    ?>
                        <tr>
                            <td> <b> <?php echo $rows['name']; ?> </b>
                            <td>
                                <?php
                                // get candidate total votes 
                                $nominee_id = $rows['id'];
                                $total_votes = mysqli_query($connect, "SELECT count(*) AS total_votes FROM votes WHERE nominee_id = '$nominee_id'");
                                $fetch = mysqli_fetch_array($total_votes);
                                echo $total_votes =  $fetch['total_votes'];
                                if($total_votes != 0){
                                    $a = [$nominee_id =>$total_votes];
                                    $data += $a;
                                }
                                ?>
                            </td>
                        </tr>
                    <?php }  ?>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td> Highest Votes</td>
                        <td>
                        <?php 
                        if(count($data)) {
                            $value = max($data);
                            $winner_id = array_search($value,$data); 
                            $nominees = mysqli_query($connect, "SELECT * FROM nominees WHERE id = '$winner_id'");
                            $fetch_name = mysqli_fetch_array($nominees);
                            echo $fetch_name['name'];
                        } ?>
                        </td>
                    </tr>
                </table>
            </div>
        <?php } ?>
    </div>
</div>
<?php include "includes/footer.php"; ?>