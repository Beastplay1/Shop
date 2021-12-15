
<?php

session_start();
if(!isset($_SESSION['admin'])){
    header('location:index.php');
    die;
}


?>
<a href="logout.php">LOGOUT</a>
<input type="text" id="name">
<button id="add">ADD</button>

<table>
    <tr>
        <th>CATEGORY</th>
        <th>UPDATE</th>
        <th>DELETE</th>
        <th>SHOW</th>

    </tr>
<?php

include('model.php');

$all = $model->get_categories();

foreach($all as $val){
    $id = $val['id'];
    $name = $val['name'];

    echo"<tr id='$id'>";
    echo "<td contenteditable class='name'>$name</td> 
            <td><button class='update'>UPDATE</button></td>
            <td><button class='delete'>DELETE</button></td>
            <td><button ><a href='products.php?cat_id=$id'>SHOW</a></button></td>

        </tr>";
}
?>
</table>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#add').click(function(){
        let name = $('#name').val();
        $.ajax({
            url:'add_cat.php',
            type:'post',
            data:{name:name,action:'add'},
            success:function(d){
                 location.reload();
               let str="<tr id="+d+">";
    str+= "<td contenteditable class='name'>"+name+"</td> \
            <td><button class='update'>UPDATE</button></td>\
            <td><button class='delete'>DELETE</button></td>\
            <td><a href='products.php?cat="+d+"'> SHOW</a></td></tr>";
            $('table').append(str)
            }
          
        });
    });
    $('.delete').click(function(){
        let id=$(this).parents('tr').attr('id');
        let self=$(this).parents('tr');
        $.ajax({
            url:'add_cat.php',
            type:'post',
            data:{id:id,action:'delete'},
            success:function(a){
                self.remove();
            }
        });
    });
    $('.update').click(function(){
        let self=$(this).parents('tr');
        let id=self.attr('id');
        let name=self.find('.name').text();

        $.ajax({
            url:'add_cat.php',
            type:'post',
            data:{id,name,action:'update'},
            success:function(a){
               
            }
        });
    });

});

</script>


