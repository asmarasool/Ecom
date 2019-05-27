<?php 
ob_start(); 
session_start(); 
//session_destroy(); 
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR); 
//echo __DIR__; 
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__  . DS . "templates/front"); 

defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BLACK", __DIR__  . DS . "templates/back");

//echo TEMPLATE_FRONT; 

//Conneting to the database
defined("DB_HOST") ? null : define("DB_HOST", "localhost");
//defined("DB_USER") ? null : define("DB_USER", "id5499461_nila");
defined("DB_USER") ? null : define("DB_USER", "root"); 
defined("DB_PASS") ? null : define("DB_PASS", "Platinum3620");
//defined("DB_NAME") ? null : define("DB_NAME", "id5499461_products");
defined("DB_NAME") ? null : define("DB_NAME", "ecom_db"); 

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 

require_once("functions.php");
   
?>

