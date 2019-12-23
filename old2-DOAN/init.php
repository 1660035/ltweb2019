<?php 
require('./vendor/autoload.php');

require_once ('functions.php');
require_once ('config.php');


ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

session_start();
$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);
$fileName = $parts[2];
$parts = explode('.', $fileName);
$page = $parts[0];


$currentUser = null;
$post = null;

//29-10

$db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);


$password = '';
$hashPassword = password_hash($password, PASSWORD_DEFAULT);

//echo $hashPassword;

if (isset($_SESSION['userId'])) {
    // $currentUser = array(
    //     'username' => 'baotran'
    // );

    $currentUser = findUserById($_SESSION['userId']);
    

}


?>