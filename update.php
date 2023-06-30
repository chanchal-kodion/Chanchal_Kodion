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
include ('config.php');
include('header.php');
$id=$_GET['id'];
$sql="SELECT * FROM `register` where id='$id'";
$data=mysqli_query($conn,$sql);
$result=mysqli_num_rows($data);
$details=mysqli_fetch_assoc($data);

// Define variables to store form data and error messages
$name = $phone = $email = $address = $password = $confirmPassword = '';
$nameErr = $phoneErr = $fileErr= $emailErr = $addressErr = $passwordErr = $confirmPasswordErr = '';

// Function to sanitize and validate input data
function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Validate name
  if (empty($_POST['name'])) {
    $nameErr = 'Name is required';
  } else {
    $name = sanitizeInput($_POST['name']);
    // Check if name contains only letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameErr = 'Only letters and whitespace allowed';
    }
  }

  // Validate file upload
  // if (empty($_FILES['uploadfile']['name'])) {
  //   $fileErr = 'File upload is required';
  // } else {
    // Perform file upload validations as per your requirements
    // ...
  // }

  // Validate phone
  if (empty($_POST['phone'])) {
    $phoneErr = 'Phone number is required';
  } else {
    $phone = sanitizeInput($_POST['phone']);
      if(!preg_match("/^[0-9]{10}$/", $phone)) {
          $phoneErr="Mobile must have 10 digits";
        }
    }


  // Validate email
  if (empty($_POST['email'])) {
    $emailErr = 'Email is required';
  } else {
  $email = sanitizeInput($_POST['email']);
  // Check if email is valid
  // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

  if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)){ 
  $emailErr = 'Invalid email format';
    }
  }

  // Validate address
  if (empty($_POST['address'])) {
    $addressErr = 'Address is required';
  } else {
    $address = sanitizeInput($_POST['address']);
  }
  
  if (empty($nameErr)&& empty($phoneErr) && empty($emailErr) && empty($addressErr)) {
    if($email==$details['email'])
    {
  
  $image=$_FILES['uploadfile'];
  if(!empty($_FILES['uploadfile']['name'])){
  $names=$_FILES['uploadfile']['name'];
  $tempname=$_FILES['uploadfile']['tmp_name'];
  $folder="images/".$names;

  move_uploaded_file($tempname,$folder);
  $sql="UPDATE `register` SET `name`='$name',`profile_image`='$names',`email`='$email',address='$address',phone='$phone' WHERE id='$id'";
  $res=mysqli_query($conn,$sql);
  echo $res;
  if($res>0)
                {
          
                  // echo ("<script LANGUAGE='JavaScript'>
                  // window.alert('Data and image Succesfully Updated');
                  // window.location.href='alldata.php';
                  // </script>");

                  echo "<script>";
                  echo " Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Updated successfully!',
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


else
{
    $sql="UPDATE `register` SET `name`='$name',`email`='$email',`address`='$address',`phone`='$phone'WHERE `id`='$id'";
    $res=mysqli_query($conn,$sql);
    if($res>0)
                {          
                  // echo ("<script LANGUAGE='JavaScript'>
                  // window.alert('Data Succesfully Updated');
                  // window.location.href='alldata.php';
                  // </script>");
                  echo "<script>";
                  echo " Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Updated successfully!',
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

  else
  {
    if($email!==$details['email'])
    {
      $email_sql = "SELECT * FROM `register` WHERE `email`='$email'"; 
      $run = mysqli_query($conn,$email_sql);
      $count = mysqli_num_rows($run);
      $row= mysqli_fetch_assoc($run);
      $secondary_email=$row['email'];
    //   echo $secondary_email;
    //   die;
    if($count>0)
    {
      $emailErr= " Please try another email this email already exists";
    }
    else
    {
      $image=$_FILES['uploadfile'];
      if(!empty($_FILES['uploadfile']['name'])){
      $names=$_FILES['uploadfile']['name'];
      $tempname=$_FILES['uploadfile']['tmp_name'];
      $folder="images/".$names;
    
      move_uploaded_file($tempname,$folder);
      $sql="UPDATE `register` SET `name`='$name',`profile_image`='$names',`email`='$email',address='$address',phone='$phone' WHERE id='$id'";
      $res=mysqli_query($conn,$sql);
      echo $res;
      if($res>0)
                    {
              
                      // echo ("<script LANGUAGE='JavaScript'>
                      // window.alert('Data and image Succesfully Updated');
                      // window.location.href='alldata.php';
                      // </script>");
    
                      echo "<script>";
                      echo " Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: 'Updated successfully!',
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
    
    
    else
    {
        $sql="UPDATE `register` SET `name`='$name',`email`='$email',`address`='$address',`phone`='$phone'WHERE `id`='$id'";
        $res=mysqli_query($conn,$sql);
        if($res>0)
                    {          
                      // echo ("<script LANGUAGE='JavaScript'>
                      // window.alert('Data Succesfully Updated');
                      // window.location.href='alldata.php';
                      // </script>");
                      echo "<script>";
                      echo " Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: 'Updated successfully!',
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
    }
  }
  }
      else
      {
        $emailErr= "Already exists";
      }
  } 
?>


    <!-- html -->
    <section>
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card formmargin" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Update your account</h2>

                                <form action="" method="POST" enctype="multipart/form-data">

                                    <div class="form-outline text-center">
                                        <img src="images/<?php echo $details['profile_image'] ?>" height="200px" width="170px"
                                          class="rounded-circle">
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Your Name</label>
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg"
                                            name="name" value="<?php echo $details['name'] ?>" />
                                        <span class="error"><?php echo $nameErr; ?></span>

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg"
                                            value="<?php echo $details['profile_image'] ?>">Profile Image</label>
                                        <input type="file" name="uploadfile" id="form3Example1cg"
                                            class="form-control form-control-lg">

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg"
                                            name="email" value="<?php echo $details['email'] ?>" />
                                        <span class="error"><?php echo $emailErr; ?></span>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Address</label>
                                        <input type="text" id="form3Example4cdg" class="form-control form-control-lg"
                                            name="address" value="<?php echo $details['address'] ?>" />
                                        <span class="error"><?php echo $addressErr; ?></span>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Phone Number</label>
                                        <input type="number" id="form3Example4cdg" class="form-control form-control-lg"
                                            name="phone" value="<?php echo $details['phone'] ?>" />
                                        <span class="error"><?php echo $phoneErr; ?></span>
                                    </div>

                                    <br>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="update"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Update</button>
                                    </div>
                                    <div>
                                        <a href="passwordupdate.php?id=<?php echo $details['id'] ?>">Update
                                            password</a>
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

<?php }?>