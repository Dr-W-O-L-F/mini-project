<?php
session_start();
include("header.php");
$email = $_SESSION['email'];
// Rest of your code...
?>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Complaints List</h2>

        <table class="table table-hover">
            <thead>
                <th>
                    <h2 class="title1">Subject</h2>
                </th>
                <th>
                    <h2 class="title1">Email</h2>
                </th>
                <th>
                    <h2 class="title1">Description</h2>
                </th>
                <th>
                    <h2 class="title1">Date & Time</h2>
                </th>
                <th>
                    <h2 class="title1">Status</h2>
                </th>
                <th>
                    <h2 class="title1">View Replay</h2>
                </th>
                <th></th>
            </thead>
            <tbody>
                <?php
                require("connect.php");

                // Use a prepared statement to fetch complaints based on email
                $sql = "SELECT * FROM complaints WHERE email=?";
                $stmt = mysqli_prepare($conn, $sql);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                    $res = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $cmo_id = $row['complaint_id'];
                            $sql1 = "SELECT * FROM complaints WHERE status=1 AND complaint_id=?";
                            $stmt1 = mysqli_prepare($conn, $sql1);
                            mysqli_stmt_bind_param($stmt1, "i", $cmo_id);
                            mysqli_stmt_execute($stmt1);
                            $res1 = mysqli_stmt_get_result($stmt1);

                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['subject'] ?>
                                </td>
                                <td>
                                    <?php echo $row['email'] ?>
                                </td>
                                <td>
                                    <?php echo $row['description'] ?>
                                </td>
                                <td>
                                    <?php echo $row['timestamp'] ?>
                                </td>
                                <td>
                                    <?php
                                    if (mysqli_num_rows($res1) > 0) {
                                        echo "Replied";
                                    } else {
                                        echo "Not Replied";
                                    }
                                    ?>
                                </td>
                                </td>
                                <td>
                                <a class="btn btn-primary" href="replay.php?id=<?php echo $row['complaint_id'] ?>">View Replay</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        // Handle the case where there are no complaints for the given email
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    // Handle the case where the prepared statement could not be created
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include("footer.php");
?>
 