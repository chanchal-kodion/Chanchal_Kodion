<?php
session_start();
if(isset($_SESSION['logined'])){
  include('config.php');
  include('header.php');
  $id = $_SESSION['logined'];
  $sql1="SELECT * FROM `register` WHERE `id`='$id'";
  $data=mysqli_query($conn,$sql1);
  $result=mysqli_num_rows($data);
  ?>
<?php ?>
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
    <a href='update.php?id=<?php echo $details['id'] ?>' style=color:white; class="modal-button">Update</a></button></td>
    </tr>

  </tbody>
  </table>
  
  </div>



  <?php
  include('footer.php');
   } 
  }
  ?>