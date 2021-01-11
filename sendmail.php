<?php 
  
  use PHPMailer\PHPMailer\PHPMailer; 
  use PHPMailer\PHPMailer\Exception; 
    
  require 'vendor/autoload.php'; 
  
  $email = $_POST['email'];
  session_start();
  $a = rand(999,9999);
  $_SESSION['email']=$email;
  $_SESSION['otp']=$a;
  
  $mail = new PHPMailer(true); 
    try {                                        
      $mail->isSMTP();                                             
      $mail->Host       = 'smtp.gmail.com;';                     
      $mail->SMTPAuth   = true;      

      $mail->Username   = 'mitmsingh123@gmail.com';                  
      $mail->Password   = 'mitmnavneet';        
                       
      $mail->SMTPSecure = 'tls';                               
      $mail->Port       = 587;   
    
      $mail->setFrom('mitmsingh123@gmail.com','Navneet');            
      $mail->addAddress($email);  
         
      $mail->isHTML(true);                                   
      $mail->Subject = 'Subject'; 
      $mail->Body = $a; 

      $mail->send(); 
      echo "Mail Sent"; 
  } 
  catch (Exception $e) { 
      echo "Mail not sent: {$mail->ErrorInfo}"; 
  } 
    
  ?> 