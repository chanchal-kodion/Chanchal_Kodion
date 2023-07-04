    <?php
    session_start();
    if(isset($_SESSION['logined'])){
    include('config.php');
    $id = $_SESSION['logined'];
    $sql1="SELECT * FROM `register` where `status`='0' && `id`!= $id && `added_user_id`=$id";
    $data=mysqli_query($conn,$sql1);
    $result=mysqli_num_rows($data);
    if($result==0)
    {
    header('location:welcome_home_page.php');
    }
    else{
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">My Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="profile_page.php">Profile</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="home_page.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link " href="addnewuser.php">Add New User</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link " id="myButton" data-toggle="modal" data-target="mymodal" href="">Logout</a>
                    </li>
            </div>
        </nav>

        <div class="container-fluid mt-4">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php while($details=mysqli_fetch_array($data)) { ?>
                    <tr scope="row">
                        <td><img src='images/<?php echo $details['profile_image'];?>' height='80px' width='80px'></td>
                        <td><?php echo $details['name'];?></td>
                        <td><?php echo $details['email'];?></td>
                        <td><?php echo $details['address'];?></td>
                        <td><?php echo $details['phone'];?></td>

                        <td><button class="btn btn-secondary btn-md">
                                <a style=color:white;
                                    href='update.php?id=<?php echo $details['id'] ?>'>Edit</a></button>
                            <button name="delete" class="btn btn-dark btn-md">
                                <a style=color:white; data-toggle="modal" data-target="#exampleModalLongg"
                                    onclick="getDeleteElementId(<?php echo $details['id'] ?>);"
                                    href='#'>Delete</a></button>
                        </td>

                    </tr>

                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                        <button type="button" class="btn btn-success text-white" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger text-white"><a class="modal-button"
                                href="logout.php">Yes</a></button>
                    </div>
                </div>
            </div>
        </div>

        <!--Delete modal -->
        <div class="modal fade" id="exampleModalLongg" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLonggTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLonggTitle">Are you sure?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Do you really want to delete this account?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success text-white" data-dismiss="modal">No</button>
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="yes" value="" id="delete-btn">
                            <button type="submit" name="no" id="heewk"
                                class="btn btn-danger text-white modal-btn">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- logout modal -->

        <!-- Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Are you sure?</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Do you really want to logout?</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>

                        <div>
                            <button onclick="redirectToPage()" type="button" class="btn btn-danger"
                                data-dismiss="modal">Yes</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


        <!-- modal -->

        <script>
        // JavaScript to show the modal when the button is clicked
        document.getElementById('myButton').addEventListener('click', function() {
            $('#myModal').modal('show');
        });
        </script>

        <script>
        // $('#example').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
        </script>

        <script>
        function getDeleteElementId(id) {
            document.getElementById('delete-btn').setAttribute('value', id);
            // console.log(document.getElementById('delete-btn'));  
        }
        </script>
    </body>

    <script>
function redirectToPage() {
    window.location.href = "logout.php";
}
    </script>

    </html>

    <?php } } ?>