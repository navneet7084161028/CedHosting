<?php
session_start();
$b = $_POST['num'];
// echo $b;

if($b == $_SESSION['otp']){
    echo "Verify";
}else{
    echo "Invalid OTP";
}

?>