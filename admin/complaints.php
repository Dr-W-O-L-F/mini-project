<?php
include("header.php");
?>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Complaints List</h2>

        <input type="text" id="searchInput" placeholder="Search for complaints">

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
                <th></th>
            </thead>
            <tbody>
                <?php
                require("connect.php");
                $sql = "SELECT * FROM complaints";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $cmo_id = $row['complaint_id'];
                        $sql1 = "SELECT * FROM complaints WHERE status=1 AND complaint_id=$cmo_id";
                        $res1 = mysqli_query($conn, $sql1);
                        ?>

                        <tr class="complaint-row">
                            <td><?php echo $row['subject'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['timestamp'] ?></td>
                            <td><?php echo $row1 = mysqli_num_rows($res1) > 0 ? "Replied" : "Not Replied"; ?></td>
                            <td>
                                <?php if ($row1 = mysqli_num_rows($res1) > 0) : ?>
                                    <a class="btn btn-primary" href="alert.php">Replay</a>
                                <?php else : ?>
                                    <a class="btn btn-primary" href="replay.php?id=<?php echo $row['complaint_id'] ?>">Replay</a>
                                <?php endif; ?>
                            </td>
                        </tr>

                    <?php
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
</div>

<?php
include("footer.php");
?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const complaintRows = document.querySelectorAll(".complaint-row");

        searchInput.addEventListener("input", function () {
            const searchText = searchInput.value.toLowerCase();

            complaintRows.forEach(function (row) {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchText)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });
</script>
