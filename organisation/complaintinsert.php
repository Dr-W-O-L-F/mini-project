<html>
<head>
  <script type="text/javascript" src="swal/jquery.min.js"></script>
  <script type="text/javascript" src="swal/bootstrap.min.js"></script>
  <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>


<body>
<?php
require 'connect.php';
session_start();
$email=$_SESSION['email'];
$subject=$_POST['subject'];
$description=$_POST['description'];
$sql="INSERT INTO `complaints`(`complaint_id`,`subject`, `description`, `email`)
 VALUES (NULL,'$subject','$description','$email')";
insert_data($sql);
?>
<script>
          Swal.fire({
            icon: 'success',
            text: 'Complaint Submitted !!!',
            didClose: () => {
              window.location.replace('complaints.php');
            }
          });
        </script>
</body>
</html>