<?php 
include('model.php');
include('header.php');
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
        <th>ADD TO CART</th>

    </tr>

<?php 

$all=$model->get_products($_SESSION['cat_id']);

foreach($all as $val){
    $id = $val['id'];
    $name = $val['name'];
    $price = $val['price'];
    $description = $val['description'];
    $image = 'admin/images/'.$val['image'];

    echo"<tr>";
    echo "<td  class='name'>$name</td> 
            <td  class='price'>$price</td>
            <td  class='description'>$description</td>
            <td><img src='$image' width=100></td> 
            <td><button id='$id' class='add' >ADD TO CART</button></td>

        </tr>";
}

?> 
</table>   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
$('.add').click(function(){
        let id=$(this).attr('id');
        
        $.ajax({
            url:'add_to_cart.php',
            type:'post',
            data:{id,action:'add'},
            success:function(a){
                
            }
        });
    });
});

</script>
