
<?php
$username="root";
$password="";
$servername="localhost";
$dbname="p1";
$conn=new mysqli($servername,$username,$password,$dbname);
if(!$conn){
    echo "error";
}
?> 