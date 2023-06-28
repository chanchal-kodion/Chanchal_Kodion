<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
</head>

<body>

    <?php

session_start();
if(isset($_SESSION['logined'])){
  include('config.php');
  if(isset($_POST['yes'])){
  $id=$_POST['yes'];
  }
  // $sql1="DELETE FROM `register` WHERE `id`='$id'";
  $sql1="UPDATE `register` set `status`='1' WHERE `id`='$id'";
  $data=mysqli_query($conn,$sql1);
  if($data){
    echo "<script>";
    echo " Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Deleted successfully!',
        showConfirmButton: false,
        timer: 2500
      }).then(() => {
        window.location.href = 'alldata.php';
      })";
      echo "</script>";
  }
else
{
    // echo "failed";
    echo "<script>";
    echo " Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Unable to delete!',
        showConfirmButton: false,
        timer: 2500
      }).then(() => {
        window.location.href = 'alldata.php';
      })";

      echo "</script>";
}
}
  ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>