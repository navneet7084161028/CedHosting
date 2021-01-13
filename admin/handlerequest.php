<?php
session_start();
require_once "tbl_product.php";
$product=new tbl_product();
if (isset($_POST['productadd'])) {
    $productname=$_POST['productname'];
    $link=$_POST['link'];
    $duplicatecheck=$product->duplicateCategoryCheck($productname);
    if ($duplicatecheck) {
        echo "Duplicate Category Name is Not Allowed";
    } else {
        $data=$product->insertProductBYCategory($productname, $link);
        echo true;
    }

}
if (isset($_GET['showproduct'])) {
    $data=$product->showProductBYCategory();
    print_r(json_encode($data));
}
if (isset($_GET['showproducts'])) {
    $data=$product->showProductsBYCategory();
    print_r($data);
  

}
if (isset($_POST['manageproductbycategory'])) {
    $id=$_POST['id'];
    $action=$_POST['action'];
    $data=$product->manageProductBYCategory($id, $action);
    if ($data=="true") {
        echo json_encode("true");
    } elseif ($data=="false") {
        echo json_encode("false");
    } elseif ($data!="true" && $data!="false") {
        print_r(json_encode($data));
    }
}
?>