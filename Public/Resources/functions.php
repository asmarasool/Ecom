<?php 
//helper functions  *****************************************
function query($sql) {
global $connection;
return mysqli_query($connection, $sql);
}


function redirect($location){
return header("Location: $location ");
}


function confirm($result){
global $connection;
if(!$result) {
die("QUERY FAILED " . mysqli_error($connection));
	}
}


function escape_string($string){
global $connection;
return mysqli_real_escape_string($connection, $string);
}



function fetch_array($result){
return mysqli_fetch_array($result);
}


function set_message($msg){
if(!empty($msg)) {
$_SESSION['message'] = $msg;
} else {
$msg = "";
    }
}


function display_message() {
    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}


//Get Products*******************************************
function get_products() {
    
    $query = query(" SELECT * FROM products");
    confirm($query);


// Remember we use query 2 below :)

    while($row = fetch_array($query)) {

        //$product_image = display_image($row['product_image']);

        
//        heredoc method allows huge string in one place without changing the double quoutes to single. 
        $product = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}"><img style="height:90px" src="{$row['product_image']}" alt=""></a>
        <div class="caption">
            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
            <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
             <a class="btn btn-primary" target="_blank" href="resources/cart.php?add={$row['product_id']}">Add to cart</a>
        </div>


       
    </div>
</div>

DELIMETER;

        echo $product;
    }
//    echo "<div class='text-center'><ul class='pagination'>{$outputPagination}</ul></div>";
}



function get_products_in_shop_page() {
$query = query(" SELECT * FROM products ");
confirm($query);

while($row = fetch_array($query)) {

$product = <<<DELIMETER

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['product_image']}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                        <a class="btn btn-primary" target="_blank" href="resources/cart.php?add={$row['product_id']}">Add to cart</a> 
                        <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMETER;
    
echo $product;
        }
}


function login_user(){
    
    if(isset($_POST['submit'])){
        $username = escape_string($_POST['username']); 
        $password = escape_string($_POST['password']); 

        $query =  query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' "); 
        confirm($query); 

        if(mysqli_num_rows($query) == 0){
            set_message("Your Password or Username did not match. Please try again!");
            redirect("login.php"); 
        }else{
            redirect("admin.php");
        } 
    }
}

function send_message(){
   if(isset($_POST['submit'])){
       echo"it works";
   }
    
}

?>
