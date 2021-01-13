<?php session_start();

require_once "admin/Dbcon.php";

class tbl_user extends Dbcon{

    public $conn;
    public $id;
    public $email;
    public $name;
    public $mobile;
    public $email_approved;
    public $phone_approved;
    public $active;
    public $is_admin;
    public $sign_up_date;
    public $password;
    public $security_question;
    public $security_answer;

    public function __construct(){
        $dbcon = new Dbcon;
        $this->conn=$dbcon->createConnection();
    }
    
    public function userLogin($email, $password){
        $sql = "select * from tbl_user where `email`='$email' and `password`='$password' limit 1 ";
        $data = $this->conn->query($sql);
            if($data->num_rows>0){
                $row=$data->fetch_assoc();
                return $row;
            }else{
                return 0;
            }

    }
}

?>