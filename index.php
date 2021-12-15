<?php 
include('header.php');
?>
<table>
    <tr>
        <th>CATEGORY</th>
        <th>SHOW</th>

    </tr>
<?php

include('model.php');

$all = $model->get_categories();

foreach($all as $val){
    $id = $val['id'];
    $name = $val['name'];

    echo"<tr id='$id'>";
    echo "<td class='name'>$name</td>
            <td><button ><a href='products.php?cat_id=$id'>SHOW</a></button></td>

        </tr>";
}
?>
</table>
