<?php
	include('header.php');
	include('model.php');
	$all=$model->get_selected_products($_SESSION['user_id']);
	

	echo"<table>";
	echo "<th>Name</th>";
	echo "<th>Price</th>";
	echo "<th>Description</th>";
	echo "<th>Img</th>";
	echo "<th>Count</th>";
	echo "<th>Sum</th>";
	echo "<th>Delete</th>";

$total=0;
foreach($all as $val){
	$sum =$val['price']*$val['quantity'];
	$total+=$sum;
	$src='admin/images/'.$val['image'];
	$count =$val['quantity'];
	$id=$val['id'];
    echo"<tr>";
    echo"<td>".$val['name']."</td>";
    echo"<td>".$val['price']."</td>";
    echo"<td>".$val['description']."</td>";
    echo"<td> <img src='$src' width='150px;'> </td>";
    echo"<td> <input type='number' class='count' value='$count'id=$id></td>";
    echo"<td>".$sum."</td>";
    echo"<td><button class='delete' id='$id'>Delete</button></td>";
    echo"</tr>";
    
}

echo"<tr><td colspan='5'>TOTAL</td><td>$total</td>";
$_SESSION['total']=$total;
echo "</table>";
echo"<button style='width:50px;height:50px; font-size:18px;color:red;border-radius:10px;margin-left:500px;'><a href='buy.php'>BUY</a></button></td>";


	include('footer.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	
$(document).ready(function(){
	$('.count').change(function(){
        let id=$(this).attr('id');
        let count=$(this).val();
        
        $.ajax({
            url:'add_to_cart.php',
            type:'post',
            data:{id:id,count:count,action:'update'},
            success:function(a){
               location.reload(); 
            }
        });
    });
    $('.delete').click(function(){
        let id=$(this).attr('id');
        $.ajax({
            url:'add_to_cart.php',
            type:'post',
            data:{id:id,action:'delete'},
            success:function(a){
               location.reload(); 
            }
        });
    });
});
</script>