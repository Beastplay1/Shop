<?php 

session_start();
include('model.php');
$action = $_POST['action'];
if($action == 'add'){
    $cat_id=$_SESSION['cat_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image= "images_".time();
    move_uploaded_file($_FILES['img']['tmp_name'],"images/$image");
    $model->add_product($name,$price,$description,$cat_id,$image);
     header('location:products.php');
}

 ?>