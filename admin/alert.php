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
            text: 'Alrady Replied !!!',
            didClose: () => {
              window.location.replace('complaints.php');
            }
          });
        </script>
        </body>
        </html>