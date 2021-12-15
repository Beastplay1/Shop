<?php 
session_start();
include('model.php');
if (isset($_GET['cat_id'])) {
	$_SESSION['cat_id'] = $_GET['cat_id'];	
}



 ?>

 <form action="add_product.php" method="post" enctype="multipart/form-data">
	
	<input type="text" name="name" id="">
	<input type="text" name="price" id="">
	<input type="text" name="description" id="">
	<input type="file" name="img" id="">
	<button name="action" value="add">ADD</button>

</form>

<table>
    <tr>
        <th>NAME</th>
        <th>PRICE</th>
        <th>DESCRIPTION</th>
        <th>IMAGE</th>
        <th>UPDATE</th>
        <th>DELETE</th>
        
    </tr>

<?php 

$all=$model->get_products($_SESSION['cat_id']);

foreach($all as $val){
    $id = $val['id'];
    $name = $val['name'];
    $price = $val['price'];
    $description = $val['description'];
    $image = 'images/'.$val['image'];

    echo"<tr id='$id'>";
    echo "<td contenteditable class='name'>$name</td> 
            <td contenteditable class='price'>$price</td>
            <td contenteditable class='description'>$description</td>
            <td><img src='$image' width=100></td> 
            <td><button class='update'>UPDATE</button></td>
            <td><button class='delete'>DELETE</button></td>
        </tr>";
}

?> 
</table>   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
$('.delete').click(function(){
        let self=$(this).parents('tr');
        let id=self.attr('id');
        let src = self.find('img').attr('src');
        $.ajax({
            url:'add_product.php',
            type:'post',
            data:{id,src,action:'delete'},
            success:function(a){
                self.remove();
            }
        });
    });

  $('.update').click(function(){
        let self=$(this).parents('tr');
        let id=self.attr('id'); 
        let name=self.find('.name').text();
        let price=self.find('.price').text();
        let description=self.find('.description').text();

        $.ajax({
            url:'add_product.php',
            type:'post',
            data:{id,name,price,description,action:'update'},
            success:function(a){
               
            }
        });
    });
});
</script>