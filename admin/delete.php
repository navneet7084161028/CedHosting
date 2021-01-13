<?php session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$servername="localhost";
$username="root";
$password="";
$dbname = "cedhosting";

$con=mysqli_connect($servername,$username,$password,$dbname);

if(!$con)
{
die("connection failed".mysqli_connect_error());
}

$rid=$_GET['rid'];

$sql="DELETE FROM tbl_product where id='$rid'";

if($con->query($sql)==true)
{
    header("location:index.php");
    // echo "success";
}
else 
{
    echo "query error";
}

?>