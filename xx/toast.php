<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    $userId1 = $_POST['test1']; //stt
    
    $userId2 = $_POST['test2']; //


    removetest($userId2, $userId1);
    
   
header('Location: thongtindoan.php');

?>