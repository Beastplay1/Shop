<?php 
session_start();
include('model.php');
if (isset($_GET['cat_id'])) {
	$_SESSION['cat_id'] = $_GET['cat_id'];	
}



 ?>

<table>
    <tr>
        <th>NAME</th>
        <th>PRICE</th>
        <th>DESCRIPTION</th>
        <th>IMAGE</th>
        
    </tr>

<?php 

$all=$model->get_products($_SESSION['cat_id']);

foreach($all as $val){
    $id = $val['id'];
    $name = $val['name'];
    $price = $val['price'];
    $description = $val['description'];
    $image = 'admin/images/'.$val['image'];

    echo"<tr id='$id'>";
    echo "<td  class='name'>$name</td> 
            <td  class='price'>$price</td>
            <td  class='description'>$description</td>
            <td><img src='$image' width=100></td> 
        </tr>";
}

?> 
</table>   
