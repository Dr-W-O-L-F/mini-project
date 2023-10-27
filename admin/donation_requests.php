<?php
include("header.php");
?>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Request Details</h2>

        <input type="text" id="searchInput" placeholder="Search for request details">

        <table class="table table-hover">
            <thead>
                <th>
                    <h2 class="title1">Donation Type</h2>
                </th>
                <th>
                    <h2 class="title1">Estimated Amount</h2>
                </th>
                <th>
                    <h2 class="title1">Account Number</h2>
                </th>
                <th>
                    <h2 class="title1">Status</h2>
                </th>
                <th>
                    <h2 class="title1">View</h2>
                </th>
                <th></th>
            </thead>
            <tbody>
                <?php
                require("connect.php");
                $sql = "SELECT * FROM request_form";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['donation_id'];
                        $sql1 = "SELECT * FROM total_amount WHERE request_id=$id";
                        $res1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($res1) > 0) {
                            while ($row1 = mysqli_fetch_assoc($res1)) {
                ?>
                                <tr class="request-row">
                                    <td><?php echo $row['donation_type'] ?></td>
                                    <td><?php echo $row['estimated_amount'] ?></td>
                                    <td><?php echo $row['account_number'] ?></td>
                                    <td><?php echo ($row1['recieved_amount'] >= $row['estimated_amount']) ? "Complete" : "Incomplete"; ?></td>
                                    <td><a class="btn btn-primary" href="showrequest.php?id=<?php echo $row['donation_id'] ?>">View</a></td>
                                </tr>
                <?php
                            }
                        }
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
        const requestRows = document.querySelectorAll(".request-row");

        searchInput.addEventListener("input", function () {
            const searchText = searchInput.value.toLowerCase();

            requestRows.forEach(function (row) {
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
