<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</html>
<?php
    require("connect.php");
    $donation_id = $_GET['id'];
    $sql="DELETE FROM request_form WHERE donation_id='$donation_id'";
    mysqli_query($conn,$sql);
    $sql1="DELETE FROM total_amount WHERE request_id='$donation_id'";
    mysqli_query($conn,$sql1);
?>
            <script>
                                        Swal.fire({
                                icon: 'success',
                                text: 'Form Deleted successfully ',
                                didClose: () => {
                              window.location.href = "organizationdetails.php";
                                }
                                });
            </script>