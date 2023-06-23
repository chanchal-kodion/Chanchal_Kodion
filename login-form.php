
<?php
session_start();
include ('config.php');
if(isset($_SESSION['logined'])){
    header('location:alldata.php');
}
else{
// Define variables to store form data and error messages
$email = $password ='';
$emailErr =$passwordErr= '';

// Function to sanitize and validate input data
    function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validate email
    if (empty($_POST['email'])) {
    $emailErr = 'Email is required';
    } else {
    $email = sanitizeInput($_POST['email']);
    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = 'Invalid email format';
    }
    }

    if (empty($_POST['password'])) {
    $passwordErr = 'Password is required';
    } else {
    $password = sanitizeInput($_POST['password']);
    // Perform password validation as per your requirements
    // ...
    }
 
    if(empty($emailErr)&&empty($passwordErr)){

    $sql="SELECT * FROM `register` WHERE `email`='$email' &&  `password`= md5('$password')";

    $result = mysqli_query($conn,$sql);
    // print_r($result);
    $session_id="";
    foreach($result as $value){
      // print_r($value['id']);
      $session_id=$value['id'];
    }
    $res=mysqli_num_rows($result);
    if($res>0)
    {
    $_SESSION['logined']=$session_id;
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Logined Successfully');
    window.location.href='alldata.php';
    </script>");

    }
    else{
        $passwordErr= "please enter a valid email and password";
    }
  }
}
}
?>

<!doctype html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
  </head>
  <body>
    <div class="container">
    <div class="row justify-content-center custom-margin">
        <div class="col-md-4 col-sm-6 col-lg-6">

            <form action="" method="POST" class="shadow-lg p-4">
                <div class="form-group">
                <i class="fa-regular fa-user"></i>
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email"  name ="email" id ="email" class="form-control" value="<?php echo $email; ?> " placeholder="Email" required >  
                <span class="error"><?php echo $emailErr; ?></span> 
                </div>

                <i class="fa-regular fa-key"></i>
                <label class="font-weight-bold">Password</label>
                <div class="input-group">
                <input type="password" class="form-control" name="password" id="myInput" placeholder="password" value="<?php echo $password ;?>" required  maxlength="32">
                <div class="input-group-append">
                <button class="btn btn-secondary" type="button" onclick="myFunction()"><i class="fa fa-eye" aria-hidden="true"></i></button>
                </div>
                </div>
                <div class="row">
                <span class="error"><?php echo $passwordErr; ?></span>
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-success btn-lg btn-block shadow-sm">Login</button>
            </form>

                <p class="text-center text-muted mt-5 mb-0">Don't Have Account Register? <a href="register-form.php"
                class="fw-bold text-body error"><u>Register here</u></a></p>

        </div>
    </div>
</div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>


<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
