<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
include ('config.php');
include ('header.php');
// $id=$_SESSION['logined'];
$id=$_GET['id'];
// echo $id;
$sql="SELECT password FROM `register` where id='$id'";
$data=mysqli_query($conn,$sql);
$result=mysqli_num_rows($data);
$details=mysqli_fetch_assoc($data);
// echo $details['password'];
// Define variables to store form data and error messages
$oldpassword = $newpassword = $renewpassword = '';
$oldpassErr = $newpassErr = $renewpasswordErr = '';

// Function to sanitize and validate input data
function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // old password
      if(empty($_POST['oldpass'])) {
        $oldpassErr = 'Please fill the password';
      } else {
        $oldpassword = sanitizeInput($_POST['oldpass']);
        // echo md5($oldpassword);
      //  echo" <br>";
        // echo $details['password'];
        // die;
      if(md5($oldpassword)==$details['password'])
        {
        // echo $oldpassword;
        // echo "hello";
        }
      else
        {
        $oldpassErr="Wrong password";   
        }
      }

      // newpassword
      if(empty($_POST['newpass'])) {
        $newpassErr = 'Please fill the password';
      } else {
        $newpassword = sanitizeInput($_POST['newpass']);
        $uppercase = preg_match('@[A-Z]@', $newpassword);
        $lowercase = preg_match('@[a-z]@', $newpassword);
        $number    = preg_match('@[0-9]@', $newpassword);
        $specialChars = preg_match('@[^\w]@', $newpassword);
      if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newpassword) < 8) {
        $newpassErr='Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        }
      }

    //  renewpassword
    if(empty($_POST['renewpass'])) {
      $newpassErr = 'Please fill the password';
      } else {
      $renewpassword = sanitizeInput($_POST['renewpass']);
      $uppercase = preg_match('@[A-Z]@', $renewpassword);
      $lowercase = preg_match('@[a-z]@', $renewpassword);
      $number    = preg_match('@[0-9]@', $renewpassword);
      $specialChars = preg_match('@[^\w]@', $renewpassword);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($renewpassword) < 8) {
      $renewpasswordErr='Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
      }
      }
    
    if($newpassword!== $renewpassword) {
      $renewpasswordErr = 'Password and confirm password do not match';
      }

    if($oldpassword == $renewpassword) {
      $renewpasswordErr = 'New password cannot be same as old password';
      }
      
  if(empty($oldpassErr) && empty($newpassErr) && empty($renewpasswordErr)){
    $newpassword=$_POST['newpass'];
    $sql="UPDATE register SET password = md5('$newpassword') WHERE id='$id'";
    $result=mysqli_query($conn,$sql);

  if($result)
    {
    // echo ("<script LANGUAGE='JavaScript'>
    // window.alert('Password Succesfully Updated');
    // window.location.href='display.php';
    // </script>");
    echo "<script>";
    echo " Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Password Updated successfully!',
        showConfirmButton: false,
        timer: 2500
      }).then(() => {
        window.location.href = 'alldata.php';
      })";

      echo "</script>";

    }
  else 
    {
    echo "Unable to Update";
    }

    }
  }
?>

    <!-- update form -->
    <section>
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card formmargin" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Update your password</h2>
                                <form action="" method="POST">

                                    <i for="myInput3" class="fa-regular fa-key"></i>
                                    <label class="font-weight-bold">Old Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="oldpass" id="myInput3"
                                            value="<?php echo $oldpassword  ?>" placeholder="Old password" required
                                            maxlength="32">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button" onclick="myFunction3()"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <span class="error"><?php echo $oldpassErr; ?></span>
                                    </div>
                                    <br>

                                    <i class="fa-regular fa-key"></i>
                                    <label class="font-weight-bold">New password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="newpass" id="myInput1"
                                            placeholder="New password" value="<?php echo $newpassword  ?>" required
                                            maxlength="32">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button" onclick="myFunction1()"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <span class="error"><?php echo $newpassErr; ?></span>
                                    </div>
                                    <br>

                                    <i class="fa-regular fa-key"></i>
                                    <label class="font-weight-bold">Confirm Newpassword</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="renewpass" id="myInput2"
                                            value="<?php echo $renewpassword  ?>" placeholder="Confirm Newpassword"
                                            required maxlength="32">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button" onclick="myFunction2()"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <span class="error"><?php echo $renewpasswordErr; ?></span>
                                    </div>
                                    <br>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="update"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body"><a
                                                class="modal-button">Update Password</a></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>

<script>
function myFunction3() {
    var x = document.getElementById("myInput3");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function myFunction1() {
    var x = document.getElementById("myInput1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function myFunction2() {
    var x = document.getElementById("myInput2");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>

<?php   
}
?>