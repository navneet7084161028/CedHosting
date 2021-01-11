<?php
session_start();
$b = $_POST['data'];

if($b == $_SESSION['otp']){
    echo "OTPMatch";
}else{
    echo "Invalid OTP";
}
?>