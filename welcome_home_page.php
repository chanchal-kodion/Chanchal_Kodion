<?php
session_start();
if(isset($_SESSION['logined'])){
include('header.php');
?>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-5 mt-3">
            <h1 style="font-size:75px;">A platform built for faster way of Working!</h1>
            <h2>You are just one click away to get your team!</h2>
            <a href="addnewuser.php"><button type="button" class="btn btn-primary btn-lg mt-4">Click here</button></a>
<!-- <button type="button" class="btn btn-secondary btn-lg">Large button</button> -->
            </div>
            <div class="col-lg-7 pr-0 ">
                <img src="/registrationform_new/images/welcome.avif" class="img-fluid w-100" alt="">
            </div>
        </div>
    </div>
    <?php 
include('footer.php');
}
?>