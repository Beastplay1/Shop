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
  public function add_to_cart($id,$user_id){
        $query="SELECT * FROM cart WHERE product_id=$id and user_id=$user_id";
        $res= mysqli_query($this->conn,$query);
        if(mysqli_num_rows($res)==0){
            $query = "INSERT INTO cart values(null, '$user_id','$id','1')"; 
            mysqli_query($this->conn,$query);
   }

}

public function get_selected_products($user_id){ 
          $query ="SELECT name,price,description,image,cart.id,quantity FROM products join cart ON product_id = products.id WHERE user_id=$user_id";
          $res=mysqli_query($this->conn,$query);
         return mysqli_fetch_all($res,MYSQLI_ASSOC);

    }

     public function delete_from_cart($id){
        $query ="DELETE FROM  cart  WHERE id=$id";
        $res=mysqli_query($this->conn,$query);
    }

    public function update_cart($id,$count){
        $query ="UPDATE  cart set quantity = $count WHERE id=$id";
        $res=mysqli_query($this->conn,$query);
    }
    
}
$model = new model;    