<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">My Web</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="display.php">Profile</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="alldata.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " href="addnewuser.php">Add New User</a>
            </li>
            <li>
                <a class="nav-link" href="" data-toggle="modal"
                data-target="#exampleModalLong">Logout</a>
            </li>
    </div>
</nav>

    <!-- Logout modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
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
                    <button type="button" class="btn btn-success text-white" data-dismiss="modal"><a href="display.php"
                            class="modal-button">No</a></button>
                    <button type="button" class="btn btn-danger text-white"><a class="modal-button"
                            href="logout.php">Yes</a></button>
                </div>
            </div>
        </div>
    </div>
