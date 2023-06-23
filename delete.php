<?php

session_start();
if(isset($_SESSION['logined'])){
  include('config.php');
  if(isset($_POST['yes'])){
  $id=$_POST['yes'];
  echo $id;
  die;
  }
  $sql1="DELETE FROM `register` WHERE `id`='$id'";
//   $data=mysqli_query($conn,$sql1);
  if($data){
  echo "Delte";
}
else
{
    echo "failed";
}
}
  ?>