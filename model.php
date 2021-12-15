<?php 
class model {
    public $conn;
    public function __construct(){
        $this->conn = mysqli_connect('localhost', 'root', "", 'wildberries');
    }
     public function __destruct(){
        mysqli_close ($this->conn);
    }
    public function add_user($login,$pass,$email){
    	$query = "INSERT INTO users values(null,'$login','$pass','$email')";
    	mysqli_query($this->conn,$query);
    }
    public function check_user($login,$password){
        $query = "SELECT id FROM users WHERE login = '$login' and password = '$password'";
        $res=mysqli_query($this->conn,$query);
        if(mysqli_num_rows($res) > 0)
            return mysqli_fetch_row($res)[0];
        return false;
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
    public function add_product($name,$price,$description,$cat_id,$image){
        $query = "INSERT INTO products values(null, '$name','$price','$description','$cat_id','$image')"; 
        mysqli_query($this->conn,$query);
    }
    public function get_products($cat){
        $query = "SELECT * FROM products WHERE cat_id =$cat";
        $res=mysqli_query($this->conn,$query);
        return mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
    
}
$model = new model;    