<?php

session_start();
if(isset($_SESSION['logined'])){
  include('config.php');
  $id = $_SESSION['logined'];
  $sql1="SELECT * FROM `register` WHERE `id`='$id'";
  $data=mysqli_query($conn,$sql1);
  $result=mysqli_num_rows($data);
  ?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Welcome</title>
  </head>
  <body>

<!-- navbar -->
<?php include('header.php');?>
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">My Web</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="display.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li>
      <a class="nav-link" href="#exampleModalLong" data-toggle="modal" data-target="#exampleModalLong">Logout</a>
      </li>
  </div>
</nav> -->

<div class="container-fluid text-center">

  <h1 style="text-align:center">Welcome</h1>
  <table class="table">
    <thead>
      <tr>
      <!-- <th scope="col">Id</th> -->
      <th scope="col">Profile Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
      </tr>
    </thead>

    <!-- while loop to fetch data from database  -->
    <tbody>
    <?php while($details=mysqli_fetch_array($data)) { ?>
    <tr scope="row">
    <td><img src='images/<?php echo $details['profile_image'];?>' height='80px' width='80px'></td>
    <td><?php echo $details['name'];?></td>
    <td><?php echo $details['email'];?></td>
    <td><?php echo $details['address'];?></td>
    <td><?php echo $details['phone'];?></td>
    
    <td><button class='btn btn-success btn-lg shadow-sm text-white'>
    <a href='update.php?id=<?php echo $details['id'] ?>' class="modal-button">Update</a></button></td>
    </tr>

  </tbody>
  </table>
  
  </div>
  <!-- modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you really want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success text-white" data-dismiss="modal" ><a href="display.php"class="modal-button">No</a></button>
        <button type="button" class="btn btn-danger text-white" ><a class="modal-button" href="logout.php">Yes</a></button>
      </div>
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
  </html>
  <?php } }?>