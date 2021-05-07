<?php  
// Display Erros & warning in Pagess
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 0);
// error_reporting(E_ALL & ~E_NOTICE);

session_start();

// Database Configuration 
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "ecommerce_oops");

$baseurl = "http://localhost/ecommerce_oops";

date_default_timezone_set('Asia/Kolkata');
$dd       = date("d/m/Y"); 
$dt       = date("h:i:s A"); 
$rd       = date("Y/m/d"); 
$now      = date("d/m/Y, h:i:s A"); 
$snow     = date("Y/m/d H:i:s"); 
$sd       = date("Y/m/d H:i");
$ipa      = $_SERVER['REMOTE_ADDR']; 
$dpt      = date("d M Y"); 
$newrd    = date("Y-m-d"); 
$newrdate = "2021-05-05";


?>