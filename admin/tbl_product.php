<?php
require_once "Dbcon.php";

class tbl_product
{
    public $conn;
    public function __construct()
    {
        $dbcon=new Dbcon();
        $this->conn=$dbcon->createConnection();
    }
    
    public function getMainCategory()
    {
        $sql="SELECT * FROM `tbl_product` WHERE `id`='1' AND `prod_parent_id`='0'";
        $data=$this->conn->query($sql);
        if ($data->num_rows>0) {
            $arr=array();
            while ($row=$data->fetch_assoc()) {
                $arr[]=$row;
            }
            return $arr;
        }
        return false;
    }
    public function insertProductBYCategory($productname,$link) 
    {
        $sql="INSERT INTO `tbl_product` (`prod_parent_id`,`prod_name`,`link`,`prod_available`,`prod_launch_date`) 
        VALUES ('1','$productname','HTML','1',NOW())";
        $data=$this->conn->query($sql);
        if ($data) {
            return $data;
        }
        return false;
    }
    public function duplicateCategoryCheck($catvalue) {
        $sql="SELECT * FROM `tbl_product` WHERE `prod_parent_id`='1' AND `prod_name` LIKE '$catvalue'";
        $data=$this->conn->query($sql);
        if ($data->num_rows>0) {
            return true;
        } 
        return false;
    }

    public function updateProductByCategory($productname, $link, $availability, $id) 
    {
        $sql="UPDATE `tbl_product` SET `prod_name`='$productname', `html`='$link',`prod_available`='$availability' WHERE `id` = '$id'";
        $data=$this->conn->query($sql);
        if ($data) {
            return true;
        }
        return false;
    }
}