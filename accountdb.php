<?php  session_start();
	require 'connect.php';

$email = $_POST['email'];
$uname = $_POST['uname'];
$number = $_POST['number'];
$password = $_POST['password'];
$question = $_POST['question'];
$answer = $_POST['answer'];
// print_r($_POST);die;
$e_approve = 1;
$p_approve = 1;
$active = 1;
$is_admin = 0;

$_SESSION['email'] = $email;
$_SESSION['name'] = $uname;
$_SESSION['number'] = $number;


$sql = "INSERT INTO `tbl_user`(`email`, `name`, `mobile`, `email_approved`, `phone_approved`,`active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) 
    VALUES ('$email', '$uname', '$number', '$e_approve', '$p_approve', '$active', '$is_admin', now(), '$password', '$question', '$answer')";
    
if ($conn->query($sql) === TRUE) {
    echo "1";
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
