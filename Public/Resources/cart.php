<?php require_once("config.php"); ?>

<?php 

//Add Button *********************************************
  if(isset($_GET['add'])) {


    $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']). " ");
    confirm($query);

    while($row = fetch_array($query)) {


      if($row['product_quantity'] != $_SESSION['product_' . $_GET['add']]) {

        $_SESSION['product_' . $_GET['add']]+=1;
        redirect("/finalprojportfolio/ecom/Public/checkout.php");


      } else {
          
        set_message("We only have " . $row['product_quantity'] . " " . "{$row['product_title']}" . " available.");
        redirect("/finalprojportfolio/ecom/Public/checkout.php");

      }
    }
  }

//Minus Button**************************************
if(isset($_GET['remove'])){
    $_SESSION['product_' . $_GET['remove']]--;
    
    if($_SESSION['product_' . $_GET['remove']] < 1){
        
       redirect("/finalprojportfolio/ecom/Public/checkout.php"); 
       unset($_SESSION['item_total']); 
        
    }else{
        
        redirect("/finalprojportfolio/ecom/Public/checkout.php");
    }  
}

//Delete Button ****************************************

if(isset($_GET['delete'])){
    $_SESSION['product_' . $_GET['delete']]='0'; 
     redirect("/finalprojportfolio/ecom/Public/checkout.php");
    unset($_SESSION['item_total']); 
    
}


function cart(){
  $total = 0;
    foreach($_SESSION as $name => $value){
        if($value> 0){
        if(substr($name, 0, 8)== "product_") {
            
            $length = strlen($name);

            $id = substr($name, 8 , $length);
            
            $query = query("SELECT * FROM products WHERE product_id = " . escape_string($id). " "); 
            confirm($query); 
            
            while ($row = fetch_array($query)){
            $sub = $row['product_price'] * $value; 
            $product = <<<DELIMETER
            <tr>
                <td>{$row['product_title']}</td>
                <td>&#36;{$row['product_price']}</td>
                <td>{$value}</td>
                <td>&#36;{$sub}</td>
                <td>
                    <a class='btn btn-warning' href="Resources/cart.php?remove={$row['product_id']}">Remove</a>
                    <span></span>
                    <a class='btn btn-success' href="Resources/cart.php?add={$row['product_id']}">Add</a>
                    <span></span>
                    <a class='btn btn-danger' href="Resources/cart.php?delete={$row['product_id']}">Delete Item</a>
                </td>
            </tr>
            DELIMETER;
            echo $product;}  
            //$grandtotal= $total += $sub;
            $_SESSION['item_total'] = $total += $sub;
            }
        }
    }
}
?>