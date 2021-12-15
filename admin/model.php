<?php


class model {
    public $conn;
    public function __construct(){
        $this->conn = mysqli_connect('localhost', 'root', "", 'wildberries');
    }
    public function __destruct(){
        mysqli_close ($this->conn);
    }
    public function check_admin($log,$pass){
        $query = "SELECT * FROM admin WHERE login = '$log' and password = '$pass'";
        $res  = mysqli_query($this->conn,$query);
        return mysqli_num_rows($res);
    }
    public function add_category($name){
        $query = "INSERT INTO categories values(null, '$name')"; 
        mysqli_query($this->conn,$query);
        echo mysqli_insert_id($this->conn);
    }
    public function get_categories(){
         $query = "SELECT * FROM categories";
         $res  = mysqli_query($this->conn,$query);
         return mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
    public function delete_category($id){
        $query = "SELECT image FROM products WHERE cat_id=$id";
        $res = mysqli_query($this->conn,$query);
        $arr = mysqli_fetch_all($res,MYSQLI_NUM);
        foreach($arr as $src){
            unlink("images/".$src);
        }
        $query="DELETE FROM products WHERE cat_id=$id";
        $res = mysqli_query($this->conn,$query);
        $query = "DELETE FROM categories WHERE id='$id'";
        mysqli_query($this->conn,$query);

    }
   public function update_category($id,$name){
       $query = "UPDATE categories SET name='$name' WHERE id='$id'";
        mysqli_query($this->conn,$query);

    }

    public function add_product($name,$price,$description,$cat_id,$image){
        $query = "INSERT INTO products values(null, '$name','$price','$description','$cat_id','$image')"; 
        mysqli_query($this->conn,$query);
    }
    public function get_products($cat){
        $query = "SELECT * FROM products WHERE cat_id =$cat";
        $res=mysqli_query($this->conn,$query);
        return mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
    public function delete_product($id){
        $query = "SELECT image FROM products WHERE cat_id=$id";
        $res = mysqli_query($this->conn,$query);
        $arr = mysqli_fetch_all($res,MYSQLI_NUM);
        foreach($arr as $src){
            unlink("images/".$src);
        }
        $query = "DELETE FROM products WHERE id='$id'";
        mysqli_query($this->conn,$query);

    }
    public function update_product($id,$name,$price,$description){
        $query = "UPDATE  products SET name='$name', price='$price', description='$description' WHERE id='$id'";
        mysqli_query($this->conn,$query);
    }

   

}

$model = new model;