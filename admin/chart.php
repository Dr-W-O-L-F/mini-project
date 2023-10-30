<?php
require("connect.php");

if (isset($_GET['startDate']) && isset($_GET['endDate'])) {
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];

    $totalUsers = getTotalUsersCount($conn, $startDate, $endDate);

    echo json_encode($totalUsers);
} else {
    echo json_encode(0);
}

// Function to fetch the total users count based on the selected date range
function getTotalUsersCount($conn, $startDate, $endDate) {
    $sql = "SELECT COUNT(*) AS user_count FROM request_form WHERE date BETWEEN '$startDate' AND '$endDate'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['user_count'];
    } else {
        return 0;
    }
}
?>
