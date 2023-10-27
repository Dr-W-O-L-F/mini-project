<?php
include("header.php");
?>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Donors</h2>

        <input type="text" id="searchInput" placeholder="Search for donors">

        <table class="table table-hover">
            <thead>
                <th>
                    <h2 class="title1">Donor Name</h2>
                </th>
                <th>
                    <h2 class="title1">Email</h2>
                </th>
                <th>
                    <h2 class="title1">Mobile</h2>
                </th>
                <th>
                    <h2 class="title1">Street</h2>
                </th>
                <th>
                    <h2 class="title1">District</h2>
                </th>
                <th>
                    <h2 class="title1">Pin</h2>
                </th>
                <th></th>
            </thead>
            <tbody>
                <?php
                require("connect.php");
                $sql = "SELECT * FROM registration_donor";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                        <tr class="donor-row">
                            <td><?php echo $row['full_name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['mob'] ?></td>
                            <td><?php echo $row['street'] ?></td>
                            <td><?php echo $row['district'] ?></td>
                            <td><?php echo $row['pincode'] ?></td>
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
        const donorRows = document.querySelectorAll(".donor-row");

        searchInput.addEventListener("input", function () {
            const searchText = searchInput.value.toLowerCase();

            donorRows.forEach(function (row) {
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
