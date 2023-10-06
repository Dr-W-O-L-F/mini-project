<?php
include("header.php");
// Rest of your code...
?>
<style>
    .main-page {
        min-height: calc(100vh - 200px); /* Adjust the height as needed */
    }
</style>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Reply</h2>
<?php
if (isset($_GET['id'])) {
    $complaint_id = $_GET['id'];
    require("connect.php");

    // Assuming your database connection is established and stored in $conn
    $sql = "SELECT subject, description, replay FROM complaints WHERE complaint_id=?";
    
    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the complaint_id parameter
        mysqli_stmt_bind_param($stmt, "i", $complaint_id);

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Bind the result to variables
        mysqli_stmt_bind_result($stmt, $subject, $description, $reply);

        // Fetch the result
        if (mysqli_stmt_fetch($stmt)) {
            if (!empty($reply)) {
                // $reply is not empty, so display it along with subject and description
                echo "Subject: <h4>" . $subject . "</h4><br>";
                echo "Description: <h4>" . $description . "</h4><br>";
                echo "Reply: <h4>" . $reply . "</h4>";
            } else {
                // $reply is empty, display "Not replied"
                ?>
                <html>
                <head>
                  <script type="text/javascript" src="swal/jquery.min.js"></script>
                  <script type="text/javascript" src="swal/bootstrap.min.js"></script>
                  <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
                </head>
                <body>
                <script>
          Swal.fire({
            icon: 'error',
            text: 'Not Replied Yet !!!',
            didClose: () => {
              window.location.replace('complaintdetails.php');
            }
          });
        </script>
        
</body>
</html>
<?php
            }
        } else {
            echo "No result found.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing SQL statement.";
    }
}
?>
        <div class="clearfix"> </div>
    </div>
</div>

<?php
include("footer.php");
?>
