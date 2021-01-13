<?php  
include "tbl_user.php";

$user=new tbl_user();
if(isset($_POST['email'])&&($_POST['password'])) {

    $email=$_POST['email'];
    $password=$_POST['password'];

     $data=$user->userLogin($email, $password);
      if($data['is_admin']==1){
        echo "1";
      }else if($data['is_admin'] ==0 && $data['active'] ==1){
        echo "2";
      }else if($data['is_admin']==0 && $data['active']==0){
        echo "-1";
      }else{
        echo "-2";
      }

     }

?>