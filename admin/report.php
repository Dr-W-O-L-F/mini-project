<!DOCTYPE html>
<html>
<head>
    <title>Your Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php
    include("header.php");
    require("connect.php");
    ?>

    <div id="page-wrapper">
        <div class="main-page">
            <h2 class="title1">Report</h2>

            <?php
            // Establish a database connection (you should have a database connection set up)

            // Perform the SQL query to count the number of rows in the 'request_form' table
            $sql = "SELECT COUNT(*) AS request_count FROM request_form";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $requestCount = $row['request_count'];
            } else {
                // Handle the query error
                $requestCount = "N/A"; // Set a default value or error message
            }

            // Perform the SQL query to calculate the total revenue
            $sql = "SELECT SUM(amount) AS total_amount FROM payment";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalRevenue = $row['total_amount'];
            } else {
                // Handle the query error
                $totalRevenue = "N/A"; // Set a default value or error message
            }

            // Perform the SQL query to count the number of rows in the 'registration_organisation' table
            $sql = "SELECT COUNT(*) AS organization_count FROM registration_organisation";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $organizationCount = $row['organization_count'];
            } else {
                // Handle the query error
                $organizationCount = "N/A"; // Set a default value or error message
            }

            // Perform the SQL query to count the number of rows in the 'registration_donor' table
            $sql = "SELECT COUNT(*) AS user_count FROM registration_donor";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $userCount = $row['user_count'];
            } else {
                // Handle the query error
                $userCount = "N/A"; // Set a default value or error message
            }

            // Perform the SQL query to fetch the total amount by time_stamp
            $sql = "SELECT time_stamp, SUM(amount) AS total_amount FROM payment GROUP BY time_stamp";
            $result = mysqli_query($conn, $sql);

            $timestamps = [];
            $amountsByTimestamp = [];
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $timestamps[] = $row['time_stamp'];
                    $amountsByTimestamp[] = $row['total_amount'];
                }
            }

            // Perform the SQL query to fetch the total number of requests by date
            $sql = "SELECT date, COUNT(*) AS request_count_by_date FROM request_form GROUP BY date";
            $result = mysqli_query($conn, $sql);

            $dates = [];
            $requestsByDate = [];
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $dates[] = $row['date'];
                    $requestsByDate[] = $row['request_count_by_date'];
                }
            }

            // Close the database connection if needed
            ?>
<a href="donation_requests.php">
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                    <div class="stats">
                        <h5><strong><?php echo $requestCount; ?></strong></h5>
                        <span>Total Requests</span>
                    </div>
                </div>
                <canvas id="requestsChart" width="150" height="150"></canvas>
            </div>
        </a>
        <a href="donationdetails.php">
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar icon-rounded"></i>
                    <div class="stats">
                        <h5><strong><?php echo $totalRevenue; ?></strong></h5>
                        <span>Total Collection</span>
                    </div>
                </div>
                <canvas id="collectionChart" width="150" height="150"></canvas>
            </div>
        </a>
        <a href="organizationdetails.php">
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                    <div class="stats">
                        <h5><strong><?php echo $organizationCount; ?></strong></h5>
                        <span>Organizations</span>
                    </div>
                </div>
                <canvas id="organizationsChart" width="150" height="150"></canvas>
            </div>
        </a>
        <a href="donors.php">
            <div class="col-md-3 widget">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                    <div class="stats">
                        <h5><strong><?php echo $userCount; ?></strong></h5>
                        <span>Total Users</span>
                    </div>
                </div>
                <canvas id="usersChart" width="150" height="150"></canvas>
            </div>
        </a>
            <div class="bg-effect">
                <ul class="bt-list">
                </ul>
            </div>
        </div>            <div class="clearfix"></div>
        <div class="clearfix"></div>


        <div class="charts">
            <div class="mid-content-top charts-grids">
                <div class="middle-content">
                    <h4 class="title"> Request By Date Graph</h4>
                    <!-- start content_slider -->
                    <canvas id="lineChartByDate" width="300" height="150"></canvas>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="charts">
            <div class="mid-content-top charts-grids">
                <div class="middle-content">
                    <h4 class="title">Amount Received By Timestamp Graph</h4>
                    <!-- start content_slider -->
                    <canvas id="lineChartByTimestamp" width="300" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Access the canvases and create charts here
            const requestsCtx = document.getElementById('requestsChart').getContext('2d');
            const collectionCtx = document.getElementById('collectionChart').getContext('2d');
            const organizationsCtx = document.getElementById('organizationsChart').getContext('2d');
            const usersCtx = document.getElementById('usersChart').getContext('2d');
            const lineCtxByTimestamp = document.getElementById('lineChartByTimestamp').getContext('2d');
            const lineCtxByDate = document.getElementById('lineChartByDate').getContext('2d');

            new Chart(requestsCtx, {
                type: 'bar',
                data: {
                    labels: ['Requests'],
                    datasets: [{
                        label: 'Data Count',
                        data: [<?php echo $requestCount; ?>],
                        backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                        borderColor: ['rgba(255, 99, 132, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            new Chart(collectionCtx, {
                type: 'bar',
                data: {
                    labels: ['Collection'],
                    datasets: [{
                        label: 'Data Count',
                        data: [<?php echo $totalRevenue; ?>],
                        backgroundColor: ['rgba(54, 162, 235, 0.2)'],
                        borderColor: ['rgba(54, 162, 235, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            new Chart(organizationsCtx, {
                type: 'bar',
                data: {
                    labels: ['Organizations'],
                    datasets: [{
                        label: 'Data Count',
                        data: [<?php echo $organizationCount; ?>],
                        backgroundColor: ['rgba(255, 206, 86, 0.2)'],
                        borderColor: ['rgba(255, 206, 86, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            new Chart(usersCtx, {
                type: 'bar',
                data: {
                    labels: ['Users'],
                    datasets: [{
                        label: 'Data Count',
                        data: [<?php echo $userCount; ?>],
                        backgroundColor: ['rgba(75, 192, 192, 0.2)'],
                        borderColor: ['rgba(75, 192, 192, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            new Chart(lineCtxByTimestamp, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($timestamps); ?>,
                    datasets: [{
                        label: 'Amount Received by Timestamp',
                        data: <?php echo json_encode($amountsByTimestamp); ?>,
                        borderColor: ['rgba(75, 192, 192, 1)'],
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Timestamp'
                            },
                            beginAtZero: true
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Total Amount'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            new Chart(lineCtxByDate, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($dates); ?>,
                    datasets: [{
                        label: 'Requests by Date',
                        data: <?php echo json_encode($requestsByDate); ?>,
                        borderColor: ['rgba(255, 99, 132, 1)'],
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            },
                            beginAtZero: true
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Request Count'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
