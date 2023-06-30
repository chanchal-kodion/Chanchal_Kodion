<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>update Form</title>
</head>

<body>

<?php

session_start();
if(isset($_SESSION['logined'])){
  session_unset();
}

echo "<script>";
echo " Swal.fire({
    icon: 'success',
    title: 'Logout!',
    text: 'Logged out Successfully!',
    showConfirmButton: false,
    timer: 2500
  }).then(() => {
    window.location.href='login-form.php';
  })";
  echo "</script>";
?>

</body>
</html>